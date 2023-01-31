<?
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-icons-carousel');
$brand = is_brand();
?>
<section class="icons carousel four-cols<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="four-cols owl-carousel">
				<?
					if (!empty($folding_icons)) {
						foreach ($folding_icons as $icon) {
							partial('widget.folding-icons', ['classes' => ['full-width'], 'icon' => $icon]);
						}
					} elseif (!empty($icons)) {
						foreach ($icons as $icon) {
							partial('widget.icons.'.($icon['partial']), ['text' => $icon['text']]);
						}
					} else {
				?>
					<? partial('widget.icons.badge'); ?>
					<? 
						if($brand->ID != 13590){ // Chapman
							partial('widget.icons.dollar'); 
						}
					?>
					<? partial('widget.icons.chair-animation'); ?>
					<? partial('widget.icons.sign'); ?>
				<? } ?>
			</div>
		</div>
	</div>
</section>
