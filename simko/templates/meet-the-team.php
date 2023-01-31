<?
# Template Name: Meet the team
global $providers;
$brand = is_brand();
$location = is_location();

get_header();
$provider_relationships = get_post_meta(get_the_ID(), 'meet_the_team_providers_relationship', true);
$all_providers = $providers->searchProviders($provider_relationships);
usort($all_providers, function($a, $b) {
	return $a->menu_order <=> $b->menu_order;
});
if(count($all_providers) > 1) {
	$all_providers = $all_providers;
	$carousel_pagination_classes = ['pagination-reversed'];
} else {
	$all_providers = reset($all_providers);
	$carousel_pagination_classes = NULL;
}
partial('section.providers.carousel', [
	'h1' => get_post_meta(get_the_ID(), 'meet_the_team_heading', true),
	'h1_classes' => ['primary'],
	'h2' => get_post_meta(get_the_ID(), 'meet_the_team_subheading', true),
	'h2_classes' => ['primary', 'sub-heading'],
	'all_providers' => $all_providers,
	'content' => get_post_meta(get_the_ID(), 'meet_the_team_content', true),
	'pagination_classes' => $carousel_pagination_classes,
	'hide_pagination' => false,
	'hide_meet_the_team' => true,
]);
$tri_carousel_slides = [];
$slides_count = get_post_meta(get_the_ID(), 'meet_the_team_slides', true) ?? 0;
if ($slides_count > 0) {
	for ($i = 0; $i < $slides_count; $i++) {
		$attachment_id = get_post_meta(get_the_ID(), 'meet_the_team_slides_'.($i).'_image', true);
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
$bottom_hero_desktop_image_id = get_post_meta(get_the_ID(), 'meet_the_team_bottom_image_desktop', true);
$bottom_hero_mobile_image_id = get_post_meta(get_the_ID(), 'meet_the_team_bottom_image_mobile', true);
$bottom_hero_classes = !empty($location) ? ['meet-the-team', sanitize_title($brand->post_title), sanitize_title($location->post_title)] : ['meet-the-team', sanitize_title($brand->post_title)];
$bottom_hero_desktop_img_classes = $brand->post_title === 'Great River Orthodontics' && !empty($location) && $location->state === 'WI' ? ['desktop', 'bg-img'] : ['desktop'];
$bottom_hero_desktop_attachment = wp_get_attachment_image_src($bottom_hero_desktop_image_id, 'full');
$bottom_hero_mobile_attachment = wp_get_attachment_image_src($bottom_hero_mobile_image_id, 'medium_large');
if (!empty($bottom_hero_desktop_image_id) && !empty($bottom_hero_mobile_image_id)) {
	partial('section.hero.full', [
		'classes' => $bottom_hero_classes,
		'image' => [
			'src' => $bottom_hero_desktop_attachment[0],
			'alt' => get_post_meta($bottom_hero_desktop_image_id, '_wp_attachment_image_alt', true),
			'classes' => $bottom_hero_desktop_img_classes,
			'width' => $bottom_hero_desktop_attachment[1],
			'height' => $bottom_hero_desktop_attachment[2],
		],
		'mobile_image' => [
			'src' => $bottom_hero_mobile_attachment[0],
			'alt' => get_post_meta($bottom_hero_mobile_image_id, '_wp_attachment_image_alt', true),
			'classes' => ['mobile'],
			'width' => $bottom_hero_mobile_attachment[1],
			'height' => $bottom_hero_mobile_attachment[2],
		],
	]);
}
get_footer();
