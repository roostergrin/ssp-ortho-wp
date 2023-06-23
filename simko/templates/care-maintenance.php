<?php
# Template Name: Care & Maintenance

$brand = is_brand();
$location = is_location();

$hero_desktop_image = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_hero_desktop_image', true);
$hero_mobile_image = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_hero_mobile_image', true);
$hero_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_hero_heading', true);
$hero_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_hero_content', true);
$hero_subheading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_hero_subheading', true);
$hero_subheading_cta = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_hero_subheading_cta', true);

$section_two_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_heading', true);
$section_two_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_content', true);
$section_two_cta = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_cta', true);
$section_two_url = !empty($section_two_cta) ? $section_two_cta['url'] : '';
$section_two_title = !empty($section_two_cta) ? $section_two_cta['title'] : '';
$section_two_aside_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_aside_heading', true);
$section_two_image_and_icon_carousel = [];
for($i = 1; $i < 5; $i++) {
	$section_two_image_and_icon_carousel[] =
	[
		'class' => 'icon-' . get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_icon_'. $i .'_icon', true),
		'title' => get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_icon_'. $i .'_heading', true),
		'copy' =>get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_icon_'. $i .'_content', true)
	];
}
$section_two_desktop_image = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_desktop_image', true);
$brushing_attachment_id = intval($section_two_desktop_image);
$brushing_attachment_image_1x = wp_get_attachment_image_src($brushing_attachment_id, 'medium_large');
$brushing_attachment_image_2x = wp_get_attachment_image_src($brushing_attachment_id, 'large');
$brushing_attachment_image_full = wp_get_attachment_image_src($brushing_attachment_id, '2048x2048');
$section_2_aside_repeater_count = intval(get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_aside_repeater', true));
$section_2_aside_repeater_content = '';
for($j = 0; $j < $section_2_aside_repeater_count; $j++) {
	$two_aside_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_aside_repeater_'. $j .'_heading', true);
	$two_aside_heading = !empty($two_aside_heading) ? '<strong>' . $two_aside_heading . '</strong>' : '';
	$two_aside_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_two_aside_repeater_'. $j .'_content', true);
	$section_2_aside_repeater_content .= $two_aside_heading . apply_filters('the_content', $two_aside_content);
}

$section_three_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_three_heading', true);
$section_three_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_three_content', true);
$section_three_cta = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_three_cta', true);

$section_four_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_heading', true);
$section_four_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_content', true);
$section_four_packet_id = $location ? $location->while_eating_packet : $brand->while_eating_packet;
$section_four_cta_text = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_cta_text', true);
$section_four_image_and_icon_carousel = [];
for($k = 1; $k < 5; $k++) {
	$section_four_image_and_icon_carousel[] =
	[
		'class' => 'icon-' . get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_icon_'. $k .'_icon', true),
		'title' => get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_icon_'. $k .'_heading', true),
		'copy' =>get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_icon_'. $k .'_content', true)
	];
}
$section_four_desktop_image = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_desktop_image', true);
$four_aside_attachment_id = intval($section_four_desktop_image);
$four_aside_attachment_image_1x = wp_get_attachment_image_src($four_aside_attachment_id, 'medium_large');
$four_aside_attachment_image_2x = wp_get_attachment_image_src($four_aside_attachment_id, 'large');
$four_aside_attachment_image_full = wp_get_attachment_image_src($four_aside_attachment_id, '2048x2048');
$section_four_aside_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_aside_heading', true);
$section_four_aside_repeater_count = intval(get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_aside_repeater', true));
$section_four_aside_repeater_content = '';
for($l = 0; $l < $section_four_aside_repeater_count; $l++) {
	$four_aside_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_aside_repeater_'. $l .'_heading', true);
	$four_aside_heading = !empty($four_aside_heading) ? '<strong>' . $four_aside_heading . '</strong>' : '';
	$four_aside_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_four_aside_repeater_'. $l .'_content', true);
	$section_four_aside_repeater_content .= $four_aside_heading . apply_filters('the_content', $four_aside_content);
}

$section_five_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_five_heading', true);
$section_five_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_five_content', true);
$section_five_packet_id = $location ? $location->invisalign_aligners_packet : $brand->invisalign_aligners_packet;
$section_five_cta_text = get_post_meta(get_the_id(),  'orthodontic_care_and_maintenance_section_five_cta_text', true);
$section_five_image_and_icon_carousel = [];
for($m = 1; $m < 5; $m++) {
	$section_five_image_and_icon_carousel[] =
	[
		'class' => 'icon-' . get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_five_icon_'. $m .'_icon', true),
		'title' => get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_five_icon_'. $m .'_heading', true),
		'copy' =>get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_five_icon_'. $m .'_content', true)
	];
}
$section_five_aside_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_five_aside_heading', true);
$section_five_aside_repeater_count = intval(get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_five_aside_repeater', true));
$section_five_aside_repeater_content = '';
for($n = 0; $n < $section_five_aside_repeater_count; $n++) {
	$sec_five_aside_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_five_aside_repeater_'. $n .'_heading', true);
	$sec_five_aside_heading = !empty($sec_five_aside_heading) ? '<strong>' . $sec_five_aside_heading . '</strong>' : '';
	$sec_five_aside_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_five_aside_repeater_'. $n .'_content', true);
	$section_five_aside_repeater_content .= $sec_five_aside_heading . apply_filters('the_content', $sec_five_aside_content);
}
$section_five_desktop_image = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_five_desktop_image', true);
$five_aside_attachment_id = intval($section_five_desktop_image);
$five_aside_attachment_image_1x = wp_get_attachment_image_src($five_aside_attachment_id, 'medium_large');
$five_aside_attachment_image_2x = wp_get_attachment_image_src($five_aside_attachment_id, 'large');
$five_aside_attachment_image_full = wp_get_attachment_image_src($five_aside_attachment_id, '2048x2048');

$section_six_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_heading', true);
$section_six_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_content', true);
$section_six_packet_id = $location ? $location->retainer_packet : $brand->retainer_packet;
$section_six_cta_text = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_cta_text', true);
$section_six_image_and_icon_carousel = [];
for($o = 1; $o < 5; $o++) {
	$section_six_image_and_icon_carousel[] =
	[
		'class' => 'icon-' . get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_icon_'. $o .'_icon', true),
		'title' => get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_icon_'. $o .'_heading', true),
		'copy' =>get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_icon_'. $o .'_content', true)
	];
}
$section_six_aside_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_aside_heading', true);
$section_six_aside_repeater_count = intval(get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_aside_repeater', true));
$section_six_aside_repeater_content = '';
for($p = 0; $p < $section_six_aside_repeater_count; $p++) {
	$sec_five_aside_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_aside_repeater_'. $p .'_heading', true);
	$sec_five_aside_heading = !empty($sec_five_aside_heading) ? '<strong>' . $sec_five_aside_heading . '</strong>' : '';
	$sec_five_aside_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_aside_repeater_'. $p .'_content', true);
	$section_six_aside_repeater_content .= $sec_five_aside_heading . apply_filters('the_content', $sec_five_aside_content);
}
$section_six_desktop_image = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_six_desktop_image', true);
$six_aside_attachment_id = intval($section_six_desktop_image);
$six_aside_attachment_image_1x = wp_get_attachment_image_src($six_aside_attachment_id, 'medium_large');
$six_aside_attachment_image_2x = wp_get_attachment_image_src($six_aside_attachment_id, 'large');
$six_aside_attachment_image_full = wp_get_attachment_image_src($six_aside_attachment_id, '2048x2048');

$section_seven_bool = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_seven_bool', true);
$section_seven_heading = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_seven_heading', true);
$section_seven_content = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_seven_content', true);
$section_seven_cta_text = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_seven_cta_text', true);
$section_seven_cta_link = get_post_meta(get_the_id(), 'orthodontic_care_and_maintenance_section_seven_cta_link', true);

get_header();
partial('section.hero.standard', [
	'classes' => ['parallax', 'orthodontic-care-maintenance', sanitize_title($brand->post_title)],
	'desktop_image' => [
		'src' => wp_get_attachment_image_src($hero_desktop_image, 'full')[0],
		'alt' => get_post_meta($hero_desktop_image, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($hero_mobile_image, 'medium_large')[0],
		'alt' => get_post_meta($hero_mobile_image, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	]
]);
partial('section.copy.two-cols-box-with-image', [
	'classes' => ['orthodontic-care-maintenance', sanitize_title($brand->post_title)],
	'h1' => $hero_heading,
	'h1_classes' => ['white'],
	'content' => apply_filters('the_content', $hero_content),
	'h2' => $hero_subheading,
	'h2_classes' => ['h4', 'primary', 'font-weight-ultra-light'],
	'aside_content' => $hero_subheading_cta,
]);

partial('section.copy.two-cols-with-image-and-icons-carousel', [
	'article' => [
		'<h2>'. $section_two_heading .'</h2>',
		apply_filters('the_content', $section_two_content),
		'<div class="bottom-links"><a href="'.($section_two_url).'" class="cta text" target="_blank">'.($section_two_title).'</a></div>'
	],
	'carousel' => $section_two_image_and_icon_carousel,
	'aside' => [
		'heading' => '<h2>'. $section_two_aside_heading .'</h2>',
		'content' => $section_2_aside_repeater_content,
		'image' => [
			'src' => $brushing_attachment_image_1x[0],
			'srcset' => $brushing_attachment_image_1x[0].' 1x, '. $brushing_attachment_image_2x[0].' 2x, '.$brushing_attachment_image_full[0].' 3x',
			'sizes' => '100vw',
			'width' => $brushing_attachment_image_1x[1],
			'height' => $brushing_attachment_image_1x[2],
			'alt' => !empty(get_post_meta($brushing_attachment_id, '_wp_attachment_image_alt', true)) ? get_post_meta($brushing_attachment_id, '_wp_attachment_image_alt', true) : str_replace('_', ' ', get_the_title($brushing_attachment_id)),
			'classes' => [get_the_title($brushing_attachment_id), 'top-left-radius'],
		],
	],
	'container_classes' => []
]);

partial('section.icons.static-with-copy', [
	'classes' => ['bg-gray'],
	'heading' => '<h2 class="centered text-center gray">'. $section_three_heading .'</h2>',
	'content' => apply_filters('the_content', $section_three_content) . '<p class="center">' . apply_filters('the_content', $section_three_cta) . '</p>',
	'icons' => []
]);

partial('section.copy.two-cols-with-image-and-icons-carousel', [
	'article' => [
		'<h2>'. $section_four_heading .'</h2>',
		apply_filters('the_content', $section_four_content),
		'<div class="bottom-links"><a href="' . wp_get_attachment_url($section_four_packet_id) . '" class="cta text" target="_blank">' . $section_four_cta_text . '</a></div>'
	],
	'carousel' => $section_four_image_and_icon_carousel,
	'aside' => [
		'heading' => '<h2>'. $section_four_aside_heading .'</h2>',
		'content' => $section_four_aside_repeater_content,
		'image' => [
			'src' => $four_aside_attachment_image_1x[0],
			'srcset' => $four_aside_attachment_image_1x[0] . ' 1x '.  $four_aside_attachment_image_2x[0] . ' 2x '.  $four_aside_attachment_image_full[0] . ' 3x',
			'sizes' => '100vw',
			'width' => $four_aside_attachment_image_1x[1],
			'height' => $four_aside_attachment_image_1x[2],
			'alt' => !empty(get_post_meta($four_aside_attachment_id, '_wp_attachment_image_alt', true)) ? get_post_meta($four_aside_attachment_id, '_wp_attachment_image_alt', true) : str_replace('_', ' ', get_the_title($four_aside_attachment_id)),
			'classes' => ['top-left-radius'],
		],
	],
	'container_classes' => []
]);

partial('section.copy.two-cols-with-image-and-icons-carousel', [
	'article' => [
		'<h2>'. $section_five_heading .'</h2>',
		apply_filters('the_content', $section_five_content),
		'<div class="bottom-links"><a href="' . wp_get_attachment_url($section_five_packet_id) . '" class="cta text" target="_blank">' . $section_five_cta_text . '</a></div>'
	],
	'carousel' => $section_five_image_and_icon_carousel,
	'aside' => [
		'heading' => '<h2>'. $section_five_aside_heading .'</h2>',
		'content' => $section_five_aside_repeater_content,
		'image' => [
			'src' => $five_aside_attachment_image_1x[0],
			'srcset' => $five_aside_attachment_image_1x[0] . ' 1x '.  $five_aside_attachment_image_2x[0] . ' 2x '.  $five_aside_attachment_image_full[0] . ' 3x',
			'sizes' => '100vw',
			'width' => $five_aside_attachment_image_1x[1],
			'height' => $five_aside_attachment_image_1x[2],
			'alt' => !empty(get_post_meta($five_aside_attachment_id, '_wp_attachment_image_alt', true)) ? get_post_meta($five_aside_attachment_id, '_wp_attachment_image_alt', true) : str_replace('_', ' ', get_the_title($five_aside_attachment_id)),
			'classes' => ['top-right-radius'],
		],
	],
	'container_classes' => ['reverse']
]);

partial('section.copy.two-cols-with-image-and-icons-carousel', [
	'article' => [
		'<h2>'. $section_six_heading .'</h2>',
		apply_filters('the_content', $section_six_content),
		'<div class="bottom-links"><a href="' . wp_get_attachment_url($section_six_packet_id) . '" class="cta text" target="_blank">' . $section_six_cta_text . '</a></div>'
	],
	'carousel' => $section_six_image_and_icon_carousel,
	'aside' => [
		'heading' => '<h2>'. $section_six_aside_heading .'</h2>',
		'content' => $section_six_aside_repeater_content,
		'image' => [
			'src' => $six_aside_attachment_image_1x[0],
			'srcset' => $six_aside_attachment_image_1x[0] . ' 1x '.  $six_aside_attachment_image_2x[0] . ' 2x '.  $six_aside_attachment_image_full[0] . ' 3x',
			'sizes' => '100vw',
			'width' => $six_aside_attachment_image_1x[1],
			'height' => $six_aside_attachment_image_1x[2],
			'alt' => !empty(get_post_meta($six_aside_attachment_id, '_wp_attachment_image_alt', true)) ? get_post_meta($six_aside_attachment_id, '_wp_attachment_image_alt', true) : str_replace('_', ' ', get_the_title($six_aside_attachment_id)),
			'classes' => ['top-left-radius'],
		],
	],
	'container_classes' => []
]);
//Optional Free Mouthguards
if($section_seven_bool) {
	partial('section.icons.static-with-copy', [
		'classes' => ['bg-gray', 'extra-margin-bottom'],
		'heading' => '<h2 class="centered text-center gray">'. $section_seven_heading .'</h2>',
		'content' => apply_filters('the_content', $section_seven_content) . '<p class="center"><a href="' . $section_seven_cta_link . '" class="cta text">' . $section_seven_cta_text .'</a></p>',
		'icons' => []
	]);
}

get_footer();
