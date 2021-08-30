<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
?>
<section id="hero_in" class="general">
	<div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;"></div>
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span><?php echo get_phrase('directors'); ?></h1>
		</div>
	</div>
</section>
<div class="main_title_2 mt-5">
    <span><em></em></span>
    <h2>DIRECTORS</h2>
</div>
<div class="container mb-5">
    <div class="row">
        <div class="col-lg-4 offset-md-1">
            <div class="card">
                <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/about_us/mr_navrattan_kothari.png'); ?>" alt="Card image cap"  style="height:375px !important; width:100% !important; object-fit:cover; object-position:top;">
                <div class="card-body text-center">
                  <h5 class="card-title">MR. NAVRATTAN KOTHARI</h5>
                   <p class="card-text">DIRECTOR</p>
                  <p class="card-title"><span class="text-dark">At KGK Academy Foundation, our vision is to accelerate the
                    educational quotient of the gems & jewellery industry. KGK
                    Academy's educational programs address the need of the hour
                    and foster the youth by promoting self-employment.
                    </span></p>
                  
                </div>
            </div>
        </div>
        <!--offset-md-4-->
        <div class="col-lg-4 offset-md-2">
             <div class="card">
                <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/about_us/mr_sampat_kothari.jpg'); ?>" alt="Card image cap" style="height:375px !important; width:100% !important; object-fit:cover; object-position:top;">
                <div class="card-body text-center">
                  <h5 class="card-title">Mr. Sampat Kothari</h5>
                  <p class="card-text">DIRECTOR</p>
                  <p class="card-text"><span class="text-dark">In an expansion towards comprehensive growth, KGK has
                    inaugurated KGK Academy Foundation. It is geared towards
                    bringing the youth into the jewellery manufacturing industry
                    and provide access to quality education using a multi-pronged
                    approach.</span></p>
                </div>
            </div>
        </div>
        
    </div>
    
</div>
