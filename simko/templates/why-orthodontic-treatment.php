<?
# Template Name: Why Orthodontic Treatment
global $smile_transformations;
$brand = is_brand();
$location = is_single_location_brand() ? get_single_location_brand() : is_location();
$region = array();
if(!empty($location)) {
	$region = get_region_for_location($location->ID, false, true);
}

get_header();
$hero_desktop_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_hero_desktop_image', true);
$hero_mobile_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_hero_mobile_image', true);
partial('section.hero.standard', [
	'desktop_image' => [
		'src' => wp_get_attachment_image_src($hero_desktop_image_id, 'full')[0],
		'alt' => get_post_meta($hero_desktop_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($hero_mobile_image_id, 'medium_large')[0],
		'alt' => get_post_meta($hero_mobile_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['mobile', 'bg-img'],
	],
	'classes' => ['parallax', 'why-orthodontic-treatment', sanitize_title($brand->post_title)],
	'h1' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_hero_heading', true),
	'h1_classes' => ['primary'],
	'content_classes' => ['why-orthodontic-treatment-copy'],
	'container_classes' => ['bg-gray', 'transparent'],
	'content' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_hero_content', true)
]);
$section_two_desktop_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_two_desktop_image', true);
$section_two_desktop_image = wp_get_attachment_image_src($section_two_desktop_image_id, 'medium_large');
$section_two_mobile_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_two_mobile_image', true);
$section_two_mobile_image = wp_get_attachment_image_src($section_two_mobile_image_id, 'medium_large');
partial('section.service.for-ages', [
	'classes' => ['first', 'dash-bottom'],
	'circle' => [
		'small' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_two_circle_text', true),
		'large' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_two_circle_range', true)
	],
	'h2' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_two_heading', true),
	'h2_classes' => [],
	'content' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_two_content', true),
	'image' => [
		'src' => $section_two_desktop_image[0],
		'alt' => get_post_meta($section_two_desktop_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_two_desktop_image[1],
		'height' => $section_two_desktop_image[2],
		'classes' => ['desktop', 'bottom-left-radius'],
	],
	'mobile_image' => [
		'src' => $section_two_mobile_image[0],
		'alt' => get_post_meta($section_two_mobile_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_two_mobile_image[1],
		'height' => $section_two_mobile_image[2],
		'classes' => ['mobile', 'top-left-radius', 'bottom-left-radius'],
	]
]);
$card_count = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_three_cards', true);
if ($card_count > 0) {
	$cards = [];
	for ($i = 0; $i < $card_count; $i++) {
		$cards[] = [
			'title' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_three_cards_'.($i).'_card_heading', true),
			'copy' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_three_cards_'.($i).'_card_content', true)
		];
	}
	partial('section.service.three-cols-cards', [
		'cards' => $cards
	]);
}
$section_four_desktop_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_four_desktop_image', true);
$section_four_desktop_image = wp_get_attachment_image_src($section_four_desktop_image_id, 'medium_large');
$section_four_mobile_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_four_mobile_image', true);
$section_four_mobile_image = wp_get_attachment_image_src($section_four_mobile_image_id, 'medium_large');
partial('section.service.for-ages', [
	'classes' => ['second', 'reverse', 'dash-top', 'dash-bottom'],
	'circle' => [
		'small' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_four_circle_text', true),
		'large' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_four_circle_range', true)
	],
	'h2' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_four_heading', true),
	'h2_classes' => [],
	'content' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_four_content', true),
	'image' => [
		'src' => $section_four_desktop_image[0],
		'alt' => get_post_meta($section_four_desktop_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_four_desktop_image[1],
		'height' => $section_four_desktop_image[2],
		'classes' => ['desktop', 'top-right-radius', 'bottom-right-radius'],
	],
	'mobile_image' => [
		'src' => $section_four_mobile_image[0],
		'alt' => get_post_meta($section_four_mobile_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_four_mobile_image[1],
		'height' => $section_four_mobile_image[2],
		'classes' => ['mobile', 'top-right-radius', 'bottom-right-radius'],
	]
]);

$section_five_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_five_image', true);
partial('section.copy.with-image', [
	'classes' => ['first'],
	'content' => '<p class="primary slide">'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_five_content', true)).'</p>',
	'image' => [
		'src' => wp_get_attachment_image_src($section_five_image_id, 'medium_large')[0],
		'alt' => get_post_meta($section_five_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['top-left-radius', 'bottom-left-radius', 'bg-img'],
	]
]);


$section_six_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_six_image', true);
partial('section.copy.with-image', [
	'classes' => ['second', 'reverse'],
	'content' => '<p class="primary slide">'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_six_content', true)).'</p>',
	'image' => [
		'src' => wp_get_attachment_image_src($section_six_image_id, 'medium_large')[0],
		'alt' => get_post_meta($section_six_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['top-right-radius', 'bottom-right-radius', 'bg-img'],
	]
]);

$section_seven_icon_name = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_seven_icon', true);
partial('section.copy.full', [
	'classes' => ['why-orthodontic-treatment', sanitize_title($brand->post_title)],
	'content' => '<div class="main-container bg-gray-2"><div class="img-container"><i class="icon-' . $section_seven_icon_name . '"></i></div><div class="content-container"><h3>'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_seven_heading', true)).'</h3><p>'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_seven_content', true)).'</p></div></div>'
]);
$section_eight_desktop_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_eight_desktop_image', true);
$section_eight_desktop_image = wp_get_attachment_image_src($section_eight_desktop_image_id, 'medium_large');
$section_eight_mobile_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_eight_mobile_image', true);
$section_eight_mobile_image = wp_get_attachment_image_src($section_eight_mobile_image_id, 'medium_large');
partial('section.service.for-ages', [
	'classes' => ['third', 'dash-top', 'dash-bottom'],
	'circle' => [
		'small' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_eight_circle_text', true),
		'large' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_eight_circle_range', true)
	],
	'h2' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_eight_heading', true),
	'h2_classes' => [],
	'content' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_eight_content', true),
	'image' => [
		'src' => $section_eight_desktop_image[0],
		'alt' => get_post_meta($section_eight_desktop_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_eight_desktop_image[1],
		'height' => $section_eight_desktop_image[2],
		'classes' => ['desktop', 'top-left-radius', 'bottom-left-radius'],
	],
	'mobile_image' => [
		'src' => $section_eight_mobile_image[0],
		'alt' => get_post_meta($section_eight_mobile_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_eight_mobile_image[1],
		'height' => $section_eight_mobile_image[2],
		'classes' => ['mobile', 'top-left-radius', 'bottom-left-radius'],
	]
]);
$section_nine_banner_image_id = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_nine_banner_image', true);
$section_nine_banner_image = wp_get_attachment_image_src($section_nine_banner_image_id, 'large');
partial('section.banner', [
	'classes' => [],
	'image' => [
		'src' => $section_nine_banner_image[0],
		'alt' => get_post_meta($section_nine_banner_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_nine_banner_image[1],
		'height' => $section_nine_banner_image[2],
		'classes' => [],
	],
	'h2' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_nine_banner_heading', true),
	'h2_classes' => ['h1', 'white'],
	'phone' => do_shortcode('[phone_link text="Call %number%" class="cta text white"]'),
	'book' => do_shortcode('[free_orthodontic_consultation_link text="Book online" class="cta text white"]'),
]);
partial('section.service.braces.carousel', [
	'h3' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_ten_heading', true),
	'h3_classes' => ['h1', 'primary'],
	'content' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_ten_content', true),
	'from' => 'why-orthodontic-treatment',
	'slides' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_ten_slides', true),
]);
$section_eleven_cta = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_eleven_cta', true);

$num_for_rand = 8;
$smile_transformation_ids = array_rand(get_smile_transformations_by_region_or_brand($region), $num_for_rand);
$smiles = array_values(array_filter(get_smile_transformations_by_region_or_brand($region), function($smile) use ($smile_transformation_ids) {
	return in_array($smile->ID, $smile_transformation_ids);
}));
partial('section.smile-gallery', [
	'h3' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_eleven_heading', true),
	'h3_classes' => ['h2'],
	'content' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_eleven_content', true),
	'cta' => do_shortcode($section_eleven_cta),
	'gallery' => $smiles
]);
$section_twelve_cta = get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_cta', true);
$icon = 'icon-'.get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_2_level_2_icon', true);
partial('section.service.three-fifths', [
	'classes' => ['why-orthodontic-treatment', 'bg-gray-2'],
	'article_classes' => ['content-container'],
	'h2' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_heading', true),
	'h2_classes' => ['h1', 'primary'],
	'content' => get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_content', true),
	'cta' => do_shortcode($section_twelve_cta),
	'aside_classes' => ['graph-container'],
	'aside_content' => '<div class="graphs"><div class="graph-1"><div class="heading"><p class="title secondary">'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_1_heading', true)).'</p><p class="secondary">'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_1_subheading', true)).'</p></div><div class="bg-secondary white level-1"><p>'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_1_level_1_text', true)).'</p><p>'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_1_level_1_years', true)).'</p></div></div><div class="graph-2"><div class="heading"><p class="title primary">'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_2_heading', true)).'</p><p class="primary">'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_2_subheading', true)).'</p></div><div class="bg-primary white level-2"><i class="'.($icon).'"></i><p>'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_2_level_2_text', true)).'</p><p>'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_2_level_2_years', true)).'</p></div><div class="bg-secondary white level-1"><p>'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_2_level_1_text', true)).'</p><p>'.(get_post_meta(get_the_ID(), 'why_orthodontic_treatment_section_twelve_graph_2_level_1_years', true)).'</p></div></div></div>'
]);
get_footer();
