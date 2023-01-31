(function($){
    $(window).on('scroll load resize', function() {
        if ($('.service.for-ages.first .container:inview300').length > 0) {
            $('.service.for-ages.first .container aside .img-container img').addClass('active');
        } else {
            $('.service.for-ages.first .container aside .img-container img.active').removeClass('active');
        }
    
        if ($('.service.for-ages.second .container:inview300').length > 0) {
            $('.service.for-ages.second .container aside .img-container img').addClass('active');
        } else {
            $('.service.for-ages.second .container aside .img-container img.active').removeClass('active');
        }
    
        if ($('.service.for-ages.third .container:inview300').length > 0) {
            $('.service.for-ages.third .container aside .img-container img').addClass('active');
        } else {
            $('.service.for-ages.third .container aside .img-container img.active').removeClass('active');
        }
    });
    })(jQuery)