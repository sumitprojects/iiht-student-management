<?php
$status_wise_courses = $this->crud_model->get_status_wise_courses();
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
    <div class="leftbar-user">
        <a href="javascript: void(0);">
            <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>"
                alt="user-image" height="42" class="rounded-circle shadow-sm">
            <?php
			$admin_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
            <span
                class="leftbar-user-name"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></span>
        </a>
    </div>
    <?php 
		$user_role = $this->session->userdata('role_id');
	?>
    <!--- Sidemenu -->
    <ul class="metismenu side-nav side-nav-light">

        <li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>

        <li class="side-nav-item <?php if ($page_name == 'dashboard')echo 'active';?>">
            <a href="<?php echo site_url('admin/dashboard'); ?>" class="side-nav-link">
                <i class="dripicons-view-apps"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>
        <?php if((in_array('master', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="dripicons-view-list-large"></i>
                <span> <?php echo get_phrase('master'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <?php if((in_array('branch', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/branch'); ?>"
                        class="<?php if ($page_name == 'branch' || $page_name == 'branch_add' || $page_name == 'branch_edit' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('branch'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if((in_array('categories', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li
                    class="side-nav-item <?php if ($page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit' ): ?> active <?php endif; ?>">
                    <a href="javascript: void(0);"
                        class="<?php if ($page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('categories'); ?> </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li
                            class="<?php if($page_name == 'categories' || $page_name == 'category_edit') echo 'active'; ?>">
                            <a
                                href="<?php echo site_url('admin/categories'); ?>"><?php echo get_phrase('categories'); ?></a>
                        </li>

                        <li class="<?php if($page_name == 'category_add') echo 'active'; ?>">
                            <a
                                href="<?php echo site_url('admin/category_form/add_category'); ?>"><?php echo get_phrase('add_new_category'); ?></a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if((in_array('department', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="javascript: void(0);"
                        class="<?php if ($page_name == 'department/department' || $page_name == 'department/department_add_edit' || $page_name == 'department/hod_add_edit' || $page_name == 'department/hod' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('department'); ?> </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li class="<?php if($page_name == 'department') echo 'active'; ?>">
                            <a
                                href="<?php echo site_url('admin/department'); ?>"><?php echo get_phrase('manage_department'); ?></a>
                        </li>
                        <li class="<?php if($page_name == 'hod') echo 'active'; ?>">
                            <a href="<?php echo site_url('admin/hod'); ?>"><?php echo get_phrase('manage_hod'); ?></a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if((in_array('designation', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/manage_designation'); ?>"
                        class="<?php if ($page_name == 'designation/designation' || $page_name == 'designation/designation_add_edit' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('manage_designation'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if((in_array('manage_bank', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/manage_bank'); ?>"
                        class="<?php if ($page_name == 'manage_bank' || $page_name == 'bank')echo 'active';?>">
                        <span><?php echo get_phrase('manage_bank'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if((in_array('message', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/message'); ?>"
                        class="<?php if ($page_name == 'message' || $page_name == 'message_new' || $page_name == 'message_read')echo 'active';?>">
                        <span><?php echo get_phrase('message'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if((in_array('message', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/manage_careers'); ?>"
                        class="<?php if ($page_name == 'manage_careers')echo 'active';?>">
                        <span><?php echo get_phrase('manage_careers'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if((in_array('manage_email', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/manage_email'); ?>"
                        class="<?php if ($page_name == 'manage_email/email' || $page_name == 'manage_email/email_add_edit' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('manage_email'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if((in_array('manage_sms', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/manage_sms'); ?>"
                        class="<?php if ($page_name == 'manage_sms/sms' || $page_name == 'manage_sms/sms_add_edit' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('manage_sms'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if((in_array('payment_gateway', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/payment_gateway'); ?>"
                        class="<?php if ($page_name == 'payment_gateway' || $page_name == 'payment_gateway_view')echo 'active';?>">
                        <span><?php echo get_phrase('payment_gateway'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if((in_array('source', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a class="<?php if ($page_name == 'source' || $page_name == 'source_add' || $page_name == 'source_edit')echo 'active';?>"
                        href="<?php echo site_url('admin/source'); ?>">
                        <span><?php echo get_phrase('source'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if((in_array('training_type', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/training_type'); ?>"
                        class="<?php if($page_name == 'training_type') echo 'active'; ?>">
                        <span><?php echo get_phrase('training_type'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if((in_array('training', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a class="<?php if ($page_name == 'training_cat')echo 'active';?>"
                        href="<?php echo site_url('admin/training'); ?>">
                        <span><?php echo get_phrase('training_category'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>

        <?php if((in_array('manage_assets', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li
            class="side-nav-item <?php if ($page_name == 'assets/assets' || $page_name == 'asset_for_users/asset_for_users' || $page_name == 'asset_for_users/asset_for_users_add_edit' ): ?> active <?php endif; ?>">
            <a href="javascript: void(0);"
                class="side-nav-link <?php if ($page_name == 'assets/assets' || $page_name == 'asset_for_users/asset_for_users' || $page_name == 'asset_for_users/asset_for_users_add_edit'): ?> active <?php endif; ?>">
                <i class="mdi mdi-factory"></i>
                <span> <?php echo get_phrase('assets'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li class="<?php if($page_name == 'assets/assets' ) echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/manage_assets'); ?>"><?php echo get_phrase('manage_assets'); ?></a>
                </li>
                <li class="<?php if($page_name == 'asset_for_users/asset_for_users' || $page_name == 'asset_for_users/asset_for_users_add_edit' ) echo 'active'; ?>"
                    aria-expanded="false">
                    <a href="<?php echo site_url('admin/manage_asset_for_users'); ?>">
                        <span> <?php echo get_phrase('asset_for_user'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'manage_asset_for_course' ) echo 'active'; ?>" aria-expanded="false">
                    <a href="<?php echo site_url('admin/manage_asset_for_course'); ?>">
                        <span> <?php echo get_phrase('asset_for_courses'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'asset_for_customer' ) echo 'active'; ?>" aria-expanded="false">
                    <a href="<?php echo site_url('admin/manage_assets_for_customer'); ?>">
                        <span> <?php echo get_phrase('asset_for_customer'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>

        <?php if((in_array('attendance', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="far fa-bell"></i>
                <span> <?php echo get_phrase('attendance'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">

                <?php if((in_array('manage_attendance', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/manage_attendance'); ?>"
                        class="<?php if ($page_name == 'attendance/attendance' || $page_name == 'attendance/attendance_add_edit' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('manage_attendance'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if((in_array('leave_reason', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/leave_reason'); ?>"
                        class="<?php if ($page_name == 'leave_reason' || $page_name == 'leave_reason_view')echo 'active';?>">
                        <span><?php echo get_phrase('leave_reason'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if((in_array('manage_leave', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/manage_leave'); ?>"
                        class="<?php if ($page_name == 'leave/leave' || $page_name == 'leave/leave__add_edit' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('manage_leave'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?>
      

        <?php if((in_array('examination', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="fas fa-book-reader"></i>
                <span> <?php echo get_phrase('examination'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <?php if((in_array('evaluation', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/evaluation'); ?>"
                        class="<?php if ($page_name == 'evaluation/evaluation' || $page_name == 'evaluation/evaluation_add_edit' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('evaluation'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if((in_array('manage_schedule', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/manage_schedule'); ?>"
                        class="<?php if ($page_name == 'exam_schedule/schedule' || $page_name == 'exam_schedule/schedule_add_edit' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('exam_schedule'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>

        <?php if((in_array('manage_placement', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="<?php echo site_url('admin/manage_placement'); ?>"
                class="side-nav-link <?php if ($page_name == 'placement/placement' || $page_name == 'placement/placement_add_edit' ): ?> active <?php endif; ?>">
                <i class="dripicons-network-2"></i>
                <span> <?php echo get_phrase('manage_placement'); ?></span>
            </a>
        </li>
        <?php endif; ?>
         <?php if((in_array('batch', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
         <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="fas fa-book-reader"></i>
                <span> <?php echo get_phrase('batch'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <?php if((in_array('batch', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/batch'); ?>"
                        class="<?php if ($page_name == 'admin/batch' || $page_name == 'admin/add_edit_batch' ): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('batch'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if((in_array('manage_batch', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/manage_batch'); ?>"
                        class="<?php if ($page_name == 'batch/student_view'): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('manage_batch'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        
        <?php if((in_array('certificate', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="<?php echo site_url('admin/certificate'); ?>"
                class="side-nav-link <?php if ($page_name == 'certificate'): ?> active <?php endif; ?>">
                <i class="dripicons-network-2"></i>
                <span> <?php echo get_phrase('certificate'); ?></span>
            </a>
        </li>
        <?php endif; ?>
       <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="fas fa-book-reader"></i>
                <span> <?php echo get_phrase('inqury_and_followups'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <?php if((in_array('inquiry', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a class="<?php if ($page_name == 'inquiry' || $page_name == 'inquiry_add' || $page_name == 'inquiry_edit')echo 'active';?>"
                        href="<?php echo site_url('admin/inquiry'); ?>">
                        <span><?php echo get_phrase('inquiry'); ?></span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a class="<?php if ($page_name == 'followup_list')echo 'active';?>"
                        href="<?php echo site_url('admin/followup_list'); ?>">
                        <span><?php echo get_phrase('followup'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php if((in_array('courses', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="<?php echo site_url('admin/courses'); ?>"
                class="side-nav-link <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit')echo 'active';?>">
                <i class="dripicons-archive"></i>
                <span><?php echo get_phrase('courses'); ?></span>
            </a>
        </li>
        <?php endif; ?>

        <?php if(has_permission('admission')):?>
        <li
            class="side-nav-item <?php if ($page_name == 'enrol_history' || $page_name == 'enrol_student'): ?> active <?php endif; ?>">
            <a href="javascript: void(0);"
                class="side-nav-link <?php if ($page_name == 'enrol_history' || $page_name == 'enrol_student' || ($page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit')) : ?> active <?php endif; ?>">
                <i class="dripicons-network-3"></i>
                <span> <?php echo get_phrase('enrolment'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li class="<?php if($page_name == 'enrol_history') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/enrol_history'); ?>"><?php echo get_phrase('enrol_history'); ?></a>
                </li>

                <li class="<?php if($page_name == 'enrol_student') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/enrol_student'); ?>"><?php echo get_phrase('enrol_a_student'); ?></a>
                </li>
                <li class="<?php if($page_name == 'pending_admission') echo 'active'; ?>">
                    <a href="<?php echo site_url('admin/pending_admission'); ?>">
                        <?php echo get_phrase('pending_admission'); ?>
                        <span
                            class="badge badge-danger-lighten"><?php echo $this->crud_model->get_pending_admission()->num_rows(); ?></span>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo site_url('admin/users'); ?>"
                        class="<?php if ($page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit')echo 'active';?>">
                        <!-- <i class="dripicons-user-group"></i> -->
                        <span><?php echo get_phrase('students'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>

        <?php if((in_array('payment_list', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="<?php echo site_url('admin/payment_list'); ?>"
                class="side-nav-link <?php if($page_name == 'payment_list') echo 'active'; ?>">
                <i class="dripicons-document"></i>
                <span><?php echo get_phrase('payment_list'); ?></span>
                <span
                    class="badge badge-danger-lighten"><?php echo $this->crud_model->get_pending_payments()->num_rows(); ?></span>
            </a>
        </li>
        <?php endif; ?>

        <?php if (addon_status('course_bundle')): ?>
        <li
            class="side-nav-item <?php if ($page_name == 'add_bundle' || $page_name == 'manage_course_bundle' || $page_name == 'edit_bundle' || $page_name == 'active_bundle_subscription_report' || $page_name == 'expire_bundle_subscription_report' || $page_name == 'bundle_invoice'): ?> active <?php endif; ?>">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="dripicons-pamphlet"></i>
                <span> <?php echo get_phrase('course_bundle'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li class="<?php if($page_name == 'add_bundle') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('addons/bundle/add_bundle_form'); ?>"><?php echo get_phrase('add_new_bundle'); ?></a>
                </li>
            </ul>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li class="<?php if($page_name == 'manage_course_bundle') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('addons/bundle/manage_bundle'); ?>"><?php echo get_phrase('manage_bundle'); ?></a>
                </li>
            </ul>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li
                    class="<?php if($page_name == 'active_bundle_subscription_report' || $page_name == 'expire_bundle_subscription_report' || $page_name == 'bundle_invoice') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('addons/bundle/subscription_report/active'); ?>"><?php echo get_phrase('subscription_report'); ?></a>
                </li>
            </ul>
        </li>
        <?php endif; ?>

        <?php if((in_array('admin_revenue', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="javascript: void(0);"
                class="side-nav-link <?php if ($page_name == 'admin_revenue' || $page_name == 'instructor_revenue' || $page_name == 'invoice'): ?> active <?php endif; ?>">
                <i class="dripicons-box"></i>
                <span> <?php echo get_phrase('report'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li class="<?php if($page_name == 'admin_revenue') echo 'active'; ?>"> <a
                        href="<?php echo site_url('admin/reports'); ?>"><?php echo get_phrase('admin_revenue'); ?></a>
                </li>
            </ul>
        </li>
        <?php endif; ?>

        <?php if (addon_status('offline_payment')): ?>
        <li class="side-nav-item">
            <a href="javascript: void(0);"
                class="side-nav-link <?php if ($page_name == 'offline_payment_pending' || $page_name == 'offline_payment_approve' || $page_name == 'offline_payment_suspended'): ?> active <?php endif; ?>">
                <i class="dripicons-box"></i>
                <span> <?php echo get_phrase('offline_payment'); ?></span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li class="<?php if($page_name == 'offline_payment_pending') echo 'active'; ?>">
                    <a href="<?php echo site_url('addons/offline_payment/pending'); ?>">
                        <?php echo get_phrase('pending_request'); ?>
                        <span
                            class="badge badge-danger-lighten badge-pill float-right"><?php echo get_pending_offline_payment(); ?></span></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'offline_payment_approve') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('addons/offline_payment/approve'); ?>"><?php echo get_phrase('accepted_request'); ?></a>
                </li>
                <li class="<?php if($page_name == 'offline_payment_suspended') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('addons/offline_payment/suspended'); ?>"><?php echo get_phrase('suspended_request'); ?></a>
                </li>
            </ul>
        </li>
        <?php endif; ?>

        <?php if($this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="javascript: void(0);"
                class="side-nav-link <?php if ($page_name == 'addons' || $page_name == 'addon_add' || $page_name == 'available_addons'): ?> active <?php endif; ?>">
                <i class="dripicons-graph-pie"></i>
                <span> <?php echo get_phrase('addons'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li class="<?php if($page_name == 'addons') echo 'active'; ?>">
                    <a href="<?php echo site_url('admin/addon'); ?>"><?php echo get_phrase('addon_manager'); ?></a>
                </li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if((in_array('system_users', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="fas fa-book-reader"></i>
                <span> <?php echo get_phrase('system_users'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <?php if((in_array('system_user', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li class="side-nav-item">
                    <a href="<?php echo site_url('admin/system_user'); ?>"
                        class="<?php if ($page_name == 'system_user')echo 'active';?>">
                        <span><?php echo get_phrase('system_user'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if((in_array('instructors', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
                <li
                    class="side-nav-item <?php if ($page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit'): ?> active <?php endif; ?>">
                    <a href="javascript: void(0);"
                        class="<?php if ($page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit'): ?> active <?php endif; ?>">
                        <span> <?php echo get_phrase('instructors'); ?> </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li
                            class="<?php if($page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit') echo 'active'; ?>">
                            <a
                                href="<?php echo site_url('admin/instructors'); ?>"><?php echo get_phrase('instructor_list'); ?></a>
                        </li>

                        <li class="<?php if($page_name == 'instructor_payout') echo 'active'; ?>">
                            <a href="<?php echo site_url('admin/instructor_payout'); ?>" style="display:none">
                                <?php echo get_phrase('instructor_payout'); ?>
                                <span
                                    class="badge badge-danger-lighten"><?php echo $this->crud_model->get_pending_payouts()->num_rows(); ?></span>
                            </a>
                        </li>

                        <li class="<?php if($page_name == 'instructor_settings') echo 'active'; ?>" style="display:none">
                            <a
                                href="<?php echo site_url('admin/instructor_settings'); ?>"><?php echo get_phrase('instructor_settings'); ?></a>
                        </li>

                        <li class="<?php if($page_name == 'instructor_application') echo 'active'; ?>" style="display:none">
                            <a href="<?php echo site_url('admin/instructor_application'); ?>">
                                <?php echo get_phrase('instructor_application'); ?>
                                <span
                                    class="badge badge-danger-lighten"><?php echo $this->user_model->get_pending_applications()->num_rows(); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>




        <?php if((in_array('event_schedule', $this->session->userdata('permission')) && $this->session->userdata('role_id') != 1) ^ $this->session->userdata('role_id') == 1):?>
        <li class="side-nav-item">
            <a href="<?php echo site_url('admin/event_schedule'); ?>"
                class="side-nav-link <?php if ($page_name == 'event_schedule/event_schedule' || $page_name == 'event_schedule/event_schedule_add_edit' ): ?> active <?php endif; ?>">
                <i class="dripicons-message"></i>
                <span> <?php echo get_phrase('seminar'); ?></span>
            </a>
        </li>
        <?php endif; ?>

        <?php if($this->session->userdata('role_id') == 1):?>
        <li
            class="side-nav-item  <?php if ($page_name == 'system_settings' || $page_name == 'frontend_settings' || $page_name == 'payment_settings' || $page_name == 'smtp_settings' || $page_name == 'manage_language' || $page_name == 'about' || $page_name == 'themes' ): ?> active <?php endif; ?>">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="dripicons-toggles"></i>
                <span> <?php echo get_phrase('settings'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li class="<?php if($page_name == 'system_settings') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/system_settings'); ?>"><?php echo get_phrase('system_settings'); ?></a>
                </li>
                <li class="<?php if($page_name == 'frontend_settings') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/frontend_settings'); ?>"><?php echo get_phrase('website_settings'); ?></a>
                </li>
                <?php if (addon_status('certificate')): ?>
                <li class="<?php if($page_name == 'certificate_settings') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('addons/certificate/settings'); ?>"><?php echo get_phrase('certificate_settings'); ?></a>
                </li>
                <?php endif; ?>
                <?php if (addon_status('amazon-s3')): ?>
                <li class="<?php if($page_name == 's3_settings') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('addons/amazons3/settings'); ?>"><?php echo get_phrase('s3_settings'); ?></a>
                </li>
                <?php endif; ?>
                <?php if (addon_status('live-class')): ?>
                <li class="<?php if($page_name == 'live_class_settings') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('addons/liveclass/settings'); ?>"><?php echo get_phrase('live_class_settings'); ?></a>
                </li>
                <?php endif; ?>
                <li class="<?php if($page_name == 'payment_settings') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/payment_settings'); ?>"><?php echo get_phrase('payment_settings'); ?></a>
                </li>
                <li class="<?php if($page_name == 'manage_language') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/manage_language'); ?>"><?php echo get_phrase('language_settings'); ?></a>
                </li>
                <li class="<?php if($page_name == 'smtp_settings') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/smtp_settings'); ?>"><?php echo get_phrase('smtp_settings'); ?></a>
                </li>
                <li class="<?php if($page_name == 'theme_settings') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/theme_settings'); ?>"><?php echo get_phrase('theme_settings'); ?></a>
                </li>
                <li class="<?php if($page_name == 'about') echo 'active'; ?>">
                    <a href="<?php echo site_url('admin/about'); ?>"><?php echo get_phrase('about'); ?></a>
                </li>
            </ul>
        </li>
        <?php endif; ?>

        <li class="side-nav-item <?php if ($page_name == 'manage_profile')echo 'active';?>">
            <a href="<?php echo site_url(strtolower($this->session->userdata('role') != 'user'?'admin':'user').'/manage_profile'); ?>"
                class="side-nav-link">
                <i class="dripicons-user"></i>
                <span><?php echo get_phrase('manage_profile'); ?></span>
            </a>
        </li>

    </ul>
</div>