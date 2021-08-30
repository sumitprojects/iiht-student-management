<!-- Slider starts -->
<?php include 'slider.php'; ?>
<!-- Slider ends -->
<!-- The black banner content starts -->
<div class="features clearfix">
    <div class="container">
        <ul>
            <a href="<?= site_url('home/courses'); ?>" class="">
            <li><i class="pe-7s-study"></i>
                <h4>
                    <?php
					$status_wise_courses = $this->crud_model->get_status_wise_courses();
					$number_of_courses = $status_wise_courses['active']->num_rows();
					echo $number_of_courses.' '.get_phrase('online_courses'); ?>
                </h4><span><?php echo get_phrase('explore_your_knowledge'); ?></span>
            </li>
            </a>
            <a href="<?= site_url('home/courses'); ?>" class="">
            <li><i class="pe-7s-cup"></i>
                <h4><?php echo get_phrase('expert_instruction'); ?></h4>
                <span><?php echo get_phrase('find_the_right_course_for_you'); ?></span>
            </li>
            </a>
            <a href="<?= site_url('home/courses'); ?>" class="">
            <li><i class="pe-7s-target"></i>
                <h4><?php echo get_phrase('limited_access'); ?></h4>
                <span><?php echo get_phrase('learn_on_your_schedule'); ?></span>
            </li>
            </a>
        </ul>
    </div>
</div>
<!-- The black banner content ends -->
<!-- Categories start -->
<div class="container my-5">
    <div class="main_title_2">
        <span><em></em></span>
        <h2><?php echo get_phrase('categories'); ?></h2>
        <p><?php echo get_phrase('get_category_wise_different_courses'); ?></p>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($this->crud_model->get_categories()->result_array() as $category):
			if($category['parent'] > 0)
			continue; ?>
        <!-- /grid_item -->
        <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
            <a href="<?php echo site_url('home/courses?category='.$category['slug']); ?>" class="grid_item">
                <figure class="block-reveal">
                    <div class="block-horizzontal"></div>
                    <img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/'.$category['thumbnail']); ?>"
                        class="img-fluid" alt="">
                    <div class="info">
                        <small><i class="ti-layers"></i>
                            <?php echo $this->crud_model->get_category_wise_courses($category['id'])->num_rows().' '.get_phrase('courses'); ?>
                        </small>
                        <h3><?php echo $category['name']; ?></h3>
                    </div>
                </figure>
            </a>
        </div>
        <!-- /grid_item -->
        <?php endforeach; ?>
    </div>
</div>
<!-- Categories end -->


<!-- Top Course Portion Starts -->
<?php include 'top_courses.php' ?>
<!-- Top Course Portion Ends -->
<div class="container-fluid my-5">
    <div class="main_title_2">
        <span><em></em></span>
        <h2><?php echo get_phrase('event_title'); ?></h2>
        <p><?php echo get_phrase('event_description'); ?>.</p>
    </div>
    <div class="owl-carousel-event owl-carousel owl-theme">
        <?php 
		$event_schedule = $this->crud_model->get_event_schedule()->result_array();
   
    foreach ($event_schedule as $event):
        if($event['status']=='schedule'):
    ?>
        <!-- Each Top Course Starts -->
        <div class="item">
            <div class="box_grid">
                <figure>
                    <a href="<?php echo site_url('home/event_registration/'.$event['id']); ?>"> <img src="<?php echo base_url('uploads/event/'.$event['event_image']); ?>" class="img-fluid" alt=""></a>
                </figure>
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-4">
                             <a href="<?php echo site_url('home/event_registration/'.$event['id']); ?>"></a><h3><?php echo $event['event_title'];?></h3></a>
                        </div>
                        <div class="col-md-4">
                             <p><?php echo $event['event_date'];?></p>
                        </div>
                        <div class="col-md-4">
                            <p><?php echo $event['event_time'];?></p>
                        </div>
                    </div>
                <ul>
                    <li>
                <a href="<?php echo site_url('home/event_registration/'.$event['id']); ?>" class="big-cart-button-1">
                    <?php  echo get_phrase('go_registration'); ?>
                </a>
                </li>
                </div>
            </div>
        </div>
        <!-- Each Top Course Ends -->
        <?php 
    endif;
    endforeach; ?>
    </div>
    <!-- /carousel -->
    <div class="container">
        <p class="btn_home_align"><a href="<?php echo site_url('home/event'); ?>"
                class="btn_1 rounded"><?php echo get_phrase('view_all_event'); ?></a></p>
    </div>
    <!-- /container -->
    <hr>
</div>
</div>
