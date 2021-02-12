<?php
$inquiry = null; 
$branch = $this->crud_model->get_branch()->result_array();
$courses = $this->crud_model->get_courses()->result_array();        
$sources = $this->crud_model->get_source()->result_array();

if(!empty($param2)){
    $inquiry = $this->crud_model->get_inquiry($param2)->row_array();
}
?>
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($inquiry)?'inquiry_edit_form':'inquiry_add_form'); ?></h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/inquiry/'.(!empty($inquiry)?'edit':'add')); ?>"
                        method="post">
                        <?php if(!empty($inquiry)):?>
                        <input type="hidden" class="form-control" id="en_id" name="en_id"
                            value="<?php echo $inquiry['en_id']; ?>">
                        <?php endif;?>
                        <div class="form-group">
                            <label for="en_code"><?php echo get_phrase('inquiry_code'); ?></label>
                            <input type="text" class="form-control" id="en_code" name="en_code"
                                value="<?php echo !empty($inquiry)?$inquiry['en_code']:strtoupper(substr(md5(rand(0, 1000000)), 0, 6)); ?>"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="en_name"><?php echo get_phrase('inquiry_name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="en_name" name="en_name"
                                value="<?php echo !empty($inquiry)?$inquiry['en_name']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="en_email"><?php echo get_phrase('inquiry_email'); ?><span
                                    class="required">*</span></label>
                            <input type="email" class="form-control" id="en_email" name="en_email"
                                value="<?php echo !empty($inquiry)?$inquiry['en_email']:''?>">
                        </div>
                        <div class="form-group">
                            <label for="en_gender"><?php echo get_phrase('inquiry_gender'); ?><span
                                    class="required">*</span></label><br>
                            <input type="radio" value="male" name="en_gender" required
                                <?php  echo !empty($inquiry) && $inquiry['en_gender'] == 'male'?'checked':''; ?>>
                            <?php echo get_phrase('male'); ?>
                            &nbsp;&nbsp;
                            <input type="radio" value="female" name="en_gender" required
                                <?php echo !empty($inquiry) && $inquiry['en_gender'] == 'female'?'checked':''; ?>>
                            <?php echo get_phrase('female'); ?>
                            &nbsp;&nbsp;
                            <input type="radio" value="other" name="en_gender" required
                                <?php echo !empty($inquiry) && $inquiry['en_gender'] == 'other'?'checked':''; ?>>
                            <?php echo get_phrase('other'); ?>
                        </div>
                        <div class="form-group">
                            <label for="en_address"><?php echo get_phrase('inquiry_address'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="en_address" name="en_address"
                                value="<?php echo !empty($inquiry)?$inquiry['en_address']:''?>">
                        </div>
                        <div class="form-group">
                            <label for="mob_no"><?php echo get_phrase('mob_no'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="mob_no" name="mob_no"
                                value="<?php echo !empty($inquiry)?$inquiry['mob_no']:''?>" placeholder="" pattern=""
                                required>
                        </div>
                        <div class="form-group">
                            <label for="alt_mob"><?php echo get_phrase('alt_mob'); ?></label>
                            <input type="text" class="form-control" id="alt_mob" name="alt_mob"
                                value="<?php echo !empty($inquiry)?$inquiry['alt_mob']:''?>" placeholder="" pattern="">
                        </div>
                        <div class="form-group">
                            <label for="en_date"><?php echo get_phrase('inquiry_date'); ?><span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="en_date" name="en_date"
                                value="<?php echo !empty($inquiry)?$inquiry['en_date']:''?>" required>
                        </div>
                        <div class="form-group">
                            <label for="course_id"><?php echo get_phrase('inquiry_course'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="course_id"
                                data-init-plugin="select2" id="course_id" required> 
                                <?php foreach($courses as $key => $val):?>
                                <option value="<?=$val['id']?>">
                                    <?php echo $val['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="branch_id"><?php echo get_phrase('inquiry_branch'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" required data-toggle="select2" name="branch_id"
                                data-init-plugin="select2" id="branch_id">
                                <?php foreach($branch as $key => $val):?>
                                <option value="<?=$val['branch_id']?>"
                                    <?=$inquiry['branch_id']==$val['branch_id']?'selected':''?>>
                                    <?php echo $val['branch_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="source_id"><?php echo get_phrase('inquiry_source'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" required data-toggle="select2" name="source_id"
                                data-init-plugin="select2" id="source_id">
                                <?php foreach($sources as $key => $val):?>
                                <option value="<?=$val['source_id']?>"
                                    <?=$inquiry['source_id']==$val['source_id']?'selected':''?>>
                                    <?php echo $val['source_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="source_other"><?php echo get_phrase('reference_or_other'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="source_other" name="source_other"
                                value="<?php echo !empty($inquiry)?$inquiry['source_other']:''?>">
                        </div>
                        <div class="form-group">
                            <label for="status"><?php echo get_phrase('inquiry_status'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" required data-toggle="select2" name="en_status"
                                data-init-plugin="select2" id="en_status">
                                <option value="open" <?=$inquiry['en_status']=='open'?'selected':''?>>
                                    <?php echo get_phrase('open') ?></option>
                                <option value="closed" <?=$inquiry['en_status']=='closed'?'selected':''?>>
                                    <?php echo get_phrase('closed') ?></option>
                                <option value="completed" <?=$inquiry['en_status']=='completed'?'selected':''?>>
                                    <?php echo get_phrase('completed') ?></option>
                                <option value="hold" <?=$inquiry['en_status']=='hold'?'selected':''?>>
                                    <?php echo get_phrase('hold') ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="en_remark"><?php echo get_phrase('remark'); ?></label>
                            <input type="text" class="form-control" id="en_remark" name="en_remark"
                                value="<?php echo !empty($inquiry)?$inquiry['en_remark']:''?>">
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
    initSelect2(['#course_id', '#branch_id', '#source_id', '#en_status']);
    jQuery('#source_id').trigger('change');
    if (jQuery('#source_id').val() == '2' || jQuery('#source_id').val() == '18') {
        jQuery('#source_other').removeAttr('disabled');
        jQuery('#source_other').attr('required');
    } else {
        jQuery('#source_other').attr('disabled','true');
    }
    jQuery('#source_id').on('change', function() {
        console.log($(this).val());
        if (jQuery('#source_id').val() == '2' || jQuery('#source_id').val() == '18') {
            jQuery('#source_other').removeAttr('disabled');
            jQuery('#source_other').attr('required');
        } else {
            jQuery('#source_other').attr('disabled','true');
        }
    });

    <?php if($inquiry):?>
    jQuery('#course_id').val(<?=$inquiry['course_id']?>);
    jQuery('#course_id').trigger('change');
    jQuery('#branch_id').val(<?=$inquiry['branch_id']?>);
    jQuery('#branch_id').trigger('change');
    jQuery('#source_id').val(<?=$inquiry['source_id']?>);
    jQuery('#en_status').val('<?=$inquiry['en_status']?>');
    jQuery('#en_status').trigger('change');
    <?php endif;?>
});
</script>