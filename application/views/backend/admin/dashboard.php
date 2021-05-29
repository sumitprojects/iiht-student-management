<?php
    $status_wise_courses = $this->crud_model->get_status_wise_courses();
    $number_of_courses = $status_wise_courses['pending']->num_rows() + $status_wise_courses['active']->num_rows();
    $number_of_lessons = $this->crud_model->get_lessons()->num_rows();
    $number_of_enrolment = $this->crud_model->enrol_history()->num_rows();
    $number_of_students = $this->user_model->get_user()->num_rows();
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('dashboard'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-4"><?php echo get_phrase('admin_revenue_this_year'); ?></h4>

                <div class="mt-3 chartjs-chart" style="height: 320px;">
                    <canvas id="task-area-chart"></canvas>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 col-xl-3">
                        <a href="<?php echo site_url('admin/courses'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="dripicons-archive text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $number_of_courses; ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('number_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <a href="<?php echo site_url('admin/courses'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-camcorder text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $number_of_lessons; ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('number_of_lessons'); ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <a href="<?php echo site_url('admin/enrol_history'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-network-3 text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $number_of_enrolment; ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('number_of_enrolment'); ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <a href="<?php echo site_url('admin/users'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                    <h3><span><?php echo $number_of_students; ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('number_of_student'); ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4"><?php echo get_phrase('course_overview'); ?></h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="project-status-chart"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6">
                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                            <span><?php echo $status_wise_courses['active']->num_rows(); ?></span>
                        </h3>
                        <p class="text-muted mb-0"><?php echo get_phrase('active_courses'); ?></p>
                    </div>
                    <div class="col-6">
                        <i class="mdi mdi-trending-down text-warning mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                            <span><?php echo $status_wise_courses['pending']->num_rows(); ?></span>
                        </h3>
                        <p class="text-muted mb-0"> <?php echo get_phrase('pending_courses'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card" id='unpaid-instructor-revenue'>
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('requested_withdrawal'); ?>
                    <a href="<?php echo site_url('admin/instructor_payout'); ?>" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a>
                </h4>
                <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                        <tbody>

                            <?php
                                $pending_payouts = $this->crud_model->get_pending_payouts()->result_array();
                                foreach ($pending_payouts as $key => $pending_payout):
                                $instructor_details = $this->user_model->get_all_user($pending_payout['user_id'])->row_array();
                            ?>
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body"
                                            style="cursor: auto;"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a>
                                    </h5>
                                    <small><?php echo get_phrase('email'); ?>: <span
                                            class="text-muted font-13"><?php echo $instructor_details['email']; ?></span></small>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body"
                                            style="cursor: auto;"><?php echo currency($pending_payout['amount']); ?></a>
                                    </h5>
                                    <small><span
                                            class="text-muted font-13"><?php echo get_phrase('requested_withdrawal_amount'); ?></span></small>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('inquiy_list'); ?>
                    <a href="<?php echo site_url('admin/inquiry'); ?>" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a>
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('inquiy_name'); ?></th>
                            <th scope="col"><?php echo get_phrase('inquiy_address'); ?></th>
                            <th scope="col"><?php echo get_phrase('inquiy_email'); ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $inquiry=$this->crud_model->get_inquirys()->result_array();
                        foreach ($inquiry as $key => $br):
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($br['en_name']); ?></td>
                            <td><?php echo strtoupper($br['en_address']); ?></td>
                            <td><?php echo $br['en_email']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('followup'); ?>
                    <a href="<?php echo site_url('admin/view_followup/'); ?>" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a>
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('description'); ?></th>
                            <th scope="col"><?php echo get_phrase('fullname'); ?></th>
                            <th scope="col"><?php echo get_phrase('nextdate'); ?></th>
                            <th scope="col"><?php echo get_phrase('status'); ?></th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $follow=$this->crud_model->get_followups()->result_array();
                        foreach ($follow as $key => $br):
                           if($br['status']== 'OPEN'):
                        $user=$this->user_model->get_user($br['user_id'])->row_array();
                        $fullname=$this->crud_model->get_inquirys($br['en_id'])->row_array();
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper(substr($br['description'],0,15)); ?></td>
                            <td><?php echo strtoupper($fullname['en_name']); ?></td>
                            <td><?php echo $br['next_date']; ?></td>
                            <td>
                                <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top">
                                    <?php echo strtoupper($br['status']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php 
                    endif;
                    endforeach; ?>
                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('enrolment'); ?>
                    <a href="<?php echo site_url('admin/users/'); ?>" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a>
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('user'); ?></th>
                            <th scope="col"><?php echo get_phrase('course'); ?></th>
                            <th scope="col"><?php echo get_phrase('instructor'); ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $enrol=$this->crud_model->get_enrols()->result_array();
                        foreach ($enrol as $key => $br):
                            $user=$this->user_model->get_user($br['user_id'])->row_array();
                            $course=$this->crud_model->get_course($br['course_id'])->row_array();
                            $instructor=$this->user_model->get_instructor($br['instructor_id'])->row_array();
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($user['first_name'].' '.$user['last_name']); ?></td>
                            <td><?php echo strtoupper($course['title']); ?></td>

                            <td><?php echo strtoupper($instructor['first_name'].' '.$instructor['last_name']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('due_enrol'); ?>
                    <a href="<?php echo site_url('admin/users/'); ?>" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a>
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('user'); ?></th>
                            <th scope="col"><?php echo get_phrase('course'); ?></th>
                            <th scope="col"><?php echo get_phrase('payment'); ?></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $enrol_history=$this->crud_model->enrol_history_by_date_range()->result_array();
                        foreach ($enrol_history as $enrol):
                                  $user_data = $this->db->get_where('users', array('id' => $enrol['user_id']))->row_array();
                                  $course_data = $this->db->get_where('course', array('id' => $enrol['course_id']))->row_array();?>
                        <tr class="gradeU">
                            <td><?php echo ++$key; ?></td>
                            <td>
                                <?php echo strtoupper($user_data['first_name'].' '.$user_data['last_name']); ?>
                            </td>
                            <td>
                                <?php echo strtoupper($course_data['title']); ?>
                            </td>
                            <?php if($enrol['amount_due']>0 && $enrol['total_payment']>0):?>
                            <td><?=$enrol['amount_due']?></td>
                            <?php elseif($enrol['amount_due'] == 0 && $enrol['total_payment']==$enrol['final_price']):?>
                            <td><span class="badge badge-info"><?=get_phrase('payment_completed')?></span></td>
                            <?php else:?>
                            <td><span
                                    class="badge badge-danger"><?=get_phrase('payment_pending') . $enrol['total_payment'] . ' - '. $enrol['final_price']?></span>
                            </td>


                            <?php endif;?>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('exam_schedule'); ?>
                    <a href="<?php echo site_url('admin/manage_schedule/'); ?>" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a>
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('user'); ?></th>
                            <th scope="col"><?php echo get_phrase('course'); ?></th>
                            <th scope="col"><?php echo get_phrase('exam_date'); ?></th>
                            <th scope="col"><?php echo get_phrase('exam_status'); ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $exam_schedule=$this->crud_model->get_schedule()->result_array();
                        foreach ($exam_schedule as $key => $br):
                            $user_e=$this->user_model->get_user($br['user_id'])->row_array();
                            $course_s=$this->crud_model->get_course($br['course_id'])->row_array();
                           
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($user_e['first_name'].' '.$user_e['last_name']); ?></td>
                            <td><?php echo strtoupper($course_s['title']); ?></td>

                            <td><?php echo $br['exam_date']; ?></td>
                            <?php if($br['exam_status'] == 'canceled'): ?>
                            <td>
                                <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top">
                                    <?php echo strtoupper($br['exam_status']); ?>
                                </span>
                            </td>
                            <?php elseif($br['exam_status']== 'pending'): ?>
                            <td>
                                <span class="badge badge-warning-lighten" data-toggle="tooltip" data-placement="top">
                                    <?php echo strtoupper($br['exam_status']); ?>
                                </span>
                            </td>
                            <?php elseif($br['exam_status']== 'schedule'): ?>
                            <td>
                                <span class="badge badge-secondary-lighten" data-toggle="tooltip" data-placement="top">
                                    <?php echo strtoupper($br['exam_status']); ?>
                                </span>
                            </td>

                            <?php else: ?>
                            <td>
                                <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top">
                                    <?php echo strtoupper($br['exam_status']); ?>
                                </span>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('assets'); ?>
                    <a href="<?php echo site_url('admin/manage_assets/'); ?>" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a>
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('asset_name'); ?></th>
                            <th scope="col"><?php echo get_phrase('price'); ?></th>
                            <th scope="col"><?php echo get_phrase('stock'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $assets_d=$this->crud_model->get_assets()->result_array();
                        foreach ($assets_d as $key => $br):
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($br['name']); ?></td>
                            <td><?php echo $br['price']; ?></td>

                            <td><?php echo $br['stock']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('irregular_student'); ?>
                    <a href="<?php echo site_url('admin/manage_attendance/'); ?>" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a>
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('user'); ?></th>
                            <th scope="col"><?php echo get_phrase('entry_date'); ?></th>
                            <th scope="col"><?php echo get_phrase('att_status'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $irr_student=$this->crud_model->get_attendance()->result_array();
                        foreach ($irr_student as $key => $br):
                            $user_e=$this->user_model->get_user($br['user_id'])->row_array();
                            
                            if($br['att_status'] == 'absent' ||$br['att_status']== 'pending'):
                           
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($user_e['first_name'].' '.$user_e['last_name']); ?></td>
                            <td><?php echo $br['entry_date']; ?></td>
                            <td>
                                <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top">
                                    <?php echo strtoupper($br['att_status']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php endif; 
                    endforeach; ?>
                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('cirtified_student'); ?>
                    <!-- <a href="" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a> -->
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('student'); ?></th>
                            <th scope="col"><?php echo get_phrase('course'); ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // $ci_student=$this->certificate_model->get_certificate()->result_array();
                        $ci_student=$this->crud_model->get_certificate()->result_array();
                        foreach ($ci_student as $key => $br):
                            $user_e=$this->user_model->get_user($br['student_id'])->row_array();
                            $course_e=$this->user_model->get_course($br['course_id'])->row_array();
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($user_e['first_name'].' '.$user_e['last_name']); ?></td>
                            <td><?php echo strtoupper($course_e['title']); ?></td>

                        </tr>
                        <?php  
                    endforeach; ?>
                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('approve_payment'); ?>
                    <!-- <a href="" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a> -->
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('student'); ?></th>
                            <th scope="col"><?php echo get_phrase('payment_type'); ?></th>
                            <th scope="col"><?php echo get_phrase('payment_status'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $app_pay_stu=$this->crud_model->get_payment()->result_array();
                        foreach ($app_pay_stu as $key => $br):
                            $user_e=$this->user_model->get_user($br['user_id'])->row_array();
                            if($br['payment_status']=='paid'):
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($user_e['first_name'].' '.$user_e['last_name']); ?></td>
                            <td><?php echo strtoupper($br['payment_type']); ?></td>
                            <td>
                                <span class="badge badge-success-lighten" data-toggle="tooltip" data-placement="top">
                                    <?php echo strtoupper($br['payment_status']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php endif;
                    endforeach; ?>

                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('not_approve_payment'); ?>
                    <!-- <a href="" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a> -->
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('student'); ?></th>
                            <th scope="col"><?php echo get_phrase('payment_type'); ?></th>
                            <th scope="col"><?php echo get_phrase('payment_status'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $not_app_pay_stu=$this->crud_model->get_payment()->result_array();
                        foreach ($not_app_pay_stu as $key => $br):
                            $user_e=$this->user_model->get_user($br['user_id'])->row_array();
                            if($br['payment_status']=='pending' || $br['payment_status']=='unpaid' || $br['payment_status']=='canceled'):
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($user_e['first_name'].' '.$user_e['last_name']); ?></td>
                            <td><?php echo strtoupper($br['payment_type']); ?></td>
                            <td>
                                <span class="badge badge-danger-lighten" data-toggle="tooltip" data-placement="top">
                                    <?php echo strtoupper($br['payment_status']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php endif;
                    endforeach; ?>

                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('source_by_user'); ?>
                    <!-- <a href="" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a> -->
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('source_name'); ?></th>
                            <th scope="col"><?php echo get_phrase('enrol'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $source_by_user=$this->crud_model->get_source_by_user()->result_array();
                        foreach ($source_by_user as $key => $br):
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($br['source_name']); ?></td>
                            <td><?php echo strtoupper($br['enrol']); ?></td>
                        </tr>
                        <?php 
                    endforeach; ?>

                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('branch_by_user'); ?>
                    <!-- <a href="" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a> -->
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('branch_name'); ?></th>
                            <th scope="col"><?php echo get_phrase('enroll'); ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $branch_by_user=$this->crud_model->get_branch_by_user()->result_array();
                        foreach ($branch_by_user as $key => $br):
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($br['branch_name']); ?></td>
                            <td><?php echo strtoupper($br['enrol']); ?></td>
                        </tr>
                        <?php 
                    endforeach; ?>

                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('placement'); ?>
                    <!-- <a href="" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a> -->
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('type'); ?></th>
                            <th scope="col"><?php echo get_phrase('student'); ?></th>
                            <th scope="col"><?php echo get_phrase('placement_date'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $placement=$this->crud_model->get_placements_dash()->result_array();
                        foreach ($placement as $key => $br):
                            if($br['status']=='pending'):
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($br['type']); ?></td>
                            <td><?php echo strtoupper($br['full_name']); ?></td>
                            <td><?php echo strtoupper($br['placement_date']); ?></td>
                        </tr>
                        <?php
                        endif; 
                    endforeach; ?>

                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('event'); ?>
                    <!-- <a href="" class="alignToTitle"
                        id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a> -->
                </h4>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('event_title'); ?></th>
                            <th scope="col"><?php echo get_phrase('event_link'); ?></th>
                            <th scope="col"><?php echo get_phrase('event_date_time'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $event=$this->crud_model->get_event_schedule()->result_array();
                        foreach ($event as $key => $br):
                            if($br['status']=='pending' || $br['status']=='schedule'):
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><?php echo strtoupper($br['event_title']); ?></td>
                            <td><a href="<?php echo $br['event_link']; ?>"><?php echo get_phrase('event_link'); ?></a></td>
                            <td><?php echo strtoupper($br['event_date']); ?><br><?php echo strtoupper($br['event_time']); ?></td>
                        </tr>
                        <?php endif;
                    endforeach; ?>

                    </tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
        <!-- Card -->
    </div>
</div>
<script type="text/javascript">
$('#unpaid-instructor-revenue').mouseenter(function() {
    $('#go-to-instructor-revenue').show();
});
$('#unpaid-instructor-revenue').mouseleave(function() {
    $('#go-to-instructor-revenue').hide();
});
</script>