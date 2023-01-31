<? $brand = is_brand();?>
<section class="locations-three-col-grid">
	<div class="content">
		<div class="inner-content">
			<? if (!empty($providers) || true) : ?>
				<div class="container">
					<h1 class="primary"><?= !empty($heading) ? $heading : 'Personalized service and treatment at our convenient locations'; ?></h1>
					<div class="locations-list">
						<? foreach ($locations as $location) : 
							// Sort doctor names for one location on one brand 👍
							$doctors = $location->doctors;
							if($brand->post_title === 'Prairie Grove Orthodontics' && $location->post_title ==='Sun Prairie') {
								usort($doctors, function($a, $b) {
									return strlen($a) <=> strlen($b);
								});
							} else {
								usort($doctors, function($a, $b) {
									return strlen($b) <=> strlen($a);
								});
							}
							?>
							<article class="location-tile">
								<div class="img-container">
									<img<?= !empty($location->image['src']) ? ' src="'.(brand_host().'/'.$location->image['src']).'"' : ''; ?><?= !empty($location->image['width']) ? ' width="'.($location->image['width']).'"' : ''; ?><?= !empty($location->image['height']) ? ' height="'.($location->image['height']).'"' : ''; ?><?= !empty($location->image['data-label']) ? ' data-label="'.($location->image['data-label']).'"' : ''; ?><?= !empty($location->image['alt']) ? ' alt="'.($location->image['alt']).'"' : ''; ?><?= !empty($location->image['classes']) ? ' class="'.(implode(' ', $location->image['classes'])).'"' : ''; ?> />
								</div>
								<div class="location-content">
									<div class="row header">
										<? if(!empty($location->post_title)) : ?>
											<h3 class="h3"><a href="<?= brand_url('/'.($location->relative_url).'/'); ?>"><?= $location->post_title; ?></a></h3>
										<? endif; ?>
										<? if(!empty($doctors)) : ?>
											<ul>
												<li></li>
												<? foreach ($doctors as $doctor) { ?>
													<li><?= $doctor; ?></li>
												<? } ?>
											</ul>
										<? endif; ?>
									</div>
									<? if(!empty($location->full_address)) : ?>
										<div class="row address">
											<address><?= $location->full_address; ?></address>
										</div>
									<? endif; ?>
									<? if(!empty($location->relative_url)) : ?>
										<div class="row view-more">
											<div class="col">
												<a href="<?= brand_url('/'.($location->relative_url).'/'); ?>" class="cta text">View more</a>
											</div>
										</div>
									<? endif; ?>
									<? $directions_link = !empty($location->google_cid) ? 'https://www.google.com/maps/?cid='.($location->google_cid) : $location->directions_link; ?>
									<? if(!empty($directions_link) || !empty($location->schedule_consultation_link)) : ?>
										<div class="row links">
											<? if(!empty($directions_link)) { ?>
												<div class="col first">
													<a target="_blank" href="<?= $directions_link; ?>" class="cta text">Get Directions</a>
												</div>
											<? } ?>
											<? if(!empty($location->schedule_consultation_link)) { ?>
												<div class="col last">
													<a href="<?= brand_url('/orthodontist-office/'.($location->post_name).'/free-orthodontic-consultation/'); ?>" class="cta text" title="Schedule consultation">Schedule consultation</a>
												</div>
											<? } ?>
										</div>
									<? endif; ?>
									<? if(!empty($location->email_address) || !empty($location->phone_numbers)) : ?>
										<div class="row contact">
											<? if(!empty($location->email_address)) { ?>
												<div class="col first">
													<a href="<?= brand_url('/orthodontist-office/'.($location->post_name).'/contact-us/'); ?>" class="cta text" title="Email us">Email us</a>
												</div>
											<? } ?>
											<? if(!empty($location->phone_numbers)) { ?>
												<div class="col last">
													<ul>
														<? foreach ($location->phone_numbers as $phone_number) { ?>
														<li><a href="tel:+1<?= str_replace('.', '',$phone_number['number']); ?>" class="cta text">Call <?= $phone_number['number']; ?></a></li>
													<? } ?>
													</ul>
												</div>
											<? } ?>
										</div>
									<? endif; ?>
								</div>
							</article>
						<? endforeach; ?>
					</div>
				</div>
			<? endif; ?>
		</div>
	</div>
</section>
