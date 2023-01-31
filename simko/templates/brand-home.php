<?
# Template Name: Brand Home
global $locations, $providers, $reviews, $smile_transformations;	

$brand = is_brand();
$brand_location_ids = wp_list_pluck(get_locations_for_brand($brand->ID), 'ID');

get_header();

if( is_single_location_brand() ) {
	
	$provider = [];
	foreach($providers->providers as $p) {
		$arr = unserialize($p->brand_relationship);
		if(in_array($brand->ID, $arr)) {
			array_push( $provider, $p );
		}
	}
	$reviewArr = [];
	foreach($reviews->reviews as $r) {
		$arr = unserialize($r->relationships);
		if(!empty($arr) && in_array($brand->ID, $arr)) {
			$reviewArr[] = $r;
		}
	}

	$location_id = reset($brand_location_ids);
	$location = $locations->locations[strval($location_id)];

	// Moved Location page code to utility functions to avoid code duplication
	do_location_page($location, $provider, $reviewArr);
	
} else {

	$hero_position = $brand->section_one_hero_position ? 'right-side' : 'left-side'; // Default return 0 or left
	$hero_text_color = $brand->section_one_heading_color; // Default return 'primary'
	$container_color_classes = $hero_text_color === 'primary' ? 'bg-gray' : 'bg-primary';

	partial('section.hero.standard', [
		'desktop_image' => [
		'src' => $brand->top_hero_bg_img,
		'classes' => ['desktop']
		],
		'mobile_image' => $brand->top_hero_mobile_img,
		'classes' => ['parallax', 'brand', sanitize_title($brand->post_title)],
		'container_classes' => [$container_color_classes],
		'wrapper_classes' => [$hero_position],
		'h1' => $brand->section_one_heading,
		'h1_classes' => [$hero_text_color],
		'h2' => $brand->section_one_subheading,
		'h2_classes' => [$hero_text_color],
		'cta' => $brand->section_one_content
	]);

	$icons = array();
	for($j = 1; $j < 5; $j++) {
	$ico_str = 'section_two_icon_' . $j . '_icon';
	$text_str = 'section_two_icon_' . $j . '_text';
		if(!empty($brand->$ico_str) && !empty($brand->$text_str)) {
			$icons[] = [
				'partial' =>($brand->$ico_str),
				'text' =>($brand->$text_str),
			];
		}
	}
	$carousel_classes = !empty($icons) && count($icons) === 1 ? 'kill-carousel' : '';
	partial('section.icons.four-cols-carousel', [
		'classes' => [$carousel_classes],
		'icons' => $icons,
	]);
    
    $all_providers = array_values(array_filter($providers->providers, function($provider) use ($brand_location_ids) {
		$location_relationship = !empty($provider->location_relationship) ? unserialize($provider->location_relationship) : false;
		return ($location_relationship == false ? null : array_intersect($location_relationship, $brand_location_ids));
	}));
    
    if(count($all_providers) == 1) {
        partial('section.providers.carousel', [
		'h2' => $brand->section_three_heading,
		'h2_classes' => ['primary', 'h3'],
		'content' => $brand->section_three_content,
		'all_providers' => $all_providers,
		'pagination_classes' => NULL,
		'hide_pagination' => false,
		'hide_meet_the_team' => true,
		'slb_link' => false
	]);
    } else {
        partial('section.copy.two-cols', [
            'classes' => [sanitize_title($brand->post_title)],
            'columns' => [
                '<h2 class="h1">'.($brand->section_three_heading).'</h2>',
                $brand->section_three_content
            ],
        ]);
    }
	partial('section.maps.search');

	if (!empty($all_providers) && sanitize_title($brand->post_title) != 'ross-orthodontics') {
		usort($all_providers, function($a, $b) {
			return $a->menu_order <=> $b->menu_order;
		});

		if (count($all_providers) > 2) {
			partial('section.providers.tri-carousel', [
				'providers' => $all_providers
			]);
		} elseif(count($all_providers) === 2) {
			partial('section.providers.home-carousel', [
				'providers' => $all_providers
			]);
		}
	}
	partial('section.approval', [
		'h3' => $brand->section_six_heading,
		'h3_classes' => ['h1', 'primary'],
		'content' => $brand->section_six_content,
		'smile_image' => $brand->section_six_icon
	]);
	$slides = [];
	for ($i = 0; $i < $brand->section_seven_slides; $i++) {
		$slides[] = [
			'content' => [
				'id' => strtolower($brand->{'section_seven_slides_'.($i).'_simage_id'}.'-content'),
				'text' => $brand->{'section_seven_slides_'.($i).'_content'}
			],
			'image' => $brand->{'section_seven_slides_'.($i).'_simage'},
			'id' => strtolower($brand->{'section_seven_slides_'.($i).'_simage_id'}.'-image'),
			'classes' => ['tab-image', sanitize_title($brand->post_title)],
			'label' => $brand->{'section_seven_slides_'.($i).'_label'},
			'slide_cta' => json_decode(json_decode($brand->{'section_seven_slides_'.($i).'_cta'})->url, true),
		];
	}
	if (count($slides) > 0) {
		partial('section.smile-confidently', [
			'h4' => $brand->section_seven_heading,
			'h4_classes' => ['h2'],
			'slides' => $slides			
		]);
		
		$show_confidence_counts_module = get_post_meta( $brand->ID, 'brand_section_seven_confidence_count_module', true );
		if($show_confidence_counts_module) {
			partial('section.confidence-counts', [
				'classes' => ['bubbles-top', $brand->post_name],
			]);
		}
	}
	$num_for_rand = 8;
	$smile_transformation_ids = array_rand(get_smile_transformations_by_region_or_brand(), $num_for_rand);
	$smiles = array_values(array_filter(get_smile_transformations_by_region_or_brand(), function($smile) use ($smile_transformation_ids) {
		return in_array($smile->ID, $smile_transformation_ids);
	}));
	partial('section.smile-gallery', [
		'h3' => $brand->section_eight_heading,
		'h3_classes' => ['h2'],
		'content' => $brand->section_eight_content,
		'shortcode' => $brand->section_eight_cta,
		'gallery' => $smiles
	]);
	$testimonials = array_filter($reviews->reviews, function($review) use ($brand) {
		$relationships = unserialize($review->relationships);
		return is_array($relationships) ? in_array($brand->ID, $relationships) : $brand->ID == $relationships;
	});	
	usort($testimonials, function($a, $b) {
		return $a->menu_order <=> $b->menu_order;
	});
	partial('section.testimonials.carousel', [
		'classes' => [sanitize_title($brand->post_title)],
		'htag' => 'h2',
		'heading_classes' => ['h3', 'primary'],
		'heading' => $brand->section_nine_heading,
		'reviews_left_border' => $testimonials,
	]);
	partial('section.copy.three-cols', [
		'h2' => $brand->section_ten_heading,
		'h2_classes' => ['h1', 'primary', sanitize_title($brand->post_title)],
		'columns' => [
			['content' => $brand->section_ten_paragraph_1],
			['content' => $brand->section_ten_paragraph_2],
			['content' => $brand->section_ten_paragraph_3],
		]
	]);
	$community_involvement_slides = [];
	$community_slide_image_ids = unserialize($brand->section_eleven_gallery);
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
			'h3' => $brand->section_eleven_heading,
			'h3_classes' => ['primary h2'],
			'text' => $brand->section_eleven_content,
			'shortcode' => $brand->section_eleven_cta,
			'slides' => $community_involvement_slides
		]);
	}
	$bottom_hero_desktop_image_id = $brand->section_twelve_bottom_hero_desktop;
	$bottom_hero_mobile_image_id = $brand->section_twelve_bottom_hero_mobile;
	$bottom_hero_desktop_image = !empty($bottom_hero_desktop_image_id) ? wp_get_attachment_image_src($bottom_hero_desktop_image_id, 'full')[0] : false;
	$bottom_hero_mobile_image = !empty($bottom_hero_mobile_image_id) ? wp_get_attachment_image_src($bottom_hero_mobile_image_id, 'medium_large')[0] : false;
	if (!empty($bottom_hero_desktop_image) && !empty($bottom_hero_mobile_image)) {
		partial('section.hero.full', [
			'classes' => ['brand', 'bottom-hero', sanitize_title($brand->post_title)],
			'image' => [
				'src' => $bottom_hero_desktop_image,
				'alt' => get_post_meta($bottom_hero_desktop_image_id, '_wp_attachment_image_alt', true),
				'classes' => ['desktop'],
			],
			'mobile_image' => [
				'src' => $bottom_hero_mobile_image,
				'alt' => get_post_meta($bottom_hero_mobile_image_id, '_wp_attachment_image_alt', true),
				'classes' => ['mobile'],
			],
		]);
	}
}

get_footer();
