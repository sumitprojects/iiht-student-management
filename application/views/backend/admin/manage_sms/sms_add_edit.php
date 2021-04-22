<?php
$sms = null; 
if(!empty($param2)){
    $sms = $this->crud_model->get_sms($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($sms)?'edit_sms':'add_sms'); ?>
                        <a href="<?php echo site_url('admin/manage_sms'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_sms_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_sms/'.(!empty($sms)?'edit_sms':'add_sms')); ?>"
                        method="post">
                        <?php if(!empty($sms)):?>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $sms['id']; ?>"
                            readonly>
                        <?php endif;?>

                        <div class="form-group">
                            <label for="sms_template"><?php echo get_phrase('sms_template'); ?><span
                                    class="required">*</span></label>
                            <textarea name="sms_template" class="form-control" id="sms_template" cols="30" rows="10"
                                required><?php echo !empty($sms)?$sms['sms_template']:''?></textarea>

                        </div>
                        <div class="form-group">
                            <label for="type"><?php echo get_phrase('type'); ?><span class="required">*</span></label>
                            <input type="text" name="type" id="type" class="form-control"
                                value="<?php echo !empty($sms)?$sms['type']:''?>">
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>