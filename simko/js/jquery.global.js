(function($) {
	let
		scroll_position = 0,
		scroll_direction = 'down',
		desktop_header = $('section.header > .content')
	;	

	$('body').on('click', 'a.openchair-widget', function(e) {
		if(typeof OpenChair !== 'undefined') e.preventDefault();
	});

	// Extend jQuery object inview selectors
	$.extend($.expr[':'], {
		topinview:function(el) {
			let wintop = $(window).scrollTop(),
				winbtm = $(window).scrollTop() + $(window).height(),
				eltop = $(el).offset().top,
				elbtm = $(el).offset().top + $(el).outerHeight();
			return winbtm >= eltop && wintop <= elbtm && scroll_direction == 'down';
		}
	});

	$.extend($.expr[':'], {
		bottominview:function(el) {
			let wintop = $(window).scrollTop(),
				winbtm = $(window).scrollTop() + $(window).height(),
				eltop = $(el).offset().top,
				elbtm = $(el).offset().top + $(el).outerHeight();
			return wintop <= elbtm && winbtm >= eltop && scroll_direction == 'up';
		}
	});

	$.extend($.expr[':'], {
		inview:function(el) {
			let wintop = $(window).scrollTop(),
				winbtm = $(window).scrollTop() + $(window).height(),
				eltop = $(el).offset().top,
				elbtm = $(el).offset().top + $(el).outerHeight();
			return (wintop <= elbtm && winbtm >= eltop && scroll_direction == 'up') || (winbtm >= eltop && wintop <= elbtm && scroll_direction == 'down');
		}
	});

	$.extend($.expr[':'], {
		inview300:function(el) {
			let wintop = $(window).scrollTop(),
				winbtm = $(window).scrollTop() + $(window).height(),
				eltop = $(el).offset().top + 300,
				elbtm = $(el).offset().top + 300 + $(el).height();
			return elbtm >= wintop && eltop <= winbtm;
		}
	});

	$.extend($.expr[':'], {
		inview600:function(el) {
			let wintop = $(window).scrollTop(),
				winbtm = $(window).scrollTop() + $(window).height(),
				eltop = $(el).offset().top + 600,
				elbtm = $(el).offset().top + 600 + $(el).height();
			return elbtm >= wintop && eltop <= winbtm;
		}
	});

	if(window.objectFitImages) objectFitImages($('img.bg-img'));

	$(window).on('scroll', function() {
		scroll_direction = $(window).scrollTop() > scroll_position ? 'down' : 'up';
		scroll_position = $(window).scrollTop();
	});

	$.extend($.easing, {
		easeOutCubic: function (x, t, b, c, d) {
			return c*((t=t/d-1)*t*t + 1) + b;
		},
	});

	$(document).on('click', 'a[href="#"]', function(e) {
		e.preventDefault();
	});

	$('.hero-scroll').on('click', function(e) {
		e.preventDefault();
		scrollToPosition($('.hero').innerHeight());
	});

	$('a.candidate-iframe-src').on('click', function(e) {
		e.preventDefault();
		$('.iframe.candidate-iframe iframe').attr('src', $(this).attr('href'));
		scrollToTarget($('#all'));
	});

	///////////// SMOOTH SCROLL FOR ANCHORS /////////////
	$(document).on('click', 'a[href*="#"]:not([href="#"])', function() {
		if(window.location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && window.location.hostname == this.hostname) {
			var target = $(this.hash);
			// console.log('target hash', target);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			// console.log('target', target);
			if(target.length) {
				if($('body.page-template-invisalign-virtual-care')){
					$('html, body').animate({
						scrollTop: $(this.hash).offset().top - 350
					}, 500, function(){
					});
				}
				else{
					scrollToTarget(target);
				}

				return false;
			}
		}
	});

	$(window).on('scroll resize', function() {
		$('.owl-carousel:inview300').trigger('play.owl.autoplay');
		$('.owl-carousel:not(:inview300)').trigger('stop.owl.autoplay');
	});

	// $(window).on('load', function() {
	// 	if(location.href.split("#")[1]) {
	// 		var anchor = location.href.split("#")[1];
	// 		var target = $('#'+anchor+', a[name="'+anchor+'"]');
	// 		if (target.length) $(window).scrollTop(
	// 			target.offset().top
	// 			- ($(window).width() < 782 ? $('#mobile-header').outerHeight() : $('section.header').outerHeight())
	// 		);
	// 	}
	// });

	function scrollToPosition(position) {
		$('html, body').animate({
			scrollTop: (position + ($('#wpadminbar').outerHeight()||0))
		}, {
			easing: 'easeOutCubic',
			duration: 1000
		});
	}


	function getScrollTopCalculation(target) {
		var header = $(window).width() <= 782 ? $('#mobile-navigation') : $('section.header > .content');
		return Math.floor(target.offset().top - header.outerHeight() - ($('#wpadminbar').outerHeight()||0) - 120);
	}
	function scrollToTarget(target) {
		if ($(window).width() < 782) {
			var header = $('#mobile-header');
			var utilityHeader = $('.header-utility');
			$('html, body').animate({
				scrollTop:
				target[0].getBoundingClientRect().y + $(window).scrollTop()
				- parseInt((target.css('margin-top')).replace('px', ''))
				- header.outerHeight()
				- utilityHeader.outerHeight()
				- ($('#wpadminbar').outerHeight()||0)
				+ ($('.hero .conversation').length ? ((1 - window.hero_scroll_progress)||0) * (window.hero_scroll_delta||0) : 0)
			}, 250);
		} else {
			$('html, body').animate({
				scrollTop: getScrollTopCalculation(target)
			}, 250);
			if ($(window).width() <= 782) $('html').removeClass('mobileMenu mobileNavigating');
		}
	}

	// NAVIGATION //
	$('.super-nav > ul > li.menu-item-has-children > a').on('click', function(e) {
		e.preventDefault();
		$('.super-nav > ul > li.menu-item-has-children.active').not($(this).parent()).removeClass('active');
		$(this).parent().toggleClass('active');
		$('li.expand-active').toggleClass('supernav-inactive', $('.super-nav li.active').length > 0);
	});

	// SERVICE TILES //
	$('ul.service-tiles > li').hover(function() {
		$(this).parent().addClass('hover');
	}, function() {
		$(this).parent().removeClass('hover');
	});

	$('.primary-nav > ul > li').hover(function() {
		$(this).parent().children('li').not($(this)).addClass('inactive');
	}, function() {
		$(this).parent().children('li').not($(this)).removeClass('inactive');
	});

	// STICKY //
	function onPageChanged() {
		if(typeof($('section.header').data('padding')) !== 'undefined') {
			$('section.header').data('padding', parseInt($('section.header').css('padding-top').replace('px', '')));
		}
		//$('section.header').data('padding')
		$('html').toggleClass('sticky-header', $(window).scrollTop() > $('section.header').data('padding-top'));
		var header_height = ((desktop_header.outerHeight()||0) + ($('#wpadminbar').outerHeight()||0));

		// CTA - header-based
		$('.cta.stick-header').each(function() {
			$(this).toggleClass('stuck', $(this).parent().get(0).getBoundingClientRect().top <= header_height);

			if($(this).hasClass('stuck') && !$(this).hasClass('insights-cta')) {
				$(this).attr('style', 'top:'+header_height+'px!important');
			}
			else {
				$(this).removeAttr('style');
			}
		});

		var header_copy_selector = $('section.hero > .content');
		if(header_copy_selector.length) {
			$('html').toggleClass('solid-header', header_copy_selector.get(0).getBoundingClientRect().top <= header_height);
		}

		// Widgets
		$('aside > .widgets').css('top', ((4*12) + 2*(desktop_header.outerHeight()||0) + ($('#wpadminbar').outerHeight()||0)));
	}	

	if(typeof($('section.header').data('padding-top')) !== 'undefined') {
		$('section.header').data('padding-top', parseInt($('section.header').css('padding-top').replace('px', '')||0));
	}

	$(document).on('ready', function() { onPageChanged(); });
	$(window).on('scroll load resize', function() {
		onPageChanged();

		if ($('body').hasClass('page-template-virtual-monitoring')) {
			if ($(window).width() > 949) {
				// Step 1
				if ($('.steps-with-lines .step-one:inview').length > 0) {
					$('.steps-with-lines .step-one .image').addClass('active');
				}
				else {
					$('.steps-with-lines .step-one .image').removeClass('active');
				}
				// Step 2
				if ($('.steps-with-lines .step-two:inview').length > 0) {
					$('.steps-with-lines .step-two .image').addClass('active');
				}
				else {
					$('.steps-with-lines .step-two .image').removeClass('active');
				}
				// Step 3
				if ($('.steps-with-lines .step-three:inview').length > 0) {
					$('.steps-with-lines .step-three .image').addClass('active');
				}
				else {
					$('.steps-with-lines .step-three .image').removeClass('active');
				}
			}
		}	
		

		// if ($('body').hasClass('page-template-confidence-counts-club')) {
		// 	if ($(window).width() > 949) {
		// 		if ($('.hero.full .content-container.cc.animate-in:inview300').length > 0) {
		// 			$('html').addClass('time-for-content');
		// 		} else {
		// 			$('html').removeClass('time-for-content');
		// 		}
		// 	}
		// }		

		// if (
		// 	$('body').hasClass('page-template-why-orthodontic-treatment') || 
		// 	$('body').hasClass('page-template-schedule-consultation') ||
		// 	$('body').hasClass('page-template-schedule-consultation-2') ||
		// 	$('body').hasClass('page-template-schedule-appointment-today')||
		// 	$('body').hasClass('page-template-sleep-apnea-treatment')
		// 	) {
		// 	if ($('.service.for-ages.first .container:inview300').length > 0) {
		// 		$('.service.for-ages.first .container aside .img-container img').addClass('active');
		// 	} else {
		// 		$('.service.for-ages.first .container aside .img-container img.active').removeClass('active');
		// 	}

		// 	if ($('.service.for-ages.second .container:inview300').length > 0) {
		// 		$('.service.for-ages.second .container aside .img-container img').addClass('active');
		// 	} else {
		// 		$('.service.for-ages.second .container aside .img-container img.active').removeClass('active');
		// 	}

		// 	if ($('.service.for-ages.third .container:inview300').length > 0) {
		// 		$('.service.for-ages.third .container aside .img-container img').addClass('active');
		// 	} else {
		// 		$('.service.for-ages.third .container aside .img-container img.active').removeClass('active');
		// 	}

		// 	if ($('.copy.with-image.first .main-container:inview300').length > 0) {
		// 		$('.copy.with-image.first .main-container aside .img-container img').addClass('active');
		// 		$('.copy.with-image.first .main-container article p.slide').addClass('active');
		// 	} else {
		// 		$('.copy.with-image.first .main-container aside .img-container img.active').removeClass('active');
		// 		$('.copy.with-image.first .main-container article p.slide').removeClass('active');
		// 	}

		// 	if ($('.copy.with-image.second .main-container:inview300').length > 0) {
		// 		$('.copy.with-image.second .main-container aside .img-container img').addClass('active');
		// 		$('.copy.with-image.second .main-container article p.slide').addClass('active');
		// 	} else {
		// 		$('.copy.with-image.second .main-container aside .img-container img.active').removeClass('active');
		// 		$('.copy.with-image.second .main-container article p.slide').removeClass('active');
		// 	}			
		// }

		// two-cols-carousel-with-image
		if ($('body').hasClass('page-template-safer-orthodontic-care')) {
			if ($('.two-cols-carousel-with-image.first .main-container:inview300').length > 0) {
				$('.two-cols-carousel-with-image.first .main-container aside .img-container img').addClass('active');
			} else {
				$('.two-cols-carousel-with-image.first .main-container aside .img-container img.active').removeClass('active');
			}

			if ($('.two-cols-carousel-with-image.second .main-container:inview300').length > 0) {
				$('.two-cols-carousel-with-image.second .main-container aside .img-container img').addClass('active');
			} else {
				$('.two-cols-carousel-with-image.second .main-container aside .img-container img.active').removeClass('active');
			}

			if ($('.two-cols-carousel-with-image.third .main-container:inview300').length > 0) {
				$('.two-cols-carousel-with-image.third .main-container aside .img-container img').addClass('active');
			} else {
				$('.two-cols-carousel-with-image.third .main-container aside .img-container img.active').removeClass('active');
			}

			if ($('.two-cols-carousel-with-image.fourth .main-container:inview300').length > 0) {
				$('.two-cols-carousel-with-image.fourth .main-container aside .img-container img').addClass('active');
			} else {
				$('.two-cols-carousel-with-image.fourth .main-container aside .img-container img.active').removeClass('active');
			}
		}

		if ($(window).width() > 782) {
			if ($('section.footer:inview').length > 0) {
				$('section.footer .widget.schedule-consultation').css('top', '-140px');
				$('section.footer .widget.schedule-consultation').css('opacity', '1');
			} else {
				$('section.footer .widget.schedule-consultation').css('top', '0');
				$('section.footer .widget.schedule-consultation').css('opacity', '0');
			}
		} else {
			$('section.footer .widget.schedule-consultation').css('top', '0');
			$('section.footer .widget.schedule-consultation').css('opacity', '1');
		}

		if ($('section').hasClass('instruction-downloads')) {
			if ($(window).width() > 782) {
				if ($('ul.icons.cols-4:inview, ul.icons.cols-3:inview,  ul.icons.cols-2:inview').length > 0) {
					$.each($('ul.icons.cols-4 li, ul.icons.cols-3 li, ul.icons.cols-2 li'), function (k, e) {
						setTimeout(function () {
							$(e).addClass('active');
						}, 1000)
					})
				}
				else {
					$.each($('ul.icons.cols-4 li, ul.icons.cols-3 li'), function(k,e) {
						//$(e).removeClass('active');
					})
				}
			} else {
				$.each($('ul.icons.cols-4 li, ul.icons.cols-3 li, ul.icons.cols-2 li'), function() {
					if ( $(this).is(':inview') ) {
						$(this).addClass('active')
					} else {
						//$(this).removeClass('active')
					}
				})
			}
		}	
	});

	$('.filter-toggle').on('click', function() {
		  $(this).closest('.filter').toggleClass('active').parent().toggleClass('active');
	});

	$(window).on('resize', function() {
		if($(window).width() > 782) {
			$('.filters-container').show();
		}
	});

	$('#virtual-consultation ul li a').on('click', function(e) {
		e.preventDefault();
		let link = $(this).attr('id');
		let text = $(this).html();
		$('#start-vc').removeClass('hidden').attr("href", link);
		$('.fancy-select-title').html(text);
		$('.options').addClass('hidden');
	});

	$('section.maps .location-info .links > div').on('mouseenter', function(e) {
		$(this).parent().children('.active').removeClass('active');
		$(this).addClass('active');
	});

	$('section.maps .location-info .links > div').on('mouseleave', function(e) {
		$(this).parent().parent().find('.links > div.active').removeClass('active');
	});

	$(window).trigger('resize');

	$('.carousel-item .content a.read-more.mobile').on('click', function(key, element) {
		$(this).parent().parent().children('p.primary.desktop').removeClass('desktop');
		$(this).parent().parent().children('p.primary.mobile').css('opacity', 0);
		$(this).parent().parent().children('a.read-less.mobile').addClass('active');

	});

	$('.carousel-item .content a.read-less.mobile').on('click', function(key, element) {
		$(this).removeClass('active');
		$(this).parent().children('p.primary:not(.name)').first().addClass('desktop');
		$(this).parent().children('p.primary.mobile').css('opacity', 1);

	});
	$('#to-video').on('click', function (e){
		e.preventDefault();
		document.querySelector('#youtube-video').scrollIntoView({
			behavior: 'smooth',
			block: 'center'
		});
	})

	$(".close-icon").on('click', (e) => {
		e.preventDefault();
		$('html').removeClass('interstitial-banner-open');
		$(".interstitial-banner").remove();				

		$.post(wp_vars.ajaxUrl, {action: wp_vars.wpAction})
		  .fail(function(err){ console.error(err, 'something went wrong with interstitial session setting') });		  
	})

})(jQuery);
