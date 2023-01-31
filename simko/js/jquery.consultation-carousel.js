(function($) {
	var consultation_owl = $('.half.with-icons:not(.three-icons):not(.four-icons) .consultation.owl-carousel');
	consultation_owl.owlCarousel({
		margin: 0,
		loop: false,
		dots: false,
		autoWidth: false,
		autoplay: false,
		autoplayHoverPause: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
                margin: 40,
				slideBy: 1,
				mouseDrag: true,
				touchDrag: true,
				loop: true,
				nav: true,
				navText: [],
			},
			1260: {
				items: 6,
                margin: 0,
				slideBy: 6,
				mouseDrag: false,
				touchDrag: false,
				loop: false,
				nav: false,
				navText: [],
			}
		}
	});	

	var three_icons_owl = $('.half.with-icons.three-icons .consultation.owl-carousel');
	three_icons_owl.owlCarousel({
		margin: 0,
		loop: false,
		dots: false,
		autoWidth: false,
		autoplay: false,
		autoplayHoverPause: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				slideBy: 1,
				mouseDrag: true,
				touchDrag: true,
				loop: true,
				nav: true,
				navText: [],
			},
			1260: {
				items: 3,
				slideBy: 3,
				mouseDrag: false,
				touchDrag: false,
				loop: false,
				nav: false,
				navText: [],
			}
		}
	});
	var four_icons_owl = $('.half.with-icons.four-icons .consultation.owl-carousel');
	four_icons_owl.owlCarousel({
		margin: 0,
		loop: false,
		dots: false,
		autoWidth: false,
		autoplay: false,
		autoplayHoverPause: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				slideBy: 1,
				mouseDrag: true,
				touchDrag: true,
				loop: true,
				nav: true,
				navText: [],
			},
			1260: {
				items: 4,
				slideBy: 4,
				mouseDrag: false,
				touchDrag: false,
				loop: false,
				nav: false,
				navText: [],
			}
		}
	});
})(jQuery);
