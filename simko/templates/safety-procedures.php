<?
# Template Name: Safety Orthodontic Care
$brand = is_brand();

$safer_orthodontic_care_hero_mobile_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_hero_mobile_image', true);
$safer_orthodontic_care_hero_desktop_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_hero_desktop_image', true);
$main_attachment_image_1x = wp_get_attachment_image_src($safer_orthodontic_care_hero_mobile_image, 'large');
$main_attachment_image_2x = wp_get_attachment_image_src($safer_orthodontic_care_hero_desktop_image, '2048x2048');

$safer_orthodontic_care_section_three_mobile_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_three_mobile_image', true);
$safer_orthodontic_care_section_three_desktop_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_three_desktop_image', true);
$before_care_attachment_image_1x = wp_get_attachment_image_src($safer_orthodontic_care_section_three_mobile_image, 'large');
$before_care_attachment_image_2x = wp_get_attachment_image_src($safer_orthodontic_care_section_three_desktop_image, '2048x2048');

$safer_orthodontic_care_section_four_mobile_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_four_mobile_image', true);
$safer_orthodontic_care_section_four_desktop_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_four_desktop_image', true);
$patient_arrival_attachment_image_1x = wp_get_attachment_image_src($safer_orthodontic_care_section_four_mobile_image, 'large');
$patient_arrival_attachment_image_2x = wp_get_attachment_image_src($safer_orthodontic_care_section_four_desktop_image, '2048x2048');

$safer_orthodontic_care_section_five_mobile_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_five_mobile_image', true);
$safer_orthodontic_care_section_five_desktop_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_five_desktop_image', true);
$waiting_room_attachment_image_1x = wp_get_attachment_image_src($safer_orthodontic_care_section_five_mobile_image, 'large');
$waiting_room_attachment_image_2x = wp_get_attachment_image_src($safer_orthodontic_care_section_five_desktop_image, '2048x2048');

$safer_orthodontic_care_section_six_mobile_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_six_desktop_image', true);
$safer_orthodontic_care_section_six_desktop_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_six_desktop_image', true);
$staff_requirements_attachment_image_1x = wp_get_attachment_image_src($safer_orthodontic_care_section_six_mobile_image, 'large');
$staff_requirements_attachment_image_2x = wp_get_attachment_image_src($safer_orthodontic_care_section_six_desktop_image, '2048x2048');

$safer_orthodontic_care_hero_heading = get_post_meta(get_the_id(), 'safer_orthodontic_care_hero_heading', true);
$safer_orthodontic_care_hero_content = get_post_meta(get_the_id(), 'safer_orthodontic_care_hero_content', true);

$safer_orthodontic_care_section_two_heading = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_two_heading', true);
$safer_orthodontic_care_section_two_content = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_two_content', true);

$safer_orthodontic_care_section_four_heading = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_four_heading', true);
$safer_orthodontic_care_section_four_content = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_four_content', true);
$safer_orthodontic_care_section_four_desktop_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_four_desktop_image', true);
$safer_orthodontic_care_section_four_mobile_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_four_mobile_image', true);
$section_four_carousel = [];
for($j = 1; $j < 5; $j++) {
	$section_four_carousel[] =	[
		'class' => 'icon-' . get_post_meta(get_the_id(), 'safer_orthodontic_care_section_four_icon_'. $j .'_icon_'. $j .'_icon', true),
		'title' => get_post_meta(get_the_id(), 'safer_orthodontic_care_section_four_icon_'. $j .'_icon_'. $j .'_heading', true),
		'copy' => get_post_meta(get_the_id(), 'safer_orthodontic_care_section_four_icon_'. $j .'_icon_'. $j .'_content', true),
	];
}

$safer_orthodontic_care_section_five_heading = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_five_heading', true);
$safer_orthodontic_care_section_five_content = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_five_content', true);
$safer_orthodontic_care_section_five_desktop_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_five_desktop_image', true);
$safer_orthodontic_care_section_five_mobile_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_five_mobile_image', true);
$section_five_carousel = [];
for($k = 1; $k < 5; $k++) {
	$section_five_carousel[] =	[
		'class' => 'icon-' . get_post_meta(get_the_id(), 'safer_orthodontic_care_section_five_icon_'. $k .'_icon_'. $k .'_icon', true),
		'title' => get_post_meta(get_the_id(), 'safer_orthodontic_care_section_five_icon_'. $k .'_icon_'. $k .'_heading', true),
		'copy' => get_post_meta(get_the_id(), 'safer_orthodontic_care_section_five_icon_'. $k .'_icon_'. $k .'_content', true),
	];
}

$safer_orthodontic_care_section_six_heading = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_six_heading', true);
$safer_orthodontic_care_section_six_content = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_six_content', true);
$safer_orthodontic_care_section_six_desktop_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_six_desktop_image', true);
$safer_orthodontic_care_section_six_mobile_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_six_mobile_image', true);
$section_six_carousel = [];
for($l = 1; $l < 5; $l++) {
	$section_six_carousel[] =	[
		'class' => 'icon-' . get_post_meta(get_the_id(), 'safer_orthodontic_care_section_six_icon_'. $l .'_icon_'. $l .'_icon', true),
		'title' => get_post_meta(get_the_id(), 'safer_orthodontic_care_section_six_icon_'. $l .'_icon_'. $l .'_heading', true),
		'copy' => get_post_meta(get_the_id(), 'safer_orthodontic_care_section_six_icon_'. $l .'_icon_'. $l .'_content', true),
	];
}

$safer_orthodontic_care_section_seven_heading = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_seven_heading', true);
$safer_orthodontic_care_section_seven_content = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_seven_content', true);
$safer_orthodontic_care_section_seven_desktop_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_seven_desktop_image', true);
$safer_orthodontic_care_section_seven_mobile_image = get_post_meta(get_the_id(), 'safer_orthodontic_care_section_seven_mobile_image', true);

get_header();
partial('section.hero.image-content-two-column', [
	'classes' => [sanitize_title($brand->post_title)],
	'h1' => $safer_orthodontic_care_hero_heading,
	'h1_classes' => ['primary'],
	'content' => apply_filters('the_content', $safer_orthodontic_care_hero_content),
	'image' => [
		'src' => $main_attachment_image_1x[0],
		'srcset' => $main_attachment_image_1x[0].' 1x, '.$main_attachment_image_2x[0].' 2x',
		'sizes' => '100vw',
		'width' => $main_attachment_image_1x[1],
		'height' => $main_attachment_image_1x[2],
		'alt' => !empty(get_post_meta($safer_orthodontic_care_hero_desktop_image, '_wp_attachment_image_alt', true)) ? get_post_meta($safer_orthodontic_care_hero_desktop_image, '_wp_attachment_image_alt', true) : str_replace(['_', '-'], [' ', ' '], get_the_title($safer_orthodontic_care_hero_desktop_image)),
		'classes' => [get_the_title($safer_orthodontic_care_hero_desktop_image), 'desktop', 'bottom-left-radius']
	],
	'mobile_image' => [
		'src' => $main_attachment_image_1x[0],
		'srcset' => $main_attachment_image_1x[0].' 1x, '.$main_attachment_image_2x[0].' 2x',
		'sizes' => '100vw',
		'width' => $main_attachment_image_1x[1],
		'height' => $main_attachment_image_1x[2],
		'alt' => !empty(get_post_meta($safer_orthodontic_care_hero_mobile_image, '_wp_attachment_image_alt', true)) ? get_post_meta($safer_orthodontic_care_hero_mobile_image, '_wp_attachment_image_alt', true) : str_replace('_', ' ', get_the_title($safer_orthodontic_care_hero_mobile_image)),
		'classes' => [get_the_title($safer_orthodontic_care_hero_mobile_image), 'mobile']
	],
]);
partial('section.copy.full', [
	'classes' => ['safer-orthodontic-care', 'center'],
	'h2' => $safer_orthodontic_care_section_two_heading,
	'h2_classes' => ['primary', 'center'],
	'content' => apply_filters('the_content', $safer_orthodontic_care_section_two_content, true),
]);
partial('section.icons.two-cols-carousel-with-image', [
	'classes' => ['second', 'reverse'],
	'h3' => $safer_orthodontic_care_section_four_heading,
	'h3_classes' => ['h2'],
	'content' => apply_filters('the_content', $safer_orthodontic_care_section_four_content),
	'image' => [
		'src' => $patient_arrival_attachment_image_1x[0],
		'srcset' => $patient_arrival_attachment_image_1x[0].' 1x, '.$patient_arrival_attachment_image_2x[0].' 2x',
		'sizes' => '100vw',
		'width' => $patient_arrival_attachment_image_1x[1],
		'height' => $patient_arrival_attachment_image_1x[2],
		'alt' => !empty(get_post_meta($safer_orthodontic_care_section_four_desktop_image, '_wp_attachment_image_alt', true)) ? get_post_meta($safer_orthodontic_care_section_four_desktop_image, '_wp_attachment_image_alt', true) : str_replace(['_', '-'], [' ', ' '], get_the_title($safer_orthodontic_care_section_four_desktop_image)),
		'classes' => [get_the_title($safer_orthodontic_care_section_four_desktop_image), 'desktop', 'bottom-right-radius', 'top-right-radius', 'bg-img']
	],
	'mobile_image' => [
		'src' => $patient_arrival_attachment_image_1x[0],
		'srcset' => $patient_arrival_attachment_image_1x[0].' 1x, '.$patient_arrival_attachment_image_2x[0].' 2x',
		'sizes' => '100vw',
		'width' => $patient_arrival_attachment_image_1x[1],
		'height' => $patient_arrival_attachment_image_1x[2],
		'alt' => !empty(get_post_meta($safer_orthodontic_care_section_four_mobile_image, '_wp_attachment_image_alt', true)) ? get_post_meta($safer_orthodontic_care_section_four_mobile_image, '_wp_attachment_image_alt', true) : str_replace(['_', '-'], [' ', ' '], get_the_title($safer_orthodontic_care_section_four_mobile_image)),
		'classes' => [get_the_title($safer_orthodontic_care_section_four_mobile_image), 'mobile', 'bottom-right-radius', 'top-right-radius']
	],
	'carousel' => $section_four_carousel,
]);
partial('section.icons.two-cols-carousel-with-image', [
	'classes' => ['third'],
	'h3' => $safer_orthodontic_care_section_five_heading,
	'h3_classes' => ['h2'],
	'content' => $safer_orthodontic_care_section_five_content,
	'image' => [
		'src' => $waiting_room_attachment_image_1x[0],
		'srcset' => $waiting_room_attachment_image_1x[0].' 1x, '.$waiting_room_attachment_image_2x[0].' 2x',
		'sizes' => '100vw',
		'width' => $waiting_room_attachment_image_1x[1],
		'height' => $waiting_room_attachment_image_1x[2],
		'alt' => !empty(get_post_meta($safer_orthodontic_care_section_five_desktop_image, '_wp_attachment_image_alt', true)) ? get_post_meta($safer_orthodontic_care_section_five_desktop_image, '_wp_attachment_image_alt', true) : str_replace(['_', '-'], [' ', ' '], get_the_title($safer_orthodontic_care_section_five_desktop_image)),
		'classes' => [get_the_title($safer_orthodontic_care_section_five_desktop_image), 'desktop', 'top-left-radius', 'bottom-left-radius', 'bg-img']
	],
	'mobile_image' => [
		'src' => $waiting_room_attachment_image_1x[0],
		'srcset' => $waiting_room_attachment_image_1x[0].' 1x, '.$waiting_room_attachment_image_2x[0].' 2x',
		'sizes' => '100vw',
		'width' => $waiting_room_attachment_image_1x[1],
		'height' => $waiting_room_attachment_image_1x[2],
		'alt' => !empty(get_post_meta($safer_orthodontic_care_section_five_mobile_image, '_wp_attachment_image_alt', true)) ? get_post_meta($safer_orthodontic_care_section_five_mobile_image, '_wp_attachment_image_alt', true) : str_replace(['_', '-'], [' ', ' '], get_the_title($safer_orthodontic_care_section_five_mobile_image)),
		'classes' => [get_the_title($safer_orthodontic_care_section_five_mobile_image), 'mobile', 'top-left-radius', 'bottom-left-radius']
	],
	'carousel' => $section_five_carousel,
]);
partial('section.icons.two-cols-carousel-with-image', [
	'classes' => ['fourth', 'reverse'],
	'h3' => $safer_orthodontic_care_section_six_heading,
	'h3_classes' => ['h2'],
	'content' => apply_filters('the_content', $safer_orthodontic_care_section_six_content),
	'image' => [
		'src' => $staff_requirements_attachment_image_1x[0],
		'srcset' => $staff_requirements_attachment_image_1x[0].' 1x, '.$staff_requirements_attachment_image_2x[0].' 2x',
		'sizes' => '100vw',
		'width' => $staff_requirements_attachment_image_1x[1],
		'height' => $staff_requirements_attachment_image_1x[2],
		'alt' => !empty(get_post_meta($safer_orthodontic_care_section_six_desktop_image, '_wp_attachment_image_alt', true)) ? get_post_meta($safer_orthodontic_care_section_six_desktop_image, '_wp_attachment_image_alt', true) : str_replace(['_', '-'], [' ', ' '], get_the_title($safer_orthodontic_care_section_six_desktop_image)),
		'classes' => [get_the_title($safer_orthodontic_care_section_six_desktop_image), 'desktop', 'bottom-right-radius', 'top-right-radius', 'bg-img']
	],
	'mobile_image' => [
		'src' => $staff_requirements_attachment_image_1x[0],
		'srcset' => $staff_requirements_attachment_image_1x[0].' 1x, '.$staff_requirements_attachment_image_2x[0].' 2x',
		'sizes' => '100vw',
		'width' => $staff_requirements_attachment_image_1x[1],
		'height' => $staff_requirements_attachment_image_1x[2],
		'alt' => !empty(get_post_meta($safer_orthodontic_care_section_six_mobile_image, '_wp_attachment_image_alt', true)) ? get_post_meta($safer_orthodontic_care_section_six_mobile_image, '_wp_attachment_image_alt', true) : str_replace(['_', '-'], [' ', ' '], get_the_title($safer_orthodontic_care_section_six_mobile_image)),
		'classes' => [get_the_title($safer_orthodontic_care_section_six_mobile_image), 'mobile', 'bottom-right-radius', 'top-right-radius']
	],
	'carousel' => $section_six_carousel,
]);
// if ($brand->post_title == 'Kristo Orthodontics') {
// 	partial('section.hero.full', [
// 		'classes' => ['safer-orthodontic-care', 'bottom-hero'],
// 		'image' => [
// 			'src' => wp_get_attachment_image_src($safer_orthodontic_care_section_seven_desktop_image, '2048x2048')[0],
// 			'alt' => get_post_meta($safer_orthodontic_care_section_seven_desktop_image, '_wp_attachment_image_alt', true),
// 			'classes' => ['desktop'],
// 		],
// 		'mobile_image' => [
// 			'src' => wp_get_attachment_image_src($safer_orthodontic_care_section_seven_mobile_image, 'medium_large')[0],
// 			'alt' => get_post_meta($safer_orthodontic_care_section_seven_mobile_image, '_wp_attachment_image_alt', true),
// 			'classes' => ['mobile'],
// 		],
// 		'content' => [
// 			'classes' => ['white'],
// 			'content' => '<div class="main-container"><div class="container"><h2 class="h3 white">'. $safer_orthodontic_care_section_seven_heading .'</h2>'. apply_filters('the_content', $safer_orthodontic_care_section_seven_content) .'</div></div>'
// 		]
// 	]);
// }
get_footer();
