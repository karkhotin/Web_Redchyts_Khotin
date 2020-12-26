$(".navigation li").hover(function() {
  var isHovered = $(this).is(":hover");
  if (isHovered) {
    $(this).children("ul").stop().slideDown(300);
  } else {
    $(this).children("ul").stop().slideUp(300);
  }
});