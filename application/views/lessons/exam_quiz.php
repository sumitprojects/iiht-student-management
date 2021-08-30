<?php
$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();


$course_details_url = site_url("home/course/".slugify($course_details['title'])."/".$course_id);
?>
<div class="container-fluid course_container">
    <!-- Top bar -->
    <div class="row">
        <div class="col-lg-9 course_header_col">
            <h5>
                <img src="<?php echo base_url('uploads/system/').get_frontend_settings('small_logo');?>" height="25"> |
                <?php echo $course_details['title']; ?>
            </h5>
        </div>
        <div class="col-lg-3 course_header_col">
          
        </div>
    </div>

    <div class="row" id = "lesson-container">
        <?php if (isset($lesson_id) == true || isset($scorm_curriculum) == true): ?>
            <!-- Course content, video, quizes, files starts-->
            <?php include 'general2_course_content_body.php'; ?>
            <!-- Course content, video, quizes, files ends-->
        <?php endif; ?>

        <!-- Course sections and lesson selector sidebar starts-->
            <?php if($course_details['course_type'] == 'general'): ?>
                <?php include 'quiz_content_sidebar.php'; ?>
            <?php endif; ?>
        <!-- Course sections and lesson selector sidebar ends-->
    </div>

    
   
</div>
