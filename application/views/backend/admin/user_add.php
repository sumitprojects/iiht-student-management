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
var_dump($enquiry);
$enquiry['first_name'] = explode(' ',$enquiry['en_name'])[0] ?? '' ;
$enquiry['last_name']  = explode(' ',$enquiry['en_name'])[1] ?? '' ;

?>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('student_add_form'); ?></h4>
                <form class="required-form" action="<?php echo site_url('admin/users/add'); ?>"
                    enctype="multipart/form-data" method="post">
                    <input type="hidden" name="en_id" value="<?=$enquiry['en_id']?>">
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
                                                <input type="text" class="form-control" id="first_name"
                                                    name="first_name" value="<?=$enquiry['first_name']?>" required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="last_name"><?php echo get_phrase('last_name'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                    value="<?=$enquiry['last_name']?>" required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <?php if(empty($enquiry)):?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="linkedin_link"><?php echo get_phrase('biography'); ?></label>
                                            <div class="col-md-9">
                                                <textarea name="biography" id="summernote-basic"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <?php else:?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="dob"><?php echo get_phrase('date_of_birth'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="date" max="<?=date('Y-m-d')?>" class="form-control"
                                                    id="dob" name="dob" required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="mob_no"><?php echo get_phrase('mob_no'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" value="<?=$enquiry['mob_no']?>"
                                                    id="mob_no" name="mob_no" required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="alt_mob"><?php echo get_phrase('alt_mob'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" value="<?=$enquiry['alt_mob']?>"
                                                    id="alt_mob" name="alt_mob">
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="user_image"><?php echo get_phrase('user_image'); ?></label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="user_image"
                                                            name="user_image" accept="image/*"
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
                                                    value="<?=$enquiry['en_email']?>" required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="password"><?php echo get_phrase('password'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="password" name="password" class="form-control"
                                                    value="<?=(uniqid())?>" required>
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane" id="social_information">
                                <div class="row">
                                    <div class="col-12">
                                        <?php if(empty($enquiry)):?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="facebook_link">
                                                <?php echo get_phrase('facebook'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="facebook_link" name="facebook_link"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="twitter_link"><?php echo get_phrase('twitter'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="twitter_link" name="twitter_link"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="linkedin_link"><?php echo get_phrase('linkedin'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="linkedin_link" name="linkedin_link"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="marital_status"><?php echo get_phrase('marital_status'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select2" data-toggle="select2"
                                                    name="marital_status" data-init-plugin="select2"
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
                                                <input type="text" id="uid_or_adhaar" name="uid_or_adhaar"
                                                    class="form-control">
                                                <small><?php echo get_phrase("required_for_instructor"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="present_address"><?php echo get_phrase('present_address'); ?><span
                                                    class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="present_address" name="present_address"
                                                    class="form-control">
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="offset-md-3 col-md-9">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
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
                                                    class="form-control">
                                                <small><?php echo get_phrase("required_for_admission"); ?></small>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                            <div class="tab-pane" id="payment_info">
                                <div class="row">
                                    <div class="col-12">
                                        <?php if(empty($enquiry)):?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="facebook_link">
                                                <?php echo get_phrase('paypal_client_id'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="paypal_client_id" name="paypal_client_id"
                                                    class="form-control">
                                                <small><?php echo get_phrase("required_for_instructor"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="paypal_secret_key">
                                                <?php echo get_phrase('paypal_secret_key'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="paypal_secret_key" name="paypal_secret_key"
                                                    class="form-control">
                                                <small><?php echo get_phrase("required_for_instructor"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="stripe_public_key"><?php echo get_phrase('stripe_public_key'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="stripe_public_key" name="stripe_public_key"
                                                    class="form-control">
                                                <small><?php echo get_phrase("required_for_instructor"); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label"
                                                for="stripe_secret_key"><?php echo get_phrase('stripe_secret_key'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="stripe_secret_key" name="stripe_secret_key"
                                                    class="form-control">
                                                <small><?php echo get_phrase("required_for_instructor"); ?></small>
                                            </div>
                                        </div>
                                        <?php else:?>
                                        <div class="paid-course-stuffs">
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label"
                                                    for="course_id"><?php echo get_phrase('course_to_enrol'); ?><span
                                                        class="required">*</span> </label>
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
                                                            data-price="<?=$course['discount_flag'] ==1 ?$course['price']:$course['discounted_price']?>">
                                                            <?php echo trim($course['title']); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label"
                                                    for="price"><?php echo get_phrase('course_price').' ('.currency_code_and_symbol().')'; ?></label>
                                                <div class="col-md-10">
                                                    <input type="number" class="form-control" id="price" readonly
                                                        name="price"
                                                        placeholder="<?php echo get_phrase('enter_course_course_price'); ?>"
                                                        min="0">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <div class="offset-md-2 col-md-10">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="discount_flag" id="discount_flag" value="1">
                                                        <label class="custom-control-label"
                                                            for="discount_flag"><?php echo get_phrase('check_if_this_course_has_discount'); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-2 col-form-label"
                                                    for="discounted_price"><?php echo get_phrase('discounted_price').' ('.currency_code_and_symbol().')'; ?></label>
                                                <div class="col-md-10">
                                                    <input type="number" class="form-control" name="discounted_price"
                                                        id="discounted_price"
                                                        onkeyup="calculateDiscountPercentage(this.value)" min="0">
                                                    <small
                                                        class="text-muted"><?php echo get_phrase('this_course_has'); ?>
                                                        <span id="discounted_percentage" class="text-danger">0%</span>
                                                        <?php echo get_phrase('discount'); ?></small>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <?php endif;?>
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

                            <ul class="list-inline mb-0 wizard text-center">
                                <li class="previous list-inline-item">
                                    <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i>
                                    </a>
                                </li>
                                <li class="next list-inline-item">
                                    <a href="javascript::" class="btn btn-info"> <i
                                            class="mdi mdi-arrow-right-bold"></i>
                                    </a>
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
    if (jQuery('#discountCheckbox').is(':checked')) {
        jQuery('#discountCheckbox').prop("checked", false);
        jQuery('#discounted_price').removeAttr('disabled');
    } else {
        jQuery('#discountCheckbox').prop("checked", true);
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
        jQuery('[name=price]').val(jQuery(this).select2('data')[0].element.dataset.price);
    });
    jQuery('#discounted_price').attr('disabled',true);
    jQuery('#same_as_perm').on('change',function(){
        if($(this).is(':checked')){
            $('[name="permanent_address"]').val($('[name="present_address"]').val());
        }else{
            $('[name="permanent_address"]').val();
        }
    });
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