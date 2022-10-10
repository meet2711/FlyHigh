var $jq = jQuery.noConflict();
$jq('.your-class').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    fade: true,
    dots: true,
    // asNavFor: '.your-class-two'
  });
  $jq('.your-class-two').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    fade: true,
    asNavFor: '.your-class',
    focusOnSelect: true
  });