<?
add_shortcode('PARTIAL', function($args, $content) {
	$args = wp_parse_args($args, [
		'path' => null,
	]);

	return partial($args['path'], [], false);
});

add_shortcode('NAME', function() {
	global $team;
	$current = $team->getActiveTeamMember();
	if(empty($current)) return '';
	return strip_tags($current->name);
});

add_shortcode('POSITION', function() {
	global $team;
	$current = $team->getActiveTeamMember();
	if(empty($current)) return '';

	return !empty($current->position->name) ? $current->position->name : $current->position;
});

add_shortcode('LOCATIONS', function() {
	global $team;
	$current = $team->getActiveTeamMember();
	if(empty($current) || empty($current->locations)) return '';

	return implode(' | ', array_filter(array_unique(array_map(function($v) { return $v->name; }, $current->locations))));
});

add_shortcode('LOCATION_NAME', function() {
	global $locations;
	$current = $locations->last_location;
	if(empty($current) || empty($current->name)) return '';
	return $current->name;
});

add_shortcode('CANDIDATE_IFRAME', function($atts) {
	$atts = shortcode_atts([
		'src' => null,
		'width' => '100%',
		'height' => 900,
	], $atts, 'CANDIDATE_IFRAME');

	if(empty($atts['src'])) return '';

	ob_start();
	?>
	<div class="iframe candidate-iframe" data-source="<?= esc_url($atts['src']) ?>">
		<iframe src="<?= esc_url($atts['src']) ?>" width="<?= esc_attr($atts['width']) ?>" height="<?= esc_attr($atts['height']) ?>"></iframe>
	</div>
	<?
	return ob_get_clean();
});

add_shortcode('CTA', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'href' => '',
		'target' => '_self',
		'rel' => '',
		'text' => '',
		'navigation' => '0',
	], $atts, 'CTA');

	$classes = array_unique(array_filter(array_merge(['cta'], explode(' ', $atts['class']))));

	if(empty($atts['href'])) return '';

	ob_start();
	?>
	<? if(!empty($atts['navigation'])): ?><div class="navigation"><? endif ?>
	<div class="cta-wrapper"><a <? if(!empty($classes)): ?>class="<?= implode(' ', $classes) ?>"<? endif ?> href="<?= esc_url($atts['href']) ?>" target="<?= esc_attr($atts['target']) ?>" <? if(!empty($atts['rel'])): ?>rel="<?= esc_attr($atts['rel']) ?>"<? endif ?>><?= $atts['text'] ?></a></div>
	<? if(!empty($atts['navigation'])): ?></div><? endif ?>
	<?
	return ob_get_clean();
});

add_shortcode('BRAND_TITLE', function($atts) {
	$brand = is_brand();
	return $brand->post_title;
});

add_shortcode('BRAND_SHORTNAME', function($atts) {
	$brand = is_brand();
	switch($brand->post_title) {
		case 'Kristo Orthodontics':
			return 'Kristo';
			break;
		case 'Great River Orthodontics':
			return 'Great River';
			break;
		case 'Rapids Orthodontics':
			return 'Rapids';
			break;
		case 'Prairie Grove Orthodontics';
			return 'Prairie Grove';
			break;
		default:
			return '';
			break;
	}
});

add_shortcode('BRAND_SEO_TITLE', function($atts) {
	$brand = is_brand();
	return do_shortcode($brand->seo_title);
});

add_shortcode('BRAND_SEO_DESCRIPTION', function($atts) {
	$brand = is_brand();
	return do_shortcode($brand->seo_description);
});

add_shortcode('SEO_DESCRIPTION', function($atts) {
	if( is_front_page() ){
		$brand = is_brand();
		return $brand->seo_description;
	} else {
		return get_post_meta(get_the_ID(), '_aioseo_description', true);	
	}
});

add_shortcode('BRAND_URL', function($atts) {
	$brand = is_brand();
	$atts = shortcode_atts([
		'class' => '',
		'target' => '',
		'path' => '',
		'text' => '',
		'title' => '',
	], $atts, 'brand_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	$path = !empty($atts['path']) ? $atts['path'] : '/';
	$brand_url = brand_url($path);

	ob_start();
	?>
	<a href="<?= $brand_url; ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});

//=====================================[PAGE LINKS]=====================================//
add_shortcode('brand_link', function($atts) {
	$brand = is_brand();
	$atts = shortcode_atts([
		'class' => '',
		'target' => ''
	], $atts, 'brand_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_host(); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $brand->post_title; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= brand_host(); ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('meet_our_orthodontic_team_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'meet_our_orthodontic_team_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('meet-our-orthodontic-team'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('dr_steve_kristo_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'dr_steve_kristo_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('/orthodontic-team/steve-kristo-dds/'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('dr_bob_bronski_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'dr_bob_bronski_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('/orthodontic-team/bob-bronski-dds/'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('dr_jared_holloway_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'dr_jared_holloway_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('/orthodontic-team/jared-holloway-dmd/'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('dr_kan_tsunoda_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'dr_kan_tsunoda_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('/orthodontic-team/kan-tsunoda-dmd/'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('dr_harrison_siu_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'dr_harrison_siu_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('/orthodontic-team/harrison-siu-dds/'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('dr_gregory_dietmeier_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'dr_gregory_dietmeier_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('/orthodontic-team/gregory-dietmeier-dds/'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('dr_kevin_chapman_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'dr_kevin_chapman_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('/orthodontic-team/kevin-chapman-dmd/'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('dr_gregory_ross_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'dr_gregory_ross_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('/orthodontic-team/gregory-ross-dds/'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('dr_todd_anderson_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'dr_todd_anderson_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('/orthodontic-team/todd-anderson-dds/'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('why_orthodontic_treatment_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'why_orthodontic_treatment_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('why-orthodontic-treatment'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('braces_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'braces_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('braces'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('herbst_appliance_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'herbst_appliance_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('braces'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('palatal_expander_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'palatal_expander_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('braces'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('invisalign_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'invisalign_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('invisalign-aligners'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('invisalign_vc_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'invisalign_vc_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('invisalign-virtual-care'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
// Removed VM Shortcode from the back end sidebar reminders
add_shortcode('virtual_monitoring_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'virtual_monitoring_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('virtual-monitoring'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('orthodontic_treatment_results_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'orthodontic_treatment_results_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('orthodontic-treatment-results'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('patient_care_philosophy_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'patient_care_philosophy_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('patient-care-philosophy'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('safety_and_procedures_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'safety_and_procedures_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('safer-orthodontic-care'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('community_involvement_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'community_involvement_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('community-involvement'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('refer_a_friend_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'refer_a_friend_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('refer-a-friend-program'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('orthodontic_care_maintenance_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'orthodontic_care_maintenance_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('orthodontic-care-maintenance'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('emergency_care_repairs_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'emergency_care_repairs_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('orthodontic-emergency-care-repairs'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('affordable_orthodontist_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'affordable_orthodontist_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('affordable-orthodontist'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('blog_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'blog_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('orthodontic-blog'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('appointments_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'appointments_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('schedule-appointment'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('free_orthodontic_consultation_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'free_orthodontic_consultation_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('free-orthodontic-consultation'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('confidence_counts_club_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'confidence_counts_club_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('confidence-counts-club'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('locations_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'locations_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_host().'/orthodontist-office/'; ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('contact_us_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'contact_us_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('contact-us'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('orthodontic_referral_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'orthodontic_referral_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('orthodontic-referral'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('careers_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'careers_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('careers'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('privacy_policy_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'privacy_policy_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('privacy-policy'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('non_discrimination_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'non_discrimination_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('nondiscrimination'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});
add_shortcode('site_map_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
		'title' => '',
		'target' => ''
	], $atts, 'site_map_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	ob_start();
	?>
	<a href="<?= brand_url('site-map'); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?><? if(!empty($atts['title'])): ?> title="<?= $atts['title']; ?>"<? endif; ?><? if(!empty($atts['target'])): ?> target="<?= $atts['target']; ?>"<? endif; ?>><?= $atts['text'] ?></a>
	<?
	return trim(ob_get_clean());
});

//=====================================[PHONE LINKS]=====================================//
add_shortcode('phone_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
	], $atts, 'phone_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	$location = is_location();
	if (!empty($location)) {
		$phone_text = str_replace('%number%', hyphenatePhoneNumber($location->phone), $atts['text']);
		ob_start();
	?>
	<a href="tel:+1<?= toTouchTone($location->phone); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?>><?= $phone_text; ?></a>
	<?
		return trim(ob_get_clean());
	}
});
add_shortcode('after_hours_phone_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
	], $atts, 'after_hours_phone_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	$location = is_location();
	if (!empty($location)) {
		$phone_text = str_replace('%number%', hyphenatePhoneNumber($location->after_hours_phone), $atts['text']);
		ob_start();
	?>
	<a href="tel:+1<?= toTouchTone($location->after_hours_phone); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?>><?= $phone_text; ?></a>
	<?
		return trim(ob_get_clean());
	}
});
add_shortcode('toll_free_phone_link', function($atts) {
	$atts = shortcode_atts([
		'class' => '',
		'text' => '',
	], $atts, 'toll_free_phone_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
	$location = is_location();
	if (!empty($location)) {
		$phone_text = str_replace('%number%', hyphenatePhoneNumber($location->toll_free_phone), $atts['text']);
		ob_start();
	?>
	<a href="tel:+1<?= toTouchTone($location->toll_free_phone); ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?>><?= $phone_text; ?></a>
	<?
		return trim(ob_get_clean());
	}
});

add_shortcode('anchor_link', function($atts) {
	$atts = shortcode_atts([
		'section_id' => '',
        'class' => '',
		'text' => '',
	], $atts, 'anchor_link');
	$classes = array_unique(array_filter(explode(' ', $atts['class'])));
    ob_start();
    ?>
    <a href="#<?= $atts['section_id']; ?>"<? if(!empty($classes)): ?> class="<?= implode(' ', $classes) ?>"<? endif; ?>><?= $atts['text']; ?></a>
    <?
    return trim(ob_get_clean());
});
