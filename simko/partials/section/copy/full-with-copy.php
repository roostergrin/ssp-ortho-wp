<? wp_enqueue_script('internal-consultation-carousel'); ?>
<section id="half-with-icons" class="half with-icons">
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
								<div class="icon-container">
									<i class="<?= $icon['class']; ?>"></i>
								</div>
								<div class="content-container">
									<p class="title"><?= $icon['title']; ?></p>
									<p class="copy"><?= $icon['copy']; ?></p>
								</div>
							</div>
						<? endforeach; ?>
					</div>
				</aside>
			</div>
		</div>
	</div>
</section>
