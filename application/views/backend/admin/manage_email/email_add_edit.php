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
                        <?php echo get_phrase(($email)?'edit_email':'add_email'); ?>
                        <a href="<?php echo site_url('admin/manage_email'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_email_list'); ?></a>
                    </h4>
                    <form class="required-form"
                        action="<?php echo site_url('admin/manage_email/'.(!empty($email)?'edit_email':'add_email')); ?>"
                        method="post">
                        <?php if(!empty($email)):?>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $email['id']; ?>"
                            readonly>
                        <?php endif;?>

                        <div class="form-group">
                            <label for="email_template"><?php echo get_phrase('email_template'); ?><span
                                    class="required">*</span></label>
                            <textarea name="email_template" class="form-control" id="email_template" cols="30" rows="10"
                                required><?php echo !empty($email)?$email['email_template']:''?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="type"><?php echo get_phrase('type'); ?><span class="required">*</span></label>
                            <input type="text" name="type" id="type" class="form-control"
                                value="<?php echo !empty($email)?$email['type']:''?>">
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>