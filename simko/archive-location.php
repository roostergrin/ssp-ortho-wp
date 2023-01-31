<?
global $locations;

$brand = is_brand();
$brand_location_ids = wp_list_pluck(get_locations_for_brand($brand->ID), 'ID');
if(is_single_location_brand()) {
	header("Location: " . site_url());
	exit;
}

if($brand->ID == 8643){
	add_filter('aioseo_description', function($text) { return 'Find an orthodontics expert near you! Serving communities in Central Wisconsin.'; });
}
get_header();

$all_locations = $locations->searchLocations($brand_location_ids);
usort($all_locations, function($a, $b) {
	return $a->post_title <=> $b->post_title;
});
partial('section.locations-three-col-grid', [
	'heading' => $brand->locations_heading,
	'locations' => $all_locations,
]);
partial('section.maps.search');
add_action('wp_footer', function() { ?>
<script>
if (window.dataLayer !== undefined) {
	window.dataLayer.push({
		 event: 'experimentVariantLocationMapPosition',
		 variant: '<?= ab_variant() ?>'
	});
}
</script>
<?
}, 1e6);

get_footer();
