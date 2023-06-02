<?
# Template Name: Custom Mouthguard
global $reviews;
$brand = is_brand();

get_header();
$hero_desktop_image_id = get_post_meta(get_the_ID(), 'custom_mouthguard_section_one_desktop_image', true);
$hero_mobile_image_id = get_post_meta(get_the_ID(), 'custom_mouthguard_section_one_mobile_image', true);
partial('section.hero.standard', [
	'classes' => ['parallax', 'custom_mouthguard'],
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
	'h1' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_one_heading', true),
	'h1_classes' => ['white'],
	'content' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_one_content', true),
	'content_classes' => [],
	'container_classes' => ['bg-primary', 'transparent'],
	'wrapper_classes' => ['left-side'],
]);
partial('section.icons.four-cols-carousel', [
	'classes' => ['bg-gray-9'],
	'folding_icons' => [
		[
			'class'=> 'icon-commitment_'.get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_1_icon', true),
			'title' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_1_heading', true),
			'copy' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_1_content', true)
		],
		[
			'class'=> 'icon-'.get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_2_icon', true),
			'title' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_2_heading', true),
			'copy' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_2_content', true)
		],
		[
			'class'=> 'icon-'.get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_3_icon', true),
			'title' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_3_heading', true),
			'copy' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_3_content', true)
		],
		[
			'class'=> 'icon-'.get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_4_icon', true),
			'title' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_4_heading', true),
			'copy' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_two_icon_4_content', true)
		]
	]
]);
$mouthguard_image_id = get_post_meta(get_the_ID(), 'custom_mouthguard_section_three_image', true);
partial('section.mouthguard-colors', [
	'classes' => [],
	'h2' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_three_heading', true),
	'h2_classes' => ['h1', 'primary'],
	'content' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_three_content', true),
	'image' => [
		'src' => wp_get_attachment_image_src($mouthguard_image_id, 'medium_large')[0],
		'alt' => get_post_meta($mouthguard_image_id, '_wp_attachment_image_alt', true),
		'classes' => []
	],
	'colors' => 	[
		[
			'svg' => [
				'path' => 'images/svgs/colors/inline',
				'color' => 'red.svg'
			],
			'name' => 'Red'
		],
		[
			'svg' => [
				'path' => 'images/svgs/colors/inline',
				'color' => 'blue.svg'
			],
			'name' => 'Blue'
		],
		[
			'svg' => [
				'path' => 'images/svgs/colors/inline',
				'color' => 'orange.svg'
			],
			'name' => 'Orange'
		],
		[
			'svg' => [
				'path' => 'images/svgs/colors/inline',
				'color' => 'black.svg'
			],
			'name' => 'Black'
		],
		[
			'svg' => [
				'path' => 'images/svgs/colors/inline',
				'color' => 'white.svg'
			],
			'name' => 'White'
		]
	]
]);
$column_one_image_id = get_post_meta(get_the_ID(), 'custom_mouthguard_section_four_columns_column_1_image', true);
$column_two_image_id = get_post_meta(get_the_ID(), 'custom_mouthguard_section_four_columns_column_2_image', true);
$column_three_image_id = get_post_meta(get_the_ID(), 'custom_mouthguard_section_four_columns_column_3_image', true);
partial('section.copy.three-cols', [
	'classes' => ['custom-mouthguard', 'bg-gray-9', 'center'],
	'h3' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_four_heading', true),
	'h3_classes' => ['h2'],
	'content' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_four_content', true),
	'columns' => [
		[
			'image' => [
				'src' => wp_get_attachment_image_src($column_one_image_id, 'medium_large')[0],
				'alt' => get_post_meta($column_one_image_id, '_wp_attachment_image_alt', true),
				'classes' => []
			],
			'content' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_four_columns_column_1_content', true),
			'content_classes' => ['custom-mouthguard'],
		],
		[
			'image' => [
				'src' => wp_get_attachment_image_src($column_two_image_id, 'medium_large')[0],
				'alt' => get_post_meta($column_two_image_id, '_wp_attachment_image_alt', true),
				'classes' => []
			],
			'content' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_four_columns_column_2_content', true),
			'content_classes' => ['custom-mouthguard'],
		],
		[
			'image' => [
				'src' => wp_get_attachment_image_src($column_three_image_id, 'medium_large')[0],
				'alt' => get_post_meta($column_three_image_id, '_wp_attachment_image_alt', true),
				'classes' => []
			],
			'content' => get_post_meta(get_the_ID(), 'custom_mouthguard_section_four_columns_column_3_content', true),
			'content_classes' => ['custom-mouthguard'],
		]
	],
]);
$form_image_id = get_post_meta(get_the_ID(), 'custom_mouthguard_section_five_image', true);
partial('section.form', [
	'form' => 'custom-mouthguard',
	'content' => '<h1>'.(get_post_meta(get_the_ID(), 'custom_mouthguard_section_five_heading', true)).'</h1><p>'.(get_post_meta(get_the_ID(), 'custom_mouthguard_section_five_content', true)).'</p><div class="img-container custom-mouthguard"><img src="'.(wp_get_attachment_image_src($form_image_id, 'medium_large')[0]).'" alt="'.(get_post_meta($form_image_id, '_wp_attachment_image_alt', true)).'" class="bg-img top-right-radius bottom-right-radius"></div>',
]);
$testimonials = array_filter($reviews->reviews, function($review) {
	$relationships = unserialize($review->relationships);
	return is_array($relationships) ? in_array(get_the_ID(), $relationships) : get_the_ID() == $relationships;
});
partial('section.testimonials.carousel', [
	'htag' => 'h2',
	'heading_classes' => ['h3', 'primary'],
	'heading' => 'Here’s what our patients have to say',
	'reviews_left_border' => $testimonials,
]);
get_footer();
