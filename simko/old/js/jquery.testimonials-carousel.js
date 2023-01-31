(function($) {
	var testimonials_owl = $('.testimonials-carousel.owl-carousel');
	testimonials_owl.owlCarousel({
		items: 1,
		slideBy: 1,
		margin: 0,
		nav: true,
		dots: false,
		loop: true,
		mouseDrag: true,
		pullDrag: true,
		freeDrag: false,
		autoplay: false,
		autoplayHoverPause: true,
		/*responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				slideBy: 1
			},
			783: {
				items: 1,
				slideBy: 1
			}
		}*/
	});
})(jQuery);