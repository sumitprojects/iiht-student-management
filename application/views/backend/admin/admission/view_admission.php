<?php

$source = $this->crud_model->get_source($user['source_id'])->row_array();
$branch = $this->crud_model->get_branch($user['branch_id'])->row_array();
$pre_address = $perm_address = ""; 

if(!empty(json_decode($user['address_detail']))){
    $pre_address = json_decode($user['address_detail'])->present_address; 
    $perm_address = json_decode($user['address_detail'])->permanent_address;
}

?>


<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('view_student_details'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3"><?php echo get_phrase('course_adding_form'); ?>
                    <a href="<?php echo site_url('admin/users'); ?>"
                        class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                            class=" mdi mdi-keyboard-backspace"></i>
                        <?php echo get_phrase('back_to_student_list'); ?></a>
                </h4>

                <div class="row w-100">
                    <div class="col-xl-12">
                        <div id="basicwizard">

                            <ul class="nav nav-pills nav-justified form-wizard-header">
                                <li class="nav-item">
                                    <a href="#basic" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-fountain-pen-tip mr-1"></i>
                                        <span class="d-none d-sm-inline"><?php echo get_phrase('basic'); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#enquiry" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-fountain-pen-tip mr-1"></i>
                                        <span class="d-none d-sm-inline"><?php echo get_phrase('enquiry'); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#admissions" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-fountain-pen-tip mr-1"></i>
                                        <span class="d-none d-sm-inline"><?php echo get_phrase('admissions'); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#assets" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-fountain-pen-tip mr-1"></i>
                                        <span class="d-none d-sm-inline"><?php echo get_phrase('assets'); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#invoices" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-fountain-pen-tip mr-1"></i>
                                        <span class="d-none d-sm-inline"><?php echo get_phrase('invoices'); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#attendance" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-fountain-pen-tip mr-1"></i>
                                        <span class="d-none d-sm-inline"><?php echo get_phrase('attendance'); ?></span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane" id="basic">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-10 my-4">
                                            <?php if (count($user) > 0): ?>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label"
                                                    for="first_name"><?=get_phrase('first_name')?></label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['first_name']?> </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label"
                                                    for="last_name"><?=get_phrase('last_name')?></label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['first_name']?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label"
                                                    for="email"><?=get_phrase('email')?></label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['email']?>
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label"
                                                    for="dob"><?=get_phrase('dob')?></label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['dob']?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label"
                                                    for="date_added"><?=get_phrase('date_added')?></label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=date('d-m-Y',$user['date_added'])?>
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label"
                                                    for="marital_status">marital_status</label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['marital_status']?> </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label"
                                                    for="source"><?=get_phrase('source')?></label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$source['source_name']?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label"
                                                    for="source_other"><?=get_phrase('source_other')?></label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['source_other']?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label"
                                                    for="branch_id"><?=get_phrase('branch')?></label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$branch['branch_name']?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label"
                                                    for="uid_or_adhaar"><?=get_phrase('uid_or_adhaar')?></label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['uid_or_adhaar']?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="address_detail">
                                                    <p>Present Address</p>
                                                    <p>Permanent Address</p>
                                                </label>
                                                <div class="col-md-9">
                                                    <p class="form-control"><?=$pre_address?></p>
                                                    <p class="form-control"><?=$perm_address?></p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="education_detail">Education
                                                    Detail</label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['education_detail']?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="mob_no">Mobile No.</label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['mob_no']?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="alt_mob">Alternate
                                                    No.</label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['alt_mob']?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="comp_knowledge">Computer
                                                    Knowledge</label>
                                                <div class="col-md-9">
                                                    <p class="form-control">
                                                        <?=$user['comp_knowledge'] == '1'? 'True':'False'?>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (count($user) == 0): ?>
                                            <div class="img-fluid w-100 text-center">
                                                <img style="opacity: 1; width: 100px;"
                                                    src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                                                <?php echo get_phrase('no_data_found'); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div> <!-- end row -->
                                </div> <!-- end tab pane -->
                                <div class="tab-pane" id="enquiry">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-10">
                                            <div class="table-responsive-sm mt-4">
                                                <?php if (count($enquiry) > 0): ?>
                                                <table id="inquiry-datatable"
                                                    class="table table-striped dt-responsive nowrap" data-filter="3,4,5"
                                                    data-nofilter="6,7," width="100%" data-page-length='25'>
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th><?php echo get_phrase('inquiry_name'); ?></th>
                                                            <th><?php echo get_phrase('inquiry_date'); ?></th>
                                                            <th><?php echo get_phrase('inquiry_course'); ?></th>
                                                            <th><?php echo get_phrase('inquiry_source'); ?></th>
                                                            <th><?php echo get_phrase('inquiry_branch'); ?></th>
                                                            <th><?php echo get_phrase('inquiry_status'); ?></th>
                                                            <th><?php echo get_phrase('actions'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($enquiry as $key => $br):?>
                                                        <tr class="<?=($br['is_delete'])?'text-danger':''?>">
                                                            <td><?php echo ++$key; ?></td>
                                                            <td>
                                                                <a data-toggle="tooltip"
                                                                    data-title="<?php echo get_phrase('view_followup');?>"
                                                                    href="<?=site_url('admin/followup/view_followup/'.$br['en_id'])?>"><strong><?php echo ellipsis($br['en_name']); ?></strong><br></a>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['en_date']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['title']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['source_name']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['branch_name']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <?php if ($br['en_status'] == 'closed'): ?>
                                                                <span class="badge badge-danger-lighten"
                                                                    data-toggle="tooltip" data-placement="top" title=""
                                                                    data-original-title="<?php echo get_phrase($br['en_status']); ?>"><?php echo get_phrase($br['en_status']); ?></span>
                                                                <?php elseif ($br['en_status'] == 'open'):?>
                                                                <span class="badge badge-info-lighten"
                                                                    data-toggle="tooltip" data-placement="top" title=""
                                                                    data-original-title="<?php echo get_phrase($br['en_status']); ?>"><?php echo get_phrase($br['en_status']); ?></span>
                                                                <?php elseif ($br['en_status'] == 'completed'):?>
                                                                <span class="badge badge-success-lighten"
                                                                    data-toggle="tooltip" data-placement="top" title=""
                                                                    data-original-title="<?php echo get_phrase($br['en_status']); ?>"><?php echo get_phrase($br['en_status']); ?></span>
                                                                <?php elseif ($br['en_status'] == 'hold'):?>
                                                                <span class="badge badge-warning-lighten"
                                                                    data-toggle="tooltip" data-placement="top" title=""
                                                                    data-original-title="<?php echo get_phrase($br['en_status']); ?>"><?php echo get_phrase($br['en_status']); ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <div class="dropright dropright">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <?php if($br['is_delete'] == 0 && $br['en_status'] != 'completed'): ?>
                                                                        <li><a class="dropdown-item"
                                                                                href="<?=site_url('admin/inquiry/inquiry_add_edit/'.$br['en_id']); ?>"><?php echo get_phrase('edit_this_inquiry');?></a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="<?=site_url('admin/inquiry/complete/'.$br['en_id']); ?>"><?php echo get_phrase('make_admission');?></a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="<?=site_url('admin/followup/followup_add_edit/'.$br['en_id'])?>"><?php echo get_phrase('add_followup');?></a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="<?=site_url('admin/followup/view_followup/'.$br['en_id'])?>"><?php echo get_phrase('view_followup');?></a>
                                                                        </li>
                                                                        <?php if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 4):?>
                                                                        <li><a class="dropdown-item"
                                                                                href="<?=site_url('admin/user_form/add_edit_from_inquiry/'.$br['en_id'])?>"><?php echo get_phrase('add_admission');?></a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="<?=site_url('admin/user_form/add_edit_from_inquiry_non/'.$br['en_id'])?>"><?php echo get_phrase('add_non_admission');?></a>
                                                                        </li>
                                                                        <?php endif;?>
                                                                        <?php elseif($br['is_delete'] == 1): ?>
                                                                        <li><a class="dropdown-item" href="#"
                                                                                onclick="confirm_modal('<?php echo site_url('admin/inquiry/'.(($br['is_delete'] == 0)?'delete':'activate').'/'.$br['en_id']); ?>');"><?php echo get_phrase(($br['is_delete'] == 0)?'delete':'activate'); ?></a>
                                                                        </li>
                                                                        <?php elseif($br['en_status'] == 'completed'): ?>
                                                                        <li><a class="dropdown-item"
                                                                                href="<?=site_url('admin/followup/view_followup/'.$br['en_id'])?>"><?php echo get_phrase('view_followup');?></a>
                                                                        </li>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <?php endif; ?>
                                                <?php if (count($enquiry) == 0): ?>
                                                <div class="img-fluid w-100 text-center">
                                                    <img style="opacity: 1; width: 100px;"
                                                        src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                                                    <?php echo get_phrase('no_data_found'); ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                </div> <!-- end tab-pane -->

                                <div class="tab-pane" id="admissions">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-10">
                                            <div class="table-responsive my-4">
                                                <?php if (count($admission) > 0): ?>
                                                <table id="enrol_history"
                                                    class="table table-striped table-centered mb-0" data-filter="3,4,7"
                                                    data-nofilter="8,">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo get_phrase('photo'); ?></th>
                                                            <th><?php echo get_phrase('user_name'); ?></th>
                                                            <th><?php echo get_phrase('enrolled_course'); ?></th>
                                                            <th><?php echo get_phrase('admission_type'); ?></th>
                                                            <th><?php echo get_phrase('enrolment_date'); ?></th>
                                                            <th><?php echo get_phrase('course_fees')?></th>
                                                            <th><?php echo get_phrase('payment_recieved')?></th>
                                                            <th><?php echo get_phrase('amount_due')?></th>
                                                            <th><?php echo get_phrase('enrolment_status'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($admission as $enrol):
                                                        $user_data = $this->db->get_where('users', array('id' => $enrol['user_id']))->row_array();
                                                        $course_data = $this->db->get_where('course', array('id' => $enrol['course_id']))->row_array();?>
                                                        <tr class="gradeU">
                                                            <td>
                                                                <img src="<?php echo $this->user_model->get_user_image_url($enrol['user_id']); ?>"
                                                                    alt="" height="50" width="50"
                                                                    class="img-fluid rounded-circle img-thumbnail">
                                                            </td>
                                                            <td>
                                                                <b><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></b><br>
                                                                <small><?php echo get_phrase('email').': '.$user_data['email']; ?></small><br>
                                                                <small><?php echo get_phrase('mob_no').': '.$user_data['mob_no']; ?></small>

                                                            </td>
                                                            <td><strong><a
                                                                        href="<?php echo site_url('admin/course_form/course_edit/'.$course_data['id']); ?>"
                                                                        target="_blank"><?php echo $course_data['title']; ?></a></strong>
                                                            </td>
                                                            <td>
                                                                <?php if($user_data['process_mode'] == 'online'):?>
                                                                <span
                                                                    class="badge badge-primary"><?=get_phrase('online')?></span>
                                                                <?php else:?>
                                                                <span
                                                                    class="badge badge-primary"><?php echo $enrol['is_training'] == 1? get_phrase('Admission'):get_phrase('Non Admission'); ?></span>
                                                                <?php endif;?>
                                                            </td>
                                                            <td><?php echo date('D, d-M-Y', $enrol['date_added']); ?>
                                                            </td>
                                                            <td><?=$enrol['final_price']?></td>
                                                            <td><?=$enrol['total_payment']??'N/A'?></td>
                                                            <?php if($enrol['amount_due']>0 && $enrol['total_payment']>0):?>
                                                            <td><?=$enrol['amount_due']?></td>
                                                            <?php elseif($enrol['amount_due'] == 0 && $enrol['total_payment']==$enrol['final_price']):?>
                                                            <td><span
                                                                    class="badge badge-info"><?=get_phrase('payment_completed')?></span>
                                                            </td>
                                                            <?php else:?>
                                                            <td><span
                                                                    class="badge badge-danger"><?=get_phrase('payment_pending') . $enrol['total_payment'] . ' - '. $enrol['final_price']?></span>
                                                            </td>
                                                            <?php endif;?>
                                                            <td><span
                                                                    class="badge badge-info"><?=get_phrase($enrol['enrol_status'])?></span>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <?php endif; ?>
                                                <?php if (count($admission) == 0): ?>
                                                <div class="img-fluid w-100 text-center">
                                                    <img style="opacity: 1; width: 100px;"
                                                        src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                                                    <?php echo get_phrase('no_data_found'); ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="assets">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-10">
                                            <div class="table-responsive-sm my-4">
                                                <?php if (count($assets) > 0): ?>
                                                <table id="asset_for_users-datatable"
                                                    class="table table-striped dt-responsive nowrap" width="100%"
                                                    data-page-length='25'>
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th><?php echo get_phrase('Student'); ?></th>
                                                            <th><?php echo get_phrase('assigned_asset'); ?></th>
                                                            <th><?php echo get_phrase('assigned_date'); ?></th>
                                                            <th><?php echo get_phrase('return_date'); ?></th>
                                                            <th><?php echo get_phrase('action'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($assets as $key => $br):?>
                                                        <tr>
                                                            <td><?php echo ++$key; ?></td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['full_name']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['name']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo date($br['asset_date']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <?php if($br['returnable'] && !empty($br['return_date'])):?>
                                                                <strong><?php echo date($br['asset_date']); ?></strong>
                                                                <?php elseif($br['returnable'] && empty($br['return_date'])): ?>
                                                                <span
                                                                    class="badge badge-danger-lighten"><?php echo get_phrase('asset_not_retuned'); ?></span>
                                                                <?php else: ?>
                                                                <span
                                                                    class="badge badge-info-lighten"><?php echo get_phrase('NA'); ?></span>
                                                                <?php endif; ?>

                                                            </td>
                                                            <td>
                                                                <?php if($br['returnable'] && empty($br['return_date'])): ?>
                                                                <div class="dropright dropright">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="<?php echo site_url('admin/manage_asset_for_users/asset_for_users_add_edit/'.$br['id']); ?>"><?php echo get_phrase('edit_this_asset_for_users');?></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <?php endif; ?>
                                                <?php if (count($assets) == 0): ?>
                                                <div class="img-fluid w-100 text-center">
                                                    <img style="opacity: 1; width: 100px;"
                                                        src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                                                    <?php echo get_phrase('no_data_found'); ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="invoices">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-10 my-4">
                                        <div class="table-responsive-sm my-4">
                                            <?php if (count($invoices) > 0): ?>
                                            <table class="table" id="example3">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo get_phrase('photo'); ?></th>
                                                        <th><?php echo get_phrase('user_name'); ?></th>
                                                        <th><?php echo get_phrase('email'); ?></th>
                                                        <th><?php echo get_phrase('purchased_course'); ?></th>
                                                        <th><?php echo get_phrase('paid_amount'); ?></th>
                                                        <th><?php echo get_phrase('payment_type'); ?></th>
                                                        <th><?php echo get_phrase('purchased_date'); ?></th>
                                                        <th><?php echo get_phrase('actions'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($invoices as $purchase):
                          $user_data = $this->db->get_where('users', array('id' => $purchase['user_id']))->row_array();
                          $course_data = $this->db->get_where('course', array('id' => $purchase['course_id']))->row_array();?>
                                                    <tr class="gradeU">
                                                        <td><img src="<?php echo base_url().'assets/user_image/'.$user_data['photo']; ?>"
                                                                alt="" height="50" width="50"> </td>
                                                        <td>
                                                            <?php echo $user_data['first_name'].' '.$user_data['last_name']; ?>
                                                        </td>
                                                        <td><?php echo $user_data['email']; ?></td>
                                                        <td><?php echo $course_data['title']; ?></td>
                                                        <td><?php echo $purchase['amount']; ?></td>
                                                        <td><?php echo $purchase['payment_type']; ?></td>
                                                        <td><?php echo date('D, d-M-Y', $purchase['date_added']); ?>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button
                                                                    class="btn btn-small btn-white btn-demo-space"><?php echo get_phrase('action'); ?></button>
                                                                <button
                                                                    class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                                    data-toggle="dropdown"> <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a href="#"
                                                                            onclick="confirm_modal('<?php echo site_url('admin/purchase_history/delete/'.$purchase['id']); ?>');">
                                                                            <?php echo get_phrase('delete');?>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <?php endif; ?>
                                            <?php if (count($invoices) == 0): ?>
                                            <div class="img-fluid w-100 text-center">
                                                <img style="opacity: 1; width: 100px;"
                                                    src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                                                <?php echo get_phrase('no_data_found'); ?>
                                            </div>
                                            <?php endif; ?>
                                            </div>

                                        </div>
                                    </div> <!-- end row -->
                                </div>
                                <div class="tab-pane" id="attendance">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-10 my-3">
                                            <h4 class="mb-3 header-title"><?php echo get_phrase('attendance_list'); ?></h4>
                                            <div class="table-responsive-sm my-4">
                                                <?php if (count($attendance) > 0): ?>
                                                <table id="attendance-datatable"
                                                    class="table table-striped dt-responsive nowrap" width="100%"
                                                    data-page-length='25'>
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th><?php echo get_phrase('entry_date'); ?></th>
                                                            <th><?php echo get_phrase('remark'); ?></th>
                                                            <th><?php echo get_phrase('att_status'); ?></th>
                                                            <th><?php echo get_phrase('action'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($attendance as $key => $br):?>
                                                        <tr>
                                                            <td><?php echo ++$key; ?></td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['entry_date']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['remark']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['att_status']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <?php if ($br['status'] == 0): ?>
                                                                <span class="badge badge-danger-lighten"
                                                                    data-toggle="tooltip" data-placement="top" title=""
                                                                    data-original-title="<?php echo get_phrase('disabled'); ?>"><?php echo get_phrase('disabled'); ?></span>
                                                                <?php elseif ($br['status'] == 1):?>
                                                                <span class="badge badge-success-lighten"
                                                                    data-toggle="tooltip" data-placement="top" title=""
                                                                    data-original-title="<?php echo get_phrase('active'); ?>"><?php echo get_phrase('active'); ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <div class="dropright dropright">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <?php if ($br['status'] == 1): ?>
                                                                        <li><a class="dropdown-item"
                                                                                href="<?php echo site_url('admin/manage_attendance/attendance_add_edit/'.$br['id']); ?>"><?php echo get_phrase('edit_this_attendance');?></a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#"
                                                                                onclick="confirm_modal('<?php echo site_url('admin/manage_attendance/delete/'.$br['id']); ?>');"><?php echo get_phrase('delete'); ?></a>
                                                                        </li>
                                                                        <?php endif; ?>
                                                                        <li><a class="dropdown-item" href="#"
                                                                                onclick="confirm_modal('<?php echo site_url('admin/manage_attendance/activate/'.$br['id']); ?>');"><?php echo get_phrase('activate'); ?></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <?php endif; ?>
                                                <?php if (count($attendance) == 0): ?>
                                                <div class="img-fluid w-100 text-center">
                                                    <img style="opacity: 1; width: 100px;"
                                                        src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                                                    <?php echo get_phrase('no_data_found'); ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <h4 class="mb-3 header-title"><?php echo get_phrase('leave_list'); ?></h4>
                                            <div class="table-responsive-sm mt-4">
                                                <?php if (count($leave) > 0): ?>
                                                <table id="leave-datatable"
                                                    class="table table-striped dt-responsive nowrap" width="100%"
                                                    data-page-length='25'>
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th><?php echo get_phrase('start_date'); ?></th>
                                                            <th><?php echo get_phrase('end_date'); ?></th>

                                                            <th><?php echo get_phrase('remark'); ?></th>
                                                            <th><?php echo get_phrase('att_status'); ?></th>
                                                            <th><?php echo get_phrase('status'); ?></th>
                                                            <th><?php echo get_phrase('action'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($leave as $key => $br):?>
                                                        <tr>
                                                            <td><?php echo ++$key; ?></td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['start_date']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['end_date']); ?></strong><br>
                                                            </td>

                                                            <td>
                                                                <strong><?php echo ellipsis($br['remark']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <strong><?php echo ellipsis($br['att_status']); ?></strong><br>
                                                            </td>
                                                            <td>
                                                                <?php if ($br['status'] == 0): ?>
                                                                <span class="badge badge-danger-lighten"
                                                                    data-toggle="tooltip" data-placement="top" title=""
                                                                    data-original-title="<?php echo get_phrase('disabled'); ?>"><?php echo get_phrase('disabled'); ?></span>
                                                                <?php elseif ($br['status'] == 1):?>
                                                                <span class="badge badge-success-lighten"
                                                                    data-toggle="tooltip" data-placement="top" title=""
                                                                    data-original-title="<?php echo get_phrase('active'); ?>"><?php echo get_phrase('active'); ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <div class="dropright dropright">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <?php if ($br['status'] == 1): ?>
                                                                        <li><a class="dropdown-item"
                                                                                href="<?php echo site_url('admin/manage_leave/leave_add_edit/'.$br['id']); ?>"><?php echo get_phrase('edit_this_leave');?></a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#"
                                                                                onclick="confirm_modal('<?php echo site_url('admin/manage_leave/delete/'.$br['id']); ?>');"><?php echo get_phrase('delete'); ?></a>
                                                                        </li>
                                                                        <?php endif; ?>
                                                                        <li><a class="dropdown-item" href="#"
                                                                                onclick="confirm_modal('<?php echo site_url('admin/manage_leave/activate/'.$br['id']); ?>');"><?php echo get_phrase('activate'); ?></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <?php endif; ?>
                                                <?php if (count($leave) == 0): ?>
                                                <div class="img-fluid w-100 text-center">
                                                    <img style="opacity: 1; width: 100px;"
                                                        src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                                                    <?php echo get_phrase('no_data_found'); ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div> <!-- end row -->
                                </div>

                                <ul class="list-inline mb-0 wizard text-center">
                                    <li class="previous list-inline-item">
                                        <a href="javascript:void(0)" class="btn btn-info"> <i
                                                class="mdi mdi-arrow-left-bold"></i> </a>
                                    </li>
                                    <li class="next list-inline-item">
                                        <a href="javascript:void(0)" class="btn btn-info"> <i
                                                class="mdi mdi-arrow-right-bold"></i> </a>
                                    </li>
                                </ul>

                            </div> <!-- tab-content -->
                        </div> <!-- end #progressbarwizard-->
                    </div>
                </div><!-- end row-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>
<style media="screen">
body {
    overflow-x: hidden;
}
</style>