<?
# Template Name: Emergency Care and Repair
get_header();
$brand = is_brand();
//Hero Section
$heading = get_post_meta(get_the_ID(),'emergency_care_and_repair_hero_heading',true);
$sub_heading = get_post_meta(get_the_ID(),'emergency_care_and_repair_hero_subheading',true);
$content = apply_filters('the_content', get_post_meta(get_the_ID(),'emergency_care_and_repair_hero_content',true));

partial('section.copy.two-cols', [
    'classes' => [sanitize_title($brand->post_title)],
	'columns' => [
		'<h2 class="h1 primary">'.$heading.'</h2>',
		'<h3 class="h4 primary font-weight-ultra-light">'.$sub_heading.'</h3>'.$content
	],
]);

//Section Two
$section2_heading = get_post_meta(get_the_ID(),'emergency_care_and_repair_section_two_heading',true);
$section2_content = get_post_meta(get_the_ID(),'emergency_care_and_repair_section_two_content',true);
$icon1 = get_post_meta(get_the_ID(),'emergency_care_and_repair_section_two_icon_1',true);
$icon1_copy = get_post_meta(get_the_ID(),'emergency_care_and_repair_section_two_icon_1_content',true);
$icon2 = get_post_meta(get_the_ID(),'emergency_care_and_repair_section_two_icon_2',true);
$icon2_copy = get_post_meta(get_the_ID(),'emergency_care_and_repair_section_two_icon_2_content',true);

partial('section.icons.static-with-copy', [
    'classes' => ['bg-gray','centered'],
    'heading' => '<h2 class="blue centered text-center">'.$section2_heading.'</h2>',
    'content' => $section2_content,
    'icons' => [
            [
                'widget_partial' => 'widget.icons.'.$icon1,
                'widget_content' => $icon1_copy,
            ],
            [
                'widget_partial' => 'widget.icons.'.$icon2,
                'widget_content' => $icon2_copy,
            ]
    ]
]);

//Section Three
$section_three_full_image = get_post_meta(get_the_ID(),'section_three_emergency_care_and_repair_desktop_image',true);
$section_three_mobile_image = get_post_meta(get_the_ID(),'section_three_emergency_care_and_repair_mobile_image',true);
partial('section.hero.full', [
	'classes' => ['parallax', 'emergency-care', sanitize_title($brand->post_title)],
    'background_image' => wp_get_attachment_image_src($section_three_full_image,'full')[0],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($section_three_mobile_image,'full')[0],
		'alt' => get_post_meta($section_three_mobile_image, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
]);

//Section Four
$section4_heading = get_post_meta(get_the_ID(),'emergency_care_and_repair_section_four_heading',true);
$section4_content = apply_filters('the_content', get_post_meta(get_the_ID(),'emergency_care_and_repair_section_four_content',true));

partial('section.copy.two-cols', [
	'columns' => [
		'<h2 class="">'.$section4_heading.'</h2>',
        $section4_content
	],
]);

$cards_count = get_post_meta(get_the_ID(),'emergency_care_and_repair_section_four_cards', true);
$cards = [];
if ($cards_count > 0) {
    for ($i = 0; $i < $cards_count; $i++) {
        $cards[$i]['h3'] = get_post_meta(get_the_ID(), 'emergency_care_and_repair_section_four_cards_' . $i . '_card_heading', true);
        $cards[$i]['content'] = apply_filters('the_content', get_post_meta(get_the_ID(), 'emergency_care_and_repair_section_four_cards_' . $i . '_card_content', true));
        $cards[$i]['h3_classes']= [];
    }
}

partial('section.copy.tri-carousel', [
	'slides' => $cards
]);
if(!is_single_location_brand()) {
	partial('section.maps.search');
} else {
    $location_id = wp_list_pluck(get_locations_for_brand($brand->ID), 'ID');
	$location_id = reset($location_id);
	$location = $locations->locations[strval($location_id)];
    partial('section.maps.location', [
        'classes' => ['single-location-brand'],
		'loc' => $location
	]);
}
get_footer();
