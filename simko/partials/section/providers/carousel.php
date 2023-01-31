<?
$heading_htag = $heading_htag ?? 'h1';
$htag = $htag ?? 'h2';
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-providers-carousel');

if(is_brand()->ID === 8643) { // Prairie Grove Orthodontics - patch for Dr. Josh Whetten's image position on the homepage 
	if(is_array($all_providers)) { // Homepage - this is an array?
		foreach($all_providers as $provider) {
			if($provider->post_name === 'josh-whetten-dds') {
				if(!property_exists($provider, 'image') || !is_array($provider->image)) {
					$provider->image = [];
				}
				$provider->image['classes'][] = 'bg-img-top-center';
			}
		}
	}
	elseif(is_object($all_providers)) { // Team overview page - this is an object this time?
		if($all_providers->post_name === 'josh-whetten-dds') {
			if(!property_exists($all_providers, 'image') || !is_array($all_providers->image)) {
				$all_providers->image = [];
			}
			$all_providers->image['classes'][] = 'bg-img-top-center';
		}
	}
}
		
?>
<section class="providers carousel<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="container">
				<article>
					<div class="inner-content">
						<? if (!empty($h1)) : ?>
							<<?= $heading_htag ?><?= !empty($h1_classes) ? ' class="'.implode(' ', $h1_classes).'"' : ''; ?>><?= $h1; ?></<?= $heading_htag ?>>
						<? endif; ?>
						<? if (!empty($h2)) : ?>
							<<?= $htag ?><?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></<?= $htag ?>>
						<? endif; ?>
						<? if (!empty($content)) { echo apply_filters('the_content', $content); } ?>
						<? if(!isset($hide_meet_the_team)) :?>
							<a href="<?= brand_url('meet-our-orthodontic-team'); ?>" class="cta text team-mobile">Meet the team</a>
						<? endif; ?>
						<? if(!isset($hide_meet_the_team)) :?>
							<a href="<?= brand_url('meet-our-orthodontic-team'); ?>" class="cta text team-desktop">Meet the team</a>
						<? endif; ?>
					</div>
					<div class="pagination-container<?= !empty($pagination_classes) ? ' '.implode(' ', $pagination_classes) : ''; ?>">
						<? if (!empty($all_providers) && is_array($all_providers) && count($all_providers) > 1) : ?>
							<? if(!$hide_pagination) :?>
								<div class="pagination">
									<div class="page-left"><span>Previous</span><i class="icon-left-arrow-thick providers"></i></div>
									<div class="page-right"><i class="icon-right-arrow-thick providers"></i><span>Next</span></div>
								</div>
							<? endif; ?>
						<? endif; ?>
						<? if(isset($hide_meet_the_team) && isset($slb_link)) :?>
							<div class="single-location-link">
								<?= do_shortcode($slb_link); ?>
							</div>
						<? endif; ?>
					</div>
				</article>
				<? if (!empty($providers)) : ?>
					<aside>
						<div class="providers-container owl-carousel">
							<? foreach($providers as $provider) : ?>
								<div class="provider">
									<? if (!empty($provider['image'])) : ?>
										<div class="img-container">
											<img<?= !empty($provider['image']['src']) ? ' src="'.(brand_host().$provider['image']['src']).'"' : ''; ?><?= !empty($provider['image']['srcset']) ? ' srcset="'.$provider['image']['srcset'].'"' : ''; ?><?= !empty($provider['image']['sizes']) ? ' sizes="'.$provider['image']['sizes'].'"' : ''; ?><?= !empty($provider['image']['width']) ? ' width="'.$provider['image']['width'].'"' : ''; ?><?= !empty($provider['image']['height']) ? ' height="'.$provider['image']['height'].'"' : ''; ?><?= !empty($provider['image']['alt']) ? ' alt="'.$provider['image']['alt'].'"' : ''; ?><?= !empty($provider['image']['classes']) ? ' class="'.implode(' ', $provider['image']['classes']).'"' : ''; ?> loading="lazy" />
											<div class="overlay">
												<h3 class="name"><a href="<?= $provider['caption']['href']; ?>"><?= $provider['caption']['name']; ?></a></h3>
												<p class="specialty desktop"><?= $provider['caption']['specialty']; ?></p>
												<p class="about desktop"><?= $provider['caption']['content']; ?></p>
												<a href="<?= $provider['caption']['href']; ?>" class="cta text link">View doctor bio</a>
											</div>
										</div>
									<? endif; ?>
								</div>
							<? endforeach; ?>
						</div>
					</aside>
				<? endif; ?>
				<? if (!empty($all_providers)) : ?>
					<? if (is_array($all_providers)) : ?>
						<aside>
							<div class="providers-container owl-carousel">
								<? foreach($all_providers as $provider) : ?>
									<div class="provider">
										<? if (!empty($provider->image)) : ?>
											<div class="img-container">
												<img<?= !empty($provider->image['src']) ? ' src="'.(brand_host().$provider->image['src']).'"' : ''; ?><?= !empty($provider->image['srcset']) ? ' srcset="'.$provider->image['srcset'].'"' : ''; ?><?= !empty($provider->image['sizes']) ? ' sizes="'.$provider->image['sizes'].'"' : ''; ?><?= !empty($provider->image['width']) ? ' width="'.$provider->image['width'].'"' : ''; ?><?= !empty($provider->image['height']) ? ' height="'.$provider->image['height'].'"' : ''; ?><?= !empty($provider->image['alt']) ? ' alt="'.$provider->image['alt'].'"' : ''; ?><?= !empty($provider->image['classes']) ? ' class="'.implode(' ', $provider->image['classes']).'"' : ''; ?> loading="lazy" />
												<div class="overlay">
													<h3 class="name"><a href="<?= brand_url('/'.($provider->relative_url).'/'); ?>"><?= $provider->caption['name']; ?></a></h3>
													<p class="specialty desktop"><?= $provider->caption['specialty']; ?></p>
													<p class="about desktop"><?= $provider->caption['content']; ?></p>
													<a href="<?= brand_url('/'.($provider->relative_url).'/'); ?>" class="cta text link">View doctor bio</a>
												</div>
											</div>
										<? endif; ?>
									</div>
								<? endforeach; ?>
							</div>
						</aside>
					<? else: ?>
						<aside>
							<div class="providers-container">
								<div class="provider">
									<? if (!empty($all_providers->image)) : ?>
										<div class="img-container">
											<img<?= !empty($all_providers->image['src']) ? ' src="'.(brand_host().$all_providers->image['src']).'"' : ''; ?><?= !empty($all_providers->image['srcset']) ? ' srcset="'.$all_providers->image['srcset'].'"' : ''; ?><?= !empty($all_providers->image['sizes']) ? ' sizes="'.$all_providers->image['sizes'].'"' : ''; ?><?= !empty($all_providers->image['width']) ? ' width="'.$all_providers->image['width'].'"' : ''; ?><?= !empty($all_providers->image['height']) ? ' height="'.$all_providers->image['height'].'"' : ''; ?><?= !empty($all_providers->image['alt']) ? ' alt="'.$all_providers->image['alt'].'"' : ''; ?><?= !empty($all_providers->image['classes']) ? ' class="'.implode(' ', $all_providers->image['classes']).'"' : ''; ?> loading="lazy" />
											<div class="overlay">
												<p class="name"><a href="<?= brand_url('/'.($all_providers->relative_url).'/'); ?>"><?= $all_providers->caption['name']; ?></a></p>
												<p class="specialty desktop"><?= $all_providers->caption['specialty']; ?></p>
												<p class="about desktop"><?= $all_providers->caption['content']; ?></p>
												<a href="<?= brand_url('/'.($all_providers->relative_url).'/'); ?>" class="cta text link">View doctor bio</a>
											</div>
										</div>
									<? endif; ?>
								</div>
							</div>
						</aside>
					<? endif; ?>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
