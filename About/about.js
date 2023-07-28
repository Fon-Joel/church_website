$(document).ready(function() {
  var startX;
  var scrollLeft;

  $(".leaders-container").on("touchstart", function(e) {
    startX = e.originalEvent.touches[0].pageX;
    scrollLeft = $(this).scrollLeft();
  });

  $(".leaders-container").on("touchmove", function(e) {
    var moveX = e.originalEvent.touches[0].pageX;
    $(this).scrollLeft(scrollLeft + startX - moveX);
    e.preventDefault(); // Prevent default touchmove behavior
  });
});
