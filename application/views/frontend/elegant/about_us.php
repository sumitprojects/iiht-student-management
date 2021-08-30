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
<div class="container mb-5 mt-5 text-center">
<p style="font-size:18px">
    Academy’s vision is to give industry and the students an institute that helps fulfil their needs
through the well-structured courses which aims to give the industry a place to find good talent
and give the next generation good grounding in Gems &Jewellery Sector. The institute has the
best faculty and infrastructure in the field to impart good training to its students.
</p>
<p style="font-size:18px">
   The institute is backed by the KGK Group, which has years of global expertise in the field. The
institute gains a lot from KGK’s knowledge of the global trade and helps design courses to meet
the industry’s needs for decades to come.
</p>
</div>
