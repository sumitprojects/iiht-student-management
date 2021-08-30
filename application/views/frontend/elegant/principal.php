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
    <h2>PRINCIPAL</h2>
</div>

<div class="row mt-5 mb-5">
        
        <div class="col-lg-4 offset-md-2">
             <div class="card">
                 <a href="<?=site_url('home/instructor_page/80')?>">
                    <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/about_us/mr_ankit_bhojak_kgk_principal.jpg'); ?>" alt="Card image cap" style="height:100% !important; width:100% !important; object-fit:cover; object-position:top;">
                 </a>
                <div class="card-body text-center">
                  <h5 class="card-title">MR. ANKIT BHOJAK</h5>
                  <p class="card-text"><b>PRINCIPAL</b></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4" style="font-size:18px;color:#2b2b2b;">
            <p>Education is very important aspect of any individual’s life. Being KGK Academy, we aim at high-quality learning environment and unrivalled expertise in Gems & Jewellery disciplines.</p>
            <p>We aim to cultivate not only Technical skills in our students but also to develop Managerial qualities in them. This takes place through our inter-curriculum Seminars & Workshops on various subjects such as Personality Development, Email Etiquettes, Time Management, Public Speaking, Creativity, and so on.</p> 
            <p>It is my strong belief that “A circle doesn’t gets completed at the end his/her curriculum but it gets completed when any Student get the relevant placement in the industry.</p>
            Through our industry oriented training, we fulfill our initiative to increase the skilled manpower for Gems & Jewellery industry in the country besides encouraging inclusive and sustainable economic growth and livelihood for all.</p>
            <p>Our ‘Out of the Box’ thinking makes our Students & Academy stand out from the que.</p>
            <strong>-Ankit Bhojak, Principal, KGK Academy</strong>
        </div>
</div>