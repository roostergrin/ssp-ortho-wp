<?
# Template Name: Free Consultations
global $reviews;
$brand = is_brand();
$location = is_location();

get_header();
$hero_desktop_image = get_post_meta(get_the_ID(),'free_consultation_hero_desktop_image', true);
$hero_mobile_image = get_post_meta(get_the_ID(),'free_consultation_hero_mobile_image', true);
partial('section.hero.standard', [
	'classes' => ['parallax', 'free-consultations', sanitize_title($brand->post_title)],
	'desktop_image' => [
		'src' => wp_get_attachment_image_src($hero_desktop_image,'full')[0],
		'alt' => get_post_meta($hero_desktop_image, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($hero_mobile_image,'medium_large')[0],
		'alt' => get_post_meta($hero_mobile_image, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	]
]);
$icons_count = get_post_meta(get_the_ID(), 'free_consultation_section_two_icons', true) ?? 0;
if ($icons_count > 0) {
	$icons = [];
	for ($i = 0; $i < $icons_count; $i++) {
		$icon_partial = get_post_meta(get_the_ID(), 'free_consultation_section_two_icons_'.($i).'_icon', true);
		$icon_heading = get_post_meta(get_the_ID(), 'free_consultation_section_two_icons_'.($i).'_heading', true);
		$icon_content = get_post_meta(get_the_ID(), 'free_consultation_section_two_icons_'.($i).'_content', true);
		$icons[$i] = [
			'widget_partial' => $icon_partial,
			'title' => $icon_heading,
			'copy' => $icon_content,
		];
	}
	partial('section.copy.half-with-icons', [
		'h2' => get_post_meta(get_the_ID(),'free_consultation_section_two_heading', true),
		'h2_classes' => ['h1', 'primary'],
		'content' => get_post_meta(get_the_ID(),'free_consultation_section_two_content', true),
		'icons' => $icons
	]);
}

$show_confidence_counts_module = get_post_meta( get_the_ID(), 'confidence_count_module', true );
if($show_confidence_counts_module) {
	partial('section.confidence-counts', [
		'classes' => [$brand->post_name]
	]);
}

$slides_count = get_post_meta(get_the_ID(), 'free_consultation_section_three_slides', true);
if ($slides_count > 0) {
	$tri_carousel_slides = [];
	for ($i = 0; $i < $slides_count; $i++) {
		$attachment_id = get_post_meta(get_the_ID(), 'free_consultation_section_three_slides_'.($i).'_image', true);
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


$form_image_id = get_post_meta(get_the_ID(),'free_consultation_section_four_image', true);
$form_image_src = wp_get_attachment_image_src($form_image_id, 'large');
$form_content = '<h1>'.(get_post_meta(get_the_ID(),'free_consultation_section_four_heading', true)).'</h1>' . get_post_meta(get_the_ID(),'free_consultation_section_four_content', true);
$form_classes = roostergrin_flag() ? 'rg' : '';
partial('section.form', [
	'classes' => [$form_classes],
	'form' => 'questions',
	'content' => $form_content,
]);

$testimonials = array_filter($reviews->reviews, function($review) {
	$relationships = unserialize($review->relationships);
	return is_array($relationships) ? in_array(get_the_ID(), $relationships) : get_the_ID() == $relationships;
});
if (!empty($testimonials)) {
	partial('section.testimonials.carousel', [
		'htag' => 'h2',
		'heading_classes' => ['h3', 'primary'],
		'heading' => get_post_meta(get_the_id(), 'free_consultation_section_testimonial_heading', true),
		'reviews_left_border' => $testimonials,
	]);
}
$desktop_img_id = get_post_meta(get_the_ID(),'free_consultation_section_five_image_desktop', true);
$mobile_img_id = get_post_meta(get_the_ID(),'free_consultation_section_five_image_mobile', true);
if (!empty($desktop_img_id) || !empty($mobile_img_id)) {
	partial('section.hero.full', [
		'classes' => ['free-consultations bottom-hero', sanitize_title($brand->post_title)],
		'image' => [
			'src' => wp_get_attachment_image_src($desktop_img_id, 'full')[0],
			'alt' => get_post_meta($desktop_img_id, '_wp_attachment_image_alt', true),
			'classes' => ['desktop'],
			'width' => '2048',
			'height' => '1152',
		],
		'mobile_image' => [
			'src' => wp_get_attachment_image_src($mobile_img_id, 'medium_large')[0],
			'alt' => get_post_meta($mobile_img_id, '_wp_attachment_image_alt', true),
			'classes' => ['mobile'],
			'width' => '768',
			'height' => '432',
		],
	]);
}
get_footer();
