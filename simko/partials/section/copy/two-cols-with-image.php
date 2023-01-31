<section class="copy two-cols-with-image<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content<?= !empty($content_classes) ? ' '.implode(' ', $content_classes) : ''; ?>">
		<div class="inner-content">
			<div class="content-container">
				<? if (!empty($mobile_image)) : ?>
					<img<?= !empty($mobile_image['src']) ? ' src="'.$mobile_image['src'].'"' : ''; ?><?= !empty($mobile_image['width']) ? ' width="'.$mobile_image['width'].'"' : ''; ?><?= !empty($mobile_image4['height']) ? ' height="'.$mobile_image['height'].'"' : ''; ?><?= !empty($mobile_image['srcset']) ? ' srcset="'.$mobile_image['srcset'].'"' : ''; ?><?= !empty($mobile_image['sizes']) ? ' sizes="'.$mobile_image['sizes'].'"' : ''; ?><?= !empty($mobile_image['alt']) ? ' alt="'.$mobile_image['alt'].'"' : ''; ?><?= !empty($mobile_image['classes']) ? ' class="'.implode(' ', $mobile_image['classes']).'"' : ''; ?> />
				<? endif; ?>
				<? if (!empty($h2) || !empty($h3) || !empty($image)) : ?>
					<div class="heading">
						<? if (!empty($h2)) : ?>
							<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
						<? endif; ?>
						<? if (!empty($h3)) : ?>
							<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
						<? endif; ?>
						<? if (!empty($image)) : ?>
							<img<?= !empty($image['src']) ? ' src="'.$image['src'].'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> />
						<? endif; ?>
					</div>
				<? endif; ?>
				<? if (!empty($columns)) : ?>
					<div class="columns">
						<? foreach ($columns as $column) : ?>
							<div class="column">
								<?= apply_filters('the_content', $column); ?>
							</div>
						<? endforeach; ?>
					</div>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
