(function($) {
	var prev_icon = false;

	var events_owl = $('.event-ortho-treatment-carousel .owl-carousel');
	events_owl.owlCarousel({
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

	events_owl.on('changed.owl.carousel', function(e) {
        events_owl.trigger('stop.owl.autoplay');
        events_owl.trigger('play.owl.autoplay');
    });

	$('section.event-ortho-treatment-carousel .pagination .page-left').click(function() {
		events_owl.trigger('prev.owl.carousel');
	});

	$('section.event-ortho-treatment-carousel .pagination .page-right').click(function() {
		events_owl.trigger('next.owl.carousel');
	});

	function getActiveSlideIcon() {
		let $activeSlide = $('.event-ortho-treatment-carousel .owl-carousel .owl-item.active.center .slide');
		let icon = $activeSlide.data('icon').replace('icon-', '');
		let iconIndex = $activeSlide.data('icon-index');
		if (typeof(icon) !== 'undefined') {
			if (typeof(prev_icon) !== 'undefined') $('html').removeClass(prev_icon);

			prev_icon = icon;
			$('html').addClass(icon);
			
			// clean up duplicate icons selected for multiple slides
			$('.event-ortho-treatment-carousel .widget.ortho-treatment li').removeClass('override');
			$('.event-ortho-treatment-carousel .widget.ortho-treatment li').each(function(index, el){
				if(parseInt($(el).attr('data-icon-index')) !== iconIndex){
					$(el).addClass('override');
				} 		
			})
		}
	}

	events_owl.on('translated.owl.carousel', function(e) {
		getActiveSlideIcon();
	});
	getActiveSlideIcon();
})(jQuery);
