<? $brand = is_brand(); ?>
<? wp_enqueue_style('lib-owl-carousel'); ?>
<? wp_enqueue_script('internal-all-ages-carousel'); ?>
<div class="widget all-ages">
	<div class="container">
		<article class="<?= sanitize_title($brand->post_title); ?>">
			<h4<?= !empty($h4_classes) ? ' class="'.implode(',', $h4_classes).'"' : ''; ?>><?= $h4; ?></h4>
			<? if (!empty($content)): ?>
				<?= apply_filters('the_content', $content); ?>
			<? else : ?>
				<div class="content-wrapper">
					<? foreach ($slides as $key => $slide): ?>
						<p id="<?= $slide['content']['id']; ?>" class="tab-content <?= ($key === array_key_first($slides)) ? 'active' : ''; ?>"><?= do_shortcode($slide['content']['text']); ?><?= !empty($slide['slide_cta']) ? ' <a href="'.($slide['slide_cta']['url']).'" class="cta text">'.($slide['slide_cta']['title']).'</a>' : ''; ?></p>
					<? endforeach; ?>
				</div>
			<? endif; ?>
			<div class="container-buttons">
				<a href="#" id="children-link" class="cta gray tab-link">Children</a>
				<a href="#" id="teens-link" class="cta gray tab-link">Teens</a>
				<a href="#" id="adults-link" class="cta gray tab-link">Adults</a>
			</div>
			<? if (!empty($cta)): ?>
				<a href="<?= $cta['href']; ?>" class="<?= implode(' ', $cta['classes']); ?>"><?= $cta['text']; ?></a>
			<? endif; ?>
		</article>
		<aside>
			<? if (!empty($slides)): ?>
				<div class="container-images">
					<? foreach ($slides as $slide): ?>
						<? if (array_key_exists('image', $slide)): ?>
							<?= responsive_img($slide['image'], ['large', 'full'], [
								'sizes' => '100vw',
								'id' => $slide['id'],
								// 'loading' => 'lazy',
								'class' => implode(' ', $slide['classes']),
							], true) ?>
						<? else: ?>
							<img<?= !empty($slide['desktop_image']['src']) ? ' src="'.$slide['desktop_image']['src'].'"' : ''; ?><?= !empty($slide['desktop_image']['srcset']) ? ' srcset="'.$slide['desktop_image']['srcset'].'"' : ''; ?><?= !empty($slide['desktop_image']['sizes']) ? ' sizes="'.$slide['desktop_image']['sizes'].'"' : ''; ?><?= !empty($slide['desktop_image']['width']) ? ' width="'.$slide['desktop_image']['width'].'"' : ''; ?><?= !empty($slide['desktop_image']['height']) ? ' height="'.$slide['desktop_image']['height'].'"' : ''; ?><?= !empty($slide['desktop_image']['alt']) ? ' alt="'.$slide['desktop_image']['alt'].'"' : ''; ?><?= !empty($slide['desktop_image']['id']) ? ' id="'.$slide['desktop_image']['id'].'"' : ''; ?><?= !empty($slide['desktop_image']['id']) ? ' class="'.implode(' ', $slide['desktop_image']['classes']).'"' : ''; ?> loading="lazy" />
						<? endif ?>
					<? endforeach; ?>
				</div>
				<div class="all-ages owl-carousel">
					<? foreach ($slides as $slide): ?>
						<div class="img-container">
							<? if (array_key_exists('image', $slide)): ?>
								<?= responsive_img($slide['image'], ['large', 'full'], [
									'sizes' => '100vw',
									'id' => $slide['id'],
									'loading' => 'lazy',
									'class' => implode(' ', $slide['classes']),
								], true) ?>
							<? else: ?>
								<img<?= !empty($slide['mobile_image']['src']) ? ' src="'.$slide['mobile_image']['src'].'"' : ''; ?><?= !empty($slide['mobile_image']['srcset']) ? ' srcset="'.$slide['mobile_image']['srcset'].'"' : ''; ?><?= !empty($slide['mobile_image']['sizes']) ? ' sizes="'.$slide['mobile_image']['sizes'].'"' : ''; ?><?= !empty($slide['mobile_image']['width']) ? ' width="'.$slide['mobile_image']['width'].'"' : ''; ?><?= !empty($slide['mobile_image']['height']) ? ' height="'.$slide['mobile_image']['height'].'"' : ''; ?><?= !empty($slide['mobile_image']['alt']) ? ' alt="'.$slide['mobile_image']['alt'].'"' : ''; ?><?= !empty($slide['mobile_image']['id']) ? ' id="'.$slide['mobile_image']['id'].'"' : ''; ?><?= !empty($slide['mobile_image']['id']) ? ' class="'.implode(' ', $slide['mobile_image']['classes']).'"' : ''; ?> loading="lazy" />
							<? endif ?>
							<div class="label">
								<? if(!empty($slide['slide_cta'])): ?>
									<a href="<?= $slide['slide_cta']['url']; ?>" class="white"><?= !empty($slide['label']) ? $slide['label'] : ''; ?></a>
								<? else: ?>
									<?= !empty($slide['label']) ? $slide['label'] : ''; ?>
								<? endif; ?>
							</div>
						</div>
					<? endforeach; ?>
				</div>
			<? endif; ?>
		</aside>
	</div>
</div>
