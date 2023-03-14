$(document).ready(function () {
	$(".owl-carousel").owlCarousel();
});

$("#ornamen")
	.find(".owl-carousel")
	.owlCarousel({
		loop: false,
		autoplay: false,
		autoplayTimeout: 3000,
		margin: 10,
		nav: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true,
			},
			768: {
				items: 2,
				nav: true,
			},
			1199: {
				items: 2,
				nav: true,
			},
		},
	});

$("#kontemplato")
	.find(".owl-carousel")
	.owlCarousel({
		loop: false,
		autoplay: false,
		items: 1,
		nav: true,
		margin: 10,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true,
			},
			768: {
				items: 2,
				nav: true,
			},
			1199: {
				items: 3,
				nav: true,
			},
		},
	});
