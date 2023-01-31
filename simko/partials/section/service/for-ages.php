<? wp_enqueue_script('internal-jquery-for-ages'); ?>
<section class="service for-ages<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="container">
				<article>
					<? if (!empty($circle)) : ?>
						<div class="circle-container">
							<div class="circle">
								<? if (!empty($circle['small'])) : ?>
									<p class="small"><?= $circle['small']; ?></p>
								<? endif; ?>
								<? if (!empty($circle['large'])) : ?>
									<p class="large"><?= $circle['large']; ?></p>
								<? endif; ?>
							</div>
						</div>
					<? endif; ?>
					<? if (!empty($h2) || !empty($content)) : ?>
						<div class="content-container">
							<? if (!empty($h2)) : ?>
								<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
							<? endif; ?>
							<?= !empty($content) ? apply_filters('the_content', $content) : ''; ?>
						</div>
					<? endif; ?>
				</article>
				<aside>
					<div class="img-container">
						<? if (!empty($image)) : ?>
							<img<?= !empty($image['src']) ? ' src="'.$image['src'].'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['id']) ? ' id="'.implode(' ', $image['id']).'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> loading="lazy" />
						<? endif; ?>
						<? if (!empty($mobile_image)) : ?>
							<img<?= !empty($mobile_image['src']) ? ' src="'.$mobile_image['src'].'"' : ''; ?><?= !empty($mobile_image['width']) ? ' width="'.$mobile_image['width'].'"' : ''; ?><?= !empty($mobile_image['height']) ? ' height="'.$mobile_image['height'].'"' : ''; ?><?= !empty($mobile_image['srcset']) ? ' srcset="'.$mobile_image['srcset'].'"' : ''; ?><?= !empty($mobile_image['sizes']) ? ' sizes="'.$mobile_image['sizes'].'"' : ''; ?><?= !empty($mobile_image['alt']) ? ' alt="'.$mobile_image['alt'].'"' : ''; ?><?= !empty($mobile_image['id']) ? ' id="'.implode(' ', $mobile_image['id']).'"' : ''; ?><?= !empty($mobile_image['classes']) ? ' class="'.implode(' ', $mobile_image['classes']).'"' : ''; ?> loading="lazy" />
						<? endif; ?>
					</div>
				</aside>
			</div>
		</div>
	</div>
</section>
