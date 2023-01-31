(function($){
    $(window).on('scroll load resize', function() {    
        if ($('.copy.with-image.first .main-container:inview300').length > 0) {
            $('.copy.with-image.first .main-container aside .img-container img').addClass('active');
            $('.copy.with-image.first .main-container article p.slide').addClass('active');
        } else {
            $('.copy.with-image.first .main-container aside .img-container img.active').removeClass('active');
            $('.copy.with-image.first .main-container article p.slide').removeClass('active');
        }
    
        if ($('.copy.with-image.second .main-container:inview300').length > 0) {
            $('.copy.with-image.second .main-container aside .img-container img').addClass('active');
            $('.copy.with-image.second .main-container article p.slide').addClass('active');
        } else {
            $('.copy.with-image.second .main-container aside .img-container img.active').removeClass('active');
            $('.copy.with-image.second .main-container article p.slide').removeClass('active');
        }
    });
    })(jQuery);