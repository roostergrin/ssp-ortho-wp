<?
$location = is_location();
$brand = is_brand();
$brand_locations = get_locations_for_brand($brand->ID);
usort($brand_locations, function($a, $b) {
	return $a->post_title <=> $b->post_title;
});

if ($brand->post_title == 'Kristo Orthodontics') {
	$brand_shortname = 'Kristo';
	$heading_color = 'primary';
	$font_color = 'gray-1';
	$background_position = 'background-position: right top 60px;';
} elseif ($brand->post_title == 'Great River Orthodontics') {
	$brand_shortname = 'Great River';
	$heading_color = 'white';
	$font_color = 'white';
	$background_position = 'background-position: left top 60px;';
}  elseif ($brand->post_title == 'Prairie Grove Orthodontics') {
	$brand_shortname = 'Prairie Grove';
	$heading_color = 'white';
	$font_color = 'white';
	$background_position = 'background-position: left top 60px;';
}
?>
<section class="hero patient<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>" <?= !empty($desktop_image) ? 'style="background-image: url('.$desktop_image.'); '.$background_position.'"' : '';?>>
	<? if (!empty($mobile_image)) : ?>
	<div class="img-container mobile">
		<img<?= !empty($mobile_image['src']) ? ' src="'.$mobile_image['src'].'"' : ''; ?><?= !empty($mobile_image['width']) ? ' width="'.$mobile_image['width'].'"' : ''; ?><?= !empty($mobile_image['height']) ? ' height="'.$mobile_image['height'].'"' : ''; ?><?= !empty($mobile_image['srcset']) ? ' srcset="'.$mobile_image['srcset'].'"' : ''; ?><?= !empty($mobile_image['sizes']) ? ' sizes="'.$mobile_image['sizes'].'"' : ''; ?><?= !empty($mobile_image['alt']) ? ' alt="'.$mobile_image['alt'].'"' : ''; ?><?= !empty($mobile_image['classes']) ? ' class="'.implode(' ', $mobile_image['classes']).'"' : ''; ?> loading="lazy" />
		<? if (!empty($overlay)) : ?>
			<div class="overlay"></div>
		<? endif; ?>
	</div>
	<? endif; ?>
	<div class="content">
		<div class="inner-content">
			<div class="wrapper <?= !empty($position) ? 'right-side' : 'left-side'; ?>">
				<article>
					<div class="content-wrapper">
						<? if (!empty($heading)) : ?>
							<h1 class="<?= $heading_color; ?>"><?= $heading; ?></h1>
						<? endif; ?>
						<? if (!empty($content)) : ?>
							<p<?= !empty($font_color) ? ' class="'.($font_color).'"' : ''; ?>><?= $content; ?>
						<? endif; ?>
					</div>
					<div class="form-wrapper">
						<div class="fancy-select">
						<? if (!empty($brand_locations)): ?>
							<div class="fancy-select-title<?= !empty($font_color) ? ' '.($font_color) : ''; ?>">Select your <?= $brand_shortname; ?> office</div>
							<div class="options hidden">
								<ul class="select-options">
									<? foreach ($brand_locations as $o): ?>
										<li><a href="<?= brand_url('/'.$o->relative_url.'/patient-forms/'); ?>"<?= !empty($font_color) ? ' class="'.($font_color).'"' : ''; ?>><?= $o->post_title ?></a></li>
									<? endforeach ?>
								</ul>
							</div>
						<? endif ?>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
