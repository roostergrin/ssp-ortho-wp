<?
# Template Name: Braces
global $smile_transformations;
$brand = is_brand();
$location = is_single_location_brand() ? get_single_location_brand() : is_location();
$region = array();
if(!empty($location)) {
	$region = get_region_for_location($location->ID, false, true);
}

get_header();
$braces_hero_desktop_image = get_post_meta(get_the_id(), 'braces_hero_desktop_image', true);
$braces_hero_mobile_image = get_post_meta(get_the_id(), 'braces_hero_mobile_image', true);
partial('section.hero.standard', [
	'classes' => ['parallax', 'braces', sanitize_title($brand->post_title)],
	'desktop_image' => [
		'src' => wp_get_attachment_image_src($braces_hero_desktop_image, 'full')[0],
		'alt' => get_post_meta($braces_hero_desktop_image, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($braces_hero_mobile_image, 'full')[0],
		'alt' => get_post_meta($braces_hero_mobile_image, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
]);
partial('section.copy.two-cols-box-with-image', [
	'classes' => ['braces', 'reverse'],
	'h1' => get_post_meta(get_the_id(), 'braces_section_two_main_heading', true),
	'h1_classes' => ['white'],
	'content' => apply_filters('the_content', get_post_meta(get_the_id(), 'braces_section_two_main_content', true)),
	'h2' => get_post_meta(get_the_id(), 'braces_section_two_secondary_heading', true),
	'h2_classes' => ['h3'],
	'aside_content' => apply_filters('the_content', get_post_meta(get_the_id(), 'braces_section_two_secondary_content', true)),
]);

partial('section.icons.with-copy', [
	'classes' => ['bg-gray', sanitize_title($brand->post_title)],
	'heading' => '<h3 class="blue centered text-center">'.(get_post_meta(get_the_id(), 'braces_section_three_heading', true)).'</h3>',
	'icons' => [
		'widget.icons.' . get_post_meta(get_the_id(), 'braces_section_three_icons_icon_1_icon', true) => get_post_meta(get_the_id(), 'braces_section_three_icons_icon_1_content', true),
		'widget.icons.' . get_post_meta(get_the_id(), 'braces_section_three_icons_icon_2_icon', true) => get_post_meta(get_the_id(), 'braces_section_three_icons_icon_2_content', true),
		'widget.icons.' . get_post_meta(get_the_id(), 'braces_section_three_icons_icon_3_icon', true) => get_post_meta(get_the_id(), 'braces_section_three_icons_icon_3_content', true),
	]
]);



$num_slides = get_braces_carousel_slide_count( $brand->post_name );

if ($brand->ID == 16618 ) {
	$num_slides = 5;	
}

partial('section.service.braces.carousel', [
	'h3' => get_post_meta(get_the_ID(), 'braces_section_four_heading', true),
	'h3_classes' => ['h1'],
	'content' => get_post_meta(get_the_ID(), 'braces_section_four_content', true),
	'from' => 'braces',
	'slides' => $num_slides,
]);
$section_five_cta = get_post_meta(get_the_ID(), 'braces_section_five_cta', true);

$num_for_rand = 8;
$smile_transformation_ids = array_rand(get_smile_transformations_by_region_or_brand($region), $num_for_rand);
$smiles = array_values(array_filter(get_smile_transformations_by_region_or_brand($region), function($smile) use ($smile_transformation_ids) {
	return in_array($smile->ID, $smile_transformation_ids);
}));
partial('section.smile-gallery', [
	'h3' => get_post_meta(get_the_ID(), 'braces_section_five_heading', true),
	'h3_classes' => ['h2'],
	'content' => get_post_meta(get_the_ID(), 'braces_section_five_content', true),
	'cta' => do_shortcode($section_five_cta),
	'gallery' => $smiles
]);
$braces_section_six_desktop_image = get_post_meta(get_the_id(), 'braces_section_six_desktop_image', true);
$braces_section_six_mobile_image = get_post_meta(get_the_id(), 'braces_section_six_mobile_image', true);
partial('section.hero.full', [
	'classes' => ['parallax', 'braces', sanitize_title($brand->post_title)],
	'overlay' => false,
	'background_image' => wp_get_attachment_image_src($braces_section_six_desktop_image, 'full')[0],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($braces_section_six_mobile_image, 'full')[0],
		'alt' => get_post_meta($braces_section_six_mobile_image, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
	'content' => [
		'classes' => ['straight-talk', 'bg-grey-2', 'animate-in'],
		'h3' => get_post_meta(get_the_id(), 'braces_section_six_heading', true),
		'h3_classes' => ['primary'],
		'content' => apply_filters('the_content', get_post_meta(get_the_id(), 'braces_section_six_content', true)),
	]
]);
$braces_section_seven_cta = get_post_meta(get_the_id(), 'braces_section_seven_cta', true);

$carousel_icons = array();
for($i = 1; $i < 3; $i++) {
 $ico_str = 'braces_section_seven_icons_icon_' . $i . '_icon';
 $ico = get_post_meta(get_the_id(), $ico_str, true);
 if(!empty($ico)) {
	$carousel_icons[] = ['widget.icons.' . $ico];
 }
}
partial('section.icons.two-cols-carousel', [
	'h3' => get_post_meta(get_the_id(), 'braces_section_seven_heading', true),
	'h3_classes' => [],
	'content' => apply_filters('the_content', get_post_meta(get_the_id(), 'braces_section_seven_content', true)) . '<p>'. do_shortcode($braces_section_seven_cta) .'</p>',
	'carousel' => $carousel_icons
]);
get_footer();
