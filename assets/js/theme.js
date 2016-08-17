jQuery(document).ready(function($) {

  // Menu Toggle
  $('.menu-toggle').click(function() {
    $('.main-navigation').slideToggle(100);
    return false;
  });

  // Detect window width
  $(window).on('resize load', function () {
    var current_width = $(window).width();

    // If width is greater than iPad size
    if ( current_width > 1023 ) {
      $('.main-navigation').show();
    }
  });
});
