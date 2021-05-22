<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
?>
<section id="hero_in" class="general">
	<div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;"></div>
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span><?php echo get_phrase('leave_apply'); ?></h1>
            
		</div>
	</div>
</section>

<div class="container margin_120_95">
    <div class="main_title_2">
        <span><em></em></span>
        <h2><?php echo get_phrase('leave_apply'); ?></h2>
        <p><?php echo get_phrase('please_fill_all_detail'); ?></p>
        <a href="<?php echo site_url('home/leave_apply/'.$u_id); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i
                                class="mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_leave_list'); ?></a>
    </div>
    
    <form action="<?= site_url('home/leave_apply/leave') ?>" method="post">
        
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 col-form-label">End Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 col-form-label">Reason</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="reason" name="reason">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Leave Apply</button>
            </div>
        </div>
    </form>
</div>