<?
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-hero-carousel');
?>
<section class="hero-carousel">
	<div class="content">
		<div>
			<div class="content-container">
				<? if (!empty($h1)) : ?>
					<h1<?= !empty($h1_classes) ? ' class="'.implode(' ', $h1_classes).'"' : ''; ?>><?= $h1; ?></h1>
				<? endif; ?>
				<? if (!empty($h2)) : ?>
					<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
				<? endif; ?>
				<? if (!empty($content)) { echo apply_filters('the_content', $content); } ?>
				<? if (!empty($cta)) : ?>
				<p><a class="<?= implode(' ', $cta['classes']); ?>" href="<?= $cta['href']; ?>"><?= $cta['text'] ?></a></p>
				<? endif; ?>
				<div class="container">
					<div class="pagination">
						<i class="icon-page-left hero"></i>
						<i class="icon-page-right hero"></i>
					</div>
					<div id="image-label"></div>
				</div>
			</div>
			<? if (!empty($images)) : ?>
				<div class="carousel-container">
					<div class="hero owl-carousel">
						<? foreach ($images as $image) : ?>
							<div class="img-container">
								<img<?= !empty($image['src']) ? ' src="'.$image['src'].'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['data-label']) ? ' data-label="'.$image['data-label'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> loading="lazy" />
							</div>
						<? endforeach; ?>
					</div>
				</div>
			<? endif; ?>
		</div>
	</div>
</section>
