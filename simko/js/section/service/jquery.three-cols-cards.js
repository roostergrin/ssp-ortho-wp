(function($) {
    function show_card(card) {
        card.addClass('active');
    }

    $(window).on('scroll load resize', function() {
        if ($('.three-cols-cards .main-container:inview300').length > 0) {
            show_card($('.three-cols-cards .main-container .card').first());
            window.setTimeout(function() { show_card($('.three-cols-cards .main-container .card:nth-child(2)')); }, 1000);
            window.setTimeout(function() { show_card($('.three-cols-cards .main-container .card').last()); }, 2000);
        }

        if ($('.three-cols-cards:inview300').length > 0) {
            $('.three-cols-cards .card:nth-child(1)').addClass('active');
            setTimeout(function(){ $('.three-cols-cards .card:nth-child(2)').addClass('active'); },500);
            setTimeout(function(){ $('.three-cols-cards .card:nth-child(3)').addClass('active'); },1000);
        } else {
            $('.three-cols-cards .card').removeClass('active');
        }
    });
})(jQuery);
