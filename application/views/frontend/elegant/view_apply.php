<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
$apply_leave= $this->crud_model->get_leave('',$u_id)->result_array();

?>
<section id="hero_in" class="general">
	<div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;"></div>
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span><?php echo get_phrase('leave_apply'); ?></h1>
		</div>
	</div>
</section>
<div class="container">
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('leave_apply'); ?>
                    <a href="<?php echo site_url('home/leave_apply/request/'.$u_id); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('leave_apply'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('apply_leave_list'); ?>
                </h4>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($apply_leave) > 0): ?>
                    <table id="assetusers" data-filter="2,3,4,5" class="table table-striped dt-responsive nowrap" width="100%"
                        data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('student'); ?></th>
                                <th><?php echo get_phrase('start_date'); ?></th>
                                <th><?php echo get_phrase('end_date'); ?></th>
                                <th><?php echo get_phrase('reason'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($apply_leave as $key => $br):?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td>
                                <?php $user = $this->user_model->get_user($br['user_id'])->row_array();?>
                                <strong><?php echo strtoupper(ellipsis($user['first_name'].' '.$user['last_name'])); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['start_date']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['end_date']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['reason']); ?></strong><br>
                                </td>
                                <td>
                                    <strong><?php echo ellipsis($br['att_status']); ?></strong><br>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($apply_leave) == 0): ?>
                    <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;"
                            src="<?php echo base_url('apply_leave/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>