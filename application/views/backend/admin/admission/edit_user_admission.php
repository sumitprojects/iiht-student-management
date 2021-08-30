<?php
    $user_data = $this->db->get_where('users', array('id' => $user_id))->row_array();
    $address_details = json_decode($user_data['address_detail'], true);
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
                <h4 class="header-title mb-3"><?php echo get_phrase('student_edit_form'); ?></h4>
                <form class="required-form" action="<?php echo site_url('admin/users/edit/'.$user_id); ?>"
                    enctype="multipart/form-data" method="post">
                    <?php if(!empty($enquiry)):?>
                    <input type="hidden" name="en_id" value="<?=$enquiry['en_id']?>">
                    <?php endif; ?>

                    <?php if(!empty($intern)):?>
                    <input type="hidden" name="is_training" value="<?=$intern?>">
                    <?php endif; ?>

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
                                <a href="#social_information" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-wifi mr-1"></i>
                                    <span
                                        class="d-none d-sm-inline"><?php echo get_phrase('social_information'); ?></span>
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
                                                for="first_name"><?php echo get_phrase('first_name'); ?> <span
                                                    class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="first_name"
                                                    name="first_name" value="<?php echo $user_data['first_name']; ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="last_name"><?php echo get_phrase('last_name'); ?> <span
                                                    class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                    value="<?php echo $user_data['last_name']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="dob"><?php echo get_phrase('date_of_birth'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="date" max="<?=date('Y-m-d')?>"
                                                    value="<?=$user_data['dob']?>" class="form-control" tabindex="0"
                                                    id="dob" name="dob" required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="mob_no"><?php echo get_phrase('mob_no'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" tabindex="0"
                                                    value="<?=$user_data['mob_no']?>" id="mob_no" name="mob_no"
                                                    required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="alt_mob"><?php echo get_phrase('alt_mob'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" tabindex="0"
                                                    value="<?=$user_data['alt_mob']?>" id="alt_mob" name="alt_mob">
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
                                                    <option value="<?=$val['branch_id']?>"
                                                        <?=$user_data['branch_id']==$val['branch_id']?'selected':''?>>
                                                        <?php echo $val['branch_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="branch_id"><?php echo get_phrase('gender'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                         <input type="radio" class="custom-control-input" id="male_radio" value="male" name="gender" required
                                                        <?php  echo !empty($user_data) && $user_data['gender'] == 'male'?'checked':''; ?>>
                                                        <label class="custom-control-label" for="male_radio"><?php echo get_phrase('male'); ?></label> 
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="female_radio" value="female" name="gender" required
                                                        <?php  echo !empty($user_data) && $user_data['gender'] == 'female'?'checked':''; ?>>
                                                        <label class="custom-control-label" for="female_radio"><?php echo get_phrase('female'); ?></label>                            
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="other_radio" value="other" name="gender" required
                                                        <?php  echo !empty($user_data) && $user_data['gender'] == 'other'?'checked':''; ?>>
                                                        <label class="custom-control-label" for="other_radio"><?php echo get_phrase('other'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="user_image"><?php echo get_phrase('user_image'); ?></label>
                                            <div class="col-md-9">
                                                <div class="d-flex">
                                                    <div class="">
                                                        <img class="rounded-circle img-thumbnail"
                                                            src="<?php echo $this->user_model->get_user_image_url($user_data['id']);?>"
                                                            alt="" style="height: 50px; width: 50px;">
                                                    </div>
                                                    <div class="flex-grow-1 mt-1 pl-3">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    name="user_image" id="user_image"
                                                                    onchange="changeTitleOfImageUploader(this)"
                                                                    accept="image/*">
                                                                <label class="custom-file-label ellipsis"
                                                                    for="user_image"><?php echo get_phrase('choose_user_image'); ?></label>
                                                            </div>
                                                        </div>
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
                                            <label class="col-md-3 col-form-label" for="email">
                                                <?php echo get_phrase('email'); ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    value="<?php echo $user_data['email']; ?>">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane" id="social_information">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="marital_status"><?php echo get_phrase('marital_status'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2" data-toggle="select2"
                                                    name="marital_status" data-init-plugin="select2" tabindex="0"
                                                    id="marital_status">
                                                    <option value="single">
                                                        <?php echo get_phrase('single') ?></option>
                                                    <option value="married">
                                                        <?php echo get_phrase('married') ?></option>
                                                    <option value="widowed">
                                                        <?php echo get_phrase('widowed') ?></option>
                                                    <option value="divorced">
                                                        <?php echo get_phrase('divorced') ?></option>
                                                    <option value="separated">
                                                        <?php echo get_phrase('separated') ?></option>
                                                </select>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="uid_or_adhaar"><?php echo get_phrase('uid_or_adhaar'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="uid_or_adhaar" name="uid_or_adhaar" required
                                                    value="<?=$user_data['uid_or_adhaar']?>" class="form-control"
                                                    tabindex="0">
                                                <small><?php echo get_phrase("required_for_instructor"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="present_address"><?php echo get_phrase('present_address'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="present_address" name="present_address"
                                                    value="<?=$address_details['present_address']?>"
                                                    class="form-control" required tabindex="0">
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="offset-md-3 col-md-9">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" tabindex="0"
                                                        name="same_as_perm" id="same_as_perm" value="1">
                                                    <label class="custom-control-label"
                                                        for="same_as_perm"><?php echo get_phrase('check_if_this_address_is_same_as_permanent'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="permanent_address"><?php echo get_phrase('permanent_address'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="permanent_address"
                                                    value="<?=$address_details['permanent_address']?>"
                                                    name="permanent_address" required class="form-control" tabindex="0">
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="education_detail"><?php echo get_phrase('education_detail'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2" data-toggle="select2" required
                                                    name="education_detail" data-init-plugin="select2" tabindex="0"
                                                    id="education_detail">
                                                    <?php foreach($edu_list as $key=>$edu):?>
                                                    <option value="<?=$edu['ename']?>">
                                                        <?php echo $edu['ename'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="source_id"
                                                class="col-md-3 col-form-label"><?php echo get_phrase('inquiry_source'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2" required data-toggle="select2"
                                                    name="source_id" data-init-plugin="select2" id="source_id" disabled>
                                                    <?php foreach($sources as $key => $val):?>
                                                    <option value="<?=$val['source_id']?>" <?php if($user_data['source_id']==$val['source_id']){ echo 'selected';}?>>
                                                        <?php echo $val['source_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!--<input type="text" class="form-control" id="source_id"
                                                    value="<?php// $source['source_name']; ?>" name="source_id" readonly>
                                                <!--<div class="invalid-feedback">-->
                                                <div class="invalid-feedback">
                                                    <?=get_phrase('please_provide_a_valid_source')?></div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="source_other"><?php echo get_phrase('reference_or_other'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="source_other"
                                                    value="<?=$user_data['source_other']?>" name="source_other" readonly>
                                            </div>
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
jQuery(document).ready(function() {
    jQuery('#same_as_perm').on('change', function() {
        if ($(this).is(':checked')) {
            $('[name="permanent_address"]').val($('[name="present_address"]').val());
        } else {
            $('[name="permanent_address"]').val();
        }
    });

    jQuery('#source_id').trigger('change');
    if (jQuery('#source_id').val() == '2' || jQuery('#source_id').val() == '18') {
        jQuery('#source_other').removeAttr('disabled');
        jQuery('#source_other').attr('required');
    } else {
        jQuery('#source_other').attr('disabled', 'true');
    }
    jQuery('#source_id').on('change', function() {
        console.log($(this).val());
        if (jQuery('#source_id').val() == '2' || jQuery('#source_id').val() == '18') {
            jQuery('#source_other').removeAttr('disabled');
            jQuery('#source_other').attr('required');
        } else {
            jQuery('#source_other').attr('disabled', 'true');
        }
    });

    <?php if(!empty($user_data)):?>
    jQuery('#branch_id').val('<?=$user_data['branch_id']?>');
    jQuery('#branch_id').trigger('change');
    jQuery('#marital_status').val('<?=$user_data['marital_status']?>');
    jQuery('#marital_status').trigger('change');
    jQuery('#education_detail').val('<?=$user_data['education_detail']?>');
    jQuery('#education_detail').trigger('change');
    jQuery('#source_id').val('<?=$user_data['source_id']?>');
    jQuery('#source_id').trigger('change');
    <?php endif;?>
});
</script>