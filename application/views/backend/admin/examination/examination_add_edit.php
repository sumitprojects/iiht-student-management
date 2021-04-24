    <?php
    $examination =$examination?? null; 
    if (!empty($examination)) {
        $options = json_decode($examination['options']);
    } else {
        $options = array();
    }
    if (!empty($examination)) {
        $correct_answers= json_decode($examination['correct_answers']);
    } else {
        $correct_answers = array();
    }

    $course_id = isset($examination['course_id'])?$examination['course_id']: $param2;
    // var_dump($examination);die;
    ?>

    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <h4 class="mb-3 header-title">
                            <?=get_phrase((is_array($examination)?'edit_examination':'add_examination')); ?>
                            <a href="<?php echo site_url('admin/manage_examination/'.$course_id); ?>"
                                class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                    class=" mdi mdi-keyboard-backspace"></i>
                                <?php echo get_phrase('back_to_examination_list'); ?></a>
                        </h4>
                        <form class="required-form" id="mcq_form"
                            action="<?php echo site_url('admin/manage_examination/'.(!empty($examination)?'edit_examination':'add_examination')); ?>"
                            method="post">
                            <?php if(!empty($examination)):?>
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="<?php echo $examination['id']; ?>" readonly>

                            <?php endif;?>
                            <input type="hidden" class="form-control" id="course_id" name="course_id"
                                value="<?php echo $param2; ?>" readonly>
                            <div class="form-group">
                                <label for="title"><?php echo get_phrase('title'); ?><span
                                        class="required">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="<?php echo !empty($examination)?$examination['title']:''?>" required>
                            </div>
                            <div class="form-group">
                                <label for="type"><?php echo get_phrase('type'); ?><span
                                        class="required">*</span></label>
                                <?php if(empty($examination)):?>
                                <select class="form-control select2" data-toggle="select2" name="type" id="type"
                                    required>>
                                    <option selected disabled>--Type--</option>
                                    <option value="multiple_choice"
                                        <?php if(isset($examination) && $examination['type'] =='multiple_choice') echo 'selected'; ?>>
                                        <?=get_phrase('MCQ')?></option>
                                    <option value="written"
                                        <?php if(isset($examination) && $examination['type'] =='mcq') echo 'selected';?>>
                                        <?=get_phrase('written')?></option>
                                </select>
                                <?php else: ?>
                                <input type="hidden" name="type" value="<?=($examination['type']);?>">
                                <input type="text" class="form-control" readonly
                                    value="<?=get_phrase($examination['type']);?>">
                                <?php endif; ?>
                            </div>
                            <?php if(empty($examination)):?>
                            <div class="form-group" id="n_of_o">
                                <label for="number_of_options"><?php echo get_phrase('number_of_options'); ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="number_of_options"
                                        id="number_of_options" data-validate="required"
                                        data-message-required="Value Required" min="0"
                                        value="<?php echo $examination['number_of_options']; ?>">
                                    <div class="input-group-append" style="padding: 0px"><button type="button"
                                            class="btn btn-secondary btn-sm pull-right" name="button"
                                            onclick="showOptions(jQuery('#number_of_options').val())"
                                            style="border-radius: 0px;"><i class="fa fa-check"></i></button></div>
                                </div>
                            </div>
                            <div id="mcq">
                                <div id="multiple_choice_question">

                                </div>
                            </div>
                            <?php else: ?>
                            <?php if($examination['type'] == 'wriiten'): ?>
                            <div class="form-group" id='multiple_choice_question'>
                                <label for="number_of_options"><?php echo get_phrase('number_of_options'); ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="number_of_options"
                                        id="number_of_options" data-validate="required"
                                        data-message-required="Value Required" min="0"
                                        value="<?php echo $examination['number_of_options']; ?>">
                                    <div class="input-group-append" style="padding: 0px"><button type="button"
                                            class="btn btn-secondary btn-sm pull-right" name="button"
                                            onclick="showOptions(jQuery('#number_of_options').val())"
                                            style="border-radius: 0px;"><i class="fa fa-check"></i></button></div>
                                </div>
                            </div>
                            <?php else: ?>
                            <?php for ($i = 0; $i < $examination['number_of_options']; $i++):?>
                            <div class="form-group options">
                                <label><?php echo get_phrase('option').' '.($i+1);?></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="options[]"
                                        id="option_<?php echo $i; ?>"
                                        placeholder="<?php echo get_phrase('option_').$i; ?>" required
                                        value="<?php echo $options[$i]; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <input type='checkbox' name="correct_answers[]" value=<?php echo ($i+1); ?>
                                                <?php if(in_array(($i+1), $correct_answers)) echo 'checked'; ?>>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php endfor;?>
                            <?php endif; ?>

                            <?php endif;?>
                            <div class="form-group" id="marks">
                                <label for="marks"><?php echo get_phrase('marks'); ?><span
                                        class="required">*</span></label>
                                <input type="text" name="marks" id="marks" class="form-control"
                                    value="<?php echo $examination['marks']; ?>" required>

                            </div>
                            <button class="btn btn-primary" type="button" name="button" data-dismiss="modal"
                                id="submitButton"
                                onclick="checkRequiredFields()"><?php echo get_phrase('submit'); ?></button>

                        </form>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <script>
$(function() {
    $('#n_of_o').hide();
    $('#mcq').hide();
    $('#written').hide();
    $('#type').on('change', function() {
        if (this.value == "multiple_choice") {
            $('#mcq').show();
            $('#n_of_o').show();
            $('#written').hide();
        } else {
            $('#written').show();
            $('#mcq').hide();
            $('#n_of_o').hide();

        }
    });
});
    </script>
    <script type="text/javascript">
function showOptions(number_of_options) {
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('admin/manage_multiple_choices_options'); ?>",
        data: {
            number_of_options: number_of_options
        },
        success: function(response) {
            jQuery('.options').remove();
            jQuery('#multiple_choice_question').after(response);
        }
    });
}
    </script>