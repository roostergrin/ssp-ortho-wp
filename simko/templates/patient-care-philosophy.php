<?
# Template Name: Patient Care Philosophy
$brand = is_brand();

get_header();
$hero_position = get_post_meta(get_the_id(), 'patient_care_philosophy_hero_position', true) ? 'right-side' : 'left-side'; // Default return 0 or left
$hero_text_color = get_post_meta(get_the_id(), 'patient_care_philosophy_hero_heading_color', true); // Default return 'primary'
$container_color_classes = $hero_text_color === 'primary' ? 'bg-gray' : 'bg-primary';
$hero_desktop_image_id = get_post_meta(get_the_ID(), 'patient_care_philosophy_hero_desktop_image', true);
$hero_mobile_image_id = get_post_meta(get_the_ID(), 'patient_care_philosophy_hero_mobile_image', true);
// If Shawano, send full sized image so mobile will be full-sized and relative acrossed responsive
if ($brand->ID == 12097) {
	$hero_image_mobile = wp_get_attachment_image_src($hero_mobile_image_id, 'full')[0];
	$hero_image_desktop = NULL;

} else {
	$hero_image_mobile = wp_get_attachment_image_src($hero_mobile_image_id, 'medium_large')[0];
	$hero_image_desktop = wp_get_attachment_image_src($hero_desktop_image_id, 'full')[0];

}
partial('section.hero.standard', [
	'desktop_image' => [
		'src' => $hero_image_desktop,
		'alt' => get_post_meta($hero_mobile_desktop_id, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => $hero_image_mobile,
		'alt' => get_post_meta($hero_mobile_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
	'classes' => ['parallax', 'patient-care-philosophy', sanitize_title($brand->post_title)],
	'container_classes' => [$container_color_classes],
	'wrapper_classes' => [$hero_position],
	'h1' => get_post_meta(get_the_ID(), 'patient_care_philosophy_hero_heading', true),
	'h1_classes' => [$hero_text_color],
]);
partial('section.copy.two-cols-with-cta', [
	'widget_classes' => ['sub-hero'],
	'content' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_two_content', true),
	'cta' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_two_cta', true)
]);
$section_three_desktop_image_id = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_three_desktop_image', true);
$section_three_mobile_image_id = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_three_mobile_image', true);
partial('section.hero.full', [
	'classes' => ['patient-care-philosophy', 'middle-hero', 'blue-overlay', 'parallax', sanitize_title($brand->post_title)],
	'background_image' => wp_get_attachment_image_src($section_three_desktop_image_id, 'full')[0],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($section_three_mobile_image_id, 'medium_large')[0],
		'alt' => get_post_meta($section_three_mobile_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
]);
partial('section.copy.full', [
	'h2' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_heading', true),
	'h2_classes' => ['primary'],
	'classes' => ['patient-care-philosophy'],
	'content' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_content', true)
]);
partial('section.service.three-cols-cards', [
	'classes' => ['patient-care-philosophy'],
	'cards' => [
		[
			'title' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_boxes_box_1_heading', true),
			'copy' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_boxes_box_1_content', true)
		],
		[
			'title' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_boxes_box_2_heading', true),
			'copy' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_boxes_box_2_content', true)
		],
		[
			'title' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_boxes_box_3_heading', true),
			'copy' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_boxes_box_3_content', true)
		]
	]
]);

if(!in_array($brand->ID, [13032, 13590])) {
	partial('section.icons.four-cols-carousel-our-practice', [
		'icons' => [
			[
				'icon' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_icons_icon_1_icon', true),
				'text' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_icons_icon_1_content', true),
			],
			[
				'icon' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_icons_icon_2_icon', true),
				'text' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_icons_icon_2_content', true),
			],
			[
				'icon' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_icons_icon_3_icon', true),
				'text' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_icons_icon_3_content', true),
			],
			[
				'icon' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_icons_icon_4_icon', true),
				'text' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_four_icons_icon_4_content', true),
			]
		]
	]);
}
$section_five_desktop_image_id = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_five_desktop_image', true);
$section_five_mobile_image_id = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_five_mobile_image', true);
partial('section.hero.full', [
	'classes' => ['parallax', 'patient-care-philosophy', 'middle-hero', 'made-it-easy', sanitize_title($brand->post_title)],
	'background_image' => wp_get_attachment_image_src($section_five_desktop_image_id, 'full')[0],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($section_five_mobile_image_id, 'medium_large')[0],
		'alt' => get_post_meta($section_five_mobile_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
	'content' => [
		'classes' => ['team', 'bg-grey-2', 'animate-in'],
		'h2' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_five_heading', true),
		'h2_classes' => ['primary'],
		'content' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_five_content', true)
	]
]);

if(!is_single_location_brand()) {
	partial('section.maps.search');
}
partial('section.copy.two-cols', [
	'classes' => [sanitize_title($brand->post_title)],
	'h2' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_six_heading', true),
	'h2_classes' => ['h1', 'primary'],
	'columns' => [
		get_post_meta(get_the_ID(), 'patient_care_philosophy_section_six_content_left', true),
		get_post_meta(get_the_ID(), 'patient_care_philosophy_section_six_content_right', true)
	],
]);
$tri_carousel_slides = [];
$slides_count = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_six_slides', true) ?? 0;
if ($slides_count > 0) {
	for ($i = 0; $i < $slides_count; $i++) {
		$attachment_id = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_six_slides_'.($i).'_slide_image', true);
		$attachment = wp_get_attachment_image_src($attachment_id, 'medium_large');
		$tri_carousel_slides[] = [
			'src' => $attachment[0],
			'width' => $attachment[1],
			'height' => $attachment[2],
			'alt' => !empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? str_replace('_', ' ', get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) : str_replace('_', ' ', get_the_title($attachment_id)),
			'classes' => [!empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? get_post_meta($attachment_id, '_wp_attachment_image_alt', true) : get_the_title($attachment_id)]
		];
	}
	shuffle($tri_carousel_slides);
	partial('section.tri-carousel', [
		'images' => $tri_carousel_slides
	]);
}
$icons = [];
$icons_count = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_seven_icons', true) ?? 0;
if ($icons_count > 0) {
	for ($i = 0; $i < $icons_count; $i++) {
		$icon_partial = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_seven_icons_'.($i).'_icon', true);
		$icon_heading = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_seven_icons_'.($i).'_heading', true);
		$icon_content = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_seven_icons_'.($i).'_content', true);
		$icons[$i] = [
			'widget_partial' => $icon_partial,
			'title' => $icon_heading,
			'copy' => $icon_content,
		];
	}
	partial('section.copy.half-with-icons', [
		'classes' => ['vertical'],
		'h2' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_seven_heading', true),
		'h2_classes' => ['primary'],
		'content' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_seven_content', true),
		'icons' => $icons
	]);
}
$community_involvement_slides = [];
$community_slides_count = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_eight_slides', true);
if ($community_slides_count > 0) {
	for ($i = 0; $i < $community_slides_count; $i++) {
		$attachment_id = get_post_meta(get_the_ID(), 'patient_care_philosophy_section_eight_slides_'.($i).'_slide_image', true);
		$attachment = wp_get_attachment_image_src($attachment_id, 'medium_large');
		$community_involvement_slides[$i] = [
			'image' => [
				'src' => $attachment[0],
				'width' => $attachment[1],
				'height' => $attachment[2],
				'alt' => !empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? str_replace('_', ' ', get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) : str_replace('_', ' ', get_the_title($attachment_id)),
				'classes' => [!empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? get_post_meta($attachment_id, '_wp_attachment_image_alt', true) : get_the_title($attachment_id)]
			],
			'mobile_image' => [
				'src' => $attachment[0],
				'width' => $attachment[1],
				'height' => $attachment[2],
				'alt' => !empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? str_replace('_', ' ', get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) : str_replace('_', ' ', get_the_title($attachment_id)),
				'classes' => [!empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? get_post_meta($attachment_id, '_wp_attachment_image_alt', true) : get_the_title($attachment_id)]
			],
		];
	}
	$anita_slide = array_shift($community_involvement_slides);
	shuffle($community_involvement_slides);
	array_unshift($community_involvement_slides, $anita_slide);
	partial('section.overlap-carousel', [
		'classes' => ['reverse'],
		'h3' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_eight_heading', true),
		'h3_classes' => ['primary h2'],
		'text' => get_post_meta(get_the_ID(), 'patient_care_philosophy_section_eight_content', true),
		'shortcode' => get_post_meta(get_the_id(), 'patient_care_philosophy_section_eight_cta', true),
		'slides' => $community_involvement_slides
	]);
}
$bottom_hero_desktop_image_id = get_post_meta(get_the_ID(), 'patient_care_philosophy_bottom_hero_desktop_image', true);
$bottom_hero_mobile_image_id = get_post_meta(get_the_ID(), 'patient_care_philosophy_bottom_hero_mobile_image', true);
partial('section.hero.full', [
	'classes' => ['bottom-hero', 'patient-care-philosophy', sanitize_title($brand->post_title)],
	'image' => [
		'src' => wp_get_attachment_image_src($bottom_hero_desktop_image_id, 'full')[0],
		'alt' => get_post_meta($bottom_hero_desktop_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($bottom_hero_mobile_image_id, 'medium_large')[0],
		'alt' => get_post_meta($bottom_hero_mobile_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
]);
get_footer();
