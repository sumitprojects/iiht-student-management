<form action="<?php echo site_url('admin/quiz_questions/'.$param2.'/add'); ?>" method="post" id='mcq_form'>
    <input type="hidden" name="question_type" value="mcq">
    <div class="form-group">
        <label for="title"><?php echo get_phrase('question_title'); ?></label>
        <textarea name="title" id = "title" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="type"><?php echo get_phrase('type'); ?><span class="required">*</span></label>
        <select class="form-control select2" data-toggle="select2" name="type" id="type" required>>
            <option selected disabled>--Type--</option>
            <option value="multiple_choice">
                <?=get_phrase('MCQ')?></option>
            <option value="written">
                <?=get_phrase('written')?></option>
        </select>
    </div>
    <div id="mcq">
        <div class="form-group" id='multiple_choice_question'>
            <label for="number_of_options"><?php echo get_phrase('number_of_options'); ?></label>
            <div class="input-group">
                <input type="number" class="form-control" name="number_of_options" id="number_of_options"
                    data-validate="required" data-message-required="Value Required" min="0">
                <div class="input-group-append" style="padding: 0px"><button type="button"
                        class="btn btn-secondary btn-sm pull-right" name="button"
                        onclick="showOptions(jQuery('#number_of_options').val())" style="border-radius: 0px;"><i
                            class="fa fa-check"></i></button></div>
            </div>
        </div>
    </div>
   
    <div class="form-group" id="marks">
        <label for="marks"><?php echo get_phrase('marks'); ?><span class="required">*</span></label>
        <input type="text" name="marks" id="marks" class="form-control"
            required>
    </div>
    <div class="text-center">
        <button class="btn btn-success" id="submitButton" type="button" name="button"
            data-dismiss="modal"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>
<script type="text/javascript">
  $(document).ready(function () {
    initSummerNote(['#title']);
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

$('#submitButton').click(function(event) {
    $.ajax({
        url: '<?php echo site_url('admin/quiz_questions/'.$param2.'/add'); ?>',
        type: 'post',
        data: $('form#mcq_form').serialize(),
        success: function(response) {
            if (response == 1) {
                success_notify('<?php echo get_phrase('question_has_been_added'); ?>');
            } else {
                error_notify(
                    '<?php echo get_phrase('no_options_can_be_blank_and_there_has_to_be_atleast_one_answer'); ?>'
                );
            }
        }
    });
    showLargeModal('<?php echo site_url('modal/popup/quiz_questions/'.$param2); ?>',
        '<?php echo get_phrase('manage_quiz_questions'); ?>');
});
</script>
<script>
$(function() {
    $('#n_of_o').hide();
    $('#mcq').hide();
  
    $('#type').on('change', function() {
        if (this.value == "multiple_choice") {
            $('#mcq').show();
            $('#n_of_o').show();
        } else {
            $('#mcq').hide();
            $('#n_of_o').hide();

        }
    });
});
</script>