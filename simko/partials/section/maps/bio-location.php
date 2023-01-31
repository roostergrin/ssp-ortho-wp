<?
global $locations;
$selected_location = $selected_location ?? 6;
$provider_locations_ids = unserialize($provider->location_relationship);
$provider_locations = array_filter($locations->locations, function($location) use ($provider_locations_ids) {
	return in_array($location->ID, $provider_locations_ids);
});
usort($provider_locations, function($a, $b) {
	return $a->post_title <=> $b->post_title;
});

function prettyTel($num) {
	return preg_replace("/(\d{3})(\d{3})(\d{4})/", "\\1.\\2.\\3", $num);
}
?>
<section class="maps location">
	<form><input type="hidden" id="location_search_address" value=""></form>
	<? partial('widget.maps.initial', ['selected_location' => $selected_location, 'all_locations' => $provider_locations]); ?>
	<? if (strstr($relative_url, 'tsunoda')) : ?>
		<div class="content">
			<div class="inner-content dual-location">
				<div class="main-container">
					<? if(!empty($info_box_copy)): ?>
						<div class="info-container">
							<div class="content">
								<h3><?= $info_box_copy;?></h3>
							</div>
						</div>
					<? endif; ?>
					<? if(!empty($provider_locations) && count($provider_locations) > 1): ?>
						<div class="locations-data">
							<? foreach($provider_locations as $l): ?>
								<div class="column">
									<h4><?= $l->post_title; ?></h4>
									<? if(!empty($l->phone)): ?>
										<a href="tel:+<?= $l->phone; ?>" class="cta text">Call <?= prettyTel($l->phone); ?></a><br>
									<? endif; ?>
									<? if(!empty($l->toll_free_phone)): ?>
										<a href="tel:+1<?= $l->toll_free_phone; ?>" class="cta text">Call <?= prettyTel($l->toll_free_phone); ?></a><br>
									<? endif; ?>
									<a href="<?= brand_url('/'.($l->relative_url).'/'); ?>" class="cta text">Learn more</a></p>
								</div>
							<? endforeach; ?>
						</div>
					<? endif; ?>
				</div>
			</div>
		</div>
	<? else: ?>
		<div class="content">
			<div class="inner-content<? if (count($provider_locations) === 1) echo ' single-location' ?><? if (count($provider_locations) === 2) echo ' dual-location' ?>">
				<? if(!empty($info_box_copy)): ?>
					<div class="info-container">
						<div class="content">
							<h3><?= $info_box_copy;?></h3>
						</div>
					</div>
				<? endif; ?>
				<? if (count($provider_locations) === 1): ?>
					<div class="locations-data">
						<? foreach($provider_locations as $l): ?>
							<div class="column">
								<h4><?= $l->post_title; ?></h4>
								<? if(!empty($l->phone)): ?>
									<a href="tel:+<?= $l->phone; ?>" class="cta text">Call <?= prettyTel($l->phone); ?></a><br>
								<? endif; ?>
								<? if(!empty($l->toll_free_phone)): ?>
									<a href="tel:+1<?= $l->toll_free_phone; ?>" class="cta text">Call <?= prettyTel($l->toll_free_phone); ?></a><br>
								<? endif; ?>
								<a href="<?= brand_url('/'.($l->relative_url).'/'); ?>" class="cta text">Learn more</a></p>
							</div>
						<? endforeach; ?>
					</div>
				<? endif ?>
			</div>
		</div>
		<? if(!empty($provider_locations) && count($provider_locations) > 1):?>
			<div class="content">
				<div class="inner-content">
					<div class="locations-data">
						<? foreach($provider_locations as $l): ?>
							<div class="column">
								<h4><?= $l->post_title; ?></h4>
								<? if(!empty($l->phone)): ?>
									<a href="tel:+<?= $l->phone; ?>" class="cta text">Call <?= prettyTel($l->phone); ?></a><br>
								<? endif; ?>
								<? if(!empty($l->toll_free_phone)): ?>
									<a href="tel:+1<?= $l->toll_free_phone; ?>" class="cta text">Call <?= prettyTel($l->toll_free_phone); ?></a><br>
								<? endif; ?>
								<a href="<?= brand_url('/'.($l->relative_url).'/'); ?>" class="cta text">Learn more</a></p>
							</div>
						<? endforeach; ?>
					</div>
				</div>
			</div>
		<? endif; ?>
	<? endif; ?>
</section>
