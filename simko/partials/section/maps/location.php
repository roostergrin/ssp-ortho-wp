<?
!empty($loc) ? $location = $loc : $location = is_location();

//Build directions link
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')) {
    $directions_base = 'maps://maps.google.com/maps?daddr=';
} else {
    $directions_base = 'https://maps.google.com/maps?daddr=';
    // $directions_base = 'https://www.google.com/maps/dir/?api=1&destination='
}
$directions_meta = $location->address.','.$location->city.','.$location->state.','.$location->zip;
$directions_suffix = urlencode($directions_meta);
$directions = $directions_base . $directions_suffix;
$directions = !empty($location->google_cid) ? 'https://www.google.com/maps/?cid='.($location->google_cid) : $directions;

$appointments = !empty($location->phone) ? '<a href="tel:+1'.(toTouchTone($location->phone)).'" class="text white">'.(hyphenatePhoneNumber($location->phone)).'</a>' : false;
$toll_free = !empty($location->toll_free_phone) ? '<a href="tel:+1'.(toTouchTone($location->toll_free_phone)).'" class="text white">'.(hyphenatePhoneNumber($location->toll_free_phone)).'</a>' : false;
$after_hours_emergency = !empty($location->after_hours_phone) ? '<a href="tel:+1'.(toTouchTone($location->after_hours_phone)).'" class="text white">'.(hyphenatePhoneNumber($location->after_hours_phone)).'</a>' : false;

?>
<section class="maps location<?= !empty($classes) ? ' ' . implode(' ', $classes) : ''?><?= is_single_location_brand() ? ' single-location-brand' : ''; ?>">
	<? partial('widget.maps.single', [
		'loc' => $location,
	]); ?>
	<? if(!empty($heading)) :?>
	<div class="content">
		<div class="inner-content">
			<div class="container">
				<div class="location-info">
					<h2 class="location-name"><?= $location->post_title ?></h2>
					<div class="location-data">
						<div class="column">
							<address><?= implode('<br>', array_filter([$location->address, $location->address_line_2])) ?><br/><?= $location->city ?>, <?= $location->state ?> <?= $location->zip ?></address>
						</div>
						<? if (!empty($appointments) && !empty($toll_free)): ?>
							<div class="column numbers toll-free">
								<p>
									<strong>Appointments:</strong> <?= $appointments; ?><br/>
									<strong>Toll-free:</strong> <?= $toll_free; ?>
								</p>
								<? elseif (!empty($appointments)): ?>
									<div class="column numbers">
										<p><strong>Appointments:</strong><br><?= $appointments; ?></p>
								<? endif ?>
							</div>
					</div>
					<div class="links">
						<div>
							<p>Call for hours</p>
						</div>
						<div>
							<a href="<?= $directions ?>" class="cta text white" target="_blank" rel="noopener">Get directions</a>
						</div>
						<div>
							<a href="<?= brand_url('free-orthodontic-consultation'); ?>" class="cta text white">Free consultation</a>
						</div>
					</div>
				</div>
				<div class="location-content">
					<h3 class="title"><?= !empty($heading) ? $heading : ''; ?></h3>
					<p><?= !empty($content) ? $content : ''; ?></p>
				</div>
			</div>
		</div>
	</div>
	<? endif; ?>
</section>
