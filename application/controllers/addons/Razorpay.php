<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
*  @author   : Sumit More
*  date    : 09 July, 2020
*/


class Razorpay extends CI_Controller
{

    protected $unique_identifier = "razorpay";
    private $api = null;

    // constructor
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');


        
        // CHECK IF THE ADDON IS ACTIVE OR NOT
        $this->check_addon_status();
    }

    function admin_login_check()
    {
        if (!$this->session->userdata('admin_login')) {
            redirect(site_url('home/login'), 'refresh');
        }
    }

    public function update_settings()
    {
        // check if admin is logged in
        $this->admin_login_check();

        $razorpay_info = array();
        if (empty($this->input->post('RAZORPAY_MODE')) || empty($this->input->post('RAZORPAY_KEY')) || empty($this->input->post('RAZORPAY_SECRET')) || empty($this->input->post('RAZORPAY_CURRENCY'))) {
            $this->session->set_flashdata('error_message', get_phrase('nothing_can_not_be_empty'));
            redirect(site_url('admin/payment_settings'), 'refresh');
        }

        $razorpay['RAZORPAY_KEY']     = $this->input->post('RAZORPAY_KEY');
        $razorpay['RAZORPAY_MODE']     = $this->input->post('RAZORPAY_MODE');
        $razorpay['RAZORPAY_SECRET']       = $this->input->post('RAZORPAY_SECRET');
        $razorpay['RAZORPAY_CURRENCY']             = $this->input->post('RAZORPAY_CURRENCY');

        array_push($razorpay_info, $razorpay);


        $data['value']    =   json_encode($razorpay_info);
        $this->db->where('key', 'razorpay_keys');
        $this->db->update('settings', $data);

        $this->session->set_flashdata('flash_message', get_phrase('razorpay_updated'));
        redirect(site_url('admin/payment_settings'), 'refresh');
    }

    public function checkout($payment_request = 'web')
    {
        if ($this->session->userdata('user_login') != 1 && $payment_request != 'mobile') {
            redirect('home', 'refresh');
        }
        require_once(APPPATH . "/libraries/Razorpay/Razorpay.php");
        $this->api = get_razorpay_api();
        $orderData = [];
        //checking price
        if ($this->session->userdata('total_price_of_checking_out') == $this->input->post('total_price_of_checking_out')) :
            $total_price_of_checking_out = $this->input->post('total_price_of_checking_out');
            $orderData = [
                'receipt'         => "ORDS" .substr(rand(10000, 99999999),0,6).strtotime("now"),
                'amount'          => $total_price_of_checking_out * 100, // 2000 rupees in paise
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ];
            $razorpayOrder = $this->api->order->create($orderData);
            $razorpayOrderId = $razorpayOrder['id'];

            $_SESSION['razorpay_order_id'] = $razorpayOrderId;
            else :
            $total_price_of_checking_out = $this->session->userdata('total_price_of_checking_out');
        endif;

        if ($total_price_of_checking_out > 0) {
            $page_data['displayCurrency'] = 'INR';
            $page_data["callback_url"] = site_url("addons/razorpay/pgResponse/" . $payment_request);
            $page_data['order_detail']  = $orderData;
            $page_data['payment_request'] = $payment_request;
            $page_data['user_details']    = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
            $page_data['amount_to_pay']   = $total_price_of_checking_out;
            $this->load->view('payment/razorpay_merchant_checkout', $page_data);
        } else {
            redirect('home', 'refresh');
        }
    }

    public function pgResponse($payment_request)
    {

        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        // following files need to be included
        require_once(APPPATH . "/libraries/Razorpay/Razorpay.php");
        $success = true;

        $user_id = $this->session->userdata('user_id');

        if ($this->session->userdata('total_price_of_checking_out') == $this->input->post('amount_to_pay')) :
            $amount_paid = $this->input->post('amount_to_pay');
        else :
            $amount_paid = $this->session->userdata('total_price_of_checking_out');
        endif;
        // echo "<pre>"; print_r($_POST); echo "</pre>";
        // die;
            try
            {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );
                $this->api = get_razorpay_api();
                $this->api->utility->verifyPaymentSignature($attributes);
                //THESE ARE THE TASKS HAVE TO AFTER A PAYMENT
                $this->crud_model->enrol_student($user_id);
                $this->crud_model->course_purchase($user_id, 'razorpay', $amount_paid);
                $this->email_model->course_purchase_notification($user_id, 'razorpay', $amount_paid);
                $this->session->set_flashdata('flash_message', site_phrase('payment_successfully_done'));
                if ($payment_request == 'mobile') :
                    $course_id = $this->session->userdata('cart_items');
                    redirect('home/payment_success_mobile/' . $course_id[0] . '/' . $user_id . '/paid', 'refresh');
                else :
                    $this->session->set_userdata('cart_items', array());
                    redirect('home', 'refresh');
                endif;

            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
    }


    // CHECK IF THE ADDON IS ACTIVE OR NOT. IF NOT REDIRECT TO DASHBOARD
    public function check_addon_status()
    {
        $checker = array('unique_identifier' => $this->unique_identifier);
        $this->db->where($checker);
        $addon_details = $this->db->get('addons')->row_array();
        if ($addon_details['status']) {
            return true;
        } else {
            redirect(site_url(), 'refresh');
        }
    }
}