(function($) {
	var prev_icon = false;

	var braces_owl = $('.braces-carousel .owl-carousel');
	braces_owl.owlCarousel({
		items: 1,
		slideBy: 1,
		nav: false,
		dots: false,
		loop: true,
		center: true,
		autoWidth: true,
		mouseDrag: true,
		pullDrag: true,
		freeDrag: false,
		autoplay: false,
		autoplayHoverPause: true,
		responsiveClass: true,
		responsive: {
			0: {
				margin: 0,
			},
			950: {
				margin: 40,
			}
		}
	});

	braces_owl.on('changed.owl.carousel', function(e) {
        braces_owl.trigger('stop.owl.autoplay');
        braces_owl.trigger('play.owl.autoplay');
    });

	$('section.braces-carousel .pagination .page-left').click(function() {
		braces_owl.trigger('prev.owl.carousel');
	});

	$('section.braces-carousel .pagination .page-right').click(function() {
		braces_owl.trigger('next.owl.carousel');
	});

	function getActiveSlideIcon() {
		let $activeSlide = $('.braces-carousel .owl-carousel .owl-item.active.center .slide');
		let icon = $activeSlide.data('icon').replace('icon-', '');
		let iconIndex = $activeSlide.data('icon-index');
		if (typeof(icon) !== 'undefined') {
			if (typeof(prev_icon) !== 'undefined') $('html').removeClass(prev_icon);

			prev_icon = icon;
			$('html').addClass(icon);
			
			// clean up duplicate icons selected for multiple slides
			$('.braces-carousel .widget.braces li').removeClass('override');
			$('.braces-carousel .widget.braces li').each(function(index, el){
				if(parseInt($(el).attr('data-icon-index')) !== iconIndex){
					$(el).addClass('override');
				} 		
			})
		}
	}

	braces_owl.on('translated.owl.carousel', function(e) {
		getActiveSlideIcon();
	});
	getActiveSlideIcon();
})(jQuery);
