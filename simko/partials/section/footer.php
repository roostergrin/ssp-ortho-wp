<?
global $wp;

$brand = is_brand();
$relative_url = get_relative_url((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$location = is_location();
$brand_locations = get_locations_for_brand($brand->ID);
usort($brand_locations, function($a, $b) {
	return $a->post_title <=> $b->post_title;
});
if(empty($location)){
    $facebook_link = $brand->facebook_link;
} else {
    $facebook_link = $location->facebook_link;
}
$instagram_link = $brand->instagram_link;

$is_landing_page = if_landing_page_get_lp_phone() ?? false;
if(!empty($location)) {
	$region = get_region_for_location($location->ID, false, true);
}
?>
<section class="footer <?=sanitize_title($brand->post_title)?>">
	<div class="content">
		<div class="inner-content">
			<div class="main-container">
				<? partial('widget.schedule-consultation'); ?>
				<div id="footer-logo">
					<a class="inline-block" href="<?= brand_url('/', $brand) ?>"><img src="<?= wp_get_attachment_image_src($brand->logo_desktop)[0]; ?>" alt="<?= get_post_meta($brand->logo_desktop, '_wp_attachment_image_alt', true); ?>" title="<?= get_post_meta($brand->logo_desktop, '_wp_attachment_image_alt', true); ?>" width="134" height="50" /></a>
				</div>
				<? if(!$is_landing_page) : ?>
				<div id="footer-navigation">
					<div class="nav-container">
						<? if(!is_single_location_brand()) {?>
						<div class="all-locations">
							<ul>
								<? foreach($brand_locations as $brand_location) : ?>
									<li><a href="<?= brand_url('/'.($brand_location->relative_url).'/'); ?>"><?= $brand_location->post_title; ?></a></li>
								<? endforeach; ?>
							</ul>
						</div>
						<? } ?>
						<div class="main-footer-navigation<?= is_single_location_brand() ? ' single-location-brand' : ''?>">
							<div>
								<ul class="main-nav">
									<li><a href="<?= brand_url('/contact-us/', $brand); ?>">Contact</a></li>
									<li><a href="<?= brand_url('/orthodontic-referral/', $brand); ?>">Dentist referral</a></li>
									<li><a href="<?= brand_url('/careers/', $brand); ?>">Careers</a></li>
									<? if (!empty($facebook_link) || !empty($instagram_link)) : ?>
                                    	<li class="social-navigation">
                                    		<? if (!empty($facebook_link)) : ?>
                                    			<a href="<?= $facebook_link; ?>" target="_blank"><i class="icon-facebook"></i></a>
                                    		<? endif; ?>
                                    		<? if (!empty($instagram_link)) : ?>
                                    			<a href="<?= $instagram_link; ?>" target="_blank"><i class="icon-instagram"></i></a>
                                    		<? endif; ?>
                                    	</li>
                                    <? endif; ?>
								</ul>
								<? if (!empty($location)): ?>
									<ul class="main-info">
										<? if (!empty($location->phone)): ?><li><a href="tel:+1<?= toTouchTone($location->phone); ?>"><?= hyphenatePhoneNumber($location->phone); ?></a></li><? endif; ?>
										<? if (!empty($location->toll_free_phone)): ?><li><a href="tel:+1<?= toTouchTone($location->toll_free_phone); ?>"><?= hyphenatePhoneNumber($location->toll_free_phone); ?></a></li><? endif; ?>
									</ul>
								<? else:?>
									<ul class="main-info">
										<? if (!empty($brand->corporate_phone)): ?><li><a href="tel:+1<?= toTouchTone($brand->corporate_phone); ?>"><?= hyphenatePhoneNumber($brand->corporate_phone); ?></a></li><? endif; ?>
										<? if (!empty($brand->corporate_toll_free_phone) && $brand->corporate_toll_free_phone != $brand->corporate_phone): ?><li><a href="tel:+1<?= toTouchTone($brand->corporate_toll_free_phone); ?>"><?= hyphenatePhoneNumber($brand->corporate_toll_free_phone); ?></a></li><? endif; ?>
									</ul>
								<? endif ?>
							</div>
						</div>
					</div>
				</div>
				<? endif; ?>
				<div class="bottom-row">
					<div id="footer-copyright-utility-navigation">
						<div class="desktop" id="footer-copyright">&copy; <?= date('Y'); ?> <?= $brand->corporate_name; ?>. All rights reserved.</div>
						<? if(!$is_landing_page) : ?>
						<div>
							<ul id="footer-utility-navigation">
								<li><a href="/privacy-policy/">Privacy policy</a></li>
								<li><a href="/nondiscrimination/">Non-discrimination</a></li>
								<li><a href="<?= brand_url('/site-map/', $brand) ?>">Site map</a></li>
							</ul>
						</div>
						<? endif; ?>
					</div>
					<ul id="footer-badges">
						<? if (!empty($location) && in_array(sanitize_title($location->post_title), ['wausau', 'merrill', 'marinette', 'new-richmond', 'amery', 'baldwin', 'river-falls'])) : ?>
						<? else: ?>
							<? if(!$is_landing_page && ((empty($location) && $brand->post_title == 'Kristo Orthodontics') || !empty($location) && $region[0]->ID ===1273)) : ?>
							<li>
								<img src="<?= get_stylesheet_directory_uri() ?>/images/placeholder/graphics/Kristo_Bestof_Since_2014.png" alt="Best Chippewa Valley" width="70" height="70" />
							</li>
							<? endif; ?>
						<? endif; ?>
						<li>
							<img src="<?= get_stylesheet_directory_uri() ?>/images/placeholder/graphics/diamond-plus-invislaign-provider-footer.svg" alt="Diamond+" width="72" height="64" />
						</li>
					</ul>
				</div>
			</div>
			<div class="mobile" id="footer-copyright-mobile">&copy; <?= date('Y'); ?> <?= $brand->corporate_name; ?>. All rights reserved.</div>

            <div class="disclaimer"><p><?= $brand->footer_trademark_text; ?></p></div>
		</div>
	</div>
	<?if ($brand->ID === 13032 || $brand->ID === 13590) : echo do_shortcode('[gtranslate'); ?>
</section>
