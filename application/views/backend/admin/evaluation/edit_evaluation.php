<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase('edit_evaluation'); ?>
                        <a href="<?php echo site_url('admin/evaluation'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_evaluation_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/evaluation/'.(!empty($evaluation)?'edit':'add_evaluation')); ?>"
                        method="post">
                        <?php if(!empty($evaluation)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $evaluation['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="student"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>

                            <input type="text" name="student_name" id="student_name" class="form-control"
                                value="<?php echo $evaluation['full_name']; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="question"><?php echo get_phrase('question'); ?><span
                                    class="required">*</span></label>

                            <input type="text" name="question" id="question" class="form-control"
                                value="<?php echo $evaluation['questions']; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="submitted_answer"><?php echo get_phrase('submitted_answer'); ?><span
                                    class="required">*</span></label>
                            <textarea name="submitted_answer" id="submitted_answer" class="form-control" cols="30"
                                rows="10"
                                readonly><?php echo !empty($evaluation)?$evaluation['submitted_answer']:''?></textarea>

                        </div>
                        <?php if($evaluation['submitted_answer']): ?>
                        <div class="form-group">
                            <label for="marks_gain"><?php echo get_phrase('marks_gain'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="marks_gain" name="marks_gain"
                                value="<?php echo !empty($evaluation)?$evaluation['marks_gain']:''?>" required>
                        </div>
                        <?php else: ?>
                        <div class="form-group">
                            <label for="marks_gain"><?php echo get_phrase('marks_gain'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="marks_gain" name="marks_gain"
                                value="<?php echo !empty($evaluation)?$evaluation['marks_gain']:''?>" required readonly>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="marks"><?php echo get_phrase('marks'); ?><span class="required">*</span></label>
                            <input type="text" class="form-control" id="marks" name="marks"
                                value="<?php echo !empty($evaluation)?$evaluation['marks']:''?>" required readonly>
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>