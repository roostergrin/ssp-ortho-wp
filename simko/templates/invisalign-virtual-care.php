<?
# Template Name: Invisalign Virtual Care
global $smile_transformations;
$brand = is_brand();
$location = is_single_location_brand() ? get_single_location_brand() : is_location();
$region = array();
if(!empty($location)) {
	$region = get_region_for_location($location->ID, false, true);
}

get_header();
$hero_desktop_image = get_post_meta(get_the_id(), 'invisalign_virtual_care_hero_desktop_image', true);
$hero_mobile_image = get_post_meta(get_the_id(), 'invisalign_virtual_care_hero_mobile_image', true);
partial('section.hero.standard', [
	'classes' => ['parallax', 'braces', sanitize_title($brand->post_title)],
	'desktop_image' => [
		'src' => wp_get_attachment_image_src($hero_desktop_image, 'full')[0],
		'alt' => get_post_meta($hero_desktop_image, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($hero_mobile_image, 'full')[0],
		'alt' => get_post_meta($hero_mobile_image, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
]);

$content = get_post_meta(get_the_ID(),'invisalign_virtual_care_hero_content', true);
$aside_content = get_post_meta(get_the_ID(),'invisalign_virtual_care_hero_subheading', true);
$h1 = get_post_meta(get_the_ID(),'invisalign_virtual_care_hero_heading', true);
partial('section.copy.two-cols-box-with-image', [
	'classes' => ['reverse', sanitize_title($brand->post_title)],
	'h1' => $h1,
	'h1_classes' => ['white'],
	'content' => apply_filters('the_content', $content),
	'h2' => $aside_content,
	'h2_classes' => ['h4', 'primary', 'font-weight-ultra-light'],
	'aside_content' => '<a style="margin-bottom: 10px;" class="cta text" target="_blank" href="'.get_post_meta(get_the_ID(),'invisalign_virtual_care_hero_subheading_cta', true).'">Download guide</a><br><a class="cta text" id="to-video" target="_blank" href="#">Watch instructional video</a>',
]);

// Section: Three icons
$icons = [];
for ($i = 1; $i <= 3; $i++) {
	$icon_partial = get_post_meta(get_the_ID(), 'invisalign_virtual_care_section_two_icon_'.($i).'_icon', true);
	$icon_heading = get_post_meta(get_the_ID(), 'invisalign_virtual_care_section_two_icon_'.($i).'_heading', true);
	$icon_content = get_post_meta(get_the_ID(), 'invisalign_virtual_care_section_two_icon_'.($i).'_content', true);
	$icons[$i] = [
		'widget_partial' => $icon_partial,
		'title' => $icon_heading,
		'copy' => $icon_content,
	];
}

partial('section.copy.half-with-icons', [
	'classes' => ['vertical','three-icons', 'static-icons'],
	'h2' => get_post_meta(get_the_ID(), 'invisalign_virtual_care_section_two_heading', true),
	'h2_classes' => ['primary'],
	'content' => get_post_meta(get_the_ID(), 'invisalign_virtual_care_section_two_content', true),
	'icons' => $icons
]);

$video_thumbnail = get_post_meta(get_the_ID(),'invisalign_virtual_care_video_section_image', true);
$video_src = get_post_meta(get_the_ID(),'invisalign_virtual_care_video_section_video', true);
$video_heading = get_post_meta(get_the_ID(),'invisalign_virtual_care_video_section_heading', true);
$video_content = get_post_meta(get_the_ID(),'invisalign_virtual_care_video_section_content', true);

if(!empty($video_src) && !empty($video_content)){
	partial('section.video-full-with-text', [
		'classes' => ['non-overlay-text'],
		'image' => [
			'src' => wp_get_attachment_image_src($video_thumbnail, 'full')[0],
			'srcset' => wp_get_attachment_image_src($video_thumbnail, 'medium_large')[0] . ' 1x, '. wp_get_attachment_image_src($virtual_monitoring_section_four_image, 'large')[0] . ' 2x, '. wp_get_attachment_image_src($virtual_monitoring_section_four_image, 'full')[0] . ' 3x',
			'sizes' => '',
			'alt' => get_post_meta($video_thumbnail, '_wp_attachment_image_alt', true),
			'classes' => ['bg-img'],
		],
		'video_src' => $video_src,
		//'h2' => $video_heading,
		'content' => $video_content,
		'content_below' => true
	]);
}


partial('section.four-steps-invisalign-virtual-care', [
	'classes' => [sanitize_title($brand->post_title)]
]);

// Section: Four icons
$icons = [];
for ($i = 1; $i <= 4; $i++) {
	$icon_partial = get_post_meta(get_the_ID(), 'invisalign_virtual_care_section_four_icon_'.($i).'_icon', true);
	$icon_heading = get_post_meta(get_the_ID(), 'invisalign_virtual_care_section_four_icon_'.($i).'_heading', true);
	$icon_content = get_post_meta(get_the_ID(), 'invisalign_virtual_care_section_four_icon_'.($i).'_content', true);
	$icons[$i] = [
		'widget_partial' => $icon_partial,
		'title' => $icon_heading,
		'copy' => $icon_content,
	];
}

partial('section.copy.half-with-icons', [
	'classes' => ['vertical','four-icons', 'bg-blue', 'with-bottom-pattern'],
	'h2' => get_post_meta(get_the_ID(), 'invisalign_virtual_care_section_four_heading', true),
	'h2_classes' => ['primary'],
	'content' => get_post_meta(get_the_ID(), 'invisalign_virtual_care_section_two_content', true),
	'icons' => $icons
]);

//Section: Form
$form_heading = get_post_meta(get_the_ID(),'invisalign_virtual_care_section_five_heading', true);
$form = 'invisalign-virtual-care';
$form_content = '<h1>'. $form_heading.'</h1>'.apply_filters('the_content',get_post_meta(get_the_ID(),'invisalign_virtual_care_section_five_content', true));
$form_classes = roostergrin_flag() ? 'rg' : '';
partial('section.form', [
	'classes' => [$form_classes],
	'form' => $form,
	'content' => $form_content,
]);


// Section: Bottom hero
$bottom_hero_desktop_image = get_post_meta(get_the_ID(),'invisalign_virtual_care_bottom_hero_mobile_image', true);
$bottom_hero_mobile_image = get_post_meta(get_the_ID(),'invisalign_virtual_care_bottom_hero_mobile_image', true);
partial('section.hero.full', [
	'classes' => ['invisalign-virtual-care', 'bottom-hero', sanitize_title($brand->post_title)],
	'image' => [
		'src' => wp_get_attachment_image_src($bottom_hero_desktop_image, 'full')[0],
		'alt' => get_post_meta($bottom_hero_desktop_image, '_wp_attachment_image_alt', true),
		'width' => 2048,
		'height' => 1152,
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($bottom_hero_mobile_image, 'medium_large')[0],
		'alt' => get_post_meta($bottom_hero_mobile_image, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	]
]);
get_footer();
