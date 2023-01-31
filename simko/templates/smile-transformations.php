<?php
# Template Name: Smile Transformations
global $reviews;
$brand = is_brand();

get_header();
partial('section.smile-gallery-page', [
	'h1' => get_post_meta(get_the_ID(), 'smile_transformations_hero_heading', true),
	'h1_classes' => ['primary'],
	'content' => get_post_meta(get_the_ID(), 'smile_transformations_hero_content', true),
]);
$testimonials = array_filter($reviews->reviews, function($review) {
	$relationships = unserialize($review->relationships);
	return is_array($relationships) ? in_array(get_the_ID(), $relationships) : get_the_ID() == $relationships;
});
partial('section.testimonials.carousel', [
	'noctabox' => true,
	'htag' => 'h2',
	'heading_classes' => ['h3', 'primary'],
	'heading' => 'Here’s what our patients have to say',
	'reviews_left_border' => $testimonials,
]);
$bottom_hero_desktop_image_id = get_post_meta(get_the_ID(), 'smile_transformations_bottom_hero_desktop_image', true);
$bottom_hero_desktop_image = wp_get_attachment_image_src($bottom_hero_desktop_image_id, 'full');
$bottom_hero_mobile_image_id = get_post_meta(get_the_ID(), 'smile_transformations_bottom_hero_mobile_image', true);
$bottom_hero_mobile_image = wp_get_attachment_image_src($bottom_hero_mobile_image_id, 'medium_large');
partial('section.hero.full', [
	'classes' => ['smile-gallery', sanitize_title($brand->post_title)],
	'image' => [
		'src' => $bottom_hero_desktop_image[0],
		'width' => $bottom_hero_desktop_image[1],
		'height' => $bottom_hero_desktop_image[2],
		'alt' => get_post_meta($bottom_hero_desktop_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['desktop']
	],
	'mobile_image' => [
		'src' => $bottom_hero_mobile_image[0],
		'width' => $bottom_hero_mobile_image[1],
		'height' => $bottom_hero_mobile_image[2],
		'alt' => get_post_meta($bottom_hero_mobile_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['mobile']
	],
]);
get_footer();
