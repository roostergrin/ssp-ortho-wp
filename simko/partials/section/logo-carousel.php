<?
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-logo-carousel');
?>
<section class="logo-carousel">
	<div class="content">
		<? if (!empty($logos)) : ?>
			<div class="carousel-container">
				<div class="logo owl-carousel <? if(count($logos) <= 3): ?>disable-desktop<? endif; ?>">
					<? foreach ($logos as $logo) : ?>
						<div class="img-container">
							<? if (!empty($logo['href'])): ?><a href="<?= $logo['href'] ?>" target="_blank"><? endif ?>
							<? if (!empty($logo['src'])): ?>
								<img src="<?= $logo['src'] ?>"<?= !empty($logo['width']) ? ' width="'.$logo['width'].'"' : ''; ?><?= !empty($logo['height']) ? ' height="'.$logo['height'].'"' : ''; ?><?= !empty($logo['alt']) ? ' alt="'.$logo['alt'].'"' : ''; ?><?= !empty($logo['classes']) ? ' class="'.implode(' ', $logo['classes']).'"' : '';?><?= !empty($logo['id']) ? ' id="'.$logo['id'].'"' : ''; ?> loading="lazy" />
							<? else: ?>
								<?= $logo['text'] ?>
							<? endif ?>
							<? if (!empty($logo['href'])): ?></a><? endif ?>
						</div>
					<? endforeach; ?>
				</div>
				<div class="pagination <? if(count($logos) <= 3): ?>disable-desktop<? endif; ?>">
					<i class="icon-page-left logo"></i>
					<i class="icon-page-right logo"></i>
				</div>
			</div>
		<? endif; ?>
	</div>
</section>
