<?php
$leave = null; 
if(!empty($param2)){
    $leave = $this->crud_model->get_leave($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($leave)?'edit_leave':'add_leave'); ?>
                        <a href="<?php echo site_url('admin/manage_leave'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_leave_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_leave/'.(!empty($leave)?'edit_leave':'add_leave')); ?>"
                        method="post">
                        <?php if(!empty($leave)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $leave['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="user_id"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="user_id" id="user_id"
                                required>
                                <option value=""><?php echo get_phrase('select_a_user'); ?></option>
                                <?php foreach ($user_list as $user): ?>
                                <option value="<?php echo $user['id']; ?>"
                                    <?php echo !empty($leave)? (($leave['user_id'] == $user['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $user['first_name'].' '.$user['last_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date"><?php echo get_phrase('start_date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                value="<?php echo !empty($leave)?$leave['start_date']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date"><?php echo get_phrase('end_date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="end_date" name="end_date"
                                value="<?php echo !empty($leave)?$leave['end_date']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="remark"><?php echo get_phrase('remark'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="remark" name="remark"
                                value="<?php echo !empty($leave)?$leave['remark']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="reason"><?php echo get_phrase('reason'); ?><span
                                    class="required">*</span></label>
                                    <select class="form-control select2" data-toggle="select2" name="reason_id" id="reason_id"
                                required>
                                    <option value="" disabled selected><?php echo get_phrase('select_a_leave_reason'); ?></option>
                                <?php $leave_reson = $this->crud_model->get_leave_reason()->result_array();
                                foreach ($leave_reson as $leave_res): 
                                ?>
                                <option value="<?php echo $leave_res['id'] ?>" <?php echo !empty($leave)? (($leave['reason_id'] == $leave_res['id'])? 'selected':'') : ''; ?>>
                                    <?php echo ($leave_res['reasons']); ?></option>
                                    
                                <?php endforeach; ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="leave status"><?php echo get_phrase('leave status'); ?><span
                                    class="required">*</span></label>
                            <select name="att_status" id="att_status" class="form-control">
                                <option value="pending" selected>Pending</option>
                                <option value="approved"
                                    <?php if($leave['att_status']=='approved'){ echo "selected"; }?>>Approved
                                </option>
                                <option value="rejected"
                                    <?php if($leave['att_status']=='rejected'){ echo "selected"; }?>>Rejected</option>
                              
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