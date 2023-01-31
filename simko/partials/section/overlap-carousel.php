<? wp_enqueue_script('internal-custom-carousel'); ?>
<section class="overlap carousel<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<? if (!empty($slides)) : ?>
				<div class="main-container">
					<article>
						<div class="content-carousel">
							<div class="carousel-item">
								<? if (!empty($subtitle)) : ?>
									<p class="subtitle"><?= $subtitle; ?></p>
								<? endif; ?>
								<? if (!empty($h2)) : ?>
									<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
								<? endif; ?>
                                <? if (!empty($h3)) : ?>
									<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
								<? endif; ?>
								<div class="mobile-carousel-container">
									<div class="images-carousel-mobile owl-carousel">
										<? foreach($slides as $key => $slide) : if(empty($slide['mobile_image']['src'])) continue; ?>
											<? if (!empty($slide['mobile_image'])) : ?>
												<div class="img-container">
													<img<?= !empty($slide['mobile_image']['src']) ? ' src="'.$slide['mobile_image']['src'].'"' : ''; ?><?= !empty($slide['mobile_image']['width']) ? ' width="'.$slide['mobile_image']['width'].'"' : ''; ?><?= !empty($slide['mobile_image']['height']) ? ' height="'.$slide['mobile_image']['height'].'"' : ''; ?><?= !empty($slide['mobile_image']['srcset']) ? ' srcset="'.$slide['mobile_image']['srcset'].'"' : ''; ?><?= !empty($slide['mobile_image']['sizes']) ? ' sizes="'.$slide['mobile_image']['sizes'].'"' : ''; ?><?= !empty($slide['mobile_image']['alt']) ? ' alt="'.$slide['mobile_image']['alt'].'"' : ''; ?><?= !empty($slide['mobile_image']['id']) ? ' id="'.$slide['mobile_image']['id'].'"' : ''; ?><?= !empty($slide['mobile_image']['classes']) ? ' class="'.implode(' ', $slide['mobile_image']['classes']).'"' : ''; ?> />
												</div>
											<? endif; ?>
										<? endforeach; ?>
									</div>
									<div class="mobile-pagination-container">
										<div class="mobile-pagination">
											<div class="page-left"><span>Previous</span><i class="icon-left-arrow-thick mobile-overlap-carousel"></i></div>
											<div class="page-right"><i class="icon-right-arrow-thick mobile-overlap-carousel"></i><span>Next</span></div>
										</div>
									</div>
								</div>
								<?= !empty($text) ? apply_filters('the_content', $text) : ''; ?>
								<? if (!empty($cta)) : ?>
									<a class="<?= implode(' ', $cta['classes']); ?>" href="<?= $cta['href']; ?>"><?= $cta['text'] ?></a>
								<? endif; ?>
								<?= !empty($shortcode) ? (apply_filters('the_content', $shortcode)) : ''; ?>
							</div>
							<div class="pagination-container">
								<div class="pagination">
									<div class="page-left"><span>Previous</span><i class="icon-left-arrow-thick overlap-carousel"></i></div>
									<div class="page-right"><i class="icon-right-arrow-thick overlap-carousel"></i><span>Next</span></div>
								</div>
							</div>
						</div>
					</article>
					<aside>
						<div class="images-carousel">
							<? foreach($slides as $key => $slide) : if(empty($slide['image']['src'])) continue; ?>
								<div class="img-container">
									<img<?= !empty($slide['image']['src']) ? ' src="'.$slide['image']['src'].'"' : ''; ?><?= !empty($slide['image']['width']) ? ' width="'.$slide['image']['width'].'"' : ''; ?><?= !empty($slide['image']['height']) ? ' height="'.$slide['image']['height'].'"' : ''; ?><?= !empty($slide['image']['srcset']) ? ' srcset="'.$slide['image']['srcset'].'"' : ''; ?><?= !empty($slide['image']['sizes']) ? ' sizes="'.$slide['image']['sizes'].'"' : ''; ?><?= !empty($slide['image']['alt']) ? ' alt="'.$slide['image']['alt'].'"' : ''; ?><?= !empty($slide['image']['id']) ? ' id="'.$slide['image']['id'].'"' : ''; ?><?= !empty($slide['image']['classes']) ? ' class="'.implode(' ', $slide['image']['classes']).'"' : ''; ?> />
								</div>
							<? endforeach; ?>
						</div>
					</aside>
				</div>
			<? endif; ?>
		</div>
	</div>
</section>
