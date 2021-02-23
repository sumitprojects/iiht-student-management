<?php 
$paymenttype = array(
    'cash','cheque','wallet'
);
$invoicetypes = array(
    'registration','downpayment','installments'
);

$payment_details = $this->crud_model->get_enrol_payment_info($purchase_history['eid'])->row_array();


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
                    <?php echo get_phrase('make_payment'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('payment_form'); ?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/add_payment'); ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?=$purchase_history['user_id']?>">
                        <input type="hidden" name="enrol_id" value="<?=$purchase_history['eid']?>">
                        <input type="hidden" name="course_id" value="<?=$purchase_history['course_id']?>">
                        <input type="hidden" name="session_id" value="<?=session_id()?>">
                        <?php if(!empty($payment_details['amount_due'])):?>
                            <input type="hidden" name="amount_due" value="<?=$payment_details['amount_due']?>">
                        <?php endif;?> 
                        <input type="hidden" name="final_price" value="<?=$purchase_history['final_price']?>">
                        <div class="form-group mb-3">
                            <label class="" for="course_id"><?php echo get_phrase('course_to_enrol'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" disabled value="<?=$purchase_history['title']?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class=""
                                for="price"><?php echo get_phrase('course_price').' ('.currency_code_and_symbol().')'; ?></label>
                            <input type="number" class="form-control" tabindex="0" id="price" name="price" disabled
                                placeholder="<?php echo get_phrase('enter_course_course_price'); ?>" value="<?=$purchase_history['final_price']?>" required min="0">
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
                                    foreach ($invoicetypes as $invoice):
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
    jQuery('#amount').on('blur', function() {
        if(jQuery('[name="amount_due"]').length > 0){
            parseFloat(jQuery('[name="amount_due"]').val()) < parseFloat(jQuery(this).val()) ? jQuery(this).val(jQuery('[name=amount_due]').val()):'';
        }else if(parseFloat(jQuery('[name="final_price"]').val()) < parseFloat(jQuery(this).val())) {
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