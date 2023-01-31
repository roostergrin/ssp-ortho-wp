(function($) {
    $(window).on('scroll load resize', function() {
        if ($('.hero.full .content-container.animate-in:inview300').length > 0) {
            $('html').addClass('time-for-content-to-show');
        } else {
            $('html').removeClass('time-for-content-to-show');
        }
    
        if ($(window).width() > 782) {
            if ($('.giving-back .main-container:inview').length > 0) {
                $('.giving-back .main-container .content-container').css('left', '0');
                $('.giving-back .main-container .img-container').css('right', '0');
            } else {
                $('.giving-back .main-container .content-container').css('left', '-600px');
                $('.giving-back .main-container .img-container').css('right', '-680px');
            }
        }

    });

})(jQuery);