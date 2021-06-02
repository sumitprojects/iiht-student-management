<!-- CTA Section -->
<div class="container space-bottom-2">
    <div class="text-center py-6"
        style="background: url(../assets/svg/components/abstract-shapes-19.svg) center no-repeat;">
        <h2>Find the right learning path for you</h2>
        <p>Answer a few questions and match your goals to our programs.</p>
        <span class="d-block mt-5">
            <a class="btn btn-primary transition-3d-hover" href="#">Explore by Category</a>
        </span>
    </div>
</div>
<!-- End CTA Section -->
<footer class="bg-light">
    <div class="container">
        <div class="space-top-2 space-bottom-1 space-bottom-lg-2">
            <div class="row justify-content-lg-between">
                <div class="col-lg-3 ml-lg-auto mb-5 mb-lg-0">
                    <!-- Logo -->
                    <div class="mb-4">
                        <a href="<?php echo site_url('home'); ?>" aria-label="Front">
                            <img class="brand"
                                src="<?php echo base_url('uploads/system/'.get_frontend_settings('light_logo')); ?>"
                                alt="Logo">
                        </a>
                    </div>
                    <!-- End Logo -->

                    <!-- Nav Link -->
                    <ul class="nav nav-sm nav-x-0 flex-column">
                        <li class="nav-item">
                            <a class="nav-link media" href="#">
                                <?php echo get_settings('address'); ?>
                            </a>
                        </li>

                    </ul>
                    <!-- End Nav Link -->
                </div>

                <div class="col-6 col-md-3 col-lg mb-5 mb-lg-0">
                    <h5>Company</h5>

                    <!-- Nav Link -->
                    <ul class="nav nav-sm nav-x-0 flex-column">
                        <li class="nav-item"><a class="nav-link"
                                href="<?php echo site_url('home/about'); ?>"><?php echo get_phrase('about'); ?></a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="<?php echo site_url('home/careers'); ?>"><?php echo get_phrase('careers'); ?>
                                <span class="badge badge-primary ml-1">We're hiring</span></a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="<?php echo site_url('home/blog'); ?>"><?php echo get_phrase('blog'); ?></a></li>
                    </ul>
                    <!-- End Nav Link -->
                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="space-1">
            <!-- <div class="row align-items-md-center mb-7">
                <div class="col-md-6 mb-4 mb-md-0">
                    <!-- Nav Link -->
            <ul class="nav nav-sm nav-x-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo site_url('home/privacy_policy'); ?>"><?php echo get_phrase('privacy_policy'); ?></a>
                </li>
                <li class="nav-item opacity mx-3">&#47;</li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo site_url('home/terms'); ?>"><?php echo get_phrase('terms'); ?></a>
                </li>
                <li class="nav-item opacity mx-3">&#47;</li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo site_url('home/site_map'); ?>"><?php echo get_phrase('site_map'); ?></a>
                </li>
            </ul>
            <!-- End Nav Link -->
        </div>

        <div class="col-md-6 text-md-right">
            <ul class="list-inline mb-0">
                <!-- Social Networks -->
                <li class="list-inline-item">
                    <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                        <i class="fab fa-google"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
                <!-- End Social Networks -->

                <!-- Language -->
                <li class="list-inline-item">
                    <div class="hs-unfold">
                        <a class="js-hs-unfold-invoker dropdown-toggle btn btn-xs btn-soft-secondary"
                            href="javascript:;" data-hs-unfold-options='{
                        "target": "#footerLanguage",
                        "type": "css-animation",
                        "animationIn": "slideInDown"
                       }'>
                            <img class="dropdown-item-icon" src="../assets/vendor/flag-icon-css/flags/4x3/us.svg"
                                alt="United States Flag">
                            <span>United States</span>
                        </a>

                        <div id="footerLanguage"
                            class="hs-unfold-content dropdown-menu dropdown-unfold dropdown-menu-bottom mb-2">
                            <a class="dropdown-item active" href="#">English</a>
                            <a class="dropdown-item" href="#">Deutsch</a>
                            <a class="dropdown-item" href="#">Español</a>
                            <a class="dropdown-item" href="#">Français</a>
                            <a class="dropdown-item" href="#">Italiano</a>
                            <a class="dropdown-item" href="#">日本語</a>
                            <a class="dropdown-item" href="#">한국어</a>
                            <a class="dropdown-item" href="#">Nederlands</a>
                            <a class="dropdown-item" href="#">Português</a>
                            <a class="dropdown-item" href="#">Русский</a>
                        </div>
                    </div>
                </li>
                <!-- End Language -->
            </ul>
        </div>
    </div> -->

    <!-- Copyright -->
    <div class="w-md-75 text-lg-center mx-lg-auto">
        <p class="text-muted small">&copy; © <a href="<?php echo get_settings('footer_link'); ?>"
                style="color: unset;"><?php echo get_settings('system_name').' | '.get_phrase('version').' : '.get_settings('version'); ?></a>
        </p>
    </div>
    <!-- End Copyright -->
    </div>
    </div>
</footer>