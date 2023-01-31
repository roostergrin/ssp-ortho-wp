<section class="giving-back">
	<div class="content">
		<div class="inner-content">
			<div class="main-container">
				<div class="content-container">
					<? if (!empty($content)) : ?>
						<? if (!empty($content['subtitle'])) : ?>
							<p class="subtitle"><?= $content['subtitle']; ?></p>
						<? endif; ?>
						<? if (!empty($content['h2'])) : ?>
							<h2<?= !empty($content['h2_classes']) ? ' class="'.implode(' ', $content['h2_classes']).'"' : ''; ?>><?= $content['h2']; ?></h2>
						<? endif; ?>
					<? endif; ?>
					<? if (!empty($mobile_image)) : ?>
						<img<?= !empty($mobile_image['src']) ? ' src="'.$mobile_image['src'].'"' : ''; ?><?= !empty($mobile_image['width']) ? ' width="'.$mobile_image['width'].'"' : ''; ?><?= !empty($mobile_image['height']) ? ' height="'.$mobile_image['height'].'"' : ''; ?><?= !empty($mobile_image['srcset']) ? ' srcset="'.$mobile_image['srcset'].'"' : ''; ?><?= !empty($mobile_image['sizes']) ? ' sizes="'.$mobile_image['sizes'].'"' : ''; ?><?= !empty($mobile_image['alt']) ? ' alt="'.$mobile_image['alt'].'"' : ''; ?><?= !empty($mobile_image['classes']) ? ' class="'.implode(' ', $mobile_image['classes']).'"' : ''; ?> loading="lazy" />
					<? endif; ?>
					<? if (!empty($content)) : ?>
						<?= !empty($content['text']) ? apply_filters('the_content', $content['text']) : ''; ?>
						<? if (!empty($content['cta'])) : ?>
							<a class="<?= implode(' ', $content['cta']['classes']); ?>" href="<?= $content['cta']['href']; ?>"><?= $content['cta']['text'] ?></a>
						<? endif; ?>
					<? endif; ?>
				</div>
				<? if (!empty($image)) : ?>
					<div class="img-container desktop">
						<img<?= !empty($image['src']) ? ' src="'.$image['src'].'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> loading="lazy" />
					</div>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
