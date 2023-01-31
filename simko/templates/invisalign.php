<?
global $reviews;
$location = is_location();
$brand = is_brand();
# Template Name: Invisalign

$invisalign_hero_desktop_image = get_post_meta(get_the_id(), 'invisalign_hero_desktop_image', true);
$invisalign_hero_mobile_image = get_post_meta(get_the_id(), 'invisalign_hero_mobile_image', true);
$invisalign_hero_heading = get_post_meta(get_the_id(), 'invisalign_hero_heading', true);
$hero_position = get_post_meta(get_the_id(), 'invisalign_hero_position', true) ? 'right-side' : 'left-side'; // Default return 0 or left
$hero_text_color = get_post_meta(get_the_id(), 'invisalign_hero_heading_color', true) ; // Default return 'primary'
$container_color_classes = $hero_text_color === 'primary' ? 'bg-gray' : 'bg-primary';

$invisalign_section_two_heading_desktop = get_post_meta(get_the_id(), 'invisalign_section_two_heading_desktop', true);
$invisalign_section_two_heading_mobile = get_post_meta(get_the_id(), 'invisalign_section_two_heading_mobile', true);
$invisalign_section_two_content = get_post_meta(get_the_id(), 'invisalign_section_two_content', true);
$invisalign_section_two_content_two = get_post_meta(get_the_id(), 'invisalign_section_two_content_two', true);
$invisalign_section_two_image = get_post_meta(get_the_id(), 'invisalign_section_two_image', true);

$invisalign_section_three_image = get_post_meta(get_the_id(), 'invisalign_section_three_image', true);
$invisalign_section_three_heading = get_post_meta(get_the_id(), 'invisalign_section_three_heading', true);

$invisalign_section_four_heading = get_post_meta(get_the_id(), 'invisalign_section_four_heading', true);
$invisalign_section_four_content = get_post_meta(get_the_id(), 'invisalign_section_four_content', true);

$invisalign_section_five_heading = get_post_meta(get_the_id(), 'invisalign_section_five_heading', true);
$invisalign_section_five_image = get_post_meta(get_the_id(), 'invisalign_section_five_image', true);

$invisalign_section_six_boxes_box_1_heading = get_post_meta(get_the_id(), 'invisalign_section_six_boxes_box_1_heading', true);
$invisalign_section_six_boxes_box_1_content = get_post_meta(get_the_id(), 'invisalign_section_six_boxes_box_1_content', true);
$invisalign_section_six_boxes_box_2_heading = get_post_meta(get_the_id(), 'invisalign_section_six_boxes_box_2_heading', true);
$invisalign_section_six_boxes_box_2_content = get_post_meta(get_the_id(), 'invisalign_section_six_boxes_box_2_content', true);
$invisalign_section_six_boxes_box_3_heading = get_post_meta(get_the_id(), 'invisalign_section_six_boxes_box_3_heading', true);
$invisalign_section_six_boxes_box_3_content = get_post_meta(get_the_id(), 'invisalign_section_six_boxes_box_3_content', true);

$invisalign_section_nine_desktop_image = get_post_meta(get_the_id(), 'invisalign_section_nine_desktop_image', true);
$invisalign_section_nine_mobile_image = get_post_meta(get_the_id(), 'invisalign_section_nine_mobile_image', true);
$invisalign_section_nine_heading = get_post_meta(get_the_id(), 'invisalign_section_nine_heading', true);
$invisalign_section_nine_content = get_post_meta(get_the_id(), 'invisalign_section_nine_content', true);
$invisalign_section_nine_bottom_heading = get_post_meta(get_the_id(), 'invisalign_section_nine_bottom_heading', true);
$invisalign_section_nine_bottom_content = get_post_meta(get_the_id(), 'invisalign_section_nine_bottom_content', true);
$invisalign_section_nine_cta = get_post_meta(get_the_id(), 'invisalign_section_nine_cta', true);

$invisalign_section_eleven_desktop_image = get_post_meta(get_the_id(), 'invisalign_section_eleven_desktop_image', true);
$invisalign_section_eleven_mobile_image = get_post_meta(get_the_id(), 'invisalign_section_eleven_mobile_image', true);

get_header();
partial('section.hero.standard', [
    'desktop_image' => [
        'src' => wp_get_attachment_image_src($invisalign_hero_desktop_image, 'full')[0],
        'alt' => get_post_meta($invisalign_hero_desktop_image, '_wp_attachment_image_alt', true),
        'classes' => ['desktop'],
    ],
    'mobile_image' => [
        'src' => wp_get_attachment_image_src($invisalign_hero_mobile_image, 'full')[0],
        'alt' => get_post_meta($invisalign_hero_mobile_image, '_wp_attachment_image_alt', true),
        'classes' => ['mobile'],
    ],
    'classes' => ['parallax', 'invisalign', sanitize_title($brand->post_title)],
	'container_classes' => ['desktop', $container_color_classes],
	'wrapper_classes' => [$hero_position],
    'h1' => $invisalign_hero_heading,
    'h1_classes' => ['desktop', $hero_text_color],
]);
partial('section.copy.two-cols-with-image', [
    'classes' => ['invisalign'],
    'h2_classes' => ['h1', 'primary'],
    'columns' => [
        '<h2 class="desktop">'. $invisalign_section_two_heading_desktop .'</h2><h2 class="h1 mobile">'. $invisalign_section_two_heading_mobile .'</h2>' . apply_filters('the_content', $invisalign_section_two_content) . '<img src="'. wp_get_attachment_image_src($invisalign_section_two_image, 'medium_large')[0] .'" alt="'. get_post_meta($invisalign_section_two_image, '_wp_attachment_image_alt', true) .'" class="mobile" />' . apply_filters('the_content', $invisalign_section_two_content_two),
        '<img src="'. wp_get_attachment_image_src($invisalign_section_two_image, 'medium_large')[0] .'" alt="'. get_post_meta($invisalign_section_two_image, '_wp_attachment_image_alt', true) .'" class="desktop" />'
    ]
]);

partial('section.banner', [
    'classes' => [],
    'image' => [
        'src' => wp_get_attachment_image_src($invisalign_section_three_image, 'full')[0],
        'alt' => get_post_meta($invisalign_section_three_heading, '_wp_attachment_image_alt', true),
        'classes' => [],
    ],
    'h2' => $invisalign_section_three_heading,
    'h2_classes' => ['h1', 'white'],
    'phone' => do_shortcode(get_post_meta(get_the_id(), 'invisalign_section_three_phone', true)),
    'book' => do_shortcode(get_post_meta(get_the_id(), 'invisalign_section_three_book', true)),
]);
partial('section.icons.static-with-copy', [
    'classes' => ['bg-gray', 'invisalign'],
    'heading' => '<h3 class="blue centered text-center">'. $invisalign_section_four_heading .'</h3>',
    'content' => apply_filters('the_content', $invisalign_section_four_content),
    'icons' => [
            [
                'widget_partial' => 'widget.icons.'. get_post_meta(get_the_id(), 'invisalign_section_four_icons_icon_1_icon', true),
                'widget_heading' => get_post_meta(get_the_id(), 'invisalign_section_four_icons_icon_1_text', true),
            ],
            [
                'widget_partial' => 'widget.icons.'. get_post_meta(get_the_id(), 'invisalign_section_four_icons_icon_2_icon', true),
                'widget_heading' => get_post_meta(get_the_id(), 'invisalign_section_four_icons_icon_2_text', true),
            ],
            [
                'widget_partial' => 'widget.icons.'. get_post_meta(get_the_id(), 'invisalign_section_four_icons_icon_3_icon', true),
                'widget_heading' => get_post_meta(get_the_id(), 'invisalign_section_four_icons_icon_3_text', true),
            ],
    ]
]);
partial('section.copy.two-cols-with-image', [
    'classes' => ['diamond-plus'],
    'h2' => $invisalign_section_five_heading,
    'h2_classes' => ['h1', 'primary'],
    'image' => [
        'src' => wp_get_attachment_image_src($invisalign_section_five_image, 'full')[0],
        'width' => 120,
        'height' => 106,
        'alt' => get_post_meta($invisalign_section_five_image, '_wp_attachment_image_alt', true),
        'classes' => ['diamond', 'desktop']
    ],
    'mobile_image' => [
        'src' => wp_get_attachment_image_src($invisalign_section_five_image, 'full')[0],
        'width' => 120,
        'height' => 106,
        'alt' => get_post_meta($invisalign_section_five_image, '_wp_attachment_image_alt', true),
        'classes' => ['diamond', 'mobile']
    ],
    'columns' => []
]);
partial('section.service.invisalign.carousel',[
    'boxes' => [
        [
            'heading' => $invisalign_section_six_boxes_box_1_heading,
            'content' => apply_filters('the_content', $invisalign_section_six_boxes_box_1_content),
        ],
        [
            'heading' => $invisalign_section_six_boxes_box_2_heading,
            'content' => apply_filters('the_content', $invisalign_section_six_boxes_box_2_content),
        ],
        [
            'heading' => $invisalign_section_six_boxes_box_3_heading,
            'content' => apply_filters('the_content', $invisalign_section_six_boxes_box_3_content),
        ],

    ]
]);
partial('section.steps-with-lines', [
    'classes' => [sanitize_title($brand->post_title)]
]);

$testimonials = array_filter($reviews->reviews, function($review) {
	$relationships = unserialize($review->relationships);
	return is_array($relationships) ? in_array(get_the_ID(), $relationships) : get_the_ID() == $relationships;
});
if(!empty($testimonials)) {
    partial('section.testimonials.carousel', [
        'htag' => 'h2',
        'heading_classes' => ['h3', 'primary'],
        'heading' => get_post_meta(get_the_id(), 'invisalign_section_eight_testimonials_heading', true),
        'reviews_left_border' => $testimonials,
    ]);
}
partial('section.hero.full', [
    'background_image' => wp_get_attachment_image_src($invisalign_section_nine_desktop_image, 'full')[0],
    'mobile_image' => [
        'src' => wp_get_attachment_image_src($invisalign_section_nine_mobile_image, 'medium_large')[0],
        'alt' => get_post_meta($invisalign_section_nine_mobile_image, '_wp_attachment_image_alt', true),
        'classes' => ['mobile-hero'],
    ],
    'classes' => ['parallax', 'invisalign', 'middle-hero', sanitize_title($brand->post_title)],
    'content' => [
        'classes' => [ 'invisalign', 'bg-grey-2', 'animate-in'],
        'h3' => $invisalign_section_nine_heading,
        'h3_classes' => ['primary'],
        'content' => $invisalign_section_nine_content.'<div class="widget-bottom"><h4 class="h3">'. $invisalign_section_nine_bottom_heading .'<span>'.$invisalign_section_nine_bottom_content .'</span></h4><p>'. do_shortcode($invisalign_section_nine_cta) .'</p></div>'
    ]
]);
partial('section.faqs.boxes');
partial('section.hero.full', [
    'classes' => ['invisalign', 'bottom-hero', sanitize_title($brand->post_title)],
    'image' => [
        'src' => wp_get_attachment_image_src($invisalign_section_eleven_desktop_image, 'full')[0],
        'alt' => get_post_meta($invisalign_section_eleven_desktop_image, '_wp_attachment_image_alt', true),
        'width' => 2048,
        'height' => 1152,
        'classes' => ['desktop'],
    ],
    'mobile_image' => [
        'src' => wp_get_attachment_image_src($invisalign_section_eleven_mobile_image, 'medium_large')[0],
        'alt' => get_post_meta($invisalign_section_eleven_mobile_image, '_wp_attachment_image_alt', true),
        'classes' => ['mobile'],
    ]
]);
get_footer();
