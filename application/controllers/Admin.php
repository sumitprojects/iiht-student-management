<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }
        $permission = $this->user_model->user_permission($this->session->userdata('user_id'))->result_array();
        $permission = !empty($permission) ? array_column($permission,'name') : $permission;
        $this->session->set_userdata('permission',$permission);
    }

    public function index() {
        if ($this->session->userdata('admin_login') == true) {
            $this->dashboard();
        }else {
            redirect(site_url('login'), 'refresh');
        }
    }
    public function dashboard() {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('backend/index', $page_data);
    }

    public function categories($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if ($param1 == 'add') {
            $response = $this->crud_model->add_category();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('category_name_already_exists'));
            }
            redirect(site_url('admin/categories'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $response = $this->crud_model->edit_category($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('category_name_already_exists'));
            }
            redirect(site_url('admin/categories'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->crud_model->delete_category($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/categories'), 'refresh');
        }
        $page_data['page_name'] = 'categories';
        $page_data['page_title'] = get_phrase('categories');
        $page_data['categories'] = $this->crud_model->get_categories($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function category_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if ($param1 == "add_category") {
            $page_data['page_name'] = 'category_add';
            $page_data['categories'] = $this->crud_model->get_categories()->result_array();
            $page_data['page_title'] = get_phrase('add_category');
        }
        if ($param1 == "edit_category") {
            $page_data['page_name'] = 'category_edit';
            $page_data['page_title'] = get_phrase('edit_category');
            $page_data['categories'] = $this->crud_model->get_categories()->result_array();
            $page_data['category_id'] = $param2;
        }

        $this->load->view('backend/index', $page_data);
    }

    //manage Email
    public function manage_email($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if($param1 == 'email_add_edit'){
            $page_data['page_name'] = 'manage_email/email_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_email');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);   
        }
        else if($param1 == "send_email"){
            $page_data['page_name'] = 'manage_email/send_email';
            $page_data['page_title'] = get_phrase('send_email');
            $page_data['user_list'] =$this->user_model->get_user()->result_array();
            $page_data['email_template_list'] =$this->user_model->get_email()->result_array();
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);   
         }
        else if($param1 == "add_email"){
            $response= $this->crud_model->add_email();
           if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_email'), 'refresh');
        }
        else if($param1 == "edit_email"){
            $response = $this->crud_model->edit_email($param2);
            $page_data['page_name'] = 'manage_email/send_email';

            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_update_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_email'), 'refresh');
         }
         
        
        else{
            $page_data['page_name'] = 'manage_email/email';
            $page_data['page_title'] = get_phrase('email');
            $page_data['email'] = $this->crud_model->get_email($param2)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
    }
    //manage Sms
    public function manage_sms($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        
        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }


        if($param1 == 'sms_add_edit'){
            $page_data['page_name'] = 'manage_sms/sms_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_sms');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);   
        }
        else if($param1 == "send_sms"){
            $page_data['page_name'] = 'manage_sms/send_sms';
            $page_data['page_title'] = get_phrase('send_sms');
            $page_data['user_list'] =$this->user_model->get_user()->result_array();
            $page_data['sms_template_list'] =$this->user_model->get_message()->result_array();
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);   
         }
        else if($param1 == "add_sms"){
            $response= $this->crud_model->add_sms();
           if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_sms'), 'refresh');
        }
        else if($param1 == "edit_sms"){
            $response = $this->crud_model->edit_sms($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_update_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_sms'), 'refresh');
         }
        
        else{
            $page_data['page_name'] = 'manage_sms/sms';
            $page_data['page_title'] = get_phrase('sms');
            $page_data['sms'] = $this->crud_model->get_sms($param2)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
    }
    //manage Examination
    public function manage_examination($param1 = "", $param2 = "", $param3=""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }


        if($param1 == 'examination_add_edit'){
            $page_data['page_name'] = 'examination/examination_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_examintaion');
           
            if($param2 != "" && $param3 == ''){
                $page_data['param2'] = $param2;
            }
            if($param2 != "" && $param3 != '' ){
                $page_data['param2'] = $param2;
                $page_data['examination'] =$this->db->get_where('question',['course_id'=>$param2,'id'=>$param3])->row_array();
            }
            $this->load->view('backend/index', $page_data);   
        }else if($param1 == "add_examination"){
            $response= $this->crud_model->add_examination($param2);
           if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            $course_id=$this->input->post('course_id');
            redirect(site_url('admin/manage_examination/'.$course_id), 'refresh');
        }
        else if($param1 == "edit_examination"){
            $id=$this->input->post('id');
            $response = $this->crud_model->edit_examination($id);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_update_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_examination'), 'refresh');
         }
        else if ($param1 == "delete" ){
            $this->crud_model->delete_attendance($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/manage_examination'), 'refresh');
        }
        else if ($param1 == "activate" ){
            $this->crud_model->activate_attendance($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activate'));
            redirect(site_url('admin/manage_examination'), 'refresh');
        }
        else{
            $page_data['page_name'] = 'examination/examination';
            $page_data['page_title'] = get_phrase('examination');
            $page_data['course_id'] =$param1;
             $page_data['examination'] = $this->crud_model->get_examination(0,$param1)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
    }
    //exam Schedule
    public function manage_schedule($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        
        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        
        if($param1 == 'schedule_add_edit'){
            $page_data['page_name'] = 'exam_schedule/schedule_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_schedule');
            $page_data['user_list'] =$this->user_model->get_user()->result_array();
            $page_data['course_list'] =$this->user_model->get_course()->result_array();
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);   
        }else if($param1 == "add_schedule"){
            $response= $this->crud_model->add_schedule();
           if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_schedule'), 'refresh');
        }
        else if($param1 == "edit_schedule"){
            $response = $this->crud_model->edit_schedule($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_update_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_schedule'), 'refresh');
         }
        else if ($param1 == "delete" ){
            $this->crud_model->delete_schedule($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/manage_schedule'), 'refresh');
        }
        else if ($param1 == "activate" ){
            $this->crud_model->activate_attendance($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activate'));
            redirect(site_url('admin/manage_attendance'), 'refresh');
        }
        else{
            $page_data['page_name'] = 'exam_schedule/schedule';
            $page_data['page_title'] = get_phrase('schedule');
            $page_data['schedule'] = $this->crud_model->get_schedule($param2)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
    }
    //Attendance Controll
    public function manage_attendance($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if($param1 == 'attendance_add_edit'){
            $page_data['page_name'] = 'attendance/attendance_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_attendance');
            $page_data['user_list'] =$this->user_model->get_user()->result_array();
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);   
        }else if($param1 == "add_attendance"){
            $response= $this->crud_model->add_attendance();
           if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_attendance'), 'refresh');
        }
        else if($param1 == "edit_attendance"){
            $response = $this->crud_model->edit_attendance($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_update_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_attendance'), 'refresh');
         }
        else if ($param1 == "delete" ){
            $this->crud_model->delete_attendance($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/manage_attendance'), 'refresh');
        }
        else if ($param1 == "activate" ){
            $this->crud_model->activate_attendance($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activate'));
            redirect(site_url('admin/manage_attendance'), 'refresh');
        }
        else{
            $page_data['page_name'] = 'attendance/attendance';
            $page_data['page_title'] = get_phrase('attendance');
            $page_data['attendance'] = $this->crud_model->get_attendance($param2)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
    }
    //Manage Leave
    public function manage_leave($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if($param1 == 'leave_add_edit'){
            $page_data['page_name'] = 'leave/leave_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_leave');
            $page_data['user_list'] =$this->user_model->get_user()->result_array();
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);   
        }else if($param1 == "add_leave"){
            $response= $this->crud_model->add_leave();
            if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_leave'), 'refresh');
        }
        else if($param1 == "edit_leave"){
            $response = $this->crud_model->edit_leave($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_update_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_leave'), 'refresh');
            }
        else if ($param1 == "delete" ){
            $this->crud_model->delete_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/manage_leave'), 'refresh');
        }
        else if ($param1 == "activate" ){
            $this->crud_model->activate_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activate'));
            redirect(site_url('admin/manage_leave'), 'refresh');
        }
        else{
            $page_data['page_name'] = 'leave/leave';
            $page_data['page_title'] = get_phrase('manage_leave');
            $page_data['leave'] = $this->crud_model->get_leave($param2)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
    }
    
    //Assets Controll
    public function manage_assets($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }


        if($param1 == 'assets_add_edit'){
            $page_data['page_name'] = 'assets/assets_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_assets');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);   
        }else if($param1 == "assets_add_form"){
            $response= $this->crud_model->add_assets();
           if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_assets'), 'refresh');
        }
        else if($param1 == "assets_edit_form"){
            $response = $this->crud_model->edit_assets($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_assets'), 'refresh');
         }
        else if ($param1 == "delete" ){
            $this->crud_model->delete_assets($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/manage_assets'), 'refresh');
        }
        else if ($param1 == "activate" ){
            $this->crud_model->activate_assets($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activate'));
            redirect(site_url('admin/manage_assets'), 'refresh');
        }
        else{
            $page_data['page_name'] = 'assets/assets';
            $page_data['page_title'] = get_phrase('assets');
            $page_data['assets'] = $this->crud_model->get_assets($param2)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
    }


    //Assets For Users Controll
    public function manage_asset_for_users($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if($param1 == 'asset_for_users_add_edit'){
            $page_data['page_name'] = 'asset_for_users/asset_for_users_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_asset_for_users');
            
            $page_data['user_list'] =$this->user_model->get_user()->result_array();
            $page_data['asset_list'] =$this->user_model->get_asset()->result_array();
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);   
            
        }else if($param1 == "add_asset_for_users"){
            $response= $this->crud_model->add_asset_for_users();
           if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_asset_for_users'), 'refresh');
        }
        else if($param1 == "edit_asset_for_users"){
            $response = $this->crud_model->edit_asset_for_users($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_asset_for_users'), 'refresh');
         }
        else if ($param1 == "delete" ){
            $this->crud_model->delete_assets($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/manage_asset_for_users'), 'refresh');
        }
        else if ($param1 == "activate" ){
            $this->crud_model->activate_assets($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activate'));
            redirect(site_url('admin/manage_asset_for_users'), 'refresh');
        }
        else{
            $page_data['page_name'] = 'asset_for_users/asset_for_users';
            $page_data['page_title'] = get_phrase('asset_for_users');
            $page_data['asset_for_users'] = $this->crud_model->get_asset_for_users($param2)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
   
    }


    //Placement Controll
    public function manage_placement($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if($param1 == 'placement_add_edit'){
            $page_data['page_name'] = 'placement/placement_add_edit';
            $page_data['page_title'] = get_phrase('placements');
           
            $page_data['user_list'] =$this->user_model->get_user()->result_array();
            $page_data['department_list']=$this->crud_model->get_department()->result_array();
            $page_data['designation_list']=$this->crud_model->get_designation()->result_array();
            $page_data['hod_list']=$this->crud_model->get_hod()->result_array();
            $page_data['placement'] = $this->crud_model->get_placements($param2)->row_array();
            $this->load->view('backend/index', $page_data); 
        }else if($param1 == "placement_add_form"){
            $response= $this->crud_model->add_placement();
           if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_placement'), 'refresh');
        }
        else if($param1 == "placement_edit_form"){
            $response= $this->crud_model->edit_placement($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_placement'), 'refresh');
         }
        else if ($param1 == "delete" ){
            $this->crud_model->delete_placement($param2);
            redirect(site_url('admin/manage_placement'), 'refresh');
        }
        else if ($param1 == "placed" ){
            $this->crud_model->activate_placement($param2);
            redirect(site_url('admin/manage_placement'), 'refresh');
        }
        else{
            $page_data['page_name'] = 'placement/placement';
            $page_data['page_title'] = get_phrase('placements');
            $page_data['placement'] = $this->crud_model->get_placements($param2)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
    }
    //Training Controll
    public function training($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }


        if($param1 == 'training_cat_add_edit'){
            $page_data['page_name'] = 'training_cat_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_category');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);    
        }else if ($param1 == 'add') {
            $response = $this->crud_model->add_training_cat();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/training'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $response = $this->crud_model->edit_training_cat($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/training'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->crud_model->delete_training_cat($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/training'), 'refresh');
        }else if($param1 == 'activate'){
            $this->crud_model->activate_training_cat($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activated'));
            redirect(site_url('admin/training'), 'refresh');
        }
        $page_data['page_name'] = 'training_cat';
        $page_data['page_title'] = get_phrase('training_category');
        $page_data['source'] = $this->crud_model->get_training_cat($param2)->result_array();
        $this->load->view('backend/index', $page_data);
    }

        //Training Controll
        public function training_type($param1 = "", $param2 = ""){
            if ($this->session->userdata('admin_login') != true) {
                redirect(site_url('login'), 'refresh');
            }
    
            if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
                redirect(site_url('admin/dashboard'), 'refresh');
            }
    
    
            if($param1 == 'training_type_add_edit'){
                $page_data['page_name'] = 'training/training_type_add_edit';
                $page_data['page_title'] = get_phrase('edit_this_category');
                if($param2 != ""){
                    $page_data['param2'] = $param2;
                }
                $this->load->view('backend/index', $page_data);    
            }else if ($param1 == 'add') {
                $response = $this->crud_model->add_training_type();
                if ($response) {
                    $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
                }else{
                    $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
                }
                redirect(site_url('admin/training'), 'refresh');
            }
            elseif ($param1 == "edit") {
                $response = $this->crud_model->edit_training_type($param2);
                if ($response) {
                    $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
                }else{
                    $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
                }
                redirect(site_url('admin/training_type'), 'refresh');
            }
            elseif ($param1 == "delete") {
                $this->crud_model->delete_training_type($param2);
                $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
                redirect(site_url('admin/training_type'), 'refresh');
            }else if($param1 == 'activate'){
                $this->crud_model->activate_training_type($param2);
                $this->session->set_flashdata('flash_message', get_phrase('data_activated'));
                redirect(site_url('admin/training_type'), 'refresh');
            }
            $page_data['page_name'] = 'training/training_type';
            $page_data['page_title'] = get_phrase('training_type');
            $page_data['source'] = $this->crud_model->get_training_type($param2)->result_array();
            $this->load->view('backend/index', $page_data);
        }

    public function admission_form($id = 0){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['title'] = 'Admission Form';
        $page_data['enrol'] = $this->crud_model->get_enrol($id)->row_array();
        $this->load->view('backend/admin/admission_form', $page_data);
    }



    /*********
     * Branch Crud
     */
    public function branch($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if($param1 == 'branch_add_edit'){
            $page_data['page_name'] = 'branch_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_branch');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);    
        }else if ($param1 == 'add') {
            $response = $this->crud_model->add_branch();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('branch_name_already_exists'));
            }
            redirect(site_url('admin/branch'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $response = $this->crud_model->edit_branch($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('branch_name_already_exists'));
            }
            redirect(site_url('admin/branch'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->crud_model->delete_branch($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/branch'), 'refresh');
        }else if($param1 == 'activate'){
            $this->crud_model->activate_branch($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activated'));
            redirect(site_url('admin/branch'), 'refresh');
        }else{
            $page_data['page_name'] = 'branch';
            $page_data['page_title'] = get_phrase('branch');
            $page_data['branch'] = $this->crud_model->get_branch($param2)->result_array();
            $this->load->view('backend/index', $page_data);    
        }
    }
    /****Branch End */


     /*********
     * Department Crud
     */
    public function department($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('department', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }


        if($param1 == 'department_add_edit'){
            $page_data['page_name'] = 'department/department_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_department');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);    
        }else if ($param1 == 'add') {
            $response = $this->crud_model->add_department();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('department_name_already_exists'));
            }
            redirect(site_url('admin/department'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $response = $this->crud_model->edit_department($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('department_name_already_exists'));
            }
            redirect(site_url('admin/department'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->crud_model->delete_department($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/department'), 'refresh');
        }else if($param1 == 'activate'){
            $this->crud_model->activate_department($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activated'));
            redirect(site_url('admin/department'), 'refresh');
        }else{
            $page_data['page_name'] = 'department/department';
            $page_data['page_title'] = get_phrase('department');
            $page_data['department'] = $this->crud_model->get_department($param2)->result_array();
            $this->load->view('backend/index', $page_data);    
        }
    }
    /****Department End */

  /*********
     * hod Crud
     */
    public function hod($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('department', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }


        if($param1 == 'hod_add_edit'){
            $page_data['page_name'] = 'department/hod_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_hod');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);    
        }else if ($param1 == 'add') {
            $response = $this->crud_model->add_hod();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('hod_name_already_exists'));
            }
            redirect(site_url('admin/hod'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $response = $this->crud_model->edit_hod($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('hod_name_already_exists'));
            }
            redirect(site_url('admin/hod'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->crud_model->delete_hod($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/hod'), 'refresh');
        }else if($param1 == 'activate'){
            $this->crud_model->activate_hod($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activated'));
            redirect(site_url('admin/hod'), 'refresh');
        }else{
            $page_data['page_name'] = 'department/hod';
            $page_data['page_title'] = get_phrase('hod');
            $page_data['hod'] = $this->crud_model->get_hod($param2)->result_array();
            $this->load->view('backend/index', $page_data);    
        }
    }
    /****hod End */


    /*********
     * Source Crud
     */
    public function source($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('source', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if($param1 == 'source_add_edit'){
            $page_data['page_name'] = 'source_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_source');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);    
        }else if ($param1 == 'add') {
            $response = $this->crud_model->add_source();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('source_name_already_exists'));
            }
            redirect(site_url('admin/source'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $response = $this->crud_model->edit_source($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('source_name_already_exists'));
            }
            redirect(site_url('admin/source'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->crud_model->delete_source($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/source'), 'refresh');
        }else if($param1 == 'activate'){
            $this->crud_model->activate_source($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activated'));
            redirect(site_url('admin/source'), 'refresh');
        }
        $page_data['page_name'] = 'source';
        $page_data['page_title'] = get_phrase('source');
        $page_data['source'] = $this->crud_model->get_source($param2)->result_array();
        $this->load->view('backend/index', $page_data);
    }
    /****Source End */

    /*********
     * Inquiry Crud
     */
    public function inquiry($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        
        if($param1 == 'inquiry_add_edit'){
            $page_data['page_name'] = 'inquiry_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_inquiry');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);    
        }else if ($param1 == 'add') {
            $response = $this->crud_model->add_inquiry();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('inquiry_already_exists'));
            }
            redirect(site_url('admin/inquiry'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $response = $this->crud_model->edit_inquiry($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('inquiry_already_exists'));
            }
            redirect(site_url('admin/inquiry'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->crud_model->delete_inquiry($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/inquiry'), 'refresh');
        }else if($param1 == 'activate'){
            $this->crud_model->activate_inquiry($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activated'));
            redirect(site_url('admin/inquiry'), 'refresh');
        }else if($param1 == 'complete'){
            $this->crud_model->complete_inquiry($param2);
            $this->session->set_flashdata('flash_message', get_phrase('sent_for_admission'));
            redirect(site_url('admin/inquiry'), 'refresh');
        }
        else{
            $page_data['page_name'] = 'inquiry';
            $page_data['page_title'] = get_phrase('inquiry');
            $page_data['inquiry'] = $this->crud_model->get_inquiry($param2)->result_array();
    
            $this->load->view('backend/index', $page_data);    
        }
    }
    /****inquiry End */

    public function pending_admission(){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('enrol_history', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        $page_data['page_name'] = 'pending_admission';
        $page_data['page_title'] = get_phrase('pending_admission');
        $page_data['inquiry'] = $this->crud_model->get_pending_admission()->result_array();

        $this->load->view('backend/index', $page_data);    
    }
    
    /*********
     * Followup Crud
     */
    public function followup($param1 = "", $param2 = "",$param3 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        
        
        if(!in_array('inquiry', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if($param1 == 'followup_add_edit'){
            $page_data['page_name'] = 'followup_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_followup');
            if($param2 != ""){
                $page_data['param2'] = $param2;
                $inquiry = $this->crud_model->get_inquiry($param2)->row_array();

                if($inquiry['is_delete']==1){
                    
                    redirect('admin/inquiry','refresh');
                    
                }
            }
            if($param3 != ""){
                $page_data['param3'] = $param3;
            }
            $this->load->view('backend/index', $page_data);    
        }else if($param1 == 'view_followup'){
            $page_data['page_name'] = 'followup';
            $page_data['page_title'] = get_phrase('view_followup');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);    
        }else if ($param1 == 'add') {
            $response = $this->crud_model->add_followup();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('followup_error'));
            }
            redirect(site_url('admin/followup/view_followup/'.(html_escape($this->input->post('en_id')))), 'refresh');
        }
        elseif ($param1 == "edit") {
            $response = $this->crud_model->edit_followup($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('followup_error'));
            }
            redirect(site_url('admin/followup/view_followup/'.(html_escape($this->input->post('en_id')))), 'refresh');
        }
        elseif ($param1 == "delete") {
            $inquiry = $this->crud_model->get_inquiry($param2)->row_array();

            if($inquiry['is_delete']==1){                
                redirect('admin/inquiry','refresh');
            }
            $this->crud_model->delete_followup($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/followup/view_followup/'.(html_escape($this->input->post('en_id')))), 'refresh');
        }else if($param1 == 'activate'){
            $inquiry = $this->crud_model->get_inquiry($param2)->row_array();

            if($inquiry['is_delete']==1){                
                redirect('admin/inquiry','refresh');
            }
            $this->crud_model->activate_followup($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activated'));
            redirect(site_url('admin/followup/view_followup/'.(html_escape($this->input->post('en_id')))), 'refresh');
        }else{
            $this->inquiry();
        }
    }
    /****Followup End */

    public function sub_categories_by_category_id($category_id = 0) {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('categories', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $category_id = $this->input->post('category_id');
        redirect(site_url("admin/sub_categories/$category_id"), 'refresh');
    }

    public function sub_category_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('categories', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if ($param1 == 'add_sub_category') {
            $page_data['page_name'] = 'sub_category_add';
            $page_data['page_title'] = get_phrase('add_sub_category');
        }
        elseif ($param1 == 'edit_sub_category') {
            $page_data['page_name'] = 'sub_category_edit';
            $page_data['page_title'] = get_phrase('edit_sub_category');
            $page_data['sub_category_id'] = $param2;
        }
        $page_data['categories'] = $this->crud_model->get_categories();
        $this->load->view('backend/index', $page_data);
    }

    public function instructors($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('instructors', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if($param1 == "add"){
            $this->user_model->add_user(true); // PROVIDING TRUE FOR INSTRUCTOR
            redirect(site_url('admin/instructors'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/instructors'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->user_model->delete_user($param2);
            redirect(site_url('admin/instructors'), 'refresh');
        }

        $page_data['page_name'] = 'instructors';
        $page_data['page_title'] = get_phrase('instructor');
        $page_data['instructors'] = $this->user_model->get_instructor()->result_array();
        $this->load->view('backend/index', $page_data);
    }

    public function instructor_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('instructors', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if ($param1 == 'add_instructor_form') {
            $page_data['page_name'] = 'instructor_add';
            $page_data['page_title'] = get_phrase('instructor_add');
            $this->load->view('backend/index', $page_data);
        }
        elseif ($param1 == 'edit_instructor_form') {
            $page_data['page_name'] = 'instructor_edit';
            $page_data['user_id'] = $param2;
            $page_data['page_title'] = get_phrase('instructor_edit');
            $this->load->view('backend/index', $page_data);
        }
    }

    public function users($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('enrol_history', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        $page_data['page_name'] = 'users';
        if ($param1 == "add") {
            $this->user_model->add_user();
            redirect(site_url('admin/users'), 'refresh');
        }
        elseif ($param1 == "edit") {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/users'), 'refresh');
        }
        elseif ($param1 == "delete") {
            $this->user_model->delete_user($param2);
            redirect(site_url('admin/users'), 'refresh');
        }elseif ($param1 == "view"){
            $page_data['user'] = $this->user_model->get_user($param2)->row_array();
            $page_data['enquiry'] = $this->crud_model->get_inquiry($page_data['user']['en_id'])->result_array();
            $page_data['admission'] = $this->crud_model->enrol_history_by_date_range($page_data['user']['id'])->result_array();
            $page_data['invoices'] = $this->crud_model->purchase_history($page_data['user']['id'])->result_array();
            $page_data['assets'] = $this->crud_model->get_asset_for_users('',$page_data['user']['id'])->result_array();
            $page_data['attendance'] = $this->crud_model->get_attendance('',$page_data['user']['id'])->result_array();
            $page_data['leave'] = $this->crud_model->get_leave('',$page_data['user']['id'])->result_array();
            $page_data['page_name'] = 'admission/view_admission';
        }

        $page_data['page_title'] = get_phrase('student');
        $page_data['users'] = $this->user_model->get_user($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function system_user($param1 = "",$param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('system_user', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        
        if ($param1 == 'add_edit_user') {
            $page_data['page_name'] = 'user_add_edit';
            $page_data['page_title'] = get_phrase('add_system_user');
            $page_data['roles'] = $this->user_model->get_roles([1,2])->result_array();
            $page_data['permission'] = $this->user_model->get_permission()->result_array();
            $page_data['branch'] = $this->crud_model->get_branch()->result_array();
            if($param2 > 0){
                $page_data['user'] = $this->user_model->get_system_user($param2)->row_array();
                $page_data['user_permission'] = array_column($this->user_model->user_permission($param2)->result_array(),'pm_id');
            }
            $this->load->view('backend/index', $page_data);
        }else if ($param1 == 'add_edit') {
            $id = $this->input->post('id');
            $this->user_model->add_edit_user($id);
            redirect(site_url('admin/system_user'), 'refresh');
        }else if ($param1 == 'delete') {
            $this->user_model->delete_user($param2);
            redirect(site_url('admin/system_user'), 'refresh');
        }else{
            $page_data['page_name'] = 'system_users';
            $page_data['page_title'] = get_phrase('system_users');
            $page_data['users'] = $this->user_model->get_all_system_user();
            $page_data['permission'] = $this->user_model->get_permission()->result_array();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function user_form($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('enrol_history', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if ($param1 == 'add_user_form') {
            $page_data['page_name'] = 'user_add';
            $page_data['page_title'] = get_phrase('student_add');
            $page_data['offline'] = true;
            $page_data['edu_list'] = $this->crud_model->get_edu_list()->result_array();
            $page_data['branch'] = $this->crud_model->get_branch()->result_array();
            $page_data['sources'] = $this->crud_model->get_source()->result_array();
            $page_data['hod'] = $this->crud_model->get_hod()->result_array();

            $this->load->view('backend/index', $page_data);
        }
        else if ($param1 == 'add_edit_from_inquiry') {
            $page_data['page_name'] = 'admission/user_addmission';
            $page_data['courses'] = $this->crud_model->get_courses()->result_array();
            $page_data['page_title'] = get_phrase('student_admission');
            if(!empty($param2)){
                $page_data['enquiry'] = $this->crud_model->get_inquiry($param2)->row_array();
            }
            $page_data['edu_list'] = $this->crud_model->get_edu_list()->result_array();
            $page_data['branch'] = $this->crud_model->get_branch()->result_array();
            $page_data['hod'] = $this->crud_model->get_hod()->result_array();
            $page_data['training'] = $this->crud_model->get_training_cat()->result_array();
            $page_data['training_type'] = $this->crud_model->get_training_type()->result_array();
            $page_data['sources'] = $this->crud_model->get_source()->result_array();

            $page_data['admission'] = true;
            $this->load->view('backend/index', $page_data);
        }else if($param1 == 'add_edit_from_inquiry_non'){
            $page_data['page_name'] = 'admission/user_addmission';
            $page_data['intern'] = true;
            $page_data['page_title'] = get_phrase('student_non_admission');
            $page_data['edu_list'] = $this->crud_model->get_edu_list()->result_array();
            $page_data['branch'] = $this->crud_model->get_branch()->result_array();
            $page_data['courses'] = $this->crud_model->get_courses()->result_array();
            $page_data['edu_list'] = $this->crud_model->get_edu_list()->result_array();
            $page_data['sources'] = $this->crud_model->get_source()->result_array();
            $page_data['hod'] = $this->crud_model->get_hod()->result_array();
            $page_data['training'] = $this->crud_model->get_training_cat()->result_array();
            $page_data['training_type'] = $this->crud_model->get_training_type()->result_array();
            $page_data['sources'] = $this->crud_model->get_source()->result_array();

            if(!empty($param2)){
                $page_data['enquiry'] = $this->crud_model->get_inquiry($param2)->row_array();
            }
            $this->load->view('backend/index', $page_data);
        }elseif ($param1 == 'edit_user_form') {
            // $page_data['page_name'] = 'user_edit';
            $page_data['page_name'] = 'admission/edit_user_admission';
            $page_data['user_id'] = $param2;
            $page_data['courses'] = $this->crud_model->get_courses()->result_array();
            $page_data['page_title'] = get_phrase('student_edit');
            $page_data['edu_list'] = $this->crud_model->get_edu_list()->result_array();
            $page_data['branch'] = $this->crud_model->get_branch()->result_array();
            $page_data['hod'] = $this->crud_model->get_hod($param2)->result_array();
            
            $page_data['sources'] = $this->crud_model->get_source()->result_array();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function enrol_history($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 != "") {
            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0]);
            $page_data['timestamp_end']   = strtotime($date_range[1]);
        }else {
            $first_day_of_month = "1 ".date("M")." ".date("Y").' 00:00:00';
            $last_day_of_month = date("t")." ".date("M")." ".date("Y").' 23:59:59';
            $page_data['timestamp_start']   = strtotime($first_day_of_month);
            $page_data['timestamp_end']     = strtotime($last_day_of_month);
        }
        $page_data['page_name'] = 'enrol_history';
        $page_data['enrol_history'] = $this->crud_model->enrol_history_by_date_range($page_data['timestamp_start'], $page_data['timestamp_end']);
        $page_data['page_title'] = get_phrase('enrol_history');

        $this->load->view('backend/index', $page_data);
    }

    public function payments($param1 = "",$param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('payment_list', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if($param1 == 'invoice' && $param2){
            $page_data['page_name'] = 'student_invoice';
            $page_data['payment'] = $this->crud_model->get_payment_details_by_id($param2);
            $page_data['student_detail'] = $this->user_model->get_user($page_data['payment']['user_id'])->row_array();
            $page_data['branch_detail'] = $this->crud_model->get_branch($page_data['student_detail']['branch_id'])->row_array();
            $page_data['course_detail'] = $this->crud_model->get_course_by_id($page_data['payment']['course_id'])->row_array();
            
            $page_data['page_title'] = get_phrase('student_invoice');
            $this->load->view('backend/index', $page_data);
        }elseif($param1 == 'pending' && $param2){
            if(!in_array('payment_pending', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
                redirect(site_url('admin/dashboard'), 'refresh');
            }
            $payment = $this->crud_model->get_payment_details_by_id($param2);
            $this->crud_model->update_payment_status($param2,'pending',0);
            redirect(site_url('admin/payment_list'), 'refresh');
        }elseif($param1 == 'approve' && $param2){
            if(!in_array('payment_approve', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
                redirect(site_url('admin/dashboard'), 'refresh');
            }
            $payment = $this->crud_model->get_payment_details_by_id($param2);
            $this->crud_model->update_payment_status($param2,'paid',$payment['amount']);
            redirect(site_url('admin/payment_list'), 'refresh');
        }elseif($param1 == 'cancel' && $param2){
            if(!in_array('payment_cancel', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
                redirect(site_url('admin/dashboard'), 'refresh');
            }
            $payment = $this->crud_model->get_payment_details_by_id($param2);
            $this->crud_model->update_payment_status($param2,'canceled',0);
            redirect(site_url('admin/payment_list'), 'refresh');
        }else{
            $page_data['page_name'] = 'student_payments';
            $page_data['payments'] = $this->crud_model->get_all_payment_by_enrol($param1)->result_array();
            $page_data['page_title'] = get_phrase('enrol_a_student');
            $this->load->view('backend/index', $page_data);
        }
    }

    public function payment_list(){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('payment_list', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $page_data['page_name'] = 'payment_list';
        $page_data['payments'] = $this->crud_model->get_all_payment_by_enrol()->result_array();
        $page_data['page_title'] = get_phrase('payment_list');
        $this->load->view('backend/index', $page_data);
    }

    public function enrol_student($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('enrol_history', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if ($param1 == 'enrol') {
            $enroled = $this->crud_model->enrol_a_student_manually();
            ($enroled)?redirect(site_url('admin/enrol_history'), 'refresh'):'';
        }
        $page_data['page_name'] = 'enrol_student';
        $page_data['courses'] = $this->crud_model->get_courses()->result_array();
        $page_data['page_title'] = get_phrase('enrol_a_student');
        $this->load->view('backend/index', $page_data);
    }

    public function admin_revenue($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('admin_revenue', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if ($param1 != "") {
            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0].' 00:00:00');
            $page_data['timestamp_end']   = strtotime($date_range[1].' 23:59:59');

        }else {
            $page_data['timestamp_start'] = strtotime(date("m/01/Y 00:00:00"));
            $page_data['timestamp_end']   = strtotime(date("m/t/Y 23:59:59"));
        }

        $page_data['page_name'] = 'admin_revenue';
        $page_data['payment_history'] = $this->crud_model->get_revenue_by_user_type($page_data['timestamp_start'], $page_data['timestamp_end'], 'admin_revenue');
        $page_data['page_title'] = get_phrase('admin_revenue');



        $this->load->view('backend/index', $page_data);
    }

    public function instructor_revenue($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('admin_revenue', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $page_data['page_name'] = 'instructor_revenue';
        $page_data['payment_history'] = $this->crud_model->get_revenue_by_user_type("", "", 'instructor_revenue');
        $page_data['page_title'] = get_phrase('instructor_revenue');
        $this->load->view('backend/index', $page_data);
    }

    function invoice($payout_id = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('invoice', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $page_data['page_name'] = 'invoice';
        $page_data['payout_id'] = $payout_id;
        $page_data['page_title'] = get_phrase('invoice');
        $this->load->view('backend/index', $page_data);
    }



    public function payment_history_delete($param1 = "", $redirect_to = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('payment_list', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $this->crud_model->delete_payment_history($param1);
        $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
        redirect(site_url('admin/'.$redirect_to), 'refresh');
    }

    public function enrol_history_delete($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('enrol_history', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $this->crud_model->delete_enrol_history($param1);
        $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
        redirect(site_url('admin/enrol_history'), 'refresh');
    }
    
    public function enrol_history_activate($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('enrol_history', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $this->crud_model->activate_enrol_history($param1);
        redirect(site_url('admin/enrol_history'), 'refresh');
    }

    public function add_payment($param1 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('enrol_history', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if($param1 == ""){
            $inserted = $this->crud_model->add_offline_payment();
            if($inserted){
                $this->session->set_flashdata('flash_message', get_phrase('student_has_been_enrolled_to_that_course'));
                redirect(site_url('admin/enrol_history'), 'refresh');    
            }else{
                $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
            }
        }else if($param1 != ""){
            $page_data['page_name'] = 'make_payment';
            $page_data['page_title'] = get_phrase('make_payment');
            $page_data['purchase_history'] = $this->crud_model->get_enrol($param1)->row_array();
            $this->load->view('backend/index', $page_data);    
        }else{
            redirect(site_url('admin/enrol_history'), 'refresh');
        }
    }

    public function purchase_history() {
        if ($this->session->userdata('admin_login') != true) {
            
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('payment_list', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $page_data['page_name'] = 'purchase_history';
        $page_data['purchase_history'] = $this->crud_model->purchase_history();
        $page_data['page_title'] = get_phrase('purchase_history');
        $this->load->view('backend/index', $page_data);
    }

    public function system_settings($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if($this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if ($param1 == 'system_update') {
            $this->crud_model->update_system_settings();
            $this->session->set_flashdata('flash_message', get_phrase('system_settings_updated'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }

        if ($param1 == 'logo_upload') {
            move_uploaded_file($_FILES['logo']['tmp_name'], 'assets/backend/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('backend_logo_updated'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }

        if ($param1 == 'favicon_upload') {
            move_uploaded_file($_FILES['favicon']['tmp_name'], 'assets/favicon.png');
            $this->session->set_flashdata('flash_message', get_phrase('favicon_updated'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }

        $page_data['languages']  = $this->crud_model->get_all_languages();
        $page_data['page_name'] = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function frontend_settings($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if($this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if ($param1 == 'frontend_update') {
            $this->crud_model->update_frontend_settings();
            $this->session->set_flashdata('flash_message', get_phrase('frontend_settings_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }

        if($param1 == 'recaptcha_update'){
            $this->crud_model->update_recaptcha_settings();
            $this->session->set_flashdata('flash_message', get_phrase('recaptcha_settings_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }

        if ($param1 == 'banner_image_update') {
            $this->crud_model->update_frontend_banner();
            $this->session->set_flashdata('flash_message', get_phrase('banner_image_update'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'light_logo') {
            $this->crud_model->update_light_logo();
            $this->session->set_flashdata('flash_message', get_phrase('logo_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'dark_logo') {
            $this->crud_model->update_dark_logo();
            $this->session->set_flashdata('flash_message', get_phrase('logo_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'small_logo') {
            $this->crud_model->update_small_logo();
            $this->session->set_flashdata('flash_message', get_phrase('logo_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'favicon') {
            $this->crud_model->update_favicon();
            $this->session->set_flashdata('flash_message', get_phrase('favicon_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }

        $page_data['page_name'] = 'frontend_settings';
        $page_data['page_title'] = get_phrase('frontend_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function payment_settings($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if($this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if ($param1 == 'system_currency') {
            $this->crud_model->update_system_currency();
            redirect(site_url('admin/payment_settings'), 'refresh');
        }
        if ($param1 == 'paypal_settings') {
            $this->crud_model->update_paypal_settings();
            redirect(site_url('admin/payment_settings'), 'refresh');
        }
        if ($param1 == 'stripe_settings') {
            $this->crud_model->update_stripe_settings();
            redirect(site_url('admin/payment_settings'), 'refresh');
        }

        $page_data['page_name'] = 'payment_settings';
        $page_data['page_title'] = get_phrase('payment_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function smtp_settings($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if($this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if ($param1 == 'update') {
            $this->crud_model->update_smtp_settings();
            $this->session->set_flashdata('flash_message', get_phrase('smtp_settings_updated_successfully'));
            redirect(site_url('admin/smtp_settings'), 'refresh');
        }

        $page_data['page_name'] = 'smtp_settings';
        $page_data['page_title'] = get_phrase('smtp_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function instructor_settings($param1 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if($this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_instructor_settings();
            $this->session->set_flashdata('flash_message', get_phrase('instructor_settings_updated'));
            redirect(site_url('admin/instructor_settings'), 'refresh');
        }

        $page_data['page_name'] = 'instructor_settings';
        $page_data['page_title'] = get_phrase('instructor_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function theme_settings($action = '') {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if($this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $page_data['page_name']  = 'theme_settings';
        $page_data['page_title'] = get_phrase('theme_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function theme_actions($action = "", $theme = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if($this->session->userdata('courses') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if ($action == 'activate') {
            $theme_to_active  = $this->input->post('theme');
            $installed_themes = $this->crud_model->get_installed_themes();
            if (in_array($theme_to_active, $installed_themes)) {
                $this->crud_model->activate_theme($theme_to_active);
                echo true;
            }else {
                echo false;
            }
        }
        elseif ($action == 'remove') {
            if ($theme == get_frontend_settings('theme')) {
                $this->session->set_flashdata('error_message', get_phrase('activate_a_theme_first'));
            }else{
                $this->crud_model->remove_files_and_folders(APPPATH.'/views/frontend/'.$theme);
                $this->crud_model->remove_files_and_folders(FCPATH.'/assets/frontend/'.$theme);
                $this->session->set_flashdata('flash_message', $theme.' '.get_phrase('theme_removed_successfully'));
            }
            redirect(site_url('admin/theme_settings'), 'refresh');
        }

    }

    public function courses() {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('courses', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = isset($_GET['instructor_id']) ? $_GET['instructor_id'] : "all";
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";

        // Courses query is used for deciding if there is any course or not. Check the view you will get it
        $page_data['courses']                = $this->crud_model->filter_course_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status']);
        $page_data['status_wise_courses']    = $this->crud_model->get_status_wise_courses();
        $page_data['instructors']            = $this->user_model->get_instructor()->result_array();
        $page_data['page_name']              = 'courses-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();
        $page_data['page_title']             = get_phrase('active_courses');
        $this->load->view('backend/index', $page_data);
    }

    // This function is responsible for loading the course data from server side for datatable SILENTLY
    public function get_courses() {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $courses = array();
        // Filter portion
        $filter_data['selected_category_id']   = $this->input->post('selected_category_id');
        $filter_data['selected_instructor_id'] = $this->input->post('selected_instructor_id');
        $filter_data['selected_price']         = $this->input->post('selected_price');
        $filter_data['selected_status']        = $this->input->post('selected_status');

        // Server side processing portion
        $columns = array(
            0 => '#',
            1 => 'title',
            2 => 'category',
            3 => 'lesson_and_section',
            4 => 'enrolled_student',
            5 => 'status',
            6 => 'price',
            7 => 'actions',
            8 => 'course_id'
        );

        // Coming from databale itself. Limit is the visible number of data
        $limit = html_escape($this->input->post('length'));
        $start = html_escape($this->input->post('start'));
        $order = "";
        $dir   = $this->input->post('order')[0]['dir'];

        $totalData = $this->lazyload->count_all_courses($filter_data);
        $totalFiltered = $totalData;

        // This block of code is handling the search event of datatable
        if(empty($this->input->post('search')['value'])) {
            $courses = $this->lazyload->courses($limit, $start, $order, $dir, $filter_data);
        }
        else {
            $search = $this->input->post('search')['value'];
            $courses =  $this->lazyload->course_search($limit, $start, $search, $order, $dir, $filter_data);
            $totalFiltered = $this->lazyload->course_search_count($search);
        }

        // Fetch the data and make it as JSON format and return it.
        $data = array();
        if(!empty($courses)) {
            foreach ($courses as $key => $row) {
                $instructor_details = $this->user_model->get_all_user($row->user_id)->row_array();
                $category_details = $this->crud_model->get_category_details_by_id($row->sub_category_id)->row_array();
                $sections = $this->crud_model->get_section('course', $row->id);
                $lessons = $this->crud_model->get_lessons('course', $row->id);
                $enroll_history = $this->crud_model->enrol_history($row->id);

                $status_badge = "badge-success-lighten";
                if ($row->status == 'pending') {
                    $status_badge = "badge-danger-lighten";
                }elseif ($row->status == 'draft') {
                    $status_badge = "badge-dark-lighten";
                }

                $price_badge = "badge-dark-lighten";
                $price = 0;
                if ($row->is_free_course == null){
                    if ($row->discount_flag == 1) {
                        $price = currency($row->discounted_price);
                    }else{
                        $price = currency($row->price);
                    }
                }elseif ($row->is_free_course == 1){
                    $price_badge = "badge-success-lighten";
                    $price = get_phrase('free');
                }

                $view_course_on_frontend_url = site_url('home/course/'.rawurlencode(slugify($row->title)).'/'.$row->id);
                $examination_course_id = site_url('admin/manage_examination/'.$row->id);
                $edit_this_course_url = site_url('admin/course_form/course_edit/'.$row->id);
                $section_and_lesson_url = site_url('admin/course_form/course_edit/'.$row->id);

                if ($row->status == 'active') {
                    $course_status_changing_message = get_phrase('mark_as_pending');
                    if ($row->user_id != $this->session->userdata('user_id')) {
                        $course_status_changing_action = "showAjaxModal('".site_url('modal/popup/mail_on_course_status_changing_modal/pending/'.$row->id.'/'.$filter_data['selected_category_id'].'/'.$filter_data['selected_instructor_id'].'/'.$filter_data['selected_price'].'/'.$filter_data['selected_status'])."', '".$course_status_changing_message."')";
                    }else{
                        $course_status_changing_action = "confirm_modal('".site_url('admin/change_course_status_for_admin/pending/'.$row->id.'/'.$filter_data['selected_category_id'].'/'.$filter_data['selected_instructor_id'].'/'.$filter_data['selected_price'].'/'.$filter_data['selected_status'])."')";
                    }
                }else{
                    $course_status_changing_message = get_phrase('mark_as_active');
                    if ($row->user_id != $this->session->userdata('user_id')) {
                        $course_status_changing_action = "showAjaxModal('".site_url('modal/popup/mail_on_course_status_changing_modal/active/'.$row->id.'/'.$filter_data['selected_category_id'].'/'.$filter_data['selected_instructor_id'].'/'.$filter_data['selected_price'].'/'.$filter_data['selected_status'])."', '".$course_status_changing_message."')";
                    }else{
                        $course_status_changing_action = "confirm_modal('".site_url('admin/change_course_status_for_admin/active/'.$row->id.'/'.$filter_data['selected_category_id'].'/'.$filter_data['selected_instructor_id'].'/'.$filter_data['selected_price'].'/'.$filter_data['selected_status'])."')";
                    }
                }



                $delete_course_url = "confirm_modal('".site_url('admin/course_actions/delete/'.$row->id)."')";
                
                if($row->course_type != 'scorm'){
                    $section_and_lesson_menu = '<li><a class="dropdown-item" href="'.$section_and_lesson_url.'">'.get_phrase("section_and_lesson").'</a></li>';
                }else{
                    $section_and_lesson_menu = "";
                }

                $action = '
                <div class="dropright dropright">
                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="'.$view_course_on_frontend_url.'" target="_blank">'.get_phrase("view_course_on_frontend").'</a></li>
                <li><a class="dropdown-item" href="'.$examination_course_id.'">'.get_phrase("add_exam_paper").'</a></li>
                <li><a class="dropdown-item" href="'.$edit_this_course_url.'">'.get_phrase("edit_this_course").'</a></li>
                '.$section_and_lesson_menu.'
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="'.$course_status_changing_action.'">'.$course_status_changing_message.'</a></li>
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="'.$delete_course_url.'">'.get_phrase("delete").'</a></li>
                </ul>
                </div>
                ';

                $nestedData['#'] = $key+1;

                $nestedData['title'] = '<strong><a href="'.site_url('admin/course_form/course_edit/'.$row->id).'">'.$row->title.'</a></strong><br>
                <small class="text-muted">'.get_phrase('instructor').': <b>'.$instructor_details['first_name'].' '.$instructor_details['last_name'].'</b></small>';

                $nestedData['category'] = '<span class="badge badge-dark-lighten">'.$category_details['name'].'</span>';

                if($row->course_type == 'scorm'){
                    $nestedData['lesson_and_section'] = '<span class="badge badge-info-lighten">'.get_phrase('scorm_course').'</span>';
                }elseif($row->course_type == 'general'){
                    $nestedData['lesson_and_section'] = '
                    <small class="text-muted"><b>'.get_phrase('total_section').'</b>: '.$sections->num_rows().'</small><br>
                    <small class="text-muted"><b>'.get_phrase('total_lesson').'</b>: '.$lessons->num_rows().'</small>';
                }

                $nestedData['enrolled_student'] = '<small class="text-muted"><b>'.get_phrase('total_enrolment').'</b>: '.$enroll_history->num_rows().'</small>';

                $nestedData['status'] = '<span class="badge '.$status_badge.'">'.get_phrase($row->status).'</span>';

                $nestedData['price'] = '<span class="badge '.$price_badge.'">'.$price.'</span>';

                $nestedData['actions'] = $action;

                $nestedData['course_id'] = $row->id;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    public function pending_courses() {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }


        $page_data['page_name'] = 'pending_courses';
        $page_data['page_title'] = get_phrase('pending_courses');
        $this->load->view('backend/index', $page_data);
    }

    public function course_actions($param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == "add") {
            $course_id = $this->crud_model->add_course();
            redirect(site_url('admin/course_form/course_edit/'.$course_id), 'refresh');

        }elseif($param1 == 'add_shortcut'){
            echo $this->crud_model->add_shortcut_course();
        }elseif ($param1 == "edit") {
            $this->crud_model->update_course($param2);

            // CHECK IF LIVE CLASS ADDON EXISTS, ADD OR UPDATE IT TO ADDON MODEL
            if (addon_status('live-class')) {
                $this->load->model('addons/Liveclass_model','liveclass_model');
                $this->liveclass_model->update_live_class($param2);
            }

            redirect(site_url('admin/courses'), 'refresh');
        }
        elseif ($param1 == 'delete') {
            $this->is_drafted_course($param2);
            $this->crud_model->delete_course($param2);
            redirect(site_url('admin/courses'), 'refresh');
        }
    }


    public function course_form($param1 = "", $param2 = "") {

        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('courses', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if ($param1 == 'add_course') {
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $page_data['page_name'] = 'course_add';
            $page_data['page_title'] = get_phrase('add_course');
            $this->load->view('backend/index', $page_data);

        }elseif ($param1 == 'add_course_shortcut') {
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $this->load->view('backend/admin/course_add_shortcut', $page_data);
        }elseif ($param1 == 'course_edit') {
            $this->is_drafted_course($param2);
            $page_data['page_name'] = 'course_edit';
            $page_data['course_id'] =  $param2;
            $page_data['page_title'] = get_phrase('edit_course');
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $this->load->view('backend/index', $page_data);
        }
    }

    private function is_drafted_course($course_id){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('courses', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
        if ($course_details['status'] == 'draft') {
            $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_course'));
            redirect(site_url('admin/courses'), 'refresh');
        }
    }

    public function change_course_status($updated_status = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('courses', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $course_id = $this->input->post('course_id');
        $category_id = $this->input->post('category_id');
        $instructor_id = $this->input->post('instructor_id');
        $price = $this->input->post('price');
        $status = $this->input->post('status');
        if (isset($_POST['mail_subject']) && isset($_POST['mail_body'])) {
            $mail_subject = $this->input->post('mail_subject');
            $mail_body = $this->input->post('mail_body');
            $this->email_model->send_mail_on_course_status_changing($course_id, $mail_subject, $mail_body);
        }
        $this->crud_model->change_course_status($updated_status, $course_id);
        $this->session->set_flashdata('flash_message', get_phrase('course_status_updated'));
        redirect(site_url('admin/courses?category_id='.$category_id.'&status='.$status.'&instructor_id='.$instructor_id.'&price='.$price), 'refresh');
    }

    public function change_course_status_for_admin($updated_status = "", $course_id = "", $category_id = "", $status = "", $instructor_id = "", $price = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('courses', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $this->crud_model->change_course_status($updated_status, $course_id);
        $this->session->set_flashdata('flash_message', get_phrase('course_status_updated'));
        redirect(site_url('admin/courses?category_id='.$category_id.'&status='.$status.'&instructor_id='.$instructor_id.'&price='.$price), 'refresh');
    }

    public function sections($param1 = "", $param2 = "", $param3 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('courses', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if ($param2 == 'add') {
            $this->crud_model->add_section($param1);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_added_successfully'));
        }
        elseif ($param2 == 'edit') {
            $this->crud_model->edit_section($param3);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_updated_successfully'));
        }
        elseif ($param2 == 'delete') {
            $this->crud_model->delete_section($param1, $param3);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_deleted_successfully'));
        }
        redirect(site_url('admin/course_form/course_edit/'.$param1));
    }

    public function lessons($course_id = "", $param1 = "", $param2 = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('courses', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if ($param1 == 'add') {
            $this->crud_model->add_lesson();
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_added_successfully'));
            redirect('admin/course_form/course_edit/'.$course_id);
        }
        elseif ($param1 == 'edit') {
            $this->crud_model->edit_lesson($param2);
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_updated_successfully'));
            redirect('admin/course_form/course_edit/'.$course_id);
        }
        elseif ($param1 == 'delete') {
            $this->crud_model->delete_lesson($param2);
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_deleted_successfully'));
            redirect('admin/course_form/course_edit/'.$course_id);
        }
        elseif ($param1 == 'filter') {
            redirect('admin/lessons/'.$this->input->post('course_id'));
        }
        $page_data['page_name'] = 'lessons';
        $page_data['lessons'] = $this->crud_model->get_lessons('course', $course_id);
        $page_data['course_id'] = $course_id;
        $page_data['page_title'] = get_phrase('lessons');
        $this->load->view('backend/index', $page_data);
    }

    public function watch_video($slugified_title = "", $lesson_id = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $lesson_details          = $this->crud_model->get_lessons('lesson', $lesson_id)->row_array();
        $page_data['provider']   = $lesson_details['video_type'];
        $page_data['video_url']  = $lesson_details['video_url'];
        $page_data['lesson_id']  = $lesson_id;
        $page_data['page_name']  = 'video_player';
        $page_data['page_title'] = get_phrase('video_player');
        $this->load->view('backend/index', $page_data);
    }


    // Language Functions
    public function manage_language($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if($this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if ($param1 == 'add_language') {
            $language = trimmer($this->input->post('language'));
            if ($language == 'n-a') {
                $this->session->set_flashdata('error_message', get_phrase('language_name_can_not_be_empty_or_can_not_have_special_characters'));
                redirect(site_url('admin/manage_language'), 'refresh');
            }
            saveDefaultJSONFile($language);
            $this->session->set_flashdata('flash_message', get_phrase('language_added_successfully'));
            redirect(site_url('admin/manage_language'), 'refresh');
        }
        if ($param1 == 'add_phrase') {
            $new_phrase = get_phrase($this->input->post('phrase'));
            $this->session->set_flashdata('flash_message', $new_phrase.' '.get_phrase('has_been_added_successfully'));
            redirect(site_url('admin/manage_language'), 'refresh');
        }

        if ($param1 == 'edit_phrase') {
            $page_data['edit_profile'] = $param2;
        }

        if ($param1 == 'delete_language') {
            if (file_exists('application/language/'.$param2.'.json')) {
                unlink('application/language/'.$param2.'.json');
                $this->session->set_flashdata('flash_message', get_phrase('language_deleted_successfully'));
                redirect(site_url('admin/manage_language'), 'refresh');
            }
        }
        $page_data['languages']             = $this->crud_model->get_all_languages();
        $page_data['page_name']             =   'manage_language';
        $page_data['page_title']            =   get_phrase('multi_language_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function update_phrase_with_ajax() {
        $current_editing_language = $this->input->post('currentEditingLanguage');
        $updatedValue = $this->input->post('updatedValue');
        $key = $this->input->post('key');
        saveJSONFile($current_editing_language, $key, $updatedValue);
        echo $current_editing_language.' '.$key.' '.$updatedValue;
    }

    function message($param1 = 'message_home', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1) redirect(site_url('login'), 'refresh');
        
        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent'));
            redirect(site_url('admin/message/message_read/' . $message_thread_code), 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2); //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent'));
            redirect(site_url('admin/message/message_read/' . $param2), 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2; // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name'] = $param1;
        $page_data['page_name']               = 'message';
        $page_data['page_title']              = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }

    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
        redirect(site_url('login'), 'refresh');
        if ($param1 == 'update_profile_info') {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/manage_profile'), 'refresh');
        }
        if ($param1 == 'change_password') {
            $this->user_model->change_password($param2);
            redirect(site_url('admin/manage_profile'), 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('users', array(
            'id' => $this->session->userdata('user_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    public function paypal_checkout_for_instructor_revenue() {
        if ($this->session->userdata('admin_login') != 1)
        redirect(site_url('login'), 'refresh');

        $page_data['amount_to_pay']         = $this->input->post('amount_to_pay');
        $page_data['payout_id']            = $this->input->post('payout_id');
        $page_data['instructor_name']       = $this->input->post('instructor_name');
        $page_data['production_client_id']  = $this->input->post('production_client_id');

        // BEFORE, CHECK PAYOUT AMOUNTS ARE VALID
        $payout_details = $this->crud_model->get_payouts($page_data['payout_id'], 'payout')->row_array();
        if ($payout_details['amount'] == $page_data['amount_to_pay'] && $payout_details['status'] == 0) {
            $this->load->view('backend/admin/paypal_checkout_for_instructor_revenue', $page_data);
        }else{
            $this->session->set_flashdata('error_message', get_phrase('invalid_payout_data'));
            redirect(site_url('admin/instructor_payout'), 'refresh');
        }

    }


    // PAYPAL CHECKOUT ACTIONS
    public function paypal_payment($payout_id = "", $paypalPaymentID = "", $paypalPaymentToken = "", $paypalPayerID = "") {
        if ($this->session->userdata('admin_login') != 1)
        redirect(site_url('login'), 'refresh');
        $payout_details = $this->crud_model->get_payouts($payout_id, 'payout')->row_array();
        $instructor_id = $payout_details['user_id'];
        $instructor_data = $this->db->get_where('users', array('id' => $instructor_id))->row_array();
        $paypal_keys = json_decode($instructor_data['paypal_keys'], true);
        $production_client_id = $paypal_keys[0]['production_client_id'];
        $production_secret_key = $paypal_keys[0]['production_secret_key'];
        // $production_client_id = 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R';
        // $production_secret_key = 'EFI50pO1s1cV1cySQ85wg2Pncn4VOPxKvTLBhyeGtd1QHNac-OJFsQlS7GAwlXZSg2wtm-BOJ9Ar3XJy';

        //THIS IS HOW I CHECKED THE PAYPAL PAYMENT STATUS
        $status = $this->payment_model->paypal_payment($paypalPaymentID, $paypalPaymentToken, $paypalPayerID, $production_client_id, $production_secret_key);
        if (!$status) {
            $this->session->set_flashdata('error_message', get_phrase('an_error_occurred_during_payment'));
            redirect(site_url('admin/instructor_payout'), 'refresh');
        }
        $this->crud_model->update_payout_status($payout_id, 'paypal');
        $this->session->set_flashdata('flash_message', get_phrase('payout_updated_successfully'));
        redirect(site_url('admin/instructor_payout'), 'refresh');
    }

    public function stripe_checkout_for_instructor_revenue($payout_id) {
        if ($this->session->userdata('admin_login') != 1)
        redirect(site_url('login'), 'refresh');

        // BEFORE, CHECK PAYOUT AMOUNTS ARE VALID
        $payout_details = $this->crud_model->get_payouts($payout_id, 'payout')->row_array();
        if ($payout_details['amount'] > 0 && $payout_details['status'] == 0) {
            $page_data['user_details']    = $this->user_model->get_user($payout_details['user_id'])->row_array();
            $page_data['amount_to_pay']   = $payout_details['amount'];
            $page_data['payout_id']       = $payout_details['id'];
            $this->load->view('backend/admin/stripe_checkout_for_instructor_revenue', $page_data);
        }else{
            $this->session->set_flashdata('error_message', get_phrase('invalid_payout_data'));
            redirect(site_url('admin/instructor_payout'), 'refresh');
        }
    }

    // STRIPE CHECKOUT ACTIONS
    public function stripe_payment($payout_id = "", $session_id = "") {
        $payout_details = $this->crud_model->get_payouts($payout_id, 'payout')->row_array();
        $instructor_id = $payout_details['user_id'];
        //THIS IS HOW I CHECKED THE STRIPE PAYMENT STATUS
        $response = $this->payment_model->stripe_payment($instructor_id, $session_id, true);

        if ($response['payment_status'] === 'succeeded') {
            $this->crud_model->update_payout_status($payout_id, 'stripe');
            $this->session->set_flashdata('flash_message', get_phrase('payout_updated_successfully'));
        }else{
            $this->session->set_flashdata('error_message', $response['status_msg']);
        }

        redirect(site_url('admin/instructor_payout'), 'refresh');
    }

    public function preview($course_id = '') {
        if ($this->session->userdata('admin_login') != 1)
        redirect(site_url('login'), 'refresh');

        $this->is_drafted_course($course_id);
        if ($course_id > 0) {
            $courses = $this->crud_model->get_course_by_id($course_id);
            if ($courses->num_rows() > 0) {
                $course_details = $courses->row_array();
                redirect(site_url('home/lesson/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id']), 'refresh');
            }
        }
        redirect(site_url('admin/courses'), 'refresh');
    }
    
    // Manage Quizes
    public function quizes($course_id = "", $action = "", $quiz_id = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array('courses', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }

        if ($action == 'add') {
            $this->crud_model->add_quiz($course_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_added_successfully'));
        }
        elseif ($action == 'edit') {
            $this->crud_model->edit_quiz($quiz_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_updated_successfully'));
        }
        elseif ($action == 'delete') {
            $this->crud_model->delete_section($course_id, $quiz_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_deleted_successfully'));
        }
        redirect(site_url('admin/course_form/course_edit/'.$course_id));
    }

    // Manage Quize Questions
    public function quiz_questions($quiz_id = "", $action = "", $question_id = "") {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if(!in_array('courses', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        $quiz_details = $this->crud_model->get_lessons('lesson', $quiz_id)->row_array();

        if ($action == 'add') {
            $response = $this->crud_model->add_quiz_questions($quiz_id);
            echo $response;
        }

        elseif ($action == 'edit') {
            $response = $this->crud_model->update_quiz_questions($question_id);
            echo $response;
        }

        elseif ($action == 'delete') {
            $response = $this->crud_model->delete_quiz_question($question_id);
            $this->session->set_flashdata('flash_message', get_phrase('question_has_been_deleted'));
            redirect(site_url('admin/course_form/course_edit/'.$quiz_details['course_id']));
        }
    }

    // software about page
    function about() {
        if ($this->session->userdata('admin_login') != 1)
        redirect(site_url('login'), 'refresh');

        $page_data['application_details'] = $this->crud_model->get_application_details();
        $page_data['page_name']  = 'about';
        $page_data['page_title'] = get_phrase('about');
        $this->load->view('backend/index', $page_data);
    }

    public function install_theme($theme_to_install = '')
    {

        if ($this->session->userdata('admin_login') != 1){
            redirect(site_url('login'), 'refresh');
        }

        $uninstalled_themes = $this->crud_model->get_uninstalled_themes();
        if (!in_array($theme_to_install, $uninstalled_themes)) {
            $this->session->set_flashdata('error_message', get_phrase('this_theme_is_not_available'));
            redirect(site_url('admin/theme_settings'));
        }

        if (!class_exists('ZipArchive')) {
            $this->session->set_flashdata('error_message', get_phrase('your_server_is_unable_to_extract_the_zip_file').'. '.get_phrase('please_enable_the_zip_extension_on_your_server').', '.get_phrase('then_try_again'));
            redirect(site_url('admin/theme_settings'));
        }

        $zipped_file_name = $theme_to_install;
        $unzipped_file_name = substr($zipped_file_name, 0, -4);
        // Create update directory.
        $views_directory  = 'application/views/frontend';
        $assets_directory = 'assets/frontend';

        //Unzip theme zip file and remove zip file.
        $theme_path = 'themes/'.$zipped_file_name;
        $theme_zip = new ZipArchive;
        $theme_result = $theme_zip->open($theme_path);
        if ($theme_result === TRUE) {
            $theme_zip->extractTo('themes');
            $theme_zip->close();
        }

        // unzip the views zip file to the application>views folder
        $views_path = 'themes/'.$unzipped_file_name.'/views/'.$zipped_file_name;
        $views_zip = new ZipArchive;
        $views_result = $views_zip->open($views_path);
        if ($views_result === TRUE) {
            $views_zip->extractTo($views_directory);
            $views_zip->close();
        }

        // unzip the assets zip file to the assets/frontend folder
        $assets_path = 'themes/'.$unzipped_file_name.'/assets/'.$zipped_file_name;
        $assets_zip = new ZipArchive;
        $assets_result = $assets_zip->open($assets_path);
        if ($assets_result === TRUE) {
            $assets_zip->extractTo($assets_directory);
            $assets_zip->close();
        }

        unlink($theme_path);
        $this->crud_model->remove_files_and_folders('themes/'.$unzipped_file_name);
        $this->session->set_flashdata('flash_message', get_phrase('theme_imported_successfully'));
        redirect(site_url('admin/theme_settings'));
    }

    //ADDON MANAGER PORTION STARTS HERE
    public function addon($param1 = "", $param2 = "", $param3 = "") {
        if ($this->session->userdata('admin_login') != 1){
            redirect(site_url('login'), 'refresh');
        }
        // ADD NEW ADDON FORM
        if ($param1 == 'add') {

            $page_data['page_name'] = 'addon_add';
            $page_data['page_title'] = get_phrase('add_addon');
        }

        // INSTALLING AN ADDON
        if ($param1 == 'install') {
            $this->addon_model->install_addon();
        }

        // ACTIVATING AN ADDON
        if ($param1 == 'activate') {
            $update_message = $this->addon_model->addon_activate($param2);
            $this->session->set_flashdata('flash_message', get_phrase($update_message));
            redirect(site_url('admin/addon'), 'refresh');
        }

        // DEACTIVATING AN ADDON
        if ($param1 == 'deactivate') {
            $update_message = $this->addon_model->addon_deactivate($param2);
            $this->session->set_flashdata('flash_message', get_phrase($update_message));
            redirect(site_url('admin/addon'), 'refresh');
        }

        // REMOVING AN ADDON
        if ($param1 == 'delete') {
            $this->addon_model->addon_delete($param2);
            $this->session->set_flashdata('flash_message', get_phrase('addon_is_deleted_successfully'));
            redirect(site_url('admin/addon'), 'refresh');
        }

        // SHOWING LIST OF INSTALLED ADDONS
        if (empty($param1)) {
            $page_data['page_name'] = 'addons';
            $page_data['addons'] = $this->addon_model->addon_list()->result_array();
            $page_data['page_title'] = get_phrase('addon_manager');
        }
        $this->load->view('backend/index', $page_data);
    }

    //AVAILABLE_ADDONS
    public function available_addons(){
        if ($this->session->userdata('admin_login') != 1)
        redirect(site_url('login'), 'refresh');

        $page_data['page_name']  = 'available_addon';
        $page_data['page_title'] = get_phrase('available_addon');
        $this->load->view('backend/index', $page_data);
    }

    public function instructor_application($param1 = "", $param2 = ""){ // param1 is the status and param2 is the application id
        if ($this->session->userdata('admin_login') != 1)
        redirect(site_url('login'), 'refresh');

        if ($param1 == 'approve' || $param1 == 'delete') {
            $this->user_model->update_status_of_application($param1, $param2);
        }
        $page_data['page_name']  = 'application_list';
        $page_data['page_title'] = get_phrase('instructor_application');
        $page_data['approved_applications'] = $this->user_model->get_approved_applications();
        $page_data['pending_applications'] = $this->user_model->get_pending_applications();
        $this->load->view('backend/index', $page_data);
    }


    // INSTRUCTOR PAYOUT SECTION
    public function instructor_payout($param1 = "") {
        if ($this->session->userdata('admin_login') != 1)
        redirect(site_url('login'), 'refresh');

        if ($param1 != "") {
            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0]);
            $page_data['timestamp_end']   = strtotime($date_range[1]);
        }else {
            $page_data['timestamp_start'] = strtotime(date('m/01/Y'));
            $page_data['timestamp_end']   = strtotime(date('m/t/Y'));
        }

        $page_data['page_name']  = 'instructor_payout';
        $page_data['page_title'] = get_phrase('instructor_payout');
        $page_data['completed_payouts'] = $this->crud_model->get_completed_payouts_by_date_range($page_data['timestamp_start'], $page_data['timestamp_end']);
        $page_data['pending_payouts'] = $this->crud_model->get_pending_payouts();
        $this->load->view('backend/index', $page_data);
    }




    // AJAX PORTION
    // this function is responsible for managing multiple choice question
    function manage_multiple_choices_options() {
        $page_data['number_of_options'] = $this->input->post('number_of_options');
        $this->load->view('backend/admin/manage_multiple_choices_options', $page_data);
    }

    public function ajax_get_sub_category($category_id) {
        $page_data['sub_categories'] = $this->crud_model->get_sub_categories($category_id);

        return $this->load->view('backend/admin/ajax_get_sub_category', $page_data);
    }

    public function ajax_get_section($course_id){
        $page_data['sections'] = $this->crud_model->get_section('course', $course_id)->result_array();
        return $this->load->view('backend/admin/ajax_get_section', $page_data);
    }

    public function ajax_get_video_details() {
        $video_details = $this->video_model->getVideoDetails($_POST['video_url']);
        echo $video_details['duration'];
    }
    public function ajax_sort_section() {
        $section_json = $this->input->post('itemJSON');
        $this->crud_model->sort_section($section_json);
    }
    public function ajax_sort_lesson() {
        $lesson_json = $this->input->post('itemJSON');
        $this->crud_model->sort_lesson($lesson_json);
    }
    public function ajax_sort_question() {
        $question_json = $this->input->post('itemJSON');
        $this->crud_model->sort_question($question_json);
    }

    //adil:evaluation
     public function evaluation($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }
        if($param1 == 'edit_evaluation'){
            $page_data['page_name'] = 'evaluation/edit_evaluation';
            $page_data['page_title'] = get_phrase('edit_this_email');
          
            if($param2 != ""){
                $page_data['evaluation'] =$this->user_model->get_evalution($param2)->row_array();
            }
            $this->load->view('backend/index', $page_data);   
        }
        elseif($param1 == "edit"){
            $response = $this->crud_model->evaluation_edit($param2);
            $page_data['page_name'] = 'evaluation/edit_evaluation';
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_update_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/evaluation'), 'refresh');
         }
        else{
            $page_data['page_name'] = 'evaluation/evaluation';
            $page_data['page_title'] = get_phrase('evaluation');
            $page_data['evaluation'] = $this->crud_model->get_evaluation($param2)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
    }
    //adil:designation Controll
    public function manage_designation($param1 = "", $param2 = ""){
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if(!in_array($this->uri->segment(2), $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1){
            redirect(site_url('admin/dashboard'), 'refresh');
        }


        if($param1 == 'designation_add_edit'){
            $page_data['page_name'] = 'designation/designation_add_edit';
            $page_data['page_title'] = get_phrase('edit_this_designation');
            if($param2 != ""){
                $page_data['param2'] = $param2;
            }
            $this->load->view('backend/index', $page_data);   
        }else if($param1 == "designation_add_form"){
            $response= $this->crud_model->add_designation();
           if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_designation'), 'refresh');
        }
        else if($param1 == "designation_edit_form"){
            $response = $this->crud_model->edit_designation($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }else{
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
            redirect(site_url('admin/manage_designation'), 'refresh');
         }
        else if ($param1 == "delete" ){
            $this->crud_model->delete_designation($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/manage_designation'), 'refresh');
        }
        else if ($param1 == "activate" ){
            $this->crud_model->activate_designation($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_activate'));
            redirect(site_url('admin/manage_designation'), 'refresh');
        }
        else{
            $page_data['page_name'] = 'designation/designation';
            $page_data['page_title'] = get_phrase('designation');
            $page_data['designation'] = $this->crud_model->get_designation($param2)->result_array();
            $this->load->view('backend/index', $page_data);     
        }
    }
}
