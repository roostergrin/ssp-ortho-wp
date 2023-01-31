<section class="share-review<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="wrapper">
				<article>
					<div class="columns">
						<div class="column">&nbsp;</div>
						<div class="column">
							<? if (!empty($heading)) : ?>
								<h3 class="primary nowrap"><?= $heading; ?></h3>
							<? endif; ?>
						</div>
						<div class="column">&nbsp;</div>
					</div>
					<div class="columns<?= is_single_location_brand() ? ' single-location-brand' : ''; ?>">
						<? if(!is_single_location_brand()) : ?>
						<div class="column select">
							<label for="fancy-select-2">Select location to send the review.</label>
							<div id="fancy-select-2" class="fancy-select">
								<? if (!empty($locations)): ?>
									<div class="fancy-select-title-2">Your office preference*</div>
									<div class="options-2 hidden">
										<ul class="select-options">
											<? foreach ($locations as $location) : ?>
												<li id="<?= $location->ID; ?>" data-facebook_link="<?= $location->facebook_link; ?>" data-google_link="<?= $location->gmb_review_link; ?>"><?= $location->post_title; ?></li>
											<? endforeach ?>
										</ul>
									</div>
								<? endif ?>
							</div>
						</div>
						<div class="column share">
							<a href="#" target="_blank" rel="noreferrer" class="share-link facebook img" disabled>
								<img src="<?= wp_get_attachment_image_src(6947, 'thumbnail')[0]; ?>" width="110" height="110" alt="<?= get_post_meta(6947, '_wp_attachment_image_alt', true); ?>" class="share-img facebook" />
								<img src="<?= wp_get_attachment_image_src(7048, 'thumbnail')[0]; ?>" width="110" height="110" alt="<?= get_post_meta(7048, '_wp_attachment_image_alt', true); ?>" class="share-img-active facebook" />
							</a>
							<div class="text-wrapper">
								<h4 class="share-text"><a href="#" target="_blank" rel="noreferrer" class="share-link facebook" disabled>Share a review on Facebook</a></h4>
								<p class="share-text">Will open a new window</p>
							</div>
						</div>
						<div class="column share">
							<a href="#" target="_blank" rel="noreferrer" class="share-link google img" disabled>
								<img src="<?= wp_get_attachment_image_src(6948, 'thumbnail')[0]; ?>" width="110" height="110" alt="<?= get_post_meta(6948, '_wp_attachment_image_alt', true); ?>" class="share-img google" />
								<img src="<?= wp_get_attachment_image_src(7046, 'thumbnail')[0]; ?>" width="110" height="110" alt="<?= get_post_meta(7046, '_wp_attachment_image_alt', true); ?>" class="share-img-active google" />
							</a>
							<div class="text-wrapper">
								<h4 class="share-text"><a href="#" target="_blank" rel="noreferrer" class="share-link google" disabled>Share a review on Google</a></h4>
								<p class="share-text">Will open a new window</p>
							</div>
						</div>
						<? else : ?>
							<script>document.getElementsByTagName( 'html' )[0].classList.add('review-office-preference-selected');</script>
							<div class="column share">
							<a href="<?= $locations[0]->facebook_link; ?>" target="_blank" rel="noreferrer" class="share-link facebook img">
								<img src="<?= wp_get_attachment_image_src(7048, 'thumbnail')[0]; ?>" width="110" height="110" alt="<?= get_post_meta(7048, '_wp_attachment_image_alt', true); ?>" class="share-img-active facebook" />
							</a>
							<div class="text-wrapper">
								<h4 class="share-text"><a href="<?= $locations[0]->facebook_link; ?>" target="_blank" rel="noreferrer" class="share-link facebook">Share a review on Facebook</a></h4>
								<p class="share-text">Will open a new window</p>
							</div>
						</div>
						<div class="column share">
							<a href="<?= $locations[0]->gmb_review_link?>" target="_blank" rel="noreferrer" class="share-link google img">
								<img src="<?= wp_get_attachment_image_src(7046, 'thumbnail')[0]; ?>" width="110" height="110" alt="<?= get_post_meta(7046, '_wp_attachment_image_alt', true); ?>" class="share-img-active google" />
							</a>
							<div class="text-wrapper">
								<h4 class="share-text"><a href="<?= $locations[0]->gmb_review_link?>" target="_blank" rel="noreferrer" class="share-link google">Share a review on Google</a></h4>
								<p class="share-text">Will open a new window</p>
							</div>
						</div>
						<? endif; ?>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
