<? wp_enqueue_script('internal-personalized-treatments-carousel'); ?>
<section class="personalized-treatments">
	<div class="content">
		<div class="inner-content">
			<div class="main-container">
				<article>
					<h2<?= !empty($h2_classes) ? ' class="'.implode(',', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
					<? if (!empty($content)) : ?>
						<?= apply_filters('the_content', $content); ?>
					<? endif; ?>
					<? if (!empty($content_read_more)) : ?>
						<div class="more">
							<?= apply_filters('the_content', $content_read_more); ?>
						</div>
						<? if (!empty($cta)) : ?>
							<a href="<?= $cta['href']; ?>" class="<?= implode(' ', $cta['classes']); ?>"><?= $cta['text']; ?></a>
						<? endif; ?>
					<? endif; ?>
				</article>
				<aside>
					<? if (!empty($slides)) : ?>
						<div class="personalized-treatments owl-carousel">
							<? foreach ($slides as $slide) : ?>
								<div class="img-container">
									<img<?= !empty($slide['image']['src']) ? ' src="'.$slide['image']['src'].'"' : ''; ?><?= !empty($slide['image']['srcset']) ? ' srcset="'.$slide['image']['srcset'].'"' : ''; ?><?= !empty($slide['image']['sizes']) ? ' sizes="'.$slide['image']['sizes'].'"' : ''; ?><?= !empty($slide['image']['width']) ? ' width="'.$slide['image']['width'].'"' : ''; ?><?= !empty($slide['image']['height']) ? ' height="'.$slide['image']['height'].'"' : ''; ?><?= !empty($slide['image']['alt']) ? ' alt="'.$slide['image']['alt'].'"' : ''; ?><?= !empty($slide['image']['id']) ? ' id="'.$slide['image']['id'].'"' : ''; ?><?= !empty($slide['image']['classes']) ? ' class="'.implode(' ', $slide['image']['classes']).'"' : ''; ?> />
									<div class="label">
										<?php if(!empty($slide['image_link'])): ?>
											<a href="<?= $slide['image_link']; ?>" class="white"><?= !empty($slide['image']['label']) ? $slide['image']['label'] : ''; ?></a>
										<?php else: ?>
											<?= !empty($slide['image']['label']) ? $slide['image']['label'] : ''; ?>
										<?php endif; ?>
									</div>
								</div>
							<? endforeach; ?>
						</div>
						<div class="pagination-container">
							<div class="pagination">
								<i class="icon-left-arrow-thick personalized-treatments"></i>
								<i class="icon-right-arrow-thick personalized-treatments"></i>
							</div>
						</div>
					<? endif; ?>
				</aside>
			</div>
		</div>
	</div>
</section>
