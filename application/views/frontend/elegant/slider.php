<?php
	$this->load->helper('directory');
	$latest_courses = directory_map('./uploads/slider_images/', 0);
 ?>
 <style>#slider.flexslider .flex-direction-nav {opacity: 1;display: block;}</style>
<section class="slider">
	<div id="slider" class="flexslider">
		<ul class="slides">
			<?php foreach ($latest_courses as $key => $latest_course): ?>
				<li>
					<a href="<?php echo site_url('home/courses?category=course'); ?>">
						<img src="<?php echo base_url().'/uploads/slider_images/'.$latest_course; ?>" alt="<?=$latest_course?>">
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<div id="icon_drag_mobile"></div>
	</div>
</section>
