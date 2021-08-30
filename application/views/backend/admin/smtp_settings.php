<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('smtp_settings'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-between">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('smtp_settings');?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/smtp_settings/update'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="smtp_protocol"><?php echo get_phrase('protocol'); ?><span class="required">*</span></label>
                            <input type="text" name = "protocol" id = "smtp_protocol" class="form-control" value="<?php echo get_settings('protocol');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_host"><?php echo get_phrase('smtp_host'); ?><span class="required">*</span></label>
                            <input type="text" name = "smtp_host" id = "smtp_host" class="form-control" value="<?php echo get_settings('smtp_host');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_port"><?php echo get_phrase('smtp_port'); ?><span class="required">*</span></label>
                            <input type="text" name = "smtp_port" id = "smtp_port" class="form-control" value="<?php echo get_settings('smtp_port');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_user"><?php echo get_phrase('smtp_username'); ?><span class="required">*</span></label>
                            <input type="text" name = "smtp_user" id = "smtp_user" class="form-control" value="<?php echo get_settings('smtp_user');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_pass"><?php echo get_phrase('smtp_password'); ?><span class="required">*</span></label>
                            <input type="text" name = "smtp_pass" id = "smtp_pass" class="form-control" value="<?php echo get_settings('smtp_pass');  ?>" required>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase('save'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('sms_settings');?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/sms_settings/update'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="smtp_protocol"><?php echo get_phrase('url'); ?><span class="required">*</span></label>
                            <input type="text" name = "sms_url" id = "sms_url" class="form-control" value="<?php echo get_settings('sms_url');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_host"><?php echo get_phrase('sms_user'); ?><span class="required">*</span></label>
                            <input type="text" name = "sms_user" id = "sms_user" class="form-control" value="<?php echo get_settings('sms_user');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_port"><?php echo get_phrase('sms_pass'); ?><span class="required">*</span></label>
                            <input type="text" name = "sms_pass" id = "sms_pass" class="form-control" value="<?php echo get_settings('sms_pass');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_user"><?php echo get_phrase('sms_type'); ?><span class="required">*</span></label>
                            <input type="text" name = "smtp_user" id = "sms_type" class="form-control" value="<?php echo get_settings('sms_type');  ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_pass"><?php echo get_phrase('sms_route'); ?><span class="required">*</span></label>
                            <input type="text" name = "sms_route" id = "sms_route" class="form-control" value="<?php echo get_settings('sms_route');  ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="smtp_pass"><?php echo get_phrase('sms_id'); ?><span class="required">*</span></label>
                            <input type="text" name = "sms_id" id = "sms_id" class="form-control" value="<?php echo get_settings('sms_id');  ?>" required>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase('save'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
