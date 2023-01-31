<section class="two-cols-box-with-image<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="container">
				<? if (!empty($h1) || !empty($content)): ?>
					<article>
						<div class="box<?= !empty($box_classes) ? ' '.implode(' ', $box_classes) : ' bg-primary'; ?>">
							<? if (!empty($h1)) : ?>
								<h1<?= !empty($h1_classes) ? ' class="'.implode(' ', $h1_classes).'"' : ''; ?>><?= $h1; ?></h1>
							<? endif; ?>
							<?= !empty($content) ? apply_filters('the_content', $content) : ''; ?>
						</div>
					</article>
				<? endif; ?>
				<? if (!empty($h2) || !empty($aside_content)) : ?>
					<aside>
						<? if (!empty($h2)): ?>
							<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
						<? endif; ?>
						<?= !empty($aside_content) ? apply_filters('the_content', $aside_content) : ''; ?>
					</aside>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
