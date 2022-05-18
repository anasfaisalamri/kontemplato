$(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});

// $(document).ready(function () {
//   $(".owl-carousel-majalah").owlCarosuel();
// });

$('#news').find('.owl-carousel').owlCarousel({
  loop:true,
  autoplay:true,
  margin:10,
  dotsClass:false,
  responsiveClass:true,
  responsive:{
      0:{
          items:1,
          nav:true
      },
      600:{
          items:2,
          nav:false
      },
      800:{
          items:3,
          nav:false
      },
      1000:{
          items:4,
          nav:false
      }
  }
});

$('#majalah').find(".owl-carousel").owlCarousel({
  loop:true,
  autoplay:true,
  items:1,
  nav:false,
  dotsClass:false,
});



