(function($){
    $(window).on('scroll load resize', function() {
        if ($(window).width() > 949) {
            if ($('.hero.full .content-container.invisalign.animate-in:inview300').length > 0) {
                $('html').addClass('time-for-content');
            } else {
                $('html').removeClass('time-for-content');
            }
        }
    });
})(jQuery);