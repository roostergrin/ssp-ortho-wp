(function($){
    $('section.faq-boxes .boxes .box a.mobile:not(.hide)').on('click', function() {
        $(this).parent().addClass('active');
    });

    $('section.faq-boxes .boxes .box a.mobile.hide').on('click', function() {
        $(this).parent().removeClass('active');
    });
})(jQuery);