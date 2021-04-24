<?php
$department = null; 
if(!empty($param2)){
    $department = $this->crud_model->get_department($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase(($department)?'department_edit_form':'department_add_form'); ?>
                    <a href="<?php echo site_url('admin/department'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> <?php echo get_phrase('back_to_department_list'); ?></a>
                </h4>
                <form class="required-form" action="<?php echo site_url('admin/department/'.(!empty($department)?'edit':'add')); ?>" method="post">
                <?php if(!empty($department)):?>
                    <input type="hidden" class="form-control" id="dpid" name = "dpid" value="<?php echo $department['dpid']; ?>" readonly>
                <?php endif;?>
                    <div class="form-group">
                        <label for="dpname"><?php echo get_phrase('department_name'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="dpname" name = "dpname" value="<?php echo !empty($department)?$department['dpname']:''?>" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>