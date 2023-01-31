<?
# Template Name: Confidence Counts

global $reviews, $events, $brands;
$brand = is_brand();
$brand_locations = get_locations_for_brand($brand->ID);
$brand_colors = 'brand-palette-' . sanitize_title( $brands->brand_color_options[$brand->colors] );

get_header();


/**
 * Hero section
 */
$hero_desktop_img = get_field( 'confidence_counts_hero_desktop_image', get_the_ID() );
$hero_mobile_img = get_field( 'confidence_counts_hero_mobile_image', get_the_ID() );
$hero_text_color = $brand->section_one_heading_color; // Default return 'primary'
$hero_h1 = get_field( 'confidence_counts_hero_heading', get_the_ID() );
$hero_content = get_field( 'confidence_counts_hero_content', get_the_ID() );

$cta_key = 'confidence_counts_hero_cta';
$cta_text = get_field( $cta_key.'_hero_cta_text', get_the_ID() );
$cta_link = get_field( $cta_key.'_hero_cta_link', get_the_ID() );
$cta = "<a href=\"$cta_link\">$cta_text</a>";

partial('section.hero.standard', [
    'desktop_image' => [
        'src' => wp_get_attachment_image_src( $hero_desktop_img, 'full' )[0],
        'classes' => ['desktop']
    ],
    'mobile_image' => [
		'classes' => ['mobile-hero'],
		'src' => wp_get_attachment_image_src( $hero_mobile_img, 'full' )[0],
		'width' => wp_get_attachment_image_src( $hero_mobile_img, 'full' )[1],
		'height' => wp_get_attachment_image_src( $hero_mobile_img, 'full' )[2],
	],
    'classes' => ['parallax', 'brand', sanitize_title($brand->post_title), 'cc', $brand_colors],
    'container_classes' => ['bg-primary'],
    'wrapper_classes' => ['left-side'],
    'h1' => $hero_h1,
    'h1_classes' => ['white'],
    'content' => $hero_content,
    'cta' => ( !empty(get_field('confidence_counts_hero_cta_shortcode', get_the_ID())) ? do_shortcode( get_field('confidence_counts_hero_cta_shortcode', get_the_ID()) ) : '' )
]);


/**
 * Section #2
 * Logo / H2 / 3 column-block
 */
partial('section.copy.three-cols', [
    'classes' => ['confidence-counts', 'center', 'bg-orange', $brand_colors],
    'images' => [
		[
			'src' => wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'confidence_counts_section_two_image', true) )[0],
			'width' => '418',
			'height' => '322',
			'alt' => 'Confidence Counts Club logo',
			// 'classes' => [] // is this needed?
		]
	],
	'h3' => get_post_meta(get_the_ID(), 'confidence_counts_section_two_heading', true),
	'h3_classes' => ['h2'],
	'content' => get_post_meta(get_the_ID(), 'confidence_counts_section_two_content', true),
	'columns' => [
		[
            'h3' => get_post_meta(get_the_ID(), 'confidence_counts_section_two_cards_0_card_heading', true),
			'content' => get_post_meta(get_the_ID(), 'confidence_counts_section_two_cards_0_card_content', true),
			'content_classes' => ['confidence-counts'],
		],
		[
            'h3' => get_post_meta(get_the_ID(), 'confidence_counts_section_two_cards_1_card_heading', true),
			'content' => get_post_meta(get_the_ID(), 'confidence_counts_section_two_cards_1_card_content', true),
			'content_classes' => ['confidence-counts'],
		],
		[
            'h3' => get_post_meta(get_the_ID(), 'confidence_counts_section_two_cards_2_card_heading', true),
			'content' => get_post_meta(get_the_ID(), 'confidence_counts_section_two_cards_2_card_content', true),
			'content_classes' => ['confidence-counts'],
		]
	],
]);


/**
 * Section #3
 * 2 columns - 1 w/ header, link, and image - 1 w/ 6 folding icons
 */
$section_three_icon_carousel = [];
for($j = 1; $j < 7; $j++) {
	$section_three_icon_carousel[] = [
		'multi_color_svg' => true,
		'class' => 'icon-' . get_post_meta(get_the_id(), 'confidence_counts_section_three_icon_'. $j .'_icon_'. $j .'_icon', true),
		'widget_partial' => get_post_meta(get_the_id(), 'confidence_counts_section_three_icon_'. $j .'_icon_'. $j .'_icon', true),
		'title' => get_post_meta(get_the_id(), 'confidence_counts_section_three_icon_'. $j .'_icon_'. $j .'_heading', true),
		'copy' => get_post_meta(get_the_id(), 'confidence_counts_section_three_icon_'. $j .'_icon_'. $j .'_content', true),
	];
}

$section_three_desktop_img = wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'confidence_counts_section_three_desktop_image', true), 'medium_large' );
$section_three_mobile_img = wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'confidence_counts_section_three_mobile_image', true) );

$content = apply_filters('the_content', get_post_meta(get_the_ID(), 'confidence_counts_section_three_content', true) );
$content .= "<img src='$section_three_desktop_img[0]' width='420' />";

// partial('section.icons.two-cols-carousel-with-image', [
partial('section.copy.half-with-icons', [
    'classes' => ['second', 'bg-orange', 'confidence-counts'],
	'h2' => get_post_meta(get_the_ID(), 'confidence_counts_section_three_heading', true),
	'h2_classes' => ['h2'],
	'content' => $content,
	'handle_icon_content_in_icon_widget' => true,
	'icons' => $section_three_icon_carousel,
]);


/**
 * Section #4
 * Header / 3 columns of icons + content
 */
$section4_heading = get_post_meta( get_the_ID(), 'confidence_counts_section_four_heading', true );
$icon_arr = [];

for ($i=1; $i < 4; $i++) { 
	$icon = get_post_meta( get_the_ID(), 'confidence_counts_section_four_icon_'.$i.'_icon', true );
	$icon_copy = get_post_meta( get_the_ID(), 'confidence_counts_section_four_icon_'.$i.'_content', true );

	array_push( $icon_arr, [ 'widget_partial' => "widget.icons.$icon", 'widget_content' => $icon_copy ] );
}

partial('section.icons.static-with-copy', [
	'classes' => ['bg-white', 'confidence-counts'],
    'heading' => '<h2 class="centered text-center">'.$section4_heading.'</h2>',
    'content' => get_post_meta( get_the_ID(), 'confidence_counts_section_four_content', true ),
    'icons' => $icon_arr
]);


/**
 * Section #5
 * Full-width video
 */
$video_thumbnail = get_post_meta(get_the_ID(),'confidence_counts_section_five_video_section_image', true);
$video_src = get_post_meta(get_the_ID(),'confidence_counts_section_five_video_section_video_src', true);
partial('section.video-full-with-text', [
	'classes' => ['non-overlay-text', 'confidence-counts'],
	'image' => [
		'src' => wp_get_attachment_image_src($video_thumbnail, 'full')[0],
		// 'srcset' => wp_get_attachment_image_src($video_thumbnail, 'medium_large')[0] . ' 1x, '. wp_get_attachment_image_src($virtual_monitoring_section_four_image, 'large')[0] . ' 2x, '. wp_get_attachment_image_src($virtual_monitoring_section_four_image, 'full')[0] . ' 3x',
		// 'sizes' => '',
		'alt' => get_post_meta($video_thumbnail, '_wp_attachment_image_alt', true),
		'classes' => ['bg-img'],
	],
	'video_src' => $video_src
]);


/**
 * Section #6
 * Event Registration form
 */
if( !is_location() ):	
partial('section.events.one-col-selection', [
	'classes' => ['confidence-counts', $brand_colors],
	'heading' => get_post_meta(get_the_ID(),'confidence_counts_section_six_heading', true),
	'content' => get_post_meta( get_the_ID(), 'confidence_counts_section_six_content', true ),
	'brand_locations' => $brand_locations
]);
else:

$location = is_location();
$region = get_region_for_location($location->ID, false, true);
$events_in_region = get_events_for_region($region[0]->ID);

	// if there no events in the office location region...
	if( empty( $events_in_region ) ) {
		partial('section.events.one-col-selection', [
			'classes' => ['confidence-counts', $brand_colors],
			'heading' => 'Check back later for exclusive Confidence Counts Club events!',
			'content' => 'There are currently no events available in this region, but we encourage you to check back next month!',
		]);
	} else {
		partial('section.events.two-cols-events-form', [
			'classes' => ['confidence-counts', $brand_colors],
			'heading' => get_post_meta(get_the_ID(),'confidence_counts_section_six_heading', true),
			'events' => $events_in_region
		]);
	}

endif;


/**
 * Section #7
 * Hero full-width (just image)
 */
$section_seven_desktop_img = wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'confidence_counts_section_seven_hero_desktop_image', true), 'full' );
$section_seven_mobile_img = wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'confidence_counts_section_seven_hero_mobile_image', true), 'full' );
partial('section.hero.full', [
	'classes' => ['confidence-counts', 'row1', $brand_colors],
	'image' => [
		'src' => $section_seven_desktop_img[0],
		// 'srcset' => get_stylesheet_directory_uri().'/images/placeholder/graphics/search-results-bottom-hero.jpg 1x, '.get_stylesheet_directory_uri().'/images/placeholder/graphics/search-results-bottom-hero@2x.jpg 2x',
		// 'sizes' => '100vw',
		'alt' => '',
		'classes' => ['desktop'],
	],
	'mobile_image' => [
		'src' => $section_seven_mobile_img[0],
		// 'srcset' => get_stylesheet_directory_uri().'/images/placeholder/graphics/search-results-bottom-hero-mobile.jpg 1x, '.get_stylesheet_directory_uri().'/images/placeholder/graphics/search-results-bottom-hero-mobile@2x.jpg 2x',
		// 'sizes' => '100vw',
		'alt' => '',
		'classes' => ['mobile bg-img'],
	],
]);


/**
 * Section #8
 * Ortho Treatment Carousel
 */
partial('section.events.carousel', [
	'h3' => get_post_meta(get_the_ID(), 'confidence_counts_section_eight_heading', true),
	'h3_classes' => ['h1', 'no-margin'],
	'slides' => get_post_meta(get_the_ID(), 'confidence_counts_section_eight_slides', true),
]);


/**
 * Section #9
 * Hero full-width w/ 2 content blocks aligned to the right
 */
$section_nine_desktop_img = wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'confidence_counts_section_nine_hero_desktop_image', true), 'full' );
$section_nine_mobile_img = wp_get_attachment_image_src( get_post_meta(get_the_ID(), 'confidence_counts_section_nine_hero_mobile_image', true) );
$content_section_heading_top = get_post_meta(get_the_ID(), 'confidence_counts_section_nine_top_heading', true);
$content_section_content_top = get_post_meta(get_the_ID(), 'confidence_counts_section_nine_top_content', true);
$content_section_heading_bottom = get_post_meta(get_the_ID(), 'confidence_counts_section_nine_bottom_heading', true);
$content_section_content_bottom = get_post_meta(get_the_ID(), 'confidence_counts_section_nine_bottom_content', true);
$content_section_bottom_cta_shortcode = get_post_meta(get_the_ID(), 'confidence_counts_section_nine_bottom_cta_shortcode', true);

partial('section.hero.full', [
	'classes' => ['parallax', 'confidence-counts', 'row2', 'middle-hero', sanitize_title($brand->post_title), $brand_colors],
	'background_image' => $section_nine_desktop_img[0],
    'mobile_image' => [
        'src' => $section_nine_desktop_img[0],
        'alt' => '',
        'classes' => ['mobile-hero'],
    ],    
    'content' => [
        'classes' => [ 'cc', 'bg-grey-2', 'animate-in'],
        'h3' => $content_section_heading_top,
        'h3_classes' => ['primary'],
        'content' => $content_section_content_top.'<div class="widget-bottom"><h4 class="h5">'. $content_section_heading_bottom .'</h4><p>'.$content_section_content_bottom .'</p><p>'. do_shortcode($content_section_bottom_cta_shortcode) .'</p></div>'
    ]
]);


/**
 * Section #10 
 * Testimonials
 */
$testimonials = array_filter($reviews->reviews, function($review) use ($brand) {
	$relationships = unserialize($review->relationships);
	return is_array($relationships) ? in_array($brand->ID, $relationships) : $brand->ID == $relationships;
});
usort($testimonials, function($a, $b) {
	return $a->menu_order <=> $b->menu_order;
});

partial('section.testimonials.carousel', [
	'classes' => [sanitize_title($brand->post_title), 'cc', $brand_colors],
	'htag' => 'h2',
	'heading_classes' => ['h3', 'primary'],
	'heading' => get_post_meta(get_the_ID(), 'confidence_counts_section_ten_heading', true),
	'reviews_left_border' => $testimonials,
]);


get_footer();