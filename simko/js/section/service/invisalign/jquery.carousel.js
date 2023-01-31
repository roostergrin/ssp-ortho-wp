(function($){
    $(window).on('scroll load resize', function() {
        // $('section.invisalign-carousel .column').toggleClass('active', $('section.invisalign-carousel:inview').length)
        if ($('section.invisalign-carousel:inview').length > 0) {
            $.each($('section.invisalign-carousel .column'), function (k, e) {
                setTimeout(function () {
                    $(e).addClass('active');
                    $(e).css('opacity', '1');
                }, 1000)
            })
        }
        else {
            $.each($('section.invisalign-carousel .column'), function(k, e) {
                $(e).removeClass('active');
                $(e).css('opacity', '0');
            })
        }
    });

})(jQuery);