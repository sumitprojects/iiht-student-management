<?php
$bank_info = null; 
if(!empty($param2)){
    $bank_info = $this->crud_model->get_bank_info($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($bank_info)?'bank_info_edit_form':'bank_info_add_form'); ?>
                        <a href="<?php echo site_url('admin/manage_bank'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_bank_info_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_bank/'.(!empty($bank_info)?'bank_info_edit_form':'bank_info_add_form')); ?>"
                        method="post">
                        <?php if(!empty($bank_info)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $bank_info['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="ifsc"><?php echo get_phrase('ifsc'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="ifsc" name="ifsc"
                                value="<?php echo !empty($bank_info)?$bank_info['ifsc']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="bank_name"><?php echo get_phrase('bank_name'); ?><span
                                    class="required">*</span></label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name"
                                value="<?php echo !empty($bank_info)?$bank_info['bank_name']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="branch_name"><?php echo get_phrase('branch_name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="branch_name" name="branch_name"
                                value="<?php echo !empty($bank_info)?$bank_info['branch_name']:''?>" required>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>