<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<footer class="d-print-none">
  <div class="container pt-5">
    <div class="row">
      <div class="col-lg-4 col-md-12 p-r-5">
        <p><img src="<?php echo base_url('uploads/system/'.get_frontend_settings('light_logo')); ?>" style="width:100px;height:auto" data-retina="true" alt=""></p>
        <p><?php echo get_settings('slogan').'<br/>'.get_settings('address'); ?></p>
      </div>
      <div class="col-lg-2">
        <p>Follow us</p>
         <div class="follow_us">
          <ul>
            <li style="font-size:20px"><a href="https://www.facebook.com/KGK-Academy-103169828574204/"><img src="https://image.flaticon.com/icons/png/512/1384/1384053.png" height="20" width="20"></a></li>
            <li style="font-size:20px"><a href="https://www.instagram.com/kgk_academy/"><img src="https://image.flaticon.com/icons/png/512/2111/2111463.png" height="20" width="20"/> </a></li>
            <li style="font-size:20px"><a href="https://www.google.com/search?q=kgk+academy+foundation&oq=kgk+academy+foundation&aqs=chrome..69i57j69i61.7788j0j7&sourceid=chrome&ie=UTF-8#"><img src="https://image.flaticon.com/icons/png/512/281/281764.png" height="20" width="20"/></a></li>
          </ul>
          <p><a href="https://web.whatsapp.com/send?phone=+91%2098539%2085336&text=Hello!" class="text-white"><img src="https://image.flaticon.com/icons/png/512/733/733585.png" height="20" width="20"></i>&nbsp;+91&nbsp;9853-9853-36</a></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 ml-lg-auto">
        <h5><?php echo get_phrase('useful_links'); ?></h5>
        <ul class="links">
          <li><a href="<?php echo site_url('home/courses'); ?>"><?php echo get_phrase('courses'); ?></a></li>
          <li><a href="<?php echo site_url('home/login'); ?>"><?php echo get_phrase('login'); ?></a></li>
          <li><a href="<?php echo site_url('home/sign_up'); ?>"><?php echo get_phrase('register'); ?></a></li>
          <?php $enroll=$this->user_model->get_user($this->session->userdata('user_id'))->row_array();
          if($this->session->userdata('user_login') == '1' && $this->session->userdata('is_instructor') == '0' && $enroll['process_mode'] == 'offline'){
            $u_id=$this->session->userdata('user_id');?>
          <li><a href="<?php echo site_url('home/leave_apply/'.$u_id); ?>"><?php echo get_phrase('view_apply'); ?></a></li>
          <?php } ?>
          <?php 
          
          if($this->session->userdata('is_instructor') == '1'): ?>
          <li><a href="<?php echo site_url('home/student_view/'); ?>"><?php echo get_phrase('view_student'); ?></a></li>
          <?php  endif;  ?>
          <li><a href="<?php echo site_url('home/career'); ?>"><?php echo get_phrase('career'); ?></a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <h5><?php echo get_phrase('contact_with_us'); ?></h5>
        <ul class="contacts">
          <li><a href="tel://<?php echo get_settings('phone'); ?>"><img src="https://image.flaticon.com/icons/png/512/724/724664.png" height="20" width="20"> <?php echo get_settings('phone'); ?></a></li>
          <li><a href="mailto:<?php echo get_settings('system_email'); ?>"><img src="https://image.flaticon.com/icons/png/512/732/732200.png" height="20" width="20"> <?php echo get_settings('system_email'); ?></a></li>
        </ul>
        <!-- <div id="newsletter">
          <h6>Newsletter</h6>
          <div id="message-newsletter"></div>
          <form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
            <div class="form-group">
              <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
              <input type="submit" value="Submit" id="submit-newsletter">
            </div>
          </form>
        </div> -->
      </div>
    </div>
    <!--/row-->
    <hr>
    <div class="row">
      <div class="col-md-8">
        <ul id="additional_links">
          <li><a href="<?php echo site_url('home/terms_and_condition'); ?>"><?php echo get_phrase('terms_&_conditions'); ?></a></li>
          <li><a href="<?php echo site_url('home/privacy_policy'); ?>"><?php echo get_phrase('privacy_policy'); ?></a></li>
          <li><a href="<?php echo site_url('home/about_us'); ?>"><?php echo get_phrase('about_us'); ?></a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <div id="copy">© <a href="<?php echo get_settings('footer_link'); ?>" style="color: unset;">KgkAcademy. Developed By : <a href="https://techeasify.com">TechEasify</a> </div>
      </div>
    </div>
  </div>
</footer>
