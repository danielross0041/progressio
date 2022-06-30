// WOW ANIMATION
      new WOW().init();
// WOW ANIMATION

$('.product_slid').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
  centerPadding: '10px',
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1370,
      settings: {
        arrows: false,
        centerPadding: '40px',
        slidesToShow: 4
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerPadding: '40px',
        slidesToShow: 3
      }
    }
  ]
});


 $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  arrows:false,
  focusOnSelect: true
});