<header id="header" class="header left-aligned-navbar">
    <div class="header-section">
    
      <div id="logoAndNav" class="container mt-lg-n2">
        <!-- Nav -->
        <nav class="js-mega-menu navbar navbar-expand-lg">
          <div class="navbar-nav-wrap">
            <!-- Logo -->
            <a class="navbar-brand navbar-nav-wrap-brand" href="<?php echo site_url('home'); ?>" aria-label="Front">
              <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('light_logo')); ?>" alt="Logo">
            </a>
            <!-- End Logo -->

            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-content">
              <!-- Search Classic -->
              <div class="hs-unfold d-lg-none d-inline-block position-static">
                <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-icon rounded-circle mr-1" href="javascript:;"
                   data-hs-unfold-options='{
                      "target": "#searchClassic",
                      "type": "css-animation",
                      "animationIn": "slideInUp"
                     }'>
                  <i class="fas fa-search"></i>
                </a>

                <div id="searchClassic" class="hs-unfold-content dropdown-menu w-100 shadow border-0 rounded-0 px-3 mt-0">
                  <form class="input-group input-group-sm input-group-merge">
                    <input type="text" class="form-control" placeholder="What do you want to learn?" aria-label="What do you want to learn?">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <i class="fas fa-search"></i>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Search Classic -->

              <!-- Login Button -->
              <div class="d-inline-block ml-auto">
                <!-- Unfold -->
                <a class="js-hs-unfold-invoker btn btn-sm btn-primary" href="javascript:;"
                   data-hs-unfold-options='{
                    "target": "#sidebarContent",
                    "type": "css-animation",
                    "animationIn": "fadeInRight",
                    "animationOut": "fadeOutRight",
                    "hasOverlay": "rgba(55, 125, 255, 0.1)",
                    "smartPositionOff": true
                   }'>
                  <span class="d-none d-lg-inline-block">Get Started</span>
                  <i class="fas fa-user-circle d-lg-none"></i>
                </a>
                <!-- End Unfold -->
              </div>
              <!-- End Login Button -->
            </div>
            <!-- End Secondary Content -->

            <!-- Responsive Toggle Button -->
            <button type="button" class="navbar-toggler navbar-nav-wrap-navbar-toggler btn btn-icon btn-sm rounded-circle"
                    aria-label="Toggle navigation"
                    aria-expanded="false"
                    aria-controls="navBar"
                    data-toggle="collapse"
                    data-target="#navBar">
                <span class="navbar-toggler-default">
                  <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z"/>
                  </svg>
                </span>
              <span class="navbar-toggler-toggled">
                  <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                  </svg>
                </span>
            </button>
            <!-- End Responsive Toggle Button -->

            <!-- Navigation -->
            <div id="navBar" class="navbar-nav-wrap-navbar collapse navbar-collapse">
              <ul class="navbar-nav">
                <!-- Courses -->
                <li class="hs-has-sub-menu navbar-nav-item">
                  <a id="coursesMegaMenu" class="hs-mega-menu-invoker nav-link" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="coursesSubMenu">
                    <i class="fa fa-th font-size-1 mr-1"></i> Courses
                  </a>

                  <!-- Courses - Submenu -->
                  <div id="coursesSubMenu" class="hs-sub-menu dropdown-menu" aria-labelledby="coursesMegaMenu" style="min-width: 270px;">
                    <!-- Development -->
                    <div class="hs-has-sub-menu">
                      <a id="navLinkCoursesDevelopment" class="hs-mega-menu-invoker dropdown-item dropdown-item-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuCoursesDevelopment">
                        <span class="min-w-4rem text-center opacity-lg mr-1">
                          <i class="fa fa-laptop-code font-size-1 mr-1"></i>
                        </span> Development
                      </a>

                      <div id="navSubmenuCoursesDevelopment" class="hs-sub-menu dropdown-menu" aria-labelledby="navLinkCoursesDevelopment" style="min-width: 270px;">
                        <a class="dropdown-item" href="#">All Web Development</a>
                        <a class="dropdown-item" href="#">Web Development</a>
                        <a class="dropdown-item" href="#">Mobile apps</a>
                        <a class="dropdown-item" href="#">Programming languages</a>
                        <a class="dropdown-item" href="#">Game development</a>
                        <a class="dropdown-item" href="#">Databases</a>
                        <a class="dropdown-item" href="#">Software testing</a>
                        <a class="dropdown-item" href="#">Other</a>
                      </div>
                    </div>
                    <!-- End Development -->

                    <!-- Business -->
                    <div class="hs-has-sub-menu">
                      <a id="navLinkCoursesBusiness" class="hs-mega-menu-invoker dropdown-item dropdown-item-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuCoursesBusiness">
                        <span class="min-w-4rem text-center opacity-lg mr-1">
                          <i class="fa fa-chart-bar font-size-1 mr-1"></i>
                        </span> Business
                      </a>

                      <div id="navSubmenuCoursesBusiness" class="hs-sub-menu dropdown-menu" aria-labelledby="navLinkCoursesBusiness" style="min-width: 270px;">
                        <a class="dropdown-item" href="#">All Business</a>
                        <a class="dropdown-item" href="#">Finance</a>
                        <a class="dropdown-item" href="#">Entrepreneurship</a>
                        <a class="dropdown-item" href="#">Communications</a>
                        <a class="dropdown-item" href="#">Management</a>
                        <a class="dropdown-item" href="#">Sales</a>
                        <a class="dropdown-item" href="#">Strategy</a>
                        <a class="dropdown-item" href="#">Operations</a>
                        <a class="dropdown-item" href="#">Project management</a>
                        <a class="dropdown-item" href="#">Business law</a>
                        <a class="dropdown-item" href="#">Data &amp; Analytics</a>
                        <a class="dropdown-item" href="#">Other</a>
                      </div>
                    </div>
                    <!-- Business -->

                    <!-- Finance & Accounting -->
                    <div class="hs-has-sub-menu">
                      <a id="navLinkCoursesFinanceAccounting" class="hs-mega-menu-invoker dropdown-item dropdown-item-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuCoursesFinanceAccounting">
                        <span class="min-w-4rem text-center opacity-lg mr-1">
                          <i class="fa fa-wallet font-size-1 mr-1"></i>
                        </span> Finance &amp; Accounting
                      </a>

                      <div id="navSubmenuCoursesFinanceAccounting" class="hs-sub-menu dropdown-menu" aria-labelledby="navLinkCoursesFinanceAccounting" style="min-width: 270px;">
                        <a class="dropdown-item" href="#">All Finance &amp; Accounting</a>
                        <a class="dropdown-item" href="#">Accounting &amp; Bookkeeping</a>
                        <a class="dropdown-item" href="#">Compliance</a>
                        <a class="dropdown-item" href="#">Economics</a>
                        <a class="dropdown-item" href="#">Finance</a>
                        <a class="dropdown-item" href="#">Other</a>
                      </div>
                    </div>
                    <!-- End Finance & Accounting -->

                    <!-- IT & Software -->
                    <div class="hs-has-sub-menu">
                      <a id="navLinkCoursesITSoftware" class="hs-mega-menu-invoker dropdown-item dropdown-item-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuCoursesITSoftware">
                        <span class="min-w-4rem text-center opacity-lg mr-1">
                          <i class="fa fa-desktop font-size-1 mr-1"></i>
                        </span> IT &amp; Software
                      </a>

                      <div id="navSubmenuCoursesITSoftware" class="hs-sub-menu dropdown-menu" aria-labelledby="navLinkCoursesITSoftware" style="min-width: 270px;">
                        <a class="dropdown-item" href="#">All IT &amp; Software</a>
                        <a class="dropdown-item" href="#">IT Sertification</a>
                        <a class="dropdown-item" href="#">Network &amp; security</a>
                        <a class="dropdown-item" href="#">Hardware</a>
                        <a class="dropdown-item" href="#">Operating systems</a>
                        <a class="dropdown-item" href="#">Other</a>
                      </div>
                    </div>
                    <!-- IT & Software -->

                    <!-- Design -->
                    <div class="hs-has-sub-menu">
                      <a id="navLinkDesignServices" class="hs-mega-menu-invoker dropdown-item dropdown-item-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuDesignServices">
                        <span class="min-w-4rem text-center opacity-lg mr-1">
                          <i class="fa fa-pencil-ruler font-size-1 mr-1"></i>
                        </span> Design
                      </a>

                      <div id="navSubmenuDesignServices" class="hs-sub-menu dropdown-menu" aria-labelledby="navLinkDesignServices" style="min-width: 270px;">
                        <a class="dropdown-item" href="#">All Design</a>
                        <a class="dropdown-item" href="#">Web design</a>
                        <a class="dropdown-item" href="#">Graphic design</a>
                        <a class="dropdown-item" href="#">Design tools</a>
                        <a class="dropdown-item" href="#">User experience</a>
                        <a class="dropdown-item" href="#">Game design</a>
                        <a class="dropdown-item" href="#">Design thinking</a>
                        <a class="dropdown-item" href="#">3D &amp; animation</a>
                        <a class="dropdown-item" href="#">Fashion</a>
                        <a class="dropdown-item" href="#">Architectural design</a>
                        <a class="dropdown-item" href="#">Interior design</a>
                        <a class="dropdown-item" href="#">Other</a>
                      </div>
                    </div>
                    <!-- Design -->

                    <!-- Marketing -->
                    <div class="hs-has-sub-menu">
                      <a id="navLinkCoursesMarketing" class="hs-mega-menu-invoker dropdown-item dropdown-item-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuCoursesMarketing">
                        <span class="min-w-4rem text-center opacity-lg mr-1">
                          <i class="fa fa-mail-bulk font-size-1 mr-1"></i>
                        </span> Marketing
                      </a>

                      <div id="navSubmenuCoursesMarketing" class="hs-sub-menu dropdown-menu" aria-labelledby="navLinkCoursesMarketing" style="min-width: 270px;">
                        <a class="dropdown-item" href="#">All Marketing</a>
                        <a class="dropdown-item" href="#">Digital marketing</a>
                        <a class="dropdown-item" href="#">Branding</a>
                        <a class="dropdown-item" href="#">Advertising</a>
                        <a class="dropdown-item" href="#">Other</a>
                      </div>
                    </div>
                    <!-- Marketing -->

                    <!-- Music -->
                    <div class="hs-has-sub-menu">
                      <a id="navLinkCoursesMusic" class="hs-mega-menu-invoker dropdown-item dropdown-item-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuCoursesMusic">
                        <span class="min-w-4rem text-center opacity-lg mr-1">
                          <i class="fa fa-music font-size-1 mr-1"></i>
                        </span> Music
                      </a>

                      <div id="navSubmenuCoursesMusic" class="hs-sub-menu dropdown-menu" aria-labelledby="navLinkCoursesMusic" style="min-width: 270px;">
                        <a class="dropdown-item" href="#">All Musics</a>
                        <a class="dropdown-item" href="#">Instrument</a>
                        <a class="dropdown-item" href="#">Production</a>
                        <a class="dropdown-item" href="#">Music fundamentals</a>
                        <a class="dropdown-item" href="#">Vocal</a>
                        <a class="dropdown-item" href="#">Music techniques</a>
                        <a class="dropdown-item" href="#">Music software</a>
                        <a class="dropdown-item" href="#">Other</a>
                      </div>
                    </div>
                    <!-- Music -->

                    <div class="dropdown-divider my-3"></div>

                    <div class="px-4">
                      <a class="btn btn-block btn-sm btn-primary transition-3d-hover" href="listing.html">All Courses</a>
                    </div>
                  </div>
                  <!-- End Courses - Submenu -->
                </li>
                <!-- End Courses -->

                <!-- Search Form -->
                <li class="d-none d-lg-inline-block navbar-nav-item flex-grow-1 mx-2">
                  <form class="input-group input-group-sm input-group-merge w-75">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="What do you want to learn?" aria-label="What do you want to learn?">
                  </form>
                </li>
                <!-- End Search Form -->

                <!-- Pages -->
                <li class="hs-has-sub-menu navbar-nav-item mr-lg-auto">
                  <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link nav-link-toggle " href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">Pages</a>

                  <!-- Pages - Submenu -->
                  <div id="pagesSubMenu" class="hs-sub-menu dropdown-menu" aria-labelledby="pagesMegaMenu" style="min-width: 230px;">
                    <a class="dropdown-item " href="listing.html">Courses</a>
                    <a class="dropdown-item " href="course-description.html">Course description</a>
                    <a class="dropdown-item " href="author.html">Author</a>
                  </div>
                  <!-- End Pages - Submenu -->
                </li>
                <!-- End Pages -->
              </ul>
            </div>
            <!-- End Navigation -->
          </div>
        </nav>
        <!-- End Nav -->
      </div>
    </div>
  </header>
