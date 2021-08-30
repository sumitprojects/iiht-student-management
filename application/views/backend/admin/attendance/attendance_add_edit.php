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
                        <input type="hidden" class="form-control" id="en_id" name="en_id"
                            value="<?php echo $attendance['en_id']; ?>" readonly>
                        <input type="hidden" class="form-control" id="batch_id" name="batch_id"
                            value="<?php echo $attendance['en_id']; ?>" readonly>
                        <?php else:?>
                        <div class="form-group mb-3">
                            <label class="" for="batch_id"><?php echo get_phrase('batch'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="batch_id" id="batch_id"
                                required>
                                <option value="" disabled selected>
                                    <?php echo get_phrase('select_a_batch'); ?>
                                </option>
                                <?php foreach ($batch as $batches):
                                    $batch_id=$this->crud_model->get_enrol_data("","",$batches['id'])->result_array();
                                    //$att = $this->crud_model->get_batch_for_att($batches['id'])->row_array();-->
                                    //echo $att['total'];
                                    //if($att['total'] == 0):
                                ?>
                                <option value="<?php echo $batches['id'] ?>" data-student='<?=json_encode(array_column($batch_id,'id')) ?>'>
                                    <?php echo $batches['batch_name']; ?></option>
                                <?php //endif; 
                                endforeach; ?>
                            </select>
                        </div>
                        <?php endif;?>
                        <?php if(empty($attendance['en_id'])): ?>
                        <div class="form-group">
                            <label for="student"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="en_id[]" id="en_id"
                                required multiple>
                                <option value="" disabled><?php echo get_phrase('select_a_user'); ?></option>
                                <?php foreach ($en_list as $enrol): 
                                    
                                ?>
                                <option value="<?php echo $enrol['id']; ?>">
                                    <?php echo $enrol['full_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php else: ?>
                            <div class="form-group">
                            <label for="student"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                            <input type="hidden" class="form-control" id="en_id" name="en_id"
                            value="<?php echo $attendance['en_id']; ?>">
                            <?php $enroll=$this->crud_model->get_enrol_data($attendance['en_id'])->row_array();
                            ?>
                            <input type="text" class="form-control" id="en_id" name="en_id"
                            value="<?php echo $enroll['full_name'].' - '.$enroll['course_name']; ?>" readonly>
                        </div>
                        <?php endif; ?>
                        
                        <div class="form-group">
                            <label for="entry date"><?php echo get_phrase('entry date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="entry_date" name="entry_date"
                                value="<?php echo !empty($attendance)?$attendance['entry_date']:date('Y-m-d')?>" <?php if(!empty($attendance['entry_date'])) echo 'readonly'; ?> max="<?=date('Y-m-d')?>" read-only  required>
                        </div>
                        <div class="form-group">
                            <label for="remark"><?php echo get_phrase('remark'); ?></label>
                            <input type="text" class="form-control" id="remark" name="remark"
                                value="<?php echo !empty($attendance)?$attendance['remark']:''?>" <?php if(!empty($attendance['remark'])) echo 'readonly'; ?>>
                        </div>
                        <div class="form-group">
                            <label for="attendance status"><?php echo get_phrase('attendance status'); ?><span
                                    class="required">*</span></label>
                            <select name="att_status" id="att_status" class="form-control">
                                <option value="pending" selected>pending</option>
                                <option value="present"  <?php if($attendance['att_status']=='present'){ echo "selected"; }?>>Present</option>
                                <option value="absent" <?php if($attendance['att_status']=='absent'){ echo "selected"; }?>>Absent</option>
                                <option value="leave"  <?php if($attendance['att_status']=='leave'){ echo "selected"; }?>>Leave</option>
                                <option value="half-day"  <?php if($attendance['att_status']=='half-day'){ echo "selected"; }?>>Half-Day</option>
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

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#batch_id').on('change', function() {
            let selectedBatches = (jQuery(this).select2('data'));
            let students = 0;

        // for (let i = 0; i < selectedBatches.length; i++) {
        //     const option = selectedBatches[i];
        //     students += parseInt(option.element.dataset.en_id);
        // }
        students = JSON.parse(selectedBatches[0].element.dataset.student);
        console.log(students);
        jQuery('#en_id').val("").trigger('change');;
        $('#en_id').val(students).trigger('change');
    });
});
</script>