<?
# Template Name: Share Feedback
$brand = is_brand();
$brand_locations = get_locations_for_brand($brand->ID);

get_header();
$hero_desktop_image_id = get_post_meta(get_the_ID(), 'share_feedback_section_one_desktop_image', true);
$hero_mobile_image_id = get_post_meta(get_the_ID(), 'share_feedback_section_one_mobile_image', true);
partial('section.hero.standard', [
	'classes' => ['parallax', 'share-feedback'],
	'desktop_image' => [
		'src' => wp_get_attachment_image_src($hero_desktop_image_id, 'full')[0],
		'alt' => get_post_meta($hero_desktop_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($hero_mobile_image_id, 'medium_large')[0],
		'alt' => get_post_meta($hero_mobile_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
	'h1' => get_post_meta(get_the_ID(), 'share_feedback_section_one_heading', true),
	'h1_classes' => ['primary'],
	'content' => get_post_meta(get_the_ID(), 'share_feedback_section_one_content', true),
	'content_classes' => [],
	'container_classes' => ['bg-gray'],
	'wrapper_classes' => ['left-side'],
]);
partial('section.share-review', [
	'classes' => ['bg-gray-9', 'share-feedback'],
	'heading' => get_post_meta(get_the_ID(), 'share_feedback_section_two_heading', true),
	'locations' => $brand_locations,
]);
$bottom_image_id = get_post_meta(get_the_ID(), 'share_feedback_section_three_image', true);
partial('section.share-your-smile', [
	'main_heading' => get_post_meta(get_the_ID(), 'share_feedback_section_three_main_heading', true),
	'main_content' => get_post_meta(get_the_ID(), 'share_feedback_section_three_main_content', true),
	'second_heading' => get_post_meta(get_the_ID(), 'share_feedback_section_three_second_heading', true),
	'second_content' => get_post_meta(get_the_ID(), 'share_feedback_section_three_second_content', true),
	'image' => [
		'src' => wp_get_attachment_image_src($bottom_image_id, 'medium_large')[0],
		'alt' => get_post_meta($bottom_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['mosaic'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($bottom_image_id, 'medium_large')[0],
		'alt' => get_post_meta($bottom_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['mosaic', 'mobile'],
	]
]);
get_footer();
