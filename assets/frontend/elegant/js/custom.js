// Custom file uploader
$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen...");
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
  }
});

// init owlCarousel
$('.owl-carousel-div').owlCarousel({
  center: false,
  items: 2,
  loop: false,
  autoplay:true,
  margin: 0,
  responsive: {
    0: {
      items: 1
    },
    767: {
      items: 2
    },
    1000: {
      items: 3
    },
    1400: {
      items: 4
    }
  }
});

$('.owl-carousel-event').owlCarousel({
  center: true,
  items: 1,
  loop: true,
  margin: 50,
  responsive: {
    0: {
      items: 1
    },
    767: {
      items: 2
    },
    1000: {
      items: 2
    },
    1400: {
      items: 2
    }
  }
});
