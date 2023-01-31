<?php
# Template Name: Careers

// Tri Carousel - Patient Carousel

$tri_carousel_slides = [];
if( have_rows('careers_slide_repeater') ):
   while ( have_rows('careers_slide_repeater') ) : the_row();
   $i = get_sub_field('careers_slide_repeater_image');
   if($i == 821) continue;
   $attachment = wp_get_attachment_image_src($i, 'medium_large');
   
   array_push($tri_carousel_slides, [
		'src' => $attachment[0],
		'width' => $attachment[1],
		'height' => $attachment[2],
		'alt' => !empty(get_post_meta($i, '_wp_attachment_image_alt', true)) ? get_post_meta($i, '_wp_attachment_image_alt', true) : str_replace('_', ' ', get_the_title($i)),
		'classes' => [get_the_title($i)]
	]);

   endwhile;

else :
	$starting_id = 806;
	$ending_id = 862;
	for($i = $starting_id; $i < ($ending_id + 1); $i++) {
		if($i == 821) continue;
		$attachment = wp_get_attachment_image_src($i, 'medium_large');
		array_push($tri_carousel_slides, [
			'src' => $attachment[0],
			'width' => $attachment[1],
			'height' => $attachment[2],
			'alt' => !empty(get_post_meta($i, '_wp_attachment_image_alt', true)) ? get_post_meta($i, '_wp_attachment_image_alt', true) : str_replace('_', ' ', get_the_title($i)),
			'classes' => [get_the_title($i)]
		]);
	}
endif;
shuffle($tri_carousel_slides);

$careers_hero_heading = get_post_meta(get_the_id(), 'careers_hero_heading', true);
$careers_hero_content = get_post_meta(get_the_id(), 'careers_hero_content', true);
$careers_hero_cta = get_post_meta(get_the_id(), 'careers_hero_cta', true);
$careers_hero_subheading = get_post_meta(get_the_id(), 'careers_hero_subheading', true);
$careers_hero_email = get_post_meta(get_the_id(), 'careers_hero_email', true);
$careers_hero_email_text = get_post_meta(get_the_id(), 'careers_hero_email_text', true);

get_header();
partial('section.copy.side-by-side-with-box', [
	'column1' => '<h1>'. $careers_hero_heading .'</h1>'. apply_filters('the_content', $careers_hero_content) .'<p>'. do_shortcode($careers_hero_cta) .'</p>',
	'column2' => '<p class="bold">'. $careers_hero_subheading .'</p><p><a href="'. $careers_hero_email .'" class="cta text" target="_blank">'. $careers_hero_email_text .'</a></p>',
]);
partial('section.tri-carousel', [
	'images' => $tri_carousel_slides
]);
get_footer();
