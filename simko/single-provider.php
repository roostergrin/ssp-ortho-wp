<?
global $wp, $providers, $edu_associations, $pro_affiliations;
$brand = is_brand();
$provider = $providers->providers[get_the_ID()];

// verify that there isn't duplicate providers across brands
if( unserialize($provider->brand_relationship)[0] !== $brand->ID ){
	$provider = get_provider_multi_brand_relationship($provider, $brand->ID);	
}

$relative_url = $wp->request;
$selected_location = unserialize($provider->selected_location_relationship)[0];

get_header();

if(is_brand()->ID === 8643) { // Prairie Grove Orthodontics - patch for Dr. Josh Whetten's image position on the homepage 
	if(is_object($provider)) { // Team overview page - this is an object this time?
		if($provider->post_name === 'josh-whetten-dds') {
			if(!property_exists($provider, 'image') || !is_array($provider->image)) {
				$provider->image = '';
			}
			$provider->image['style_desktop'] = 'top:-50px';
		}
	}
}

partial('section.copy.two-cols-with-image-popup-content', [
	'classes' => [ sanitize_title($brand->post_title) ],
	'article' => [
		'heading' => $provider->section_one_heading,
		'copy' => $provider->bio_copy,
	],
	'image' => $provider->image,
	'mobile_image' => $provider->image,
	'overlay_heading' => $provider->section_one_overlay_heading,
	'overlay_content' => $provider->section_one_overlay_content,
]);
$tri_carousel_slides = [];
$slide_image_ids = unserialize($provider->image_gallery);
if (!empty($slide_image_ids) && count($slide_image_ids) > 0) {
	foreach($slide_image_ids as $attachment_id) {
		$attachment = wp_get_attachment_image_src($attachment_id, 'medium_large');
		$tri_carousel_slides[] = [
			'src' => $attachment[0],
			'width' => $attachment[1],
			'height' => $attachment[2],
			'alt' => !empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? str_replace('_', ' ', get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) : str_replace('_', ' ', get_the_title($attachment_id)),
			'classes' => [!empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? get_post_meta($attachment_id, '_wp_attachment_image_alt', true) : get_the_title($attachment_id)]
		];
	}
	if ($provider->first_name === 'David' && $provider->last_name === 'Duevel') {
		$golf_slide = array_shift($tri_carousel_slides);
		$ski_slide = array_shift($tri_carousel_slides);
		$slide_count = count($tri_carousel_slides);
		$half_small = floor($slide_count/2);
		$half_large = ceil($slide_count/2);
		shuffle($tri_carousel_slides);
		array_unshift($tri_carousel_slides, $golf_slide);
		$tri_carousel_slides = $half_small === $half_large ? array_merge(array_slice($tri_carousel_slides, 0, $half_small + 1), [$ski_slide], array_slice($tri_carousel_slides, $half_small + 1)) : array_merge(array_slice($tri_carousel_slides, 0, $half_large), [$ski_slide], array_slice($tri_carousel_slides, $half_small));
	} else {
		shuffle($tri_carousel_slides);
	}
	if(!empty($tri_carousel_slides)){
		partial('section.tri-carousel', [
			'images' => $tri_carousel_slides
		]);
	}
}
$all_edu_associations = array_filter($edu_associations->edu_associations, function($association) {
	$provider_relationships = property_exists($association, 'provider_relationship') ? unserialize($association->provider_relationship) : false;
	return !empty($provider_relationships) && is_array($provider_relationships) ? in_array(get_the_ID(), $provider_relationships) : get_the_ID() === $provider_relationships;
});
usort($all_edu_associations, function($a, $b) {
	return $a->menu_order <=> $b->menu_order;
});
$all_pro_affiliations = array_filter($pro_affiliations->pro_affiliations, function($affiliation) {
	$provider_relationships = property_exists($affiliation, 'provider_relationship') ? unserialize($affiliation->provider_relationship) : false;
	return !empty($provider_relationships) && is_array($provider_relationships) ? in_array(get_the_ID(), $provider_relationships) : get_the_ID() === $provider_relationships;
});
usort($all_pro_affiliations, function($a, $b) {
	return $a->menu_order <=> $b->menu_order;
});

partial('section.professional-associations', [
	'edu_associations' => $all_edu_associations,
	'pro_affiliations' => $all_pro_affiliations,
]);

if(!is_single_location_brand()) {
	partial('section.maps.bio-location', [
		'provider' => $provider,
		'info_box_copy' => $provider->section_four_heading,
		'relative_url' => $relative_url,
		'selected_location' => $selected_location,
	]);
}
$sec_5_provider_desktop_image = wp_get_attachment_image_src($provider->section_five_bottom_desktop_image, 'full')[0];
$sec_5_provider_mobile_image = wp_get_attachment_image_src($provider->section_five_bottom_mobile_image, 'medium_large')[0];

if(!empty($sec_5_provider_desktop_image) && !empty($sec_5_provider_mobile_image)) {
	partial('section.hero.full', [
		'image' => [
			'src' => $sec_5_provider_desktop_image,
			'alt' => get_post_meta($provider->section_five_bottom_desktop_image, '_wp_attachment_image_alt', true),
			'width' => '1536',
			'height' => '864',
			'classes' => ['desktop', strtolower($provider->last_name)],
		],
		'mobile_image' => [
			'src' => $sec_5_provider_mobile_image,
			'alt' => get_post_meta($provider->section_five_bottom_mobile_image, '_wp_attachment_image_alt', true),
			'width' => '768',
			'height' => '432',
			'classes' => ['mobile', strtolower($provider->last_name)],
		],
		'classes' => ['bio', strtolower($provider->last_name)],
	]);
}
get_footer();
