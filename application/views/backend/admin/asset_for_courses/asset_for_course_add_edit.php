<?php
$asset_for_courses = null; 
if(!empty($param2)){
    $asset_for_courses = $this->crud_model->get_asset_courses($param2)->row_array();
}
?>
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                        <?php echo get_phrase(($asset_for_courses)?'edit_asset_for_course':'add_asset_for_course'); ?>
                        <a href="<?php echo site_url('admin/manage_asset_for_course'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_asset_for_course_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_asset_for_course/'.(!empty($asset_for_courses)?'edit_asset_courses':'add_asset_courses')); ?>"
                        method="post">
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="<?php echo $asset_for_courses['id']; ?>" readonly>
                        <?php if(empty($asset_for_courses['asset_id'])): ?>
                        <div class="form-group">
                            <label for="asset_name"><?php echo get_phrase('asset_name'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="asset_id[]" id="asset_id"
                                multiple required>
                                <option value="" disabled><?php echo get_phrase('select_a_asset'); ?></option>
                                <?php foreach ($asset_list as $asset): ?>
                                <option value="<?php echo $asset['id']; ?>">
                                    <?php echo $asset['name']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php else: ?>
                        <div class="form-group">
                            <?php $asset = $this->user_model->get_asset($asset_for_courses['asset_id'])->row_array();?>
                            <label for="asset_name"><?php echo get_phrase('asset_name'); ?><span
                                    class="required">*</span></label>
                            <input type="hidden" class="form-control" id="asset_id" name="asset_id"
                                value="<?php echo $asset_for_courses['asset_id']; ?>" readonly>
                            <input type="text" class="form-control" value="<?php echo $asset['name']; ?>" readonly>
                        </div>
                        <?php endif;?>
                        <?php if(empty($asset_for_courses['course_id'])): ?>
                        <div class="form-group">
                            <label for="course_name"><?php echo get_phrase('course_name'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="course_id" id="course_id"
                                required>
                                <option value=""><?php echo get_phrase('select_a_course'); ?></option>
                                <?php foreach ($course_list as $course): ?>
                                <option value="<?php echo $course['id']; ?>">
                                    <?php echo $course['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php else: ?>
                        <div class="form-group">
                            <?php $course = $this->user_model->get_course($asset_for_courses['course_id'])->row_array();?>
                            <label for="course_name"><?php echo get_phrase('course_name'); ?><span
                                    class="required">*</span></label>
                            <input type="hidden" class="form-control" id="course_id" name="course_id"
                                value="<?php echo $asset_for_courses['course_id']; ?>" readonly>
                            <input type="text" class="form-control" 
                                value="<?php echo $course['title']; ?>" readonly>
                        </div>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="returnable"><?php echo get_phrase('returnable'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="returnable" id="returnable"
                                required>
                                <option value=""><?php echo get_phrase('select_a_returnable'); ?></option>
                                <option value="0" <?php if($asset_for_courses['returnable'] =='0') echo 'selected';?>>
                                    Yes</option>
                                <option value="1" <?php if($asset_for_courses['returnable'] =='1') echo 'selected';?>>No
                                </option>
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