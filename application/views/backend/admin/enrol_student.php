<?php 
$paymenttype = array(
    'cash','cheque','wallet'
);
$invoicetypes = array(
    'registration','downpayment','installments'
);
$amount_due = 0;
if(!empty($payment_details) && $payment_details['amount_due'] < $purchase_history['final_price']){
    $amount_due = $payment_details['amount_due'];
}else{
    $amount_due = $purchase_history['final_price']/2;
}

?>
<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('enrol_a_student'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('enrolment_form'); ?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/enrol_student/enrol'); ?>"
                        method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="user_id"><?php echo get_phrase('user'); ?><span class="required">*</span>
                            </label>
                            <select class="form-control select2" data-toggle="select2" name="user_id" id="user_id"
                                required>
                                <option value=""><?php echo get_phrase('select_a_user'); ?></option>
                                <?php $user_list = $this->user_model->get_user()->result_array();
                                foreach ($user_list as $user): if($user['is_instructor'] == 0):?>
                                <option value="<?php echo $user['id'] ?>">
                                    <?php echo strtolower($user['first_name'].' '.$user['last_name']); ?></option>
                                <?php endif; endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="" for="course_id"><?php echo get_phrase('course_to_enrol'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="course_id" id="course_id"
                                required>
                                <option value="">
                                    <?php echo get_phrase('select_a_course'); ?>
                                </option>
                                <?php 
                                    foreach ($courses as $course):
                                    if ($course['status'] != 'active')
                                        continue;?>
                                <option value="<?php echo $course['id'] ?>"
                                    data-price="<?=$course['discount_flag'] ==1 ?$course['discounted_price']:$course['price']?>">
                                    <?php echo trim($course['title']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class=""
                                for="price"><?php echo get_phrase('course_price').' ('.currency_code_and_symbol().')'; ?></label>
                            <input type="number" class="form-control" tabindex="0" id="price" readonly name="price"
                                placeholder="<?php echo get_phrase('enter_course_course_price'); ?>" min="0">
                        </div>
                        <div class="form-group mb-3">
                            <label class="payment_type" for="payment_type"><?php echo get_phrase('payment_type'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="payment_type"
                                id="payment_type" required>
                                <option value="" disabled selected>
                                    <?php echo get_phrase('payment_type'); ?>
                                </option>
                                <?php 
                                    foreach ($paymenttype as $payment):
                                ?>
                                <option value="<?php echo $payment ?>" >
                                    <?php echo strtoupper($payment); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="invoice_type" for="invoice_type"><?php echo get_phrase('invoice_type'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="invoice_type"
                                id="invoice_type" required>
                                <option value="" disabled selected>
                                    <?php echo get_phrase('invoice_type'); ?>
                                </option>
                                <?php 
                                    foreach ($invoicetype as $invoice):
                                ?>
                                <option value="<?php echo $invoice ?>" >
                                    <?php echo strtoupper($invoice); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="wallet_name"><?php echo get_phrase('wallet_name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" name="wallet_name" id="wallet_name">
                        </div>
                        <div class="form-group mb-3">
                            <label class="bank_name"><?php echo get_phrase('bank_name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" name="bank_name" id="bank_name">
                        </div>
                        <div class="form-group mb-3">
                            <label class="account_number"><?php echo get_phrase('account_number'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="account_number" name="account_number">
                        </div>

                        <div class="form-group mb-3">
                            <label class="amount"><?php echo get_phrase('amount'); ?><span class="required">*</span></label>
                            <input type="number" class="form-control" id="amount" name="amount" required min="0" max="<?=$amount_due?>">
                            <?php if(!empty($amount_due)):?><p class="text-danger"><?=get_phrase('amount_due')?>: <?=$amount_due?></p><?php endif;?>
                            <!-- <input type="number" class="form-control"> -->
                        </div>
                        <div class="form-group mb-3">
                            <label class=""><?php echo get_phrase('transaction_id'); ?><span class="required">*</span></label>
                            <input type="text" class="form-control" name="transaction_id" placeholder="Please, Enter transaction number" required min="0">
                            <!-- <input type="number" class="form-control"> -->
                        </div>
                        <div class="form-group mb-3">
                            <label class=""><?php echo get_phrase('date_added'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" name="date_added" value="<?php echo date('Y-m-d'); ?>" readonly>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase('enrol_student'); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script type="text/javascript">
if ($('select').hasClass('select2') == true) {
    $('div').attr('tabindex', "");
    $(function() {
        $(".select2").select2()
    });
}
jQuery(document).ready(function() {
    jQuery('#course_id').on('change', function() {
        jQuery('[name=price]').val(jQuery(this).select2('data')[0].element.dataset.price);
    });
    jQuery('#amount').on('blur', function() {
        if(parseFloat(jQuery('[name="price"]').val()) < parseFloat(jQuery(this).val())) {
            jQuery(this).val(jQuery('[name=final_price]').val()/2);
        }
    });
    jQuery('#wallet_name, #bank_name, #account_number').attr('disabled',true);
    jQuery('#payment_type').on('change',function(){
        if( jQuery(this).val() == 'cash' ){
            jQuery('#wallet_name, #bank_name, #account_number').attr('disabled',true);
            jQuery('#wallet_name, #bank_name, #account_number').removeAttr('required');
        }else if( jQuery(this).val() == 'cheque' ){
            jQuery('#wallet_name').attr('disabled',true);
            jQuery('#bank_name, #account_number').removeAttr('disabled');
            jQuery('#bank_name, #account_number').attr('required',true);
        }else if( jQuery(this).val() == 'wallet' ){
            jQuery('#bank_name, #account_number').removeAttr('required');
            jQuery('#bank_name, #account_number').attr('disabled',true);
            jQuery('#wallet_name').removeAttr('disabled');
            jQuery('#wallet_name').attr('required',true);

        }
    });

});
</script>