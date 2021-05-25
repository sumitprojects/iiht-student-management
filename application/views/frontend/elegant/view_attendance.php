<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
$view_attendance= $this->crud_model->get_attendance('',$s_id)->result_array();
?>
<section id="hero_in" class="general">
    <div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;">
    </div>
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span><?php echo get_phrase('view_attendance'); ?></h1>
        </div>
    </div>
</section>
<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('view_attendance_list'); ?>
                    <a href="<?php echo site_url('home/student_view'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_student_list'); ?></a>
                    </h4>
                    <div class="table-responsive-sm mt-4">
                        <?php if (count($view_attendance) > 0): ?>
                        <table id="assetusers" data-filter="2,3,4,5" class="table table-striped dt-responsive nowrap"
                            width="100%" data-page-length='25'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo get_phrase('student'); ?></th>
                                    <th><?php echo get_phrase('entry_date'); ?></th>
                                    <th><?php echo get_phrase('remark'); ?></th>
                                    <th><?php echo get_phrase('att_status'); ?></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($view_attendance as $key => $br):
                                    
                                    ?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td>
                                    <?php $user = $this->user_model->get_user($br['user_id'])->row_array();?>
                                        <strong><?php echo ellipsis($user['first_name'].' '. $user['last_name']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['entry_date']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['remark']); ?></strong><br>
                                    </td>
                                    <td>
                                        <strong><?php echo ellipsis($br['att_status']); ?></strong><br>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                        <?php if (count($view_attendance) == 0): ?>
                        <div class="img-fluid w-100 text-center">
                            <img style="opacity: 1; width: 100px;"
                                src="<?php echo base_url('view_attendance/backend/images/file-search.svg'); ?>"><br>
                            <?php echo get_phrase('no_data_found'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>