<?php
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-icons-carousel');

$virtual_monitoring_section_three_heading = get_post_meta(get_the_id(), 'virtual_monitoring_section_three_heading', true);
$virtual_monitoring_section_three_content = get_post_meta(get_the_id(), 'virtual_monitoring_section_three_content', true);

?>

<section class="dental-monitoring-advantages">
	<div class="content">
		<div class="inner-content">
			<div class="intro-copy">
				<h2><?= $virtual_monitoring_section_three_heading; ?></h2>
				<?= apply_filters('the_content', $virtual_monitoring_section_three_content); ?>
			</div>
			<div class="icons owl-carousel">
				<? for($i = 1; $i < 5; $i++) {
					partial('widget.folding-icons', [
						'icon' => [
							'class' => 'icon-' . get_post_meta(get_the_id(), 'virtual_monitoring_section_three_icons_virtual_monitoring_section_three_icon_'. $i .'_icon_'. $i .'_icon', true),
							'title' => get_post_meta(get_the_id(), 'virtual_monitoring_section_three_icons_virtual_monitoring_section_three_icon_'. $i .'_icon_'. $i .'_heading', true),
							'copy' => get_post_meta(get_the_id(), 'virtual_monitoring_section_three_icons_virtual_monitoring_section_three_icon_'. $i .'_icon_'. $i .'_content', true),
						]
					]); 
				} ?>
			</div>
		</div>
	</div>
</section>

