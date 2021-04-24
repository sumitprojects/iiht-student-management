<?php
$hod = null; 
if(!empty($param2)){
    $hod = $this->crud_model->get_hod($param2)->row_array();
}
$departments = $this->db->get_where('department',['dp_is_delete'=>0])->result_array();
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase(($hod)?'hod_edit_form':'hod_add_form'); ?>
                        <a href="<?php echo site_url('admin/hod'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_hod_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/hod/'.(!empty($hod)?'edit':'add')); ?>" method="post">
                        <?php if(!empty($hod)):?>
                        <input type="hidden" class="form-control" id="hod_id" name="hod_id"
                            value="<?php echo $hod['hod_id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="hod_name"><?php echo get_phrase('hod_name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="hod_name" name="hod_name"
                                value="<?php echo !empty($hod)?$hod['hod_name']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="hod_ext"><?php echo get_phrase('hod_ext'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="hod_ext" name="hod_ext"
                                value="<?php echo !empty($hod)?$hod['hod_ext']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="hod_dpid"><?php echo get_phrase('department'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="hod_dpid"
                                id="hod_dpid" required>
                                <option value=""><?php echo get_phrase('select_a_department'); ?></option>
                                <?php foreach ($departments as $department): ?>
                                     <option value="<?php echo $department['dpid']; ?>"
                                        <?php echo !empty($hod)? (($hod['hod_dpid'] == $department['dpid'])? 'selected':'') : ''; ?>>
                                        <?php echo $department['dpname']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

