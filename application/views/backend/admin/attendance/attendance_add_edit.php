<?php
$attendance = null; 
if(!empty($param2)){
    $attendance = $this->crud_model->get_attendance($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($attendance)?'edit_attendance':'add_attendance'); ?>
                        <a href="<?php echo site_url('admin/manage_attendance'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_attendance_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_attendance/'.(!empty($attendance)?'edit_attendance':'add_attendance')); ?>"
                        method="post">
                        <?php if(!empty($attendance)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $attendance['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="user_id"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="user_id" id="user_id"
                                required>
                                <option value=""><?php echo get_phrase('select_a_user'); ?></option>
                                <?php foreach ($user_list as $user): ?>
                                <option value="<?php echo $user['id']; ?>"
                                    <?php echo !empty($attendance)? (($attendance['user_id'] == $user['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $user['first_name'].' '.$user['last_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="entry date"><?php echo get_phrase('entry date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="entry_date" name="entry_date"
                                value="<?php echo !empty($attendance)?$attendance['entry_date']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="remark"><?php echo get_phrase('remark'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="remark" name="remark"
                                value="<?php echo !empty($attendance)?$attendance['remark']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="attendance status"><?php echo get_phrase('attendance status'); ?><span
                                    class="required">*</span></label>
                            <select name="att_status" id="att_status" class="form-control">
                                <option value="pending" selected>pending</option>
                                <option value="present"  <?php if($attendance['att_status']=='present'){ echo "selected"; }?>>present</option>
                                <option value="absent" <?php if($attendance['att_status']=='absent'){ echo "selected"; }?>>absent</option>
                                <option value="leave"  <?php if($attendance['att_status']=='leave'){ echo "selected"; }?>>leave</option>
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