<?php
$schedule = null; 
if(!empty($param2)){
    $schedule = $this->crud_model->get_schedule($param2)->row_array();
}
?>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($schedule)?'edit_schedule':'add_schedule'); ?>
                        <a href="<?php echo site_url('admin/manage_schedule'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_schedule_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_schedule/'.(!empty($schedule)?'edit_schedule':'add_schedule')); ?>"
                        method="post">
                        <?php if(!empty($schedule)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $schedule['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="user_id"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="user_id" id="user_id"
                                required>
                                <option value=""><?php echo get_phrase('select_a_user'); ?></option>
                                <?php foreach ($user_list as $user): ?>
                                <option value="<?php echo $user['id']; ?>"
                                    <?php echo !empty($schedule)? (($schedule['user_id'] == $user['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $user['first_name'].' '.$user['last_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course_name"><?php echo get_phrase('course_name'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="course_id" id="course_id"
                                required>
                                <option value=""><?php echo get_phrase('select_a_course'); ?></option>
                                <?php foreach ($course_list as $course): ?>
                                <option value="<?php echo $course['id']; ?>"
                                    <?php echo !empty($schedule)? (($schedule['course_id'] == $course['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $course['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exam_date"><?php echo get_phrase('exam_date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="exam_date" name="exam_date"
                                value="<?php echo !empty($schedule)?$schedule['exam_date']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exam_status"><?php echo get_phrase('exam_status'); ?><span
                                    class="required">*</span></label>
                            <select name="exam_status" id="exam_status" class="form-control">
                                <option value="pending" selected>pending</option>
                                <option value="schedule"  <?php if($schedule['exam_status']=='schedule'){ echo "selected"; }?>>schedule</option>
                                <option value="canceled" <?php if($schedule['exam_status']=='canceled'){ echo "selected"; }?>>canceled</option>
                                <option value="complete"  <?php if($schedule['exam_status']=='complete'){ echo "selected"; }?>>complete</option>
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