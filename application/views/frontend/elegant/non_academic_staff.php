<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
?>
<section id="hero_in" class="general">
	<div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;"></div>
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span><?php echo get_phrase('about').' '.get_settings('system_name'); ?></h1>
		</div>
	</div>
</section>
<div class="main_title_2 mt-5">
    <span><em></em></span>
    <h2>NON-ACADEMIC STAFF</h2>
</div>
<div class="container mb-5">
    <div class="row">
        <div class="col-lg-4 offset-md-1">
            <div class="card">
                <a href="<?=site_url('home/instructor_page/86')?>">
                <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/about_us/ms_ishita_bhatt.jpg'); ?>" alt="Card image cap" style="height:375px !important; width:100% !important; object-fit:cover; object-position:top;">
                </a>
                <div class="card-body text-center">
                  <h5 class="card-title">MS. ISHITA BHATT</h5>
                  <p class="card-text">EXECUTIVE</p>
                </div>
            </div>
        </div>
        <!--offset-md-4-->
        <div class="col-lg-4 offset-md-2">
             <div class="card">
                <a href="<?=site_url('home/instructor_page/87')?>">
                <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/about_us/mr_deepak_sethia.jpg'); ?>" alt="Card image cap" style="height:375px !important; width:100% !important; object-fit:cover; object-position:center;">
                </a>
                <div class="card-body text-center">
                  <h5 class="card-title">MR. DEEPAK SETHIA</h5>
 
                  <p class="card-text">T&D CO-ORDINATOR</p>
                </div>
            </div>
        </div>
    </div>
</div>
