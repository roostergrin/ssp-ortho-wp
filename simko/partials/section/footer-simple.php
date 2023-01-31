<?
$brand = is_brand();
$relative_url = get_relative_url((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$location = is_location();
$is_landing_page = if_landing_page_get_lp_phone() ?? false;
if(!empty($location)) {
	$region = get_region_for_location($location->ID, false, true);
}
?>
<section class="footer">
	<div class="content">
		<div class="inner-content">
			<div class="main-container">
				<div class="bottom-row">
					<div id="footer-copyright-utility-navigation">
						<div class="desktop" id="footer-copyright">&copy; <?= date('Y'); ?> <?= $brand->corporate_name; ?>. All rights reserved.</div>
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
</section>
