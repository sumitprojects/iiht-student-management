<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
$student_view= $this->crud_model->get_enrol_data()->result_array();

?>
<section id="hero_in" class="general">
    <div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;">
    </div>
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span><?php echo get_phrase('leave_apply'); ?></h1>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('add_attendance'); ?>
                    <!-- href="<?php //echo site_url('admin/asset_for_customer_form/add_asset_for_customer'); ?>" -->
                    <a href="<?php echo site_url('home/manage_attendance/add_attendance/'); ?>" style="float:right"
                        class="mr-2 btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('add_attendance'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('student_view_list'); ?>
                    </h4>
                    <div class="table-responsive-sm mt-4">
                        <?php if (count($student_view) > 0): ?>
                        <table id="assetusers" data-filter="2,3,4,5" class="table table-striped dt-responsive nowrap"
                            width="100%" data-page-length='25'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo get_phrase('student'); ?></th>
                                    <th><?php echo get_phrase('course'); ?></th>
                                    <th><?php echo get_phrase('instructor'); ?></th>
                                    <th><?php echo get_phrase('action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($student_view as $key => $br):
                              
                                    if($this->session->userdata('user_id') == $br['instructor_id']):
                                    ?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td>

                                        <strong><?php echo ellipsis($br['full_name']); ?></strong><br>
                                    </td>

                                    <td>
                                        <strong><?php echo ellipsis($br['course_name']); ?></strong><br>
                                    </td>
                                    <td>

                                        <?php  $instructors=$this->user_model->get_instructor($br['instructor_id'])->row_array();?>
                                        <strong><?php echo ellipsis($instructors['first_name'].' '.$instructors['last_name']); ?></strong><br>
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="<?php echo site_url('home/student_view/request/'.$br['id']); ?>"><?php echo get_phrase('view_attendance');?></a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="<?php echo site_url('home/student_view/leave/'.$br['user_id']); ?>"><?php echo get_phrase('view_leave_request');?></a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="<?php echo site_url('home/student_view/evolution/'.$br['user_id']); ?>"><?php echo get_phrase('view_evolution');?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                            endif;
                            endforeach; ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                        <?php if (count($student_view) == 0): ?>
                        <div class="img-fluid w-100 text-center">
                            <img style="opacity: 1; width: 100px;"
                                src="<?php echo base_url('student_view/backend/images/file-search.svg'); ?>"><br>
                            <?php echo get_phrase('no_data_found'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>