<?
global $wpdb, $smile_transformations, $providers, $regions, $locations;
$brand = is_brand();
$location = is_single_location_brand() ? get_single_location_brand() : is_location();
$region = array();
if(!empty($location)) {
	get_region_for_location($location->ID, false, true);
} elseif(isset($_GET['region'])) {
	foreach($regions->regions as $r) {
		if($r->post_name == $_GET['region']) {
			$region[] = $r;
		}
	}	
}

wp_enqueue_script('internal-smile-gallery-page');
$case_studies_per_page = 8;
$case_studies = get_smile_transformations_by_region_or_brand($region);

$all_providers = array();
if(!is_live()) {
	// Filter providers by region else get all CS and providers by brand
	if( !empty($region) ) {
		$region = $region[0];
		$region_locations = unserialize($region->location_relationship);
		foreach($providers->providers as $ap) {
			if( count(array_intersect(unserialize($ap->location_relationship), $region_locations)) > 0 ) {
				$all_providers[] = $ap;
			}
		}
	} else {
		foreach($providers->providers as $ap) { 
			if( in_array($brand->ID, unserialize($ap->brand_relationship)) ) {
				$all_providers[] = $ap;
			}
		}
	}
}

usort($all_providers, function($a, $b) {
	return $a->menu_order <=> $b->menu_order;
});
$provider_filters = '<div class="filters-container">';
foreach($all_providers as $p) {
	if( in_array($brand->ID, unserialize($p->brand_relationship)) ) {
		if(isset($_GET['enabled'])) {
			$provider_filters .= '<div class="filter" id="'.$p->ID.'">Dr. '.($p->last_name).'</div>';
		} else {
			// Dummy buttons do nothing but change color. Remove styling and JS when enabling
			$provider_filters .= '<div class="filter-inop" id="">Dr. '.($p->last_name).'</div>';
		}
	}
}
$provider_filters .= '</div>';

$diagnosis = get_terms([
	'taxonomy' => 'smile_transformation_diagnosis',
	'hide_empty' => false,
]);
$treatments = get_terms([
	'taxonomy' => 'smile_transformation_treatments',
	'hide_empty' => false,
]);

// Filter out Dietmeier and Chapman treatments
if($brand->ID !== 13032 && $brand->ID !== 13590) {
	$num = count($treatments);
	for ($x = 0; $x < $num; $x++) {
		if(strstr($treatments[$x]->slug, 'helix') || strstr($treatments[$x]->slug, 'forsus')) {
			unset($treatments[$x]);
		}
	}
} else {
	// Filter out treatments on Dietmeier
	$num = count($treatments);
	for ($x = 0; $x < $num; $x++) {
		if(strstr($treatments[$x]->slug, 'palatal') || strstr($treatments[$x]->slug, 'herbst')) {
			unset($treatments[$x]);
		}
	}
}

add_filter('smile_filter', function($a) {
	return str_replace(['_', 'invisalign'], [' ', 'invisalign<sup>&reg;</sup>'], $a);
});
asort($diagnosis);
asort($treatments);
?>
<section class="smile-gallery-page">
	<div class="content">
		<? if (!empty($is_landing_page) && $is_landing_page) : ?>
			<img src="<?= wp_get_attachment_image_src($brand->logo_desktop)[0]; ?>" alt="<?= get_post_meta($brand->logo_desktop, '_wp_attachment_image_alt', true); ?>" title="<?= get_post_meta($brand->logo_desktop, '_wp_attachment_image_alt', true); ?>" width="160" height="60" class="mobile" /><br><br>
		<? endif; ?>
		<div class="inner-content">
			<div class="copy">
				<? if (!empty($h1)) : ?>
					<h1<?= !empty($h1_classes) ? ' class="'.implode(' ', $h1_classes).'"' : ''; ?>><?= $h1; ?></h1>
				<? endif; ?>
				<? if (!empty($content)) { echo apply_filters('the_content', $content); } ?>
				<? if (!empty($is_landing_page) && $is_landing_page) : ?>
					<img src="<?= wp_get_attachment_image_src($brand->logo_desktop)[0]; ?>" alt="<?= get_post_meta($brand->logo_desktop, '_wp_attachment_image_alt', true); ?>" title="<?= get_post_meta($brand->logo_desktop, '_wp_attachment_image_alt', true); ?>" width="160" height="60" class="lp-logo desktop" />
				<? endif; ?>
			</div>
			<div class="gallery">
				<div class="filters">
					<div class="stick-sidebar">
						<? if( (!empty($is_landing_page) && $is_landing_page) && count($all_providers) > 1 ) : ?>
						<div class="filter-category">
							<div class="filter-cat-title">Providers <i class="icon-list-triangle mobile"></i></div>
							<div class="filters-container">
								<?= $provider_filters; ?>
							</div>
						</div>
						<? endif;?>
						<div class="filter-category">
							<div class="filter-cat-title">Diagnosis <i class="icon-list-triangle mobile"></i></div>
							<div class="filters-container">
							<? foreach ($diagnosis as $d): ?>
								<div class="filter" id="<?= str_replace('-', '_', sanitize_title(strtolower(apply_filters('smile_filter', $d->slug)))) ?>"><?= ucfirst(apply_filters('smile_filter', $d->name)) ?></div>
							<? endforeach ?>
							</div>
						</div>
						<div class="filter-category">
							<div class="filter-cat-title">Treatments <i class="icon-list-triangle mobile"></i></div>
							<div class="filters-container">							
							<? foreach ($treatments as $t):
							if($t->slug == 'herbst-appliance' && $brand->ID == 8643) {
								continue;
							}
							else if ( $t->slug == 'herbst-appliance' && $brand->ID == 16618 || $t->slug == 'invisalign-treatment' && $brand->ID == 16618 ) 						{
								continue;
							}
							else {
								$title = ucfirst(apply_filters('smile_filter', $t->name));
								if($t == 'invisalign') {
									$title = 'Invisalign<sup>®</sup> treatment';
								} elseif($t == 'herbst') {
									 $title = 'Herbst<sup>®</sup> appliance';
								}
							}
	                        ?>
								<div class="filter" id="<?= str_replace('-', '_', sanitize_title(strtolower(apply_filters('smile_filter', $t->slug)))) ?>"><?= $title ?></div>
							<? endforeach ?>
							</div>
						</div>
					</div>
				</div>
				<div class="before-after-container">
                    <div class="filter-no-results hidden">
                        <div class="filter-no-results-content">
                            <h2>Every smile is unique</h2>
                            <p>We don’t have any smile transformations for that category at this time, but we would love for you to visit one of our locations to support your journey to a beautiful, healthy, and confident smile.</p>
                            <a href="<?= brand_url('free-orthodontic-consultation'); ?>" class="text cta">Schedule your free consultation</a>
                        </div>
                    </div>
				<? if (!empty($case_studies)): ?>
					<? $k = 1; ?>
					<? foreach ($case_studies as $post_id => $cs): ?>
						<? $all_treatments = wp_get_post_terms($cs->ID, 'smile_transformation_treatments', ['fields' => 'slugs']);
						if ($brand->ID == 8643 && in_array('herbst-appliance', $all_treatments)) { 
							continue;
						} else {
							$_data_filters = '';
							$_data_filters .= str_replace('-', '_', implode('|', wp_get_post_terms($cs->ID, 'smile_transformation_diagnosis', ['fields' => 'slugs']))) . '|';
							$_data_filters .= str_replace('-', '_', implode('|', $all_treatments)) . '|';
							if(property_exists( $cs, 'brand_relationship' ) && !empty($cs->brand_relationship)){
								$_data_filters .= implode('|', unserialize($cs->brand_relationship)) . '|';
							}
							$_data_filters .= implode('|', unserialize($cs->provider_relationship)); 
														
							?>
							<div class="before-after-item" data-filters="<?= $_data_filters; ?>"<? if($k > $case_studies_per_page) echo ' style="display:none;"'; ?>>
								<div class="before-after-images">
									<div class="before-after-img before-img">
										<?= responsive_static_img([
											'src' => wp_get_attachment_image_src($cs->before_image, 'medium')[0],
											'srcset' => wp_get_attachment_image_src($cs->before_image, 'medium')[0].' 1x, '.wp_get_attachment_image_src($cs->before_image, 'medium_large')[0].' 2x',
											'width' => 200,
											'height' => 200,
											'alt' => 'Before: ' . esc_attr($cs->post_title),
										]); ?>
									</div>
									<div class="before-after-img after-img">
										<?= responsive_static_img([
											'src' => wp_get_attachment_image_src($cs->after_image, 'medium')[0],
											'srcset' => wp_get_attachment_image_src($cs->after_image, 'medium')[0].' 1x, '.wp_get_attachment_image_src($cs->after_image, 'medium_large')[0].' 2x',
											'width' => 200,
											'height' => 200,
											'alt' => 'After: ' . esc_attr($cs->post_title),
										]); ?>
									</div>
								</div>
								<div class="before-after-content">
									<h2 class="h4"><?= $cs->post_title ?></h2>
									<?= apply_filters('the_content', $cs->post_content); ?>
								</div>
							</div>
						<? } ?>
						<? $k++ ?>
					<? endforeach ?>
				<? endif ?>
				<? if ( $k > $case_studies_per_page ): ?>
					<div class="cta-wrapper">
						<a href="#" class="cta primary load-more">Load more</a>
					</div>
				<? endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
