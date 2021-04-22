<?php
$email = null; 
if(!empty($param2)){
    $email = $this->crud_model->get_email($param2)->row_array();
}
?>
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title">
                    <?php echo get_phrase(($email)?:'send_email'); ?>
                        <a href="<?php echo site_url('admin/manage_email'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_email_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action=""
                        method="post">
                        <?php if(!empty($email)):?>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $email['id']; ?>"
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
                                    <?php echo !empty($email)? (($email['user_id'] == $user['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $user['first_name'].' '.$user['last_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email_template"><?php echo get_phrase('email_template'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="email_id" id="email_id"
                                 required>
                                <option value=""><?php echo get_phrase('select_a_email_template'); ?></option>
                                <?php foreach ($email_template_list as $email_template): ?>
                                <option value="<?php echo $email_template['id']; ?>"
                                    <?php echo !empty($email)? (($email['id'] == $email_template['id'])? 'selected':'') : ''; ?>>
                                    <?php echo $email_template['email_template']; ?></option>
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