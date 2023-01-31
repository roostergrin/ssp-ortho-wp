<?
global $reviews;
$location = is_location();
$brand = is_brand();
# Template Name: Sleep Apnea

$sleep_apnea_hero_desktop_image = get_post_meta(get_the_id(), 'sleep_apnea_hero_desktop_image', true);
$sleep_apnea_hero_mobile_image = get_post_meta(get_the_id(), 'sleep_apnea_hero_mobile_image', true);
$sleep_apnea_hero_heading = get_post_meta(get_the_id(), 'sleep_apnea_hero_heading', true);

$hero_position = get_post_meta(get_the_id(), 'sleep_apnea_hero_position', true) ? 'right-side' : 'left-side'; // Default return 0 or left
$hero_text_color = get_post_meta(get_the_id(), 'sleep_apnea_hero_heading_color', true) ; // Default return 'primary'
$container_color_classes = $hero_text_color === 'primary' ? 'bg-gray' : 'bg-primary';

$sleep_apnea_section_two_heading = get_post_meta(get_the_id(), 'sleep_apnea_section_two_heading', true);
$sleep_apnea_section_two_content = get_post_meta(get_the_id(), 'sleep_apnea_section_two_content', true);
$card_count = get_post_meta(get_the_ID(), 'sleep_apnea_section_three_cards', true);

$sleep_apnea_section_three_heading = get_post_meta(get_the_id(), 'sleep_apnea_section_three_heading', true);
$sleep_apnea_section_three_content = get_post_meta(get_the_id(), 'sleep_apnea_section_three_content', true);

$section_four_desktop_image_id = get_post_meta(get_the_ID(), 'sleep_apnea_section_four_desktop_image', true);
$section_four_desktop_image = wp_get_attachment_image_src($section_four_desktop_image_id, 'medium_large');

$section_four_mobile_image_id = get_post_meta(get_the_ID(), 'sleep_apnea_section_four_mobile_image', true);
$section_four_mobile_image = wp_get_attachment_image_src($section_four_mobile_image_id, 'medium_large');

$section_five_desktop_image_id = get_post_meta(get_the_ID(), 'sleep_apnea_section_five_desktop_image', true);
$section_five_desktop_image = wp_get_attachment_image_src($section_five_desktop_image_id, 'medium_large');

$section_five_mobile_image_id = get_post_meta(get_the_ID(), 'sleep_apnea_section_five_mobile_image', true);
$section_five_mobile_image = wp_get_attachment_image_src($section_five_mobile_image_id, 'medium_large');

$section_six_desktop_image_id = get_post_meta(get_the_ID(), 'sleep_apnea_section_six_desktop_image', true);
$section_six_desktop_image = wp_get_attachment_image_src($section_six_desktop_image_id, 'medium_large');

$section_six_mobile_image_id = get_post_meta(get_the_ID(), 'sleep_apnea_section_six_mobile_image', true);
$section_six_mobile_image = wp_get_attachment_image_src($section_six_mobile_image_id, 'medium_large');

$bottom_hero_desktop_image_id = get_post_meta(get_the_ID(), 'sleep_apnea_bottom_hero_desktop_image', true);
$bottom_hero_mobile_image_id = get_post_meta(get_the_ID(), 'sleep_apnea_bottom_hero_mobile_image', true);

get_header();
$sleep_apnea_hero_desktop_id = get_post_meta(get_the_ID(),'sleep_apnea_hero_desktop_image',true);
$sleep_apnea_hero_mobile_id = get_post_meta(get_the_ID(),'sleep_apnea_hero_mobile_image',true);
partial('section.hero.standard', [
	'classes' => ['parallax', 'sleep_apnea', sanitize_title($brand->post_title) ],
	'desktop_image' => [
		'src' => wp_get_attachment_image_src($sleep_apnea_hero_desktop_id, 'full')[0],
		'alt' => get_post_meta($sleep_apnea_hero_desktop_id, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($sleep_apnea_hero_mobile_id, 'medium_large')[0],
		'alt' => get_post_meta($sleep_apnea_hero_mobile_id, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
	'content_classes' => [],
	'h1' => get_post_meta(get_the_ID(), 'sleep_apnea_hero_heading', true),
	'h1_classes' => ['white'],
	'content' => get_post_meta(get_the_ID(), 'sleep_apnea_hero_content', true),
	'container_classes' => ['bg-primary'],
	'wrapper_classes' => ['left-side'],
]);

partial('section.icons.static-with-copy', [
    'classes' => ['bg-gray', 'sleep_apnea'],
    'heading' => '<h3 class="blue centered text-center">'. $sleep_apnea_section_two_heading .'</h3>',
    'content' => apply_filters('the_content', $sleep_apnea_section_two_content),    
]);

if ($card_count > 0) {
 	$cards = [];
 	for ($i = 0; $i < $card_count; $i++) {
 		$cards[] = [
 			'title' => get_post_meta(get_the_ID(), 'sleep_apnea_section_three_cards_'.($i).'_card_heading', true),
 			'copy' => get_post_meta(get_the_ID(), 'sleep_apnea_section_three_cards_'.($i).'_card_content', true)
 		];
 	}
	partial('section.service.three-cols-cards', [
		'cards' => $cards
	]);
}

partial('section.icons.static-with-copy', [
    'classes' => ['bg-white', 'sleep_apnea'],
    'heading' => '<h3 class="blue centered text-center">'. $sleep_apnea_section_three_heading .'</h3>',
    'content' => apply_filters('the_content', $sleep_apnea_section_three_content),    
]);

partial('section.service.for-ages', [
	'classes' => ['first', 'reverse', 'dash-top', 'dash-bottom'],
	'h2' => get_post_meta(get_the_ID(), 'sleep_apnea_section_four_heading', true),
	'h2_classes' => [],
	'content' => get_post_meta(get_the_ID(), 'sleep_apnea_section_four_content', true),
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
partial('section.service.for-ages', [
	'classes' => ['second', 'dash-top', 'dash-bottom'],
	'h2' => get_post_meta(get_the_ID(), 'sleep_apnea_section_five_heading', true),
	'h2_classes' => [],
	'content' => get_post_meta(get_the_ID(), 'sleep_apnea_section_five_content', true),
	'image' => [
		'src' => $section_five_desktop_image[0],
		'alt' => get_post_meta($section_five_desktop_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_five_desktop_image[1],
		'height' => $section_five_desktop_image[2],
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => $section_five_mobile_image[0],
		'alt' => get_post_meta($section_five_mobile_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_five_mobile_image[1],
		'height' => $section_five_mobile_image[2],
		'classes' => ['mobile'],
	]
]);
partial('section.service.for-ages', [
	'classes' => ['third','reverse', 'dash-top', 'dash-bottom'],
	'h2' => get_post_meta(get_the_ID(), 'sleep_apnea_section_six_heading', true),
	'h2_classes' => [],
	'content' => get_post_meta(get_the_ID(), 'sleep_apnea_section_six_content', true),
	'image' => [
		'src' => $section_six_desktop_image[0],
		'alt' => get_post_meta($section_six_desktop_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_six_desktop_image[1],
		'height' => $section_six_desktop_image[2],
		'classes' => ['desktop', 'top-right-radius', 'bottom-right-radius'],
	],
	'mobile_image' => [
		'src' => $section_six_mobile_image[0],
		'alt' => get_post_meta($section_six_mobile_image_id, '_wp_attachment_image_alt', true),
		'width' => $section_six_mobile_image[1],
		'height' => $section_six_mobile_image[2],
		'classes' => ['mobile', 'top-right-radius', 'bottom-right-radius'],
	]
]);

$community_involvement_slides = [];
$section_seven_desktop_image_id = get_post_meta(get_the_ID(), 'sleep_apnea_section_seven_desktop_image', true);
$section_seven_mobile_image_id = get_post_meta(get_the_ID(), 'sleep_apnea_section_seven_mobile_image', true);
$community_slide_image_ids  = array( $section_seven_desktop_image_id);

if (!empty($community_slide_image_ids)) {
	foreach($community_slide_image_ids as $attachment_id) {
		$attachment = wp_get_attachment_image_src($attachment_id, 'medium_large');
		$community_involvement_slides[] = [
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
		'h3' => get_post_meta(get_the_ID(), 'sleep_apnea_section_seven_heading', true),
		'h3_classes' => ['primary h2'],
		'text' => get_post_meta(get_the_ID(), 'sleep_apnea_section_seven_content', true),
		'shortcode' => get_field( 'sleep_apnea_section_seven_shortcode_field', get_the_ID() ),
		'slides' => $community_involvement_slides
	]);
}

$brand = is_brand();
$location = is_location($brand);
$location = $location->ID;
$recipients = get_email_addresses_for_form('appointment' , $location);

$form_content = '<h1>Schedule your sleep medicine consultation</h1><p>We make it easy to schedule a consultation for dental sleep medicine and sleep apnea solutions. Please complete the form information, and one of our team members will confirm your consultation appointment as soon as possible.<br><br>You can also call us to schedule appointments. '.do_shortcode('[locations_link text="Find a location" class="" title="Find a location"]').' to get started. <br><br> We look forward to seeing you soon!</p>';

partial('section.form', [
	'form' => 'sleep-apnea-appointment',
	'heading' => get_post_meta(get_the_ID(), 'appointments_heading', true),
	'content' => $form_content ,
]);

partial('section.hero.full', [
	'classes' => ['bottom-hero', 'sleep-apnea', sanitize_title($brand->post_title)],
	'image' => [
		'src' => wp_get_attachment_image_src($bottom_hero_desktop_image_id, 'full')[0],
		'alt' => get_post_meta($bottom_hero_desktop_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['desktop'],
	],	
]);

$sleep_apnea_section_nine_cta = get_post_meta(get_the_id(), 'sleep_apnea_section_nine_cta', true);
$carousel_icons[0] = ['widget.icons.quiet'];
$carousel_icons[1] = ['widget.icons.comfortable'];

partial('section.icons.two-cols-carousel', [
	'h3' => get_post_meta(get_the_id(), 'sleep_apnea_section_nine_heading', true),
	'h3_classes' => [],
	'content' => apply_filters('the_content', get_post_meta(get_the_id(), 'sleep_apnea_section_nine_content', true)) . '<p>'. do_shortcode($sleep_apnea_section_nine_cta) .'</p>',
	'carousel' => $carousel_icons
]);

partial('section.hero.full', [
	'classes' => ['bottom-hero', 'sleep-apnea', sanitize_title($brand->post_title)],	
	'mobile_image' => [
		'src' => wp_get_attachment_image_src($bottom_hero_mobile_image_id, 'medium_large')[0],
		'alt' => get_post_meta($bottom_hero_mobile_image_id, '_wp_attachment_image_alt', true),
		'classes' => ['mobile'],
	],
]);

get_footer();


	
