<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];

?>
<section id="hero_in" class="general">
    <div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;">
    </div>
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span><?php echo get_phrase('leave_apply'); ?></h1>
        </div>
    </div>
</section>
<div class="container pt-5 mt-5">
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase('add_attendance'); ?>
                        <a href="<?php echo site_url('home/student_view/'); ?>" style="float:right;"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_attendance_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?= site_url('home/manage_attendance/add') ?>"
                        method="post">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" required>
                        <div class="form-group">
                            <label for="user_id"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                            <select class="custom-select select2" data-toggle="select2" name="en_id[]" id="en_id"
                                required multiple>
                                <option value="" disabled><?php echo get_phrase('select_a_student'); ?></option>
                                <?php foreach ($enrol_list as $enroll): ?>
                                <option value="<?php echo $enroll['id']; ?>">
                                    <?php echo $enroll['full_name'].' '.$enroll['course_name']; ?></option>
                               
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="entry date"><?php echo get_phrase('entry date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="entry_date" name="entry_date" required>
                        </div>
                        <div class="form-group">
                            <label for="remark"><?php echo get_phrase('remark'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="remark" name="remark" required>
                        </div>
                        <div class="form-group">
                            <label for="attendance status"><?php echo get_phrase('attendance status'); ?><span
                                    class="required">*</span></label>
                            <select name="att_status" id="att_status" class="form-control">
                                <option value="pending" selected>pending</option>
                                <option value="present">present</option>
                                <option value="absent">absent</option>
                                <option value="leave">leave</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo get_phrase("submit"); ?></button>
                      
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
</div>