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
<div>
    <?php 
if(isset($enquiry)){
    $enquiry['first_name'] = explode(' ',$enquiry['en_name'])[0] ?? '' ;
    $enquiry['last_name']  = explode(' ',$enquiry['en_name'])[1] ?? '' ;    
}else{
    $enquiry = null;
}
$intern = !empty($intern)? $intern : false;
$admission = !empty($admission)? $admission : false;
$offline = !empty($offline) ? $offline : false;
?>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('student_add_form'); ?></h4>
                <form class="required-form needs-validation" novalidate
                    action="<?php echo site_url('admin/users/add'); ?>" enctype="multipart/form-data" method="post">
                    <?php if(!empty($enquiry)):?>
                    <input type="hidden" name="en_id" value="<?=$enquiry['en_id']?>">
                    <?php endif; ?>

                    <?php if($intern):?>
                    <input type="hidden" name="is_training" value="1">
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
                                <a href="#payment_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-currency-inr mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('payment_info'); ?></span>
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
                                                    name="first_name" value="<?=$enquiry?$enquiry['first_name']:''?>"
                                                    autofocus required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="last_name"><?php echo get_phrase('last_name'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" tabindex="0" id="last_name"
                                                    name="last_name" value="<?=$enquiry?$enquiry['last_name']:''?>"
                                                    required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="dob"><?php echo get_phrase('date_of_birth'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="date" max="<?=date('Y-m-d')?>" class="form-control"
                                                    tabindex="0" id="dob" name="dob" required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="mob_no"><?php echo get_phrase('mob_no'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" tabindex="0"
                                                    value="<?=$enquiry?$enquiry['mob_no']:''?>" id="mob_no"
                                                    name="mob_no" required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="alt_mob"><?php echo get_phrase('alt_mob'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" tabindex="0"
                                                    value="<?=$enquiry?$enquiry['alt_mob']:''?>" id="alt_mob"
                                                    name="alt_mob">
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
                                                        <?=$enquiry?($enquiry['branch_id']==$val['branch_id']?'selected':''):''?>>
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
                                                    tabindex="0" value="<?=$enquiry?$enquiry['en_email']:''?>"
                                                    <?=!empty($enquiry)?'':'required'?>>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="password"><?php echo get_phrase('password'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="password" name="password" class="form-control"
                                                    tabindex="0" value="<?=substr(uniqid(),0,4)?>" required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
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
                                                    class="form-control" tabindex="0">
                                                <small><?php echo get_phrase("required_for_instructor"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="present_address"><?php echo get_phrase('present_address'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="present_address" name="present_address"
                                                    value="<?=$enquiry?$enquiry['en_address']:''?>" class="form-control"
                                                    required tabindex="0">
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
                                                <input type="text" id="permanent_address" name="permanent_address"
                                                    required class="form-control" tabindex="0">
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="education_detail"><?php echo get_phrase('education_detail'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2 custom-select" data-toggle="select2"
                                                    required name="education_detail" data-init-plugin="select2"
                                                    tabindex="0" id="education_detail">
                                                    <?php foreach($edu_list as $key=>$edu):?>
                                                    <option value="<?=$edu['ename']?>">
                                                        <?php echo $edu['ename'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="offset-md-3 col-md-9">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" tabindex="0"
                                                        name="comp_knowledge" id="comp_knowledge" value="1">
                                                    <label class="custom-control-label"
                                                        for="comp_knowledge"><?php echo get_phrase('computer_knowledge'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="source_id"
                                                class="col-md-3 col-form-label"><?php echo get_phrase('inquiry_source'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2" required data-toggle="select2"
                                                    name="source_id" data-init-plugin="select2" id="source_id">
                                                    <?php foreach($sources as $key => $val):?>
                                                    <option value="<?=$val['source_id']?>">
                                                        <?php echo $val['source_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
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
                                                    name="source_other">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                            <div class="tab-pane" id="payment_info">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="paid-course-stuffs">

                                            <?php if($intern): ?>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label"
                                                    for="hod_id"><?php echo get_phrase('hod'); ?></label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" data-toggle="select2"
                                                        name="hod_id" id="hod_id">
                                                        <option value=""><?php echo get_phrase('select_a_hod'); ?>
                                                        </option>
                                                        <?php foreach ($hod as $ho): ?>
                                                        <option value="<?php echo $ho['hod_id']; ?>">
                                                            <?php echo $ho['hod_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label"
                                                    for="instructor_id"><?php echo get_phrase('instructor'); ?><span
                                                        class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" data-toggle="select2" required
                                                        name="instructor_id" id="instructor_id">
                                                        <option value="">
                                                            <?php echo get_phrase('select_a_instructor'); ?>
                                                        </option>
                                                        <?php  
                                                        $instructors=$this->user_model->get_instructor()->result_array();
                                                        foreach ($instructors as $inst):
                                                         ?>
                                                        <option value="<?php echo $inst['id']; ?>">
                                                            <?php echo $inst['first_name'].' '.$inst['last_name']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label"
                                                    for="training_cat_id"><?php echo get_phrase('training_category'); ?><span
                                                        class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" data-toggle="select2" required
                                                        name="training_cat_id" id="training_cat_id">
                                                        <option value="">
                                                            <?php echo get_phrase('select_a_training_category'); ?>
                                                        </option>
                                                        <?php foreach ($training as $train): ?>
                                                        <option value="<?php echo $train['id']; ?>">
                                                            <?php echo $train['title']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label"
                                                    for="training_type_id"><?php echo get_phrase('training_type'); ?><span
                                                        class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" data-toggle="select2" required
                                                        name="training_type_id" id="training_type_id">
                                                        <option value="">
                                                            <?php echo get_phrase('select_a_training_type'); ?>
                                                        </option>
                                                        <?php foreach ($training_type as $train): ?>
                                                        <option value="<?php echo $train['id']; ?>">
                                                            <?php echo $train['title']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label"
                                                    for="hod_id"><?php echo get_phrase('hod'); ?></label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" data-toggle="select2"
                                                        name="hod_id" id="hod_id">
                                                        <option value=""><?php echo get_phrase('select_a_hod'); ?>
                                                        </option>
                                                        <?php foreach ($hod as $ho): ?>
                                                        <option value="<?php echo $ho['hod_id']; ?>">
                                                            <?php echo $ho['hod_name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label"
                                                    for="course_id"><?php echo get_phrase('course_to_enrol'); ?><span
                                                        class="required">*</span></label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" data-toggle="select2"
                                                        name="course_id" id="course_id" required>
                                                        <option value="">
                                                            <?php echo get_phrase('select_a_course'); ?>
                                                        </option>
                                                        <?php 
                                                                foreach ($courses as $course):
                                                                if ($course['status'] != 'active')
                                                                    continue;?>
                                                        <option value="<?php echo $course['id'] ?>"
                                                            data-price="<?=$course['discount_flag'] ==1 ?$course['discounted_price']:$course['price']?>">
                                                            <?php echo trim($course['title']); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label"
                                                    for="price"><?php echo get_phrase('course_price').' ('.currency_code_and_symbol().')'; ?></label>
                                                <div class="col-md-10">
                                                    <input type="number" class="form-control" tabindex="0" id="price"
                                                        readonly name="price"
                                                        placeholder="<?php echo get_phrase('enter_course_course_price'); ?>"
                                                        min="0">
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
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

function priceChecked(elem) {
    if (jQuery('#discount_flag').is(':checked')) {
        // jQuery('#discount_flag').prop("checked", false);
        jQuery('#discounted_price').removeAttr('disabled');
    } else {
        // jQuery('#discount_flag').prop("checked", true);
        jQuery('#discounted_price').attr('disabled', true);
    }
}

function calculateDiscountPercentage(discounted_price) {

    if (discounted_price > 0) {
        var actualPrice = jQuery('#price_s').val();
        if (actualPrice > 0) {
            var reducedPrice = actualPrice - discounted_price;
            var discountedPercentage = (reducedPrice / actualPrice) * 100;
            if (discountedPercentage > 0) {
                jQuery('#discounted_percentage_s').text(discountedPercentage.toFixed(2) + '%');

            } else {
                jQuery('#discounted_percentage_s').text('<?php echo '0%'; ?>');
            }
        }
    }
}


jQuery(document).ready(function() {
    jQuery('#course_id').on('change', function() {
        let selectedCourses = (jQuery(this).select2('data'));
        let prices = 0;

        for (let i = 0; i < selectedCourses.length; i++) {
            const option = selectedCourses[i];
            prices += parseInt(option.element.dataset.price);
        }
        jQuery('[name=price]').val(prices);
    });

    jQuery('#discount_flag').on('change', function() {
        // jQuery('#discounted_price').attr('disabled',true);
        priceChecked($(this));
    })

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

    <?php if(!empty($enquiry)):?>
    jQuery('#course_id').val(<?=$enquiry['course_id']?>);
    jQuery('#course_id').trigger('change');
    jQuery('#branch_id').val(<?=$enquiry['branch_id']?>);
    jQuery('#branch_id').trigger('change');
    <?php endif;?>
});

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