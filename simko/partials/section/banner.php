<section class="banner<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="container">
		<div class="img-container">
			<? if (!empty($image)) : ?>
				<img<?= !empty($image['src']) ? ' src="'.$image['src'].'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> />
			<? endif; ?>
			<div class="overlay"></div>
		</div>
		<div class="content">
			<? if (!empty($h2)) : ?>
				<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
			<? endif; ?>
			<div class="buttons">
				<? if (!empty($buttons)) : ?>
					<? foreach ($buttons as $button) : ?>
						<? if (strstr($button['href'], 'tel:+1') && !(is_location())) continue; ?>
						<a href="<?= $button['href']; ?>" class="<?= implode(' ', $button['classes']); ?>"><?= $button['text'] ?></a>
					<? endforeach; ?>
				<? endif; ?>
				<? if (!empty($phone) && (is_location() || is_single_location_brand())) : ?>
					<?= $phone; ?>
				<? endif; ?>
				<? if (!empty($book)) : ?>
					<?= $book; ?>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
