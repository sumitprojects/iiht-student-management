<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$about_us_banner = $banners['about_us_banner'];
?>
<section id="hero_in" class="general">
	<div class="banner-img" style="background: url(<?php echo base_url($about_us_banner); ?>) center center no-repeat;"></div>
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span><?php echo get_phrase('career'); ?></h1>
		</div>
	</div>
</section>
<section class="mb-4 container 
contact-us">
    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4"><?=$page_title?></h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Start your Career with KGK Academy.</p>

    <div class="row">
        <div class="col-md-12  mt-5 mb-5">
            <h3><?=$page_title?></h3>
            <form action="<?= site_url('home/career/apply') ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="<?php echo get_phrase('first_name*'); ?>" required pattern="[a-zA-Z]{1,}">
                             <label for="last_name"></label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                             <input type="text" id="last_name" name="last_name" class="form-control" placeholder="<?php echo get_phrase('last_name*'); ?>" required pattern="[a-zA-Z]{1,}">
                              <label for="last_name"></label>
                          
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                             <input type="text" id="mob_no" name="mob_no" class="form-control" placeholder="<?php echo get_phrase('mob_no'); ?>" pattern="[0-9]{1,}">
                             <label for="mob_no"></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                             <input type="text" id="email" name="email" class="form-control" placeholder="<?php echo get_phrase('email'); ?>">
                             <label for="email"></label>
                        </div>
                    </div>
                </div>
                 <div class="row">
                     <div class="col-md-12">
                      <div class="md-form">
                        <label> <?php echo get_phrase('resume'); ?></label>
                        <input type="file" class="form-control" id="resume" name="document" style="padding: 5px 8px;">
                        <small id="attachment-help" class="form-text text-muted"><?php echo get_phrase('if_any_document_you_want_to_share'); ?> ( .doc, .docs, .pdf) <?php echo get_phrase('are_accepted'); ?></small>
                      </div>
                      </div>
                </div>
                 <div class="text-center text-md-left">
                       <button type="submit" class="mb-2"><?php echo get_phrase('apply_now'); ?></button>
                 </div>
                 <div class="status"></div>
            </form>
        </div>
    </div>
</section>
<!--Section: Career v.1-->