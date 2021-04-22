<?php
$sms = null; 
if(!empty($param2)){
    $sms = $this->crud_model->get_sms($param2)->row_array();
}
?>
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                    <?php echo get_phrase(($sms)?:'send_sms'); ?>
                        <a href="<?php echo site_url('admin/manage_sms'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_sms_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action=""
                        method="post">
                        <?php if(!empty($sms)):?>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $sms['id']; ?>"
                            readonly>
                        <?php endif;?>

                        <div class="form-group">
                            <label for="user_id"><?php echo get_phrase('student'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="user_id" id="user_id"
                                multiple required>
                                <option value=""><?php echo get_phrase('select_a_user'); ?></option>
                                <?php foreach ($user_list as $user): ?>
                                <option value="<?php echo $user['id']; ?>"
                                    <?php echo !empty($sms)? (($sms['user_id'] == $user['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $user['first_name'].$user['last_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sms_template"><?php echo get_phrase('sms_template'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="sms_id" id="sms_id"
                                 required>
                                <option value=""><?php echo get_phrase('select_a_sms_template'); ?></option>
                                <?php foreach ($sms_template_list as $sms_template): ?>
                                <option value="<?php echo $sms_template['id']; ?>"
                                    <?php echo !empty($sms)? (($sms['id'] == $sms_template['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $sms_template['sms_template']; ?></option>
                                <?php endforeach; ?>
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