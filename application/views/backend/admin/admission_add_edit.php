<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('add_new_admission'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3"><?php echo get_phrase('admission_form'); ?>
                    <a href="<?php echo site_url('admin/admissions'); ?>"
                        class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                            class=" mdi mdi-keyboard-backspace"></i>
                        <?php echo get_phrase('back_to_admission_list'); ?></a>
                </h4>

                <div class="row w-100">
                    <div class="col-xl-12">
                        <form class="required-form" action="<?php echo site_url('admin/admission_actions/add'); ?>"
                            method="post" enctype="multipart/form-data">
                            <div id="basicwizard">
                                <ul class="nav nav-pills nav-justified form-wizard-header">
                                    <li class="nav-item">
                                        <a href="#basic" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-fountain-pen-tip mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('basic'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#contact" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-bell-alert mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('contact'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#education" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-camera-control mr-1"></i>
                                            <span
                                                class="d-none d-sm-inline"><?php echo get_phrase('education'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#documents" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-library-video mr-1"></i>
                                            <span
                                                class="d-none d-sm-inline"><?php echo get_phrase('documents'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#payment" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-currency-inr mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('payment'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('finish'); ?></span>
                                        </a>
                                    </li>
                                    <li class="w-100 bg-white pb-3">
                                        <!--ajax page loader-->
                                        <div class="ajax_loader w-100">
                                            <div class="ajax_loaderBar"></div>
                                        </div>
                                        <!--end ajax page loader-->
                                    </li>
                                </ul>

                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane" id="basic">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="contact"><?php echo get_phrase('basic'); ?></label>

                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- end tab pane -->
                                    <div class="tab-pane" id="contact">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="contact"><?php echo get_phrase('contact'); ?></label>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- end tab pane -->
                                    <!--  tab-pane education -->
                                    <div class="tab-pane" id="education">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="contact"><?php echo get_phrase('education'); ?></label>
                                                    <div class="col-md-10">
                                                        <div id="requirement_area">
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                            name="requirements[]" id="requirements"
                                                                            placeholder="<?php echo get_phrase('provide_requirements'); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-success btn-sm"
                                                                        style="" name="button"
                                                                        onclick="appendRequirement()"> <i
                                                                            class="fa fa-plus"></i> </button>
                                                                </div>
                                                            </div>
                                                            <div id="blank_requirement_field">
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="requirements[]" id="requirements"
                                                                                placeholder="<?php echo get_phrase('provide_requirements'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            style="margin-top: 0px;" name="button"
                                                                            onclick="removeRequirement(this)"> <i
                                                                                class="fa fa-minus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  end tab-pane education -->
                                    <!--  tab-pane document -->
                                    <div class="tab-pane" id="documents">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="outcomes"><?php echo get_phrase('documents'); ?></label>
                                                    <div class="col-md-10">
                                                        <div id="outcomes_area">
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                            name="outcomes[]" id="outcomes"
                                                                            placeholder="<?php echo get_phrase('provide_outcomes'); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-success btn-sm"
                                                                        name="button" onclick="appendOutcome()"> <i
                                                                            class="fa fa-plus"></i> </button>
                                                                </div>
                                                            </div>
                                                            <div id="blank_outcome_field">
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="outcomes[]" id="outcomes"
                                                                                placeholder="<?php echo get_phrase('provide_outcomes'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            style="margin-top: 0px;" name="button"
                                                                            onclick="removeOutcome(this)"> <i
                                                                                class="fa fa-minus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tab-document -->
                                    <div class="tab-pane" id="payment">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
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
                                                            <input type="number" class="form-control" id="price"
                                                                readonly name="price"
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
                                                            <input type="number" class="form-control"
                                                                name="discounted_price" id="discounted_price"
                                                                onkeyup="calculateDiscountPercentage(this.value)"
                                                                min="0">
                                                            <small
                                                                class="text-muted"><?php echo get_phrase('this_course_has'); ?>
                                                                <span id="discounted_percentage"
                                                                    class="text-danger">0%</span>
                                                                <?php echo get_phrase('discount'); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <!-- end tab-pane payment-->
                                    <div class="tab-pane" id="finish">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                    <h3 class="mt-0"><?php echo get_phrase("thank_you"); ?> !</h3>

                                                    <p class="w-75 mb-2 mx-auto">
                                                        <?php echo get_phrase('you_are_just_one_click_away'); ?></p>

                                                    <div class="mb-3 mt-3">
                                                        <button type="button" class="btn btn-primary text-center"
                                                            onclick="checkRequiredFields()"><?php echo get_phrase('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>

                                    <ul class="list-inline mb-0 wizard text-center">
                                        <li class="previous list-inline-item">
                                            <a href="javascript::" class="btn btn-info"> <i
                                                    class="mdi mdi-arrow-left-bold"></i> </a>
                                        </li>
                                        <li class="next list-inline-item">
                                            <a href="javascript::" class="btn btn-info"> <i
                                                    class="mdi mdi-arrow-right-bold"></i> </a>
                                        </li>
                                    </ul>

                                </div> <!-- tab-content -->
                            </div> <!-- end #progressbarwizard-->
                        </form>
                    </div>
                </div><!-- end row-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>
<script type="text/javascript">
var blank_outcome = jQuery('#blank_outcome_field').html();
var blank_requirement = jQuery('#blank_requirement_field').html();
jQuery(document).ready(function() {
    jQuery('#course_id').on('change', function() {
        jQuery('[name=price]').val(jQuery(this).select2('data')[0].element.dataset.price);
    });
    jQuery('#blank_outcome_field').hide();
    jQuery('#blank_requirement_field').hide();
});

function appendOutcome() {
    jQuery('#outcomes_area').append(blank_outcome);
}

function removeOutcome(outcomeElem) {
    jQuery(outcomeElem).parent().parent().remove();
}

function appendRequirement() {
    jQuery('#requirement_area').append(blank_requirement);
}

function removeRequirement(requirementElem) {
    jQuery(requirementElem).parent().parent().remove();
}

function priceChecked(elem) {
    if (jQuery('#discountCheckbox').is(':checked')) {

        jQuery('#discountCheckbox').prop("checked", false);
    } else {

        jQuery('#discountCheckbox').prop("checked", true);
    }
}

function calculateDiscountPercentage(discounted_price) {
    if (discounted_price > 0) {
        var actualPrice = jQuery('#price').val();
        if (actualPrice > 0) {
            var reducedPrice = actualPrice - discounted_price;
            var discountedPercentage = (reducedPrice / actualPrice) * 100;
            console.log(discountedPercentage);
            if (discountedPercentage > 0 && discountedPercentage <= 50) {
                jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2) + '%');
            } else {
                jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
            }
        }
    }
}
</script>

<style media="screen">
body {
    overflow-x: hidden;
}
</style>