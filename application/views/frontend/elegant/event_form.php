<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
?>
<section id="hero_in" class="general">
	<div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;"></div>
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span><?php echo get_phrase('event_registration'); ?></h1>
		</div>
	</div>
</section>
<?php $event_schedule = $this->crud_model->get_event_schedule($param1)->row_array(); ?>
<div class="container text-center" style="margin:0 auto;">
    <?php if(!empty($event_schedule['event_image'])): ?>
        <figure>
            <img src="<?php echo base_url('uploads/event/'.$event_schedule['event_image']); ?>" class="img-fluid" alt="">
        </figure>
    <?php endif; ?>
    <?php if(!empty($event_schedule['event_description'])): ?>
        <p>
            <?php echo $event_schedule['event_description']; ?>
        </p>
    <?php endif; ?>
    <?php if(!empty($event_schedule['event_presentor'])): ?>
    <h2><?php echo get_phrase('event_presentor'); ?>: <?php echo $event_schedule['event_presentor']; ?></h2>
    <?php endif; ?>
</div>
<div class="container mt-5">
    <div class="main_title_2">
        <span><em></em></span>
        <h2><?php echo get_phrase('event_registration'); ?></h2>
        <p><?php echo get_phrase('please_fill_all_detail'); ?></p>
    </div>
    <form action="<?= site_url('home/event_registration/'.$e_id.'/register') ?>" method="post">
        <input type="hidden" name="e_id" value="<?=$e_id ?>">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fullname" name="fullname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="organization_name" class="col-sm-2 col-form-label">Organization Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="organization_name" name="organization_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="phone_number" name="phone_number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Register</button>
            </div>
        </div>
    </form>
</div>
