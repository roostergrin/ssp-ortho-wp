<?
global $site_404_settings;
$settings = $site_404_settings->_404;

get_header();
partial('section.hero.standard', [
	'desktop_image' => [
		'src' => wp_get_attachment_image_src($settings->desktop_image, 'full')[0],
		'alt' => get_post_meta($settings->desktop_image, '_wp_attachment_image_alt', true),
		'classes' => ['desktop']
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($settings->mobile_image, 'medium_large')[0],
		'alt' => get_post_meta($settings->mobile_image, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
	'classes' => ['error404', 'parallax'],
	'h1' => $settings->heading,
	'h1_classes' => ['primary'],
	'wrapper_classes' => ['left-side'],
	'content' => apply_filters('the_content', $settings->content)
]);
get_footer();
