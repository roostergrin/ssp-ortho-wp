<?
$heading = $heading ?? false;
$htag = $htag ?? 'h2';
$heading_classes = $heading_classes ?? ['primary'];
wp_enqueue_script('internal-testimonials-carousel');
?>
<section class="testimonials carousel<?= !empty($classes) ? ' ' . implode(' ', $classes) : '';?>">
	<div class="content">
		<? if (!empty($testimonials)) : ?>
			<div class="main-container">
				<div class="content-container">
					<? if ($heading): ?><<?= $htag ?> class="<?= implode(' ', $heading_classes) ?>"><?= esc_html($heading) ?></<?= $htag ?>><? endif ?>
					<div class="content-carousel">
						<? foreach($testimonials as $key => $testimonial): ?>
							<?
							// $read_more = '<a href="#" class="read-more"><span class="ellipsis">&hellip;</span> read more</a>';
							// $excerpt = excerptizeCharacters($testimonial['content'], 160, true, $read_more);
							# Removed read more per Trello card
							$excerpt = $testimonial['content'];
							?>
							<div class="carousel-item">
								<div class="content">
									<p class="name primary"><?= $testimonial['name']; ?></p>
									<p class="primary" data-content="<?= esc_attr($testimonial['content']) ?>">
									<?
										if ($excerpt != $testimonial['content']) {
											$more = str_replace($excerpt, '', $testimonial['content']);
											echo $excerpt . '<span class="more hidden"> ' . $more . '</span>';
										} else {
											echo $testimonial['content'];
										}
									?>
									</p>
								</div>
							</div>
						<? endforeach; ?>
					</div>
					<div class="pagination-container">
						<div class="pagination">
							<i class="icon-left-arrow-thick"></i>
							<i class="icon-right-arrow-thick"></i>
						</div>
					</div>
				</div>
				<div class="images-container">
					<div class="images-carousel">
						<? foreach($testimonials as $key => $testimonial) : ?>
							<div class="img-container">
								<img<?= !empty($testimonial['image']['src']) ? ' src="'.$testimonial['image']['src'].'"' : ''; ?><?= !empty($testimonial['image']['width']) ? ' width="'.$testimonial['image']['width'].'"' : ''; ?><?= !empty($testimonial['image']['height']) ? ' height="'.$testimonial['image']['height'].'"' : ''; ?><?= !empty($testimonial['image']['srcset']) ? ' srcset="'.$testimonial['image']['srcset'].'"' : ''; ?><?= !empty($testimonial['image']['sizes']) ? ' sizes="'.$testimonial['image']['sizes'].'"' : ''; ?><?= !empty($testimonial['image']['alt']) ? ' alt="'.$testimonial['image']['alt'].'"' : ''; ?><?= !empty($testimonial['image']['classes']) ? ' class="'.implode(' ', $testimonial['image']['classes']).'"' : ''; ?> />
							</div>
						<? endforeach; ?>
					</div>
				</div>
			</div>
		<? endif; ?>
		<? if (!empty($reviews_left_border)) : ?>
			<div class="main-container">
				<div class="content-container">
					<? if ($heading): ?><<?= $htag ?> class="<?= implode(' ', $heading_classes) ?>"><?= esc_html($heading) ?></<?= $htag ?>><? endif ?>
					<div class="content-carousel">
						<? foreach($reviews_left_border as $review): ?>
							<?
							// $read_more = '<a href="#" class="read-more"><span class="ellipsis">&hellip;</span> read more</a>';
							// $excerpt = excerptizeCharacters($review->post_content, 160, true, $read_more);
							# Removed read more per Trello card
							$excerpt = $review->post_content;
							?>
							<div class="carousel-item">
								<div class="content">
									<p class="name primary"><?= $review->post_title; ?></p>
									<p class="primary" data-content="<?= esc_attr($review->post_content) ?>">
									<?
										if ($excerpt != $review->post_content) {
											$more = str_replace($excerpt, '', $review->post_content);
											echo $excerpt . '<span class="more hidden"> ' . $more . '</span>';
										} else {
											echo $review->post_content;
										}
									?>
									</p>
								</div>
							</div>
						<? endforeach; ?>
					</div>
					<div class="pagination-container">
						<div class="pagination">
							<i class="icon-left-arrow-thick"></i>
							<i class="icon-right-arrow-thick"></i>
						</div>
					</div>
				</div>
				<div class="images-container">
					<div class="images-carousel">
						<? foreach($reviews_left_border as $review) : ?>
							<div class="img-container">
								<img<?= !empty($review->image_left_border['src']) ? ' src="'.(brand_host().$review->image_left_border['src']).'"' : ''; ?><?= !empty($review->image_left_border['width']) ? ' width="'.$review->image_left_border['width'].'"' : ''; ?><?= !empty($review->image_left_border['height']) ? ' height="'.$review->image_left_border['height'].'"' : ''; ?><?= !empty($review->image_left_border['srcset']) ? ' srcset="'.$review->image_left_border['srcset'].'"' : ''; ?><?= !empty($review->image_left_border['sizes']) ? ' sizes="'.$review->image_left_border['sizes'].'"' : ''; ?><?= !empty($review->image_left_border['alt']) ? ' alt="'.$review->image_left_border['alt'].'"' : ''; ?><?= !empty($review->image_left_border['classes']) ? ' class="'.implode(' ', $review->image_left_border['classes']).'"' : ''; ?> />
							</div>
						<? endforeach; ?>
					</div>
				</div>
			</div>
		<? endif; ?>
		<? if (!empty($reviews_right_border)) : ?>
			<div class="main-container">
				<div class="content-container">
					<? if ($heading): ?><<?= $htag ?> class="<?= implode(' ', $heading_classes) ?>"><?= esc_html($heading) ?></<?= $htag ?>><? endif ?>
					<div class="content-carousel">
						<? foreach($reviews_right_border as $review): ?>
							<?
							// $read_more = '<a href="#" class="read-more"><span class="ellipsis">&hellip;</span> read more</a>';
							// $excerpt = excerptizeCharacters($review->post_content, 160, true, $read_more);
							# Removed read more per Trello card
							$excerpt = $review->post_content;
							?>
							<div class="carousel-item">
								<div class="content">
									<p class="name primary"><?= $review->post_title; ?></p>
									<p class="primary" data-content="<?= esc_attr($review->post_content) ?>">
									<?
										if ($excerpt != $review->post_content) {
											$more = str_replace($excerpt, '', $review->post_content);
											echo $excerpt . '<span class="more hidden"> ' . $more . '</span>';
										} else {
											echo $review->post_content;
										}
									?>
									</p>
								</div>
							</div>
						<? endforeach; ?>
					</div>
					<div class="pagination-container">
						<div class="pagination">
							<i class="icon-left-arrow-thick"></i>
							<i class="icon-right-arrow-thick"></i>
						</div>
					</div>
				</div>
				<div class="images-container">
					<div class="images-carousel">
						<? foreach($reviews_right_border as $review) : ?>
							<div class="img-container">
								<img<?= !empty($review->image_right_border['src']) ? ' src="'.(brand_host().$review->image_right_border['src']).'"' : ''; ?><?= !empty($review->image_right_border['width']) ? ' width="'.$review->image_right_border['width'].'"' : ''; ?><?= !empty($review->image_right_border['height']) ? ' height="'.$review->image_right_border['height'].'"' : ''; ?><?= !empty($review->image_right_border['srcset']) ? ' srcset="'.$review->image_right_border['srcset'].'"' : ''; ?><?= !empty($review->image_right_border['sizes']) ? ' sizes="'.$review->image_right_border['sizes'].'"' : ''; ?><?= !empty($review->image_right_border['alt']) ? ' alt="'.$review->image_right_border['alt'].'"' : ''; ?><?= !empty($review->image_right_border['classes']) ? ' class="'.implode(' ', $review->image_right_border['classes']).'"' : ''; ?> />
							</div>
						<? endforeach; ?>
					</div>
				</div>
			</div>
		<? endif; ?>
	</div>
</section>
