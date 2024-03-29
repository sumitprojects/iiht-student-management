<!-- Slider starts -->
<?php include 'slider.php'; ?>
<!-- Slider ends -->

<!-- The black banner content starts -->
<div class="features clearfix">
    <div class="container">
        <ul>
            <li><i class="pe-7s-study"></i>
                <h4>
                    <?php
					$status_wise_courses = $this->crud_model->get_status_wise_courses();
					$number_of_courses = $status_wise_courses['active']->num_rows();
					echo $number_of_courses.' '.get_phrase('online_courses'); ?>
                </h4><span><?php echo get_phrase('explore_your_knowledge'); ?></span>
            </li>
            <li><i class="pe-7s-cup"></i>
                <h4><?php echo get_phrase('expert_instruction'); ?></h4>
                <span><?php echo get_phrase('find_the_right_course_for_you'); ?></span>
            </li>
            <li><i class="pe-7s-target"></i>
                <h4><?php echo get_phrase('limited_access'); ?></h4>
                <span><?php echo get_phrase('learn_on_your_schedule'); ?></span>
            </li>
        </ul>
    </div>
</div>
<!-- The black banner content ends -->

<!-- Top Course Portion Starts -->
<?php include 'top_courses.php' ?>
<!-- Top Course Portion Ends -->

<!-- Categories start -->
<div class="container margin_30_95">
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
<div class="container margin_30_95">
    <div class="row">
        <?php 
		$event_schedule = $this->crud_model->get_event_schedule()->result_array();
		
			foreach($event_schedule as $event):
				if($event['status']=='schedule'):
		?>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                <div class="media">
                 <?php $user = $this->user_model->get_user($event['event_presentor'])->row_array();?>
                <div class="media-body">
                    <h3 class="mt-0 mb-1"><?php echo $event['event_title'];?></h3>
                    <p class="card-text"><?php echo $user['first_name'] .' '.$user['last_name'];?></p>
                    <p class="card-text"><?php echo $event['event_date'];?></p>
                    <p class="card-text"><?php echo $event['event_time'];?></p>
                    <a href="<?php echo site_url('home/event_registration/'.$event['id']); ?>" class="btn btn-primary">Go registration</a>
                </div>
                <img class="ml-3" src="<?php echo base_url('uploads/event/'.$event['event_image']); ?>" alt="event image" style="height:auto; width:200px;">
                </div>
                   
                </div>
            </div>
        </div>
        <?php
		endif;
	endforeach; 
		?>
    </div>
</div>