<?
# Template Name: Refer A Friend
$brand = is_brand();

// Tri Carousel - Patient Carousel
$tri_carousel_slides = [];
$slides_count = get_post_meta(get_the_ID(),'refer_a_friend_slides', true);

if($slides_count > 0){
    for($i = 0;  $i < $slides_count; $i++){
        $image =  get_post_meta(get_the_ID(),'refer_a_friend_slides_'.$i.'_slide_image', true);
        $attachment_id = get_post_meta(get_the_ID(), 'refer_a_friend_slides_'.($i).'_slide_image', true);
        $attachment = wp_get_attachment_image_src($attachment_id, 'medium_large');
        if($attachment_id == 821) continue;
        $tri_carousel_slides[] = [
            'src' => $attachment[0],
            'width' => $attachment[1],
            'height' => $attachment[2],
            'alt' => !empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? str_replace('_', ' ', get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) : str_replace('_', ' ', get_the_title($attachment_id)),
            'classes' => [!empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? get_post_meta($attachment_id, '_wp_attachment_image_alt', true) : get_the_title($attachment_id)]
        ];

    }
}

shuffle($tri_carousel_slides);

$heading = get_post_meta(get_the_ID(),'refer_a_friend_heading', true);
$heading = '<h1>' . $heading . '</h1>';
$copy = get_post_meta(get_the_ID(),'refer_a_friend_content', true);

get_header();

partial('section.form', [
        'form' => 'refer',
        'content' => $heading. $copy
]);

partial('section.tri-carousel', [
        'images' => $tri_carousel_slides
]);

get_footer();
