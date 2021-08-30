<?php 
$user = !empty($user)?$user:null;
$permission = !empty($permission)?$permission:null;

?>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('save_system_user'); ?></h4>
                <form class="required-form needs-validation" novalidate
                    action="<?php echo site_url('admin/system_user/add_edit'); ?>" enctype="multipart/form-data"
                    method="post">
                    <?php if(!empty($user)):?>
                    <input type="hidden" name="id" value="<?=$user['id']?>">
                    <?php endif;?>
                    <div id="progressbarwizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('basic_info'); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#login_credentials" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-lock mr-1"></i>
                                    <span
                                        class="d-none d-sm-inline"><?php echo get_phrase('login_credentials'); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#permission" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-lock mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('permission'); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('finish'); ?></span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content b-0 mb-0">

                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success">
                                </div>
                            </div>

                            <div class="tab-pane" id="basic_info">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="first_name"><?php echo get_phrase('first_name'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" tabindex="0" id="first_name"
                                                    name="first_name"
                                                    value="<?=!empty($user)?$user['first_name']:set_value('first_name')?>"
                                                    autofocus required>
                                                <small><?php echo get_phrase("required_for_user"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="last_name"><?php echo get_phrase('last_name'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" tabindex="0" id="last_name"
                                                    name="last_name"
                                                    value="<?=!empty($user)?$user['last_name']:set_value('last_name')?>"
                                                    required>
                                                <small><?php echo get_phrase("required_for_user"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="mob_no"><?php echo get_phrase('mob_no'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" tabindex="0"
                                                    value="<?=!empty($user)?$user['mob_no']:set_value('mob_no')?>"
                                                    id="mob_no" name="mob_no" required>
                                                <small><?php echo get_phrase("required_for_user"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="alt_mob"><?php echo get_phrase('alt_mob'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" tabindex="0"
                                                    value="<?=!empty($user)?$user['alt_mob']:set_value('alt_mob')?>"
                                                    id="alt_mob" name="alt_mob">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="branch_id"><?php echo get_phrase('user_role'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2" data-toggle="select2" required
                                                    name="role_id" data-init-plugin="select2" id="role_id">
                                                    <?php foreach($roles as $key => $val):?>
                                                    <option value="<?=$val['id']?>"><?php echo $val['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="branch_id"><?php echo get_phrase('admission_branch'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2" data-toggle="select2" required
                                                    name="branch_id" data-init-plugin="select2" id="branch_id">
                                                    <?php foreach($branch as $key => $val):?>
                                                    <option value="<?=$val['branch_id']?>">
                                                        <?php echo $val['branch_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="user_image"><?php echo get_phrase('user_image'); ?></label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="user_image"
                                                            name="user_image" tabindex="0" accept="image/*"
                                                            onchange="changeTitleOfImageUploader(this)">
                                                        <label class="custom-file-label"
                                                            for="user_image"><?php echo get_phrase('choose_user_image'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                            <div class="tab-pane" id="login_credentials">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="email"><?php echo get_phrase('email'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    tabindex="0"
                                                    value="<?=!empty($user)?$user['email']:set_value('email')?>">
                                                <small><?php echo get_phrase("required_for_user"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="password"><?php echo get_phrase('password'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="password" name="password" class="form-control"
                                                    tabindex="0" value="<?=substr(uniqid(),0,4)?>" required>
                                                <small><?php echo get_phrase("required_for_user"); ?></small>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                            <div class="tab-pane" id="permission">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-centered mb-4">
                                                <thead>
                                                    <th><?=get_phrase('permissions')?></th>
                                                    <th><?=get_phrase('access')?></th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($permission as $key => $p): ?>
                                                    <tr>
                                                        <td>
                                                            <?= $p['definition']; ?>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="<?= $p['name'].'_'.$key ?>" name="permissions[]"
                                                                    value="<?= $p['name'] ?>"
                                                                    <?=isset($user_permission) && in_array($p['name'],$user_permission)?'checked': ""?>>
                                                                <label class="custom-control-label"
                                                                    for="<?= $p['name'].'_'.$key ?>"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                            <div class="tab-pane" id="finish">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                            <h3 class="mt-0"><?php echo get_phrase('thank_you'); ?> !</h3>

                                            <p class="w-75 mb-2 mx-auto">
                                                <?php echo get_phrase('you_are_just_one_click_away'); ?></p>

                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="checkRequiredFields()"
                                                    name="button"><?php echo get_phrase('submit'); ?></button>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <ul class="list-inline mb-0 wizard">
                                <li class="previous list-inline-item">
                                    <a href="javascript:void(0)" class="btn btn-info">Previous</a>
                                </li>
                                <li class="next list-inline-item float-right">
                                    <a href="javascript:void(0)" class="btn btn-info">Next</a>
                                </li>
                            </ul>

                        </div> <!-- tab-content -->
                    </div> <!-- end #progressbarwizard-->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>

<script type="text/javascript">
if ($('select').hasClass('select2') == true) {
    $('div').attr('tabindex', "");
    $(function() {
        $(".select2").select2()
    });
}
<?php if(!empty($user)):?>
jQuery(document).ready(function() {
    jQuery('#role_id').val(<?=$user['role_id']?>);
    jQuery('#role_id').trigger('change');
    jQuery('#branch_id').val(<?=$user['branch_id']?>);
    jQuery('#branch_id').trigger('change');
});
<?php endif;?>
$(".ajaxForm").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(response) {
            var myArray = jQuery.parseJSON(response);
            if (myArray['status']) {
                location.reload();
            } else {
                error_notify(myArray['message']);
            }
        }
    });
});
</script>