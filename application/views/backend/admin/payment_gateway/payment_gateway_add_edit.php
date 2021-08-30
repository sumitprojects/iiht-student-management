<?php
$payment = null; 
if(!empty($param2)){
    $payment = $this->crud_model->get_payment_gateway($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($payment)?'payment_gateway_edit_form':'payment_gateway_add_form'); ?>
                        <a href="<?php echo site_url('admin/payment_gateway'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_payment_gateway_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/payment_gateway/'.(!empty($payment)?'payment_gateway_edit_form':'payment_gateway_add_form')); ?>"
                        method="post">
                        <?php if(!empty($payment)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $payment['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="name"><?php echo get_phrase('name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?php echo !empty($payment)?$payment['name']:''?>" required>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>