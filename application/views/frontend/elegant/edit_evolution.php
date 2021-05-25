<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
?>
<section id="hero_in" class="general">
    <div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;">
    </div>
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span><?php echo get_phrase('edit_evaluation'); ?></h1>
        </div>
    </div>
</section>
<div class="container">
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase('evaluation_edit_form'); ?>
                        <a href="<?php echo site_url('home/student_view/evolution/'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_evaluation_list'); ?></a>
                    </h4>
                    <form action="<?= site_url('home/evolution_student/edit/'.$evaluation['id']) ?>" method="post">
                        <?php if(!empty($evaluation)):?>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $evaluation['id']; ?>" readonly>
                        <?php endif;?>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="student"><?php echo get_phrase('student'); ?><span
                                            class="required">*</span></label>
                                    <input type="text" name="student_name" id="student_name" class="form-control"
                                        value="<?php echo $evaluation['full_name']; ?>" readonly>
                                </div>
                                <div class="form-group row">
                                    <label for="question"><?php echo get_phrase('question'); ?><span
                                            class="required">*</span></label>
                                    <input type="text" name="question" id="question" class="form-control"
                                        value="<?php echo $evaluation['questions']; ?>" readonly>
                                </div>
                                <div class="form-group row">
                                    <label for="submitted_answer"><?php echo get_phrase('submitted_answer'); ?><span
                                            class="required">*</span></label>
                                    <textarea name="submitted_answer" id="submitted_answer" class="form-control"
                                        cols="30" rows="10"
                                        readonly><?php echo !empty($evaluation)?$evaluation['submitted_answer']:''?></textarea>
                                </div>
                                <?php if($evaluation['submitted_answer']): ?>
                                <div class="form-group row">
                                    <label for="marks_gain"><?php echo get_phrase('marks_gain'); ?><span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" id="marks_gain" name="marks_gain"
                                        value="<?php echo !empty($evaluation)?$evaluation['marks_gain']:''?>" required>
                                </div>
                                <?php else: ?>
                                <div class="form-group row">
                                    <label for="marks_gain"><?php echo get_phrase('marks_gain'); ?><span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" id="marks_gain" name="marks_gain"
                                        value="<?php echo !empty($evaluation)?$evaluation['marks_gain']:''?>" required
                                        readonly>
                                </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <label for="marks"><?php echo get_phrase('marks'); ?><span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" id="marks" name="marks"
                                        value="<?php echo !empty($evaluation)?$evaluation['marks']:''?>" required
                                        readonly>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
</div>