<?php
$branch = null; 
if(!empty($param2)){
    $branch = $this->crud_model->get_branch($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase(($branch)?'branch_edit_form':'branch_add_form'); ?>
                    <a href="<?php echo site_url('admin/branch'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> <?php echo get_phrase('back_to_branch_list'); ?></a>
                </h4>
                <form class="required-form" action="<?php echo site_url('admin/branch/'.(!empty($branch)?'edit':'add')); ?>" method="post">
                <?php if(!empty($branch)):?>
                    <input type="hidden" class="form-control" id="branch_id" name = "branch_id" value="<?php echo $branch['branch_id']; ?>" readonly>
                <?php endif;?>

                    <div class="form-group">
                        <label for="branch_code"><?php echo get_phrase('branch_code'); ?></label>
                        <input type="text" class="form-control" id="branch_code" name = "branch_code" value="<?php echo !empty($branch)?$branch['branch_code']:strtoupper(substr(md5(rand(0, 1000000)), 0, 6)); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="branch_name"><?php echo get_phrase('branch_name'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="branch_name" name = "branch_name" value="<?php echo !empty($branch)?$branch['branch_name']:''?>" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>