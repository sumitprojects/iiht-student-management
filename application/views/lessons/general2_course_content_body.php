<?php 

        $lesson_details = $this->crud_model->get_lessons('lesson', $lesson_id)->row_array();


?>

<div class="col-lg-9  order-md-1 course_col" id = "video_player_area">
    <!-- <div class="" style="background-color: #333;"> -->
    <div class="" style="text-align: center;">
        <div class="mt-5">
            <?php include 'quiz_view2.php'; ?>
        </div>
    </div>

    <div class="" style="margin: 20px 0;" id = "lesson-summary">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $lesson_details['lesson_type'] == 'quiz' ? get_phrase('instruction') : get_phrase("note"); ?>:</h5>
                <?php if ($lesson_details['summary'] == ""): ?>
                    <p class="card-text"><?php echo $lesson_details['lesson_type'] == 'quiz' ? get_phrase('no_instruction_found') : get_phrase("no_summary_found"); ?></p>
                <?php else: ?>
                    <p class="card-text"><?php echo $lesson_details['summary']; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
