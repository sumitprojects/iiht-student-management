<?php 
$paymenttype = array(
    'cash','cheque','wallet'
);
$invoicetypes = array(
    'token','partial-payment','full-payment'
);

?>
<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('enrol_a_student'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('enrolment_form'); ?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/enrol_student/enrol'); ?>"
                        method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="date_added" value="<?php echo date('Y-m-d'); ?>"
                            readonly>
                        <input type="hidden" name="session_id" value="<?=session_id()?>">
                        <input type="hidden" name="is_training" value="<?=session_id()?>">
                        <div class="form-group">
                            <label for="user_id"><?php echo get_phrase('user'); ?><span class="required">*</span>
                            </label>
                            <select class="form-control select2" data-toggle="select2" name="user_id" id="user_id"
                                required>
                                <option value="" disabled selected><?php echo get_phrase('select_a_user'); ?></option>
                                <?php $user_list = $this->user_model->get_user()->result_array();
                                foreach ($user_list as $user): if($user['is_instructor'] == 0): 
                                $purchased_courses = $this->crud_model->get_purchased_courses_by_user($user['id'])->result_array(); 
                                $purchased_courses = array_column($purchased_courses,'course_id')?>
                                <option value="<?php echo $user['id'] ?>"
                                    data-courses="<?=implode(',',$purchased_courses)?>">
                                    <?php echo strtolower($user['first_name'].' '.$user['last_name']); ?></option>
                                <?php endif; endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="" for="course_id"><?php echo get_phrase('course_to_enrol'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="course_id" id="course_id"
                                required>
                                <option value="" disabled selected>
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
                        <div class="form-group">
                            <label for="admission_type"><?php echo get_phrase('admission_type'); ?><span
                                    class="required">*</span>
                            </label>
                            <select class="form-control select2" data-toggle="select2" name="admission_type"
                                id="admission_type" required>
                                <option value="" selected>select admission type</option>
                                <option value="0">Admission</option>
                                <option value="1">Non-Admission</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label
                                for="instructor"><?php echo get_phrase('instructor').' ('.currency_code_and_symbol().')'; ?></label>
                            <select class="form-control select2" data-toggle="select2" name="instructor_id" id="instructor_id">
                                <option value=""><?php echo get_phrase('select_a_instructor'); ?>
                                </option>
                                <?php 
                                    $instructors=$this->user_model->get_instructor()->result_array();
                                    
                                    foreach ($instructors as $inst): ?>
                                <option value="<?php echo $inst['is_instructor']; ?>">
                                    <?php echo $inst['first_name'].' '.$inst['last_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group" id="hod">
                            <label for="hod_id"><?php echo get_phrase('hod_id'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="hod_id" id="hod_id">
                                <option value=""><?php echo get_phrase('select_a_hod'); ?>
                                </option>
                                <?php 
                                    $hod=$this->crud_model->get_hod()->result_array();
                                    
                                    foreach ($hod as $ho): ?>
                                <option value="<?php echo $ho['hod_id']; ?>">
                                    <?php echo $ho['hod_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group" id="training_cat">
                            <label for="training_cat_id"><?php echo get_phrase('training_category'); ?><span
                                    class="required">*</span></label>

                            <select class="form-control select2" data-toggle="select2" name="training_cat_id"
                                id="training_cat_id">
                                <option value="">
                                    <?php echo get_phrase('select_a_training_category'); ?>
                                </option>
                                <?php 
                                     $training=$this->crud_model->get_training_cat()->result_array();
                                    foreach ($training as $train): ?>
                                <option value="<?php echo $train['id']; ?>">
                                    <?php echo $train['title']; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group" id="training_type">
                            <label for="training_type_id"><?php echo get_phrase('training_type'); ?><span
                                    class="required">*</span></label>

                            <select class="form-control select2" data-toggle="select2" name="training_type_id"
                                id="training_type_id">
                                <option value="">
                                    <?php echo get_phrase('select_a_training_type'); ?>
                                </option>
                                <?php 
                                     $training_type=$this->crud_model->get_training_type()->result_array();
                                    foreach ($training_type as $train_type): ?>
                                <option value="<?php echo $train_type['id']; ?>">
                                    <?php echo $train_type['title']; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>

                        <div class="form-group mb-3">

                            <label
                                for="price"><?php echo get_phrase('course_price').' ('.currency_code_and_symbol().')'; ?></label>
                            <input type="number" class="form-control" tabindex="0" id="price" readonly name="price"
                                placeholder="<?php echo get_phrase('enter_course_course_price'); ?>" min="0">
                        </div>
                        <div class="form-group mb-3">
                            <label class="payment_type"
                                for="payment_type"><?php echo get_phrase('payment_type'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="payment_type"
                                id="payment_type" required>
                                <option value="" disabled selected>
                                    <?php echo get_phrase('payment_type'); ?>
                                </option>
                                <?php 
                                    foreach ($paymenttype as $payment):
                                ?>
                                <option value="<?php echo $payment ?>">
                                    <?php echo strtoupper($payment); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="invoice_type"
                                for="invoice_type"><?php echo get_phrase('invoice_type'); ?><span
                                    class="required">*</span></label>
                            <select class="form-control select2" data-toggle="select2" name="invoice_type"
                                id="invoice_type" required>
                                <option value="" disabled selected>
                                    <?php echo get_phrase('invoice_type'); ?>
                                </option>
                                <?php 
                                    foreach ($invoicetypes as $invoice):
                                ?>
                                <option value="<?php echo $invoice ?>">
                                    <?php echo strtoupper($invoice); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="wallet_name"><?php echo get_phrase('wallet_name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" name="wallet_name" id="wallet_name">
                        </div>
                        <div class="form-group mb-3">
                            <label class="bank_name"><?php echo get_phrase('bank_name'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" name="bank_name" id="bank_name">
                        </div>
                        <div class="form-group mb-3">
                            <label class="cheque_number"><?php echo get_phrase('cheque_number'); ?><span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="cheque_number" name="cheque_number">
                        </div>

                        <div class="form-group mb-3">
                            <label class="amount"><?php echo get_phrase('amount'); ?><span
                                    class="required">*</span></label>
                            <input type="number" class="form-control" id="amount" name="amount" required min="0">
                            <?php if(!empty($amount_due)):?><p class="text-danger"><?=get_phrase('amount_due')?>:
                                <?=$amount_due?></p><?php endif;?>
                            <!-- <input type="number" class="form-control"> -->
                        </div>
                        <div class="form-group mb-3">
                            <label class=""><?php echo get_phrase('transaction_id'); ?></label>
                            <input type="text" class="form-control" name="transaction_id"
                                placeholder="Please, Enter transaction number">
                            <!-- <input type="number" class="form-control"> -->
                        </div>
                        <div class="form-group mb-3">
                            <label class=""><?php echo get_phrase('next_due'); ?><span class="required">*</span></label>
                            <input type="date" class="form-control" name="next_due" value="<?php echo date('Y-m-d'); ?>"
                                min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase('enrol_student'); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script type="text/javascript">
if ($('select').hasClass('select2') == true) {
    $('div').attr('tabindex', "");
    $(function() {
        $(".select2").select2()
    });
}
jQuery(document).ready(function() {
    jQuery('#course_id').on('change', function() {
        jQuery('[name=price]').val(jQuery(this).select2('data')[0].element.dataset.price);
    });
    jQuery('#course_id option:not(:first-child)').removeAttr('disabled');
    jQuery('#user_id').on('change', function() {
        jQuery('#course_id option:not(:first-child)').removeAttr('disabled');
        let course = (jQuery(this).select2('data')[0].element.dataset.courses);
        if (course.indexOf(',') > 0) {
            let course_list = course.split(',');
            console.log(course_list);
            course_list.forEach(function(element) {
                jQuery('#course_id option[value="' + element + '"]').attr('disabled', true);
            });
            jQuery('#course_id').select2();
        } else {
            jQuery('#course_id option[value="' + course + '"]').attr('disabled', true);
            jQuery('#course_id').select2();
        }
    });
    jQuery('#amount').removeAttr('readonly');
    jQuery('#invoice_type').on('change', function() {
        if (jQuery(this).val() == 'full-payment') {
            jQuery('#amount').val(jQuery('[name="price"]').val());
            jQuery('#amount').attr('readonly', true);
        } else {
            jQuery('#amount').removeAttr('readonly');
        }
    });
    jQuery('#amount').on('blur', function() {
        if (parseFloat(jQuery('[name="price"]').val()) < parseFloat(jQuery(this).val())) {
            jQuery(this).val(jQuery('[name=price]').val() / 2);
        }
    });
    jQuery('#wallet_name, #bank_name, #cheque_number').attr('disabled', true);
    jQuery('#wallet_name,#bank_name, #cheque_number').parent('.form-group').hide();
    jQuery('#payment_type').on('change', function() {
        if (jQuery(this).val() == 'cash') {
            jQuery('#wallet_name, #bank_name, #cheque_number').attr('disabled', true);
            jQuery('#wallet_name, #bank_name, #cheque_number').removeAttr('required');
            jQuery('#wallet_name, #bank_name, #cheque_number').parent('.form-group').hide();
        } else if (jQuery(this).val() == 'cheque') {
            jQuery('#wallet_name').attr('disabled', true);
            jQuery('#wallet_name').parent('.form-group').hide();
            jQuery('#bank_name, #cheque_number').parent('.form-group').show();

            jQuery('#bank_name, #cheque_number').removeAttr('disabled');
            jQuery('#bank_name, #cheque_number').attr('required', true);
        } else if (jQuery(this).val() == 'wallet') {
            jQuery('#bank_name, #cheque_number').removeAttr('required');
            jQuery('#bank_name, #cheque_number').attr('disabled', true);
            jQuery('#bank_name, #cheque_number').parent('.form-group').hide();
            jQuery('#wallet_name').removeAttr('disabled');
            jQuery('#wallet_name').attr('required', true);
            jQuery('#wallet_name').parent('.form-group').show();

        }
    });

});
</script>
<script>
$(function() {
    $('#hod').hide();
    $('#training_cat').hide();
    $('#training_type').hide();
    $('#admission_type').on('change', function() {
        if (this.value == "0") {
            $('#hod').show();
            $('#training_cat').hide();
            $('#training_type').hide();
        } else {
            $('#hod').show();
            $('#training_cat').show();
            $('#training_type').show();

        }
    });
});
</script>