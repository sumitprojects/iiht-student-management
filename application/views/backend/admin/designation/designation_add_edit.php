<?php
$designation = null; 
if(!empty($param2)){
    $designation = $this->crud_model->get_designation($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($designation)?'designation_edit_form':'designation_add_form'); ?>
                        <a href="<?php echo site_url('admin/manage_designation'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_designation_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_designation/'.(!empty($designation)?'designation_edit_form':'designation_add_form')); ?>"
                        method="post">
                        <?php if(!empty($designation)):?>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $designation['id']; ?>"
                            readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="designation"><?php echo get_phrase('designation'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="designation" name="designation"
                            value="<?php echo !empty($designation)?$designation['designation']:''?>"  required>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>