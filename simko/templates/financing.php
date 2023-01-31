<?
# Template Name: Financing
global $insurance_providers;
$brand = is_brand();
get_header();
$financing_hero_desktop_id = get_post_meta(get_the_ID(),'financing_hero_desktop_image',true);
$financing_hero_mobile_id = get_post_meta(get_the_ID(),'financing_hero_mobile_image',true);
partial('section.hero.standard', [
	'classes' => ['parallax', 'financing', sanitize_title($brand->post_title) ],
	'desktop_image' => [
		'src' => wp_get_attachment_image_src($financing_hero_desktop_id, 'full')[0],
		'alt' => get_post_meta($financing_hero_desktop_id, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($financing_hero_mobile_id, 'medium_large')[0],
		'alt' => get_post_meta($financing_hero_mobile_id, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
	'content_classes' => [],
	'h1' => get_post_meta(get_the_ID(), 'financing_hero_heading', true),
	'h1_classes' => ['primary'],
	'content' => get_post_meta(get_the_ID(), 'financing_hero_content', true),
	'container_classes' => ['bg-gray'],
	'wrapper_classes' => ['left-side'],
]);
$financing_section_two_desktop_image = get_post_meta(get_the_ID(),'financing_section_two_desktop_image',true);
$financing_girl_attachment_image_1x = wp_get_attachment_image_src($financing_section_two_desktop_image, 'medium_large');
$financing_girl_attachment_image_2x = wp_get_attachment_image_src($financing_section_two_desktop_image, 'large');
partial('section.copy.two-cols-with-image', [
	'classes' => ['margin-bottom-zero', 'financing'],
    'h2_classes' => ['h1', 'primary'],
    'columns' => [
    	'<div class="img-container"><img src="'.$financing_girl_attachment_image_1x[0].'" srcset="'.$financing_girl_attachment_image_1x[0].' 1x, '.$financing_girl_attachment_image_2x[0].' 2x" sizes="100vw" width="'.$financing_girl_attachment_image_1x[1].'" height="'.$financing_girl_attachment_image_1x[2].'" alt="'.(!empty(get_post_meta($financing_hero_desktop_id, '_wp_attachment_image_alt', true)) ? get_post_meta($financing_hero_desktop_id, '_wp_attachment_image_alt', true) : str_replace(['_', '-'], [' ', ' '], get_the_title($financing_hero_desktop_id))).'" class="'.get_the_title($financing_hero_desktop_id).' top-right-radius" /></div>',
        '<h2 class="primary">'.(get_post_meta(get_the_ID(),'financing_section_two_heading',true)).'</h2>'.(get_post_meta(get_the_ID(),'financing_section_two_content',true))
    ]
]);

$icons = [
	'widget.icons.'.(get_post_meta(get_the_ID(),'financing_section_three_icon_1', true)).'' => get_post_meta(get_the_ID(),'financing_section_three_icon_1_content', true),
	'widget.icons.'.(get_post_meta(get_the_ID(),'financing_section_three_icon_2', true)).'' => (get_post_meta(get_the_ID(),'financing_section_three_icon_2_content', true)),
	'widget.icons.'.(get_post_meta(get_the_ID(),'financing_section_three_icon_3', true)).'' => (get_post_meta(get_the_ID(),'financing_section_three_icon_3_content', true)),	
];

// optional 4th icon can be added via wp page editor
if( get_post_meta(get_the_ID(),'financing_section_three_icon_4', true) != '' ) {
	$icons['widget.icons.'.(get_post_meta(get_the_ID(),'financing_section_three_icon_4', true)).''] = get_post_meta(get_the_ID(),'financing_section_three_icon_4_content', true);
}

// brands: Dietmeier or Chapman
if (in_array($brand->ID,[13032, 13590])) {
	$icons = [
		'widget.icons.'.(get_post_meta(get_the_ID(),'financing_section_three_icon_1', true)).'' => get_post_meta(get_the_ID(),'financing_section_three_icon_1_content', true),
		'widget.icons.'.(get_post_meta(get_the_ID(),'financing_section_three_icon_2', true)).'' => (get_post_meta(get_the_ID(),'financing_section_three_icon_2_content', true)),
	];
}

partial('section.icons.with-copy', [
	'classes' => ['bg-gray', 'financing', sanitize_title($brand->post_title)],
	'heading' => '<h3 class="centered text-center gray">'.(get_post_meta(get_the_ID(),'financing_section_three_heading',true)).'</h3>',
	'content' => apply_filters('the_content',get_post_meta(get_the_ID(),'financing_section_three_content',true)),
	'icons' => $icons,
    'section_id' => 'financing-options'
]);
$all_insurance_providers = array_filter($insurance_providers->insurance_providers, function($ins) {
	$relationships = property_exists($ins, 'page_relationship') ? unserialize($ins->page_relationship) : false;
	return !empty($relationships) && is_array($relationships) ? in_array(get_the_ID(), $relationships) : get_the_ID() == $relationships;
});
if (!empty($all_insurance_providers)) {
	usort($all_insurance_providers, function ($a, $b) {
		return $a->post_title <=> $b->post_title;
	});
	partial('section.icons.health-plans', [
		'classes' => [''],
		'content_classes' => ['small-width'],
		'h3' => get_post_meta(get_the_ID(),'financing_section_four_heading',true),
		'h3_classes' => ['h2'],
		'content' => apply_filters('the_content', get_post_meta(get_the_ID(),'financing_section_four_content',true)),
		'logos' => $all_insurance_providers
	]);
}
get_footer();
