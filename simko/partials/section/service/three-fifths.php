<section class="three-fifths<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="main-container">
				<article<?= !empty($article_classes) ? ' class="'.implode(' ', $article_classes).'"' : ''; ?>>
					<? if (!empty($h2)) : ?>
						<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
					<? endif; ?>
					<?= !empty($content) ? apply_filters('the_content', $content) : ''; ?>
					<? if (!empty($cta)) : ?>
						<p><?= $cta; ?></p>
					<? endif; ?>
				</article>
				<aside<?= !empty($aside_classes) ? ' class="'.implode(' ', $aside_classes).'"' : ''; ?>>
					<?= !empty($aside_content) ? $aside_content : ''; ?>
				</aside>
			</div>
		</div>
	</div>
</section>
