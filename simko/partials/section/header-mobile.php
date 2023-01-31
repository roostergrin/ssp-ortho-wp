<?
global $wp, $providers, $locations;

$relative_url = $wp->request;
$brand = is_brand();
$location = is_location();
$all_providers = get_providers();
$is_landing_page = if_landing_page_get_lp_phone() ?? false;
$landing_page_phone = if_landing_page_get_lp_phone();
$services = get_nav_services_for_brand( $brand );

?>
<section class="mobile-header">
	<? if( !$is_landing_page):?>
		<div id="mobile-navigation" class="mobile-nav">
			<ul class="primary-nav">
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="<?= brand_url('free-orthodontic-consultation', $brand) ?>" class="cta primary">Free consultation</a>
				</li>
				<? if (!empty($services)): ?>
				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-368"><a href="#">Services<span class="dropdown mobile icon-close" aria-disabled="true"></span></a>
					<ul class="sub-menu">
						<? foreach ($services as $slug => $s): ?>							
						<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?= brand_url($slug, $brand) ?>"><?= esc_html($s) ?></a></li>
						<? endforeach ?>
					</ul>
				</li>
				<? endif ?>
				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-369"><a href="#">Our approach<span class="dropdown mobile icon-close" aria-disabled="true"></span></a>
					<ul class="sub-menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-339"><a href="<?= brand_url('patient-care-philosophy', $brand) ?>">Patient care philosophy</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-351"><a href="<?= brand_url('safer-orthodontic-care', $brand) ?>">Safety &#038; procedures</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-352"><a href="<?= brand_url('community-involvement', $brand) ?>">Community involvement</a></li>
					</ul>
				</li>
				<? if (!empty($all_providers)): ?>
				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-367"><a href="#">Our team<span class="dropdown mobile icon-close" aria-disabled="true"></span></a>
					<ul class="sub-menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-331"><a href="<?= brand_url('meet-our-orthodontic-team', $brand) ?>">Meet the team</a></li>
						<? foreach ($all_providers as $k => $v): ?>
							<li class="mobile-column menu-item menu-item-type-post_type menu-item-object-page"><a href="<?= brand_url('/'.($v->relative_url).'/', $brand); ?>"><?= $v->caption['name']; ?></a></li>
						<? endforeach ?>
					</ul>
				</li>
				<? endif ?>
				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-340"><a href="#">For patients<span class="dropdown mobile icon-close" aria-disabled="true"></span></a>
					<ul class="sub-menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-342"><a href="<?= brand_url('patient-forms', $brand) ?>">Patient forms and instructions</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-355"><a href="<?= brand_url('orthodontic-care-maintenance', $brand) ?>">Orthodontic care &#038; maintenance</a></li>
						<? if( is_confidence_counts_brand() ): ?>
						<li id="menu-item-309" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-309"><a href="<?= brand_url('confidence-counts-club', $brand) ?>">Confidence Counts Club</a></li>
						<? endif; ?>
						<? if(!empty($location) && !empty($location->invisalign_vc_toggle) && $location->invisalign_vc_toggle) : ?>
						<li id="menu-item-308" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-308"><a href="<?= brand_url('invisalign-virtual-care', $brand) ?>">Invisalign&reg; virtual care</a></li>
						<? endif;?>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-356"><a href="<?= brand_url('orthodontic-emergency-care-repairs', $brand) ?>">Emergency care &#038; repair</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-354"><a href="<?= brand_url('refer-a-friend-program', $brand) ?>">Refer a friend</a></li>
					</ul>
				</li>
				<? if (false) wp_nav_menu(['items_wrap' => '%3$s', 'theme_location' => 'mobile', 'container' => false, 'walker' => new ADA_Mobile]); ?>
				<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-343"><a href="<?= brand_url('affordable-orthodontist', $brand) ?>">Financing</a></li>
				<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-344"><a href="<?= brand_url('orthodontic-blog', $brand) ?>">Blog</a></li>
				<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-330"><a href="<?= brand_url('schedule-appointment', $brand) ?>">Appointments</a></li>
			</ul>
		</div>
	<? endif; ?>
	<div id="mobile-header">
		<? if(true) :?>
			<div class="mobile-menu">
				<ul>
					<li>
						<a class="btn menu">
							<button class="hamburger--squeeze" type="button">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</a>
					</li>
				</ul>
			</div>
		<? else : ?>
			<div id="mobile-header-ppc">
				<ul>
					<li><a href="tel:+1<?= $landing_page_phone; ?>" class="inherit"><i class="icon-phone"></i> <span><?= hyphenatePhoneNumber($landing_page_phone); ?></span></a></li>
				</ul>
			</div>
		<? endif; ?>
	</div>
</section>
