$(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});

// $(document).ready(function () {
//   $(".owl-carousel-majalah").owlCarosuel();
// });

$('#news').find('.owl-carousel').owlCarousel({
  loop:true,
  autoplay:true,
  autoplayTimeout:2000,
  margin:10,
  nav:false,
  dotsClass:false,
  responsiveClass:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      800:{
          items:3
      },
      1000:{
          items:4
      }
  }
});

$('#majalah').find(".owl-carousel").owlCarousel({
  loop:true,
  autoplay:true,
  autoplayTimeout:3000,
  items:1,
  nav:false,
  dotsClass:false,
});



