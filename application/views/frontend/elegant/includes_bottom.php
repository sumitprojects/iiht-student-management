<script src="<?php echo base_url('assets/frontend/elegant/js/jquery-2.2.4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/elegant/js/common_scripts.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/elegant/js/main.js'); ?>"></script>
<!-- MODERNIZR SLIDER -->
<script src="<?php echo base_url('assets/frontend/elegant/js/modernizr_slider.js'); ?>" async="async"></script>
<!-- FlexSlider -->
<script defer src="<?php echo base_url('assets/frontend/elegant/js/jquery.flexslider.js'); ?>" async="async"></script>
<script>
  $(window).load(function() {
    'use strict';
    // $('#carousel_slider').flexslider({
    //   animation: "slide",
    //   controlNav: false,
    //   animationLoop: false,
    //   slideshow: false,
    //   itemWidth: 280,
    //   itemMargin: 25,
    //   asNavFor: '#slider'
    // });
    // $('#carousel_slider ul.slides li').on('mouseover', function() {
    //   $(this).trigger('click');
    // });
    $('#slider').flexslider({
      animation: "fade",
      controlNav: true,
      animationLoop: true,
      slideshow: true,
    });
  });
</script>

<!-- TOASTR JS -->
<script src="<?php echo base_url().'assets/global/toastr/toastr.min.js'; ?>" async="async"></script>
<script src="<?php echo base_url('assets/frontend/elegant/js/validate.js'); ?>" async="async"></script>

<!-- JSPdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/"
crossorigin="anonymous" async="async"></script>

<script src="<?php echo base_url('assets/frontend/elegant/js/custom.js'); ?>" async="async"></script>
