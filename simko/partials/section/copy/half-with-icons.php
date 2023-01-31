<? wp_enqueue_script('internal-consultation-carousel'); ?>
<section id="half-with-icons" class="half with-icons<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="main-container">
				<article>
					<? if (!empty($h2)) : ?>
						<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
					<? endif; ?>
					<?= !empty($content) ? apply_filters('the_content', $content) : ''; ?>
				</article>
				<aside>
					<div class="consultation owl-carousel">
						<? foreach ($icons as $icon) : ?>
							<div class="container">
								<? if (!empty($icon['widget_partial'])) {
									partial('widget.icons.'.($icon['widget_partial']));
								} else { ?>
									<div class="icon-container">
										<i class="<?= $icon['class']; ?>"></i>
									</div>
								<? } ?>

								<? if( empty( $handle_icon_content_in_icon_widget ) ): ?>
								<div class="content-container">
									<p class="title"><?= $icon['title']; ?></p>
									<p class="copy"><?= $icon['copy']; ?></p>
								</div>
								<? endif; ?>
							</div>
						<? endforeach; ?>
					</div>
				</aside>
			</div>
		</div>
	</div>
</section>
