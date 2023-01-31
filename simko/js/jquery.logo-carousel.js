(function($) {

	var $logo_owl_carousel = $('.logo.owl-carousel');
	var carouselOptions = {
		loop: true,
		margin: 10,
		mouseDrag: true,
		touchDrag: true,
		autoplay: false,
		autoplayHoverPause: true
	};

	if ($logo_owl_carousel.length) {
		if($logo_owl_carousel.hasClass('disable-desktop')){
			carouselOptions['responsive'] = {
				0:{
					items:1,
				},
				768:{
					items:3,
				}
			}
		} else {				
			carouselOptions['responsive'] = {
				0:{
					items:1,
				},
				768:{
					items:5,
				}
			}
		}
		
		// initialize carousel
		$logo_owl_carousel.owlCarousel(carouselOptions);

		$logo_owl_carousel.on('resize.owl.carousel', function(e){
			var disableDesktop = $(e.currentTarget).hasClass('disable-desktop');
			
			if(innerWidth > 768 && disableDesktop) {
				$logo_owl_carousel.trigger('stop.owl.autoplay');
			} else {
				$logo_owl_carousel.trigger('play.owl.autoplay');
			}
		})

		$logo_owl_carousel.on('changed.owl.carousel', function(e) {
	        var disableDesktop = $(e.currentTarget).hasClass('disable-desktop');
			
			$logo_owl_carousel.trigger('stop.owl.autoplay');

			if(innerWidth < 768 && disableDesktop) {
	        	$logo_owl_carousel.trigger('play.owl.autoplay');
			}
	    });

		$('section.logo-carousel .pagination .icon-page-left').on('click', function() {
			$logo_owl_carousel.trigger('prev.owl.carousel');
		});

		$('section.logo-carousel .pagination .icon-page-right').on('click', function() {
			$logo_owl_carousel.trigger('next.owl.carousel');
		});
	}

	var univ_logos = [];

	if ( $('.univ-logos.owl-carousel').length) {
		$('.univ-logos.owl-carousel').each(function(k, v) {
			univ_logos.push($(this).owlCarousel({
				margin: 0,
				loop: false,
				dots: false,
				responsiveClass: false,
				responsive: {
					0: {
						items: 1,
						slideBy: 1,
						mouseDrag: true,
						touchDrag: true,
						loop: true,
						nav: true,
						navText: [],
						autoplay: false,
						autoplayHoverPause: true
					},
					950: {
						items: 3,
						slideBy: 1,
						mouseDrag: false,
						touchDrag: false,
						loop: $(this).find('.logo-container').length > 3,
						navText: [],
						nav: $(this).find('.logo-container').length > 3,
						autoplayHoverPause: true
					}
				}
			}));
		});
	}
})(jQuery);
