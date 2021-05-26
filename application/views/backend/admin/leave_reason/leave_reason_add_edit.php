<?php
$leave_reason = null; 
if(!empty($param2)){
    $leave_reason = $this->crud_model->get_leave_reason($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($leave_reason)?'leave_reason_edit_form':'leave_reason_add_form'); ?>
                        <a href="<?php echo site_url('admin/leave_reason'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_leave_reason_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/leave_reason/'.(!empty($leave_reason)?'leave_reason_edit_form':'leave_reason_add_form')); ?>"
                        method="post">
                        <?php if(!empty($leave_reason)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $leave_reason['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="reasons"><?php echo get_phrase('reasons'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="reasons" name="reasons"
                                value="<?php echo !empty($leave_reason)?$leave_reason['reasons']:''?>" required>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>