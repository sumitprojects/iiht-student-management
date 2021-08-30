<section id="hero_in" class="courses pb-5 mb-5">
	<div class="banner-img" style=""></div>
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span><?php echo get_phrase('event'); ?></h1>
		</div>
	</div>
</section>
    <!-- Courses Section -->
<div class="container  margin_24_10">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3"><?php echo get_phrase('event'); ?>
                        <!-- <a href="" class="alignToTitle"
                            id="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a> -->
                    </h4>
                <!-- Table -->
                    <table class="table datatable event_view">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo get_phrase('event_title'); ?></th>
                            <th scope="col"><?php echo get_phrase('event_date_time'); ?></th>
                            <th scope="col"><?php echo get_phrase('event_presentor'); ?></th>
                            <th scope="col"><?php echo get_phrase('event_link'); ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $event=$this->crud_model->get_event_schedule()->result_array();
                        foreach ($event as $key => $br):
                            
                            
                            if($br['status']=='pending' || $br['status']=='schedule'):
                        ?>
                        <tr>
                            <td><?php echo ++$key; ?></td>
                            <td><a href="<?php echo base_url('uploads/event/'.$br['event_image']); ?>" target="_blank"><?php echo strtoupper($br['event_title']); ?></a></td>
                             <td><?php echo strtoupper($br['event_date']); ?><br><?php echo strtoupper($br['event_time']); ?></td>
                             <?php $pres=$this->user_model->get_user($br['event_presentor'])->row_array(); ?>
                             <td><?php echo $pres['first_name'].' '.$pres['last_name'] ?></td>
                            <td><a href="<?php echo $br['event_link']; ?>" target="_blank" class="big-cart-button-1"><?php echo get_phrase('event_link'); ?></a></td>
                           
                        </tr>
                        <?php endif; ?>
                        
                        <?php
                    endforeach; ?>

                    </tbody>
                </table>
                <!-- Table -->
                </div>
            </div>
        <!-- Card -->
        </div>
    </div>
</div>
        