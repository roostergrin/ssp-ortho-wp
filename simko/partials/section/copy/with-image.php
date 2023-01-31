<? wp_enqueue_script('internal-copy-with-image'); ?>
<section class="copy with-image<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="main-container">
				<? if (!empty($content)) : ?>
					<article>
						<?= apply_filters('the_content', $content); ?>
					</article>
				<? endif; ?>
				<? if (!empty($image)) : ?>
					<aside>
						<div class="img-container">
							<img<?= !empty($image['src']) ? ' src="'.$image['src'].'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['id']) ? ' id="'.implode(' ', $image['id']).'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> />
						</div>
					</aside>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
