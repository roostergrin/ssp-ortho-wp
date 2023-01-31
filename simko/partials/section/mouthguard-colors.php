<section class="mouthguard-colors<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="container">
				<div class="main-content">
					<? if (!empty($h2)) : ?>
						<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
					<? endif; ?>
					<? if (!empty($content)) echo apply_filters('the_content', $content); ?>
					<? if (!empty($image)) : ?>
						<div class="img-container">
							<img src="<?= $image['src']; ?>" class="<?= implode(' ', $image['classes']); ?>" alt="<?= $image['alt']; ?>" />
						</div>
					<? endif; ?>
				</div>
				<div class="secondary-content">
					<? if (!empty($colors)) : ?>
						<ul class="colors">
							<? foreach ($colors as $color) : ?>
								<li class="color">
									<? if (!empty($color['svg'])) : ?>
										<? get_template_part($color['svg']['path'], $color['svg']['color']); ?>
									<? endif; ?>
									<p><?= $color['name']; ?></p>
								</li>
							<? endforeach; ?>
						</ul>
					<? endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
