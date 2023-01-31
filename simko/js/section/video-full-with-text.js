(function($) {
    $('section.video-full-with-text .image-container').on('click', function() {
        if (!$(this).find('.video-container').length) {
            $('section.video-full-with-text .image-container').addClass('hidden');
            $('section.video-full-with-text .content-container').addClass('hidden');
            if(youtube_video.video_src.length > 0){
                $('section.video-full-with-text .inner-content:first-of-type').append('<div class="video-container" style="max-height:600px"><iframe width="900" height="600" src="'+youtube_video.video_src+'?rel=0&controls=2&autoplay=1&showinfo=0&modestbranding=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>');
            }
        }
    });
})(jQuery);
