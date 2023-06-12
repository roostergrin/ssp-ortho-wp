<?
global $wp, $providers, $locations, $wp_post_types, $regions;

$relative_url = $wp->request;
$brand = is_brand();
$location = is_location();
$all_providers = get_providers();

$services = get_nav_services_for_brand( $brand );
$service_templates = [
	'why-orthodontic-treatment.php',
	'braces.php',
	'invisalign.php',
	'sleep-apnea.php',
	'smile-gallery.php'
];

$template_array = explode('/', get_page_template());
$is_landing_page = if_landing_page_get_lp_phone() ?? false;
$landing_page_phone = if_landing_page_get_lp_phone();

if(!empty($location)) {
	if(!empty($location->location_toll_free_phone)) {
		$phone = $location->location_toll_free_phone;
	} else {
		$phone = $location->phone;
	}
} else {
	if(!empty($brand->corporate_toll_free_phone)) {
		$phone = $brand->corporate_toll_free_phone;
	} else {
		$phone = $brand->corporate_phone;
	}
}

$show_interstital_banner = false;
$interstital_banner_locations = get_post_meta($brand->ID, 'brand_interstitial_locations_relationship', true);
$show_interstital_banner_at_brand_level = get_post_meta($brand->ID, 'brand_interstitial_show_at_brand_level', true);

if( (!$location && $show_interstital_banner_at_brand_level == true) || (!empty( $interstital_banner_locations ) && !empty($location) && in_array($location->ID, $interstital_banner_locations)) ){
	$show_interstital_banner = true;
}

?>
<section class="header">
	<? if($show_interstital_banner): ?>
		<? partial('section.interstitial-banner'); ?>
	<? endif; ?>

	<div class="content">
		<div class="inner-content">
			<div id="header-logo" class="<?= sanitize_title($brand->post_title)?>">
				<a class="block" href="<?= brand_url('/', $brand) ?>"><img src="<?= wp_get_attachment_image_src($brand->logo_desktop)[0]; ?>" alt="<?= get_post_meta($brand->logo_desktop, '_wp_attachment_image_alt', true); ?>" title="<?= get_post_meta($brand->logo_desktop, '_wp_attachment_image_alt', true); ?>"/></a>
			</div>
			<div id="header-primary-navigation">
				<? if (!$is_landing_page) : ?>
					<ul class="primary-nav">
						<? if (!empty($services)): ?>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-368<? if(in_array(end($template_array), $service_templates)) echo ' current-menu-ancestor'; ?>">
								<a href="#">Services<span class="dropdown mobile icon-plus" aria-disabled="true"></span><div class="hover-bar"></div></a>
								<ul class="sub-menu">
									<? foreach ($services as $slug => $s): ?>
									<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?= brand_url($slug, $brand) ?>"><?= esc_html($s) ?></a></li>
									<? endforeach ?>
								</ul>
							</li>
						<? endif ?>
						<li id="menu-item-366" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-366<? if(
							in_array(end($template_array), [
								'patient-care-philosophy.php',
								'safety-procedures.php',
								'community-involvement.php',
							])
						) echo ' current-menu-ancestor'; ?>"><a href="#">Our approach</a><div class="hover-bar"></div>
							<ul class="sub-menu">
								<li id="menu-item-292" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-292"><a href="<?= brand_url('patient-care-philosophy', $brand) ?>">Patient care philosophy</a></li>
								<li id="menu-item-300" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-300"><a href="<?= brand_url('safer-orthodontic-care', $brand) ?>">Safety &#038; procedures</a></li>
								<li id="menu-item-299" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-299"><a href="<?= brand_url('community-involvement', $brand) ?>">Community involvement</a></li>
							</ul>
						</li>
						<? if (!empty($all_providers)) : ?>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-367<? if (
								strstr($relative_url, 'orthodontic-team')
							) echo ' current-menu-ancestor'; ?>"><a href="#">Our team<span class="dropdown mobile icon-plus" aria-disabled="true"></span><div class="hover-bar"></div></a>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-331"><a href="<?= brand_url('meet-our-orthodontic-team', $brand); ?>">Meet the team</a></li>
									<? foreach ($all_providers as $k => $v): ?>
										<li class="mobile-column menu-item menu-item-type-post_type menu-item-object-page"><a href="<?= brand_url('/'.($v->relative_url).'/', $brand); ?>"><?= $v->caption['name']; ?></a></li>
									<? endforeach ?>
								</ul>
							</li>
						<? endif; ?>
						<li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-48<? if(
							in_array(end($template_array), [
								'refer-a-friend.php',
								'care-maintenance.php',
								'emergency-care-and-repair.php',
							])
						) echo ' current-menu-ancestor'; ?>"><a href="#">For patients</a><div class="hover-bar"></div>
							<ul class="sub-menu">
								<li id="menu-item-305" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-305"><a href="<?= brand_url('patient-forms', $brand) ?>">Patient forms</a></li>
								<li id="menu-item-307" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-307"><a href="<?= brand_url('orthodontic-care-maintenance', $brand) ?>">Orthodontic care &#038; maintenance</a></li>
								<? if( is_confidence_counts_brand() ): ?>
								<li id="menu-item-309" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-309"><a href="<?= brand_url('confidence-counts-club', $brand) ?>">Confidence Counts Club</a></li>
								<? endif; ?>
								<? if((!empty($location) && !empty($location->invisalign_vc_toggle) && $location->invisalign_vc_toggle) || $brand->invisalign_vc_toggle) : ?>
								<li id="menu-item-308" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-308"><a href="<?= brand_url('invisalign-virtual-care', $brand) ?>">Invisalign&reg; virtual care</a></li>
								<? endif;?>
								<li id="menu-item-306" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-306"><a href="<?= brand_url('orthodontic-emergency-care-repairs', $brand) ?>">Emergency care &#038; repair</a></li>
								<li id="menu-item-296" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-296"><a href="<?= brand_url('refer-a-friend-program', $brand) ?>">Refer a friend</a></li>
							</ul>
						</li>
						<li id="menu-item-291" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-291<? if(
							in_array(end($template_array), [
								'financing.php',
							])
						) echo ' current-menu-ancestor'; ?>"><a href="<?= brand_url('affordable-orthodontist', $brand) ?>">Financing</a></li>
						<li id="menu-item-52" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52<? if(
							in_array(end($template_array), [
								'archive.php',
								'single.php',
							])
						) echo ' current-menu-ancestor'; ?>"><a href="<?= brand_url('orthodontic-blog', $brand) ?>">Blog</a></li>
						<li id="menu-item-295" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-295<? if(
							in_array(end($template_array), [
								'appointment.php',
							])
						) echo ' current-menu-ancestor'; ?>"><a href="<?= brand_url('schedule-appointment', $brand) ?>">Appointments</a></li>

						<li class="menu-item menu-item-type-custom menu-item-object-custom has-cta">
							<a href="<?= brand_url('free-orthodontic-consultation', $brand) ?>" class="cta primary">Free consultation</a>
						</li>
					</ul>
				<? else : ?>
					<ul class="primary-nav-ppc">
						<li><a href="tel:+1<?= $landing_page_phone; ?>" class="inherit"><i class="icon-phone"></i> <span><?= hyphenatePhoneNumber($landing_page_phone); ?></span></a></li>
					</ul>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
<? if (!$is_landing_page) : ?>
	<section class="header-utility">
		<div class="content">
			<div class="inner-content">
				<div id="header-location-tagline-utility-navigation">
					<?if(!is_single_location_brand()) :?>
						<? if ($location): ?><div id="header-location-tagline"><?= $location->post_title; ?><i class="icon-list-triangle mobile"></i></div><? endif ?>
						<div id="header-utility-navigation">
							<ul>
								<li><a href="/orthodontist-office/"><?= empty($location) ? 'Find a location' : 'View more locations'; ?></a></li>
								<? if(false && !isset($_POST['s'])){ ?>
									<li>
										<form method="POST" id="site_search" class="site_search" autocomplete="off" action="/site-search/">
											<input type="text" name="s" placeholder="Search" autocomplete="off" value="<?= $_POST['s'] ?>">
										</form>
									</li>
								<? } ?>
							</ul>
						</div>
						<? if (empty($location)) : ?>
							<div id="header-mobile-utility-navigation" class="mobile">
								<ul>
									<li><a href="/orthodontist-office/">Find a location</a></li>
								</ul>
							</div>
						<? else: ?>
							<div id="header-mobile-utility-navigation-more-locations" class="mobile">
								<ul>
									<li><a href="/orthodontist-office/">View more locations</a></li>
								</ul>
							</div>
						<? endif; ?>
					<? endif; ?>
				</div>
				<? if( !empty($phone) ) :?>
					<div id="header-location-contact">
						<ul>
							<li><a href="tel:+1<?= toTouchTone($phone); ?>" class="inherit"><i class="icon-phone"></i> <span><?= hyphenatePhoneNumber($phone); ?></span></a></li>
						</ul>
					</div>
				<? else :?>
					<div id="header-location-contact">
						<ul>
							<li><?= do_shortcode('[free_orthodontic_consultation_link text="Free consultation" class="text menu-max-show"]')?></li>
						</ul>
					</div>
				<? endif ;?>
			</div>
		</div>
	</section>
<? endif; ?>
