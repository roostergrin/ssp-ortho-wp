<section class="service-categories">
	<div class="content">
		<div class="inner-content">
			<? if (!empty($h2)) : ?>
				<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
			<? endif; ?>
			<? if (!empty($h3)) : ?>
				<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
			<? endif; ?>
			<ul>
				<? foreach($categories as $category) : ?>
				<li>
					<div class="category-details">
						<h3 class="h2"><a href="<?= $category['href']; ?>" class="inherit"><?= $category['name']; ?></a></h3>
						<p><?= $category['content']; ?></p>
						<p class="cta-container"><a class="<?= !empty($category['cta']['classes']) ? implode(' ', $category['cta']['classes']) : ''; ?>" href="<?= $category['cta']['href']; ?>"><?= $category['cta']['text']; ?></a></p>
					</div>
					<div class="image-container">
						<a href="<?= $category['href']; ?>">
							<img src="<?= $category['image']['src']; ?>" width="<?= $category['image']['width']; ?>" height="<?= $category['image']['height']; ?>" alt="<?= $category['image']['alt']; ?>" class="<?= !empty($category['image']['classes']) ? implode(' ', $category['image']['classes']) : ''; ?>" loading="lazy" />
						</a>
					</div>
				</li>
				<? endforeach ?>
			</ul>
		</div>
	</div>
</section>
