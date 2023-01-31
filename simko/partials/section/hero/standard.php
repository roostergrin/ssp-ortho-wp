<section class="hero standard<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>"<?= !empty($desktop_image['src']) ? ' style="background-image: url('.($desktop_image['src']).');"' : ''; ?>>
	<? if (!empty($mobile_image)) : ?>
		<? if (in_array('brand', $classes)) : ?>
			<img<?= !empty($mobile_image['src']) ? ' src="'.(brand_host().'/'.$mobile_image['src']).'"' : ''; ?><?= !empty($mobile_image['width']) ? ' width="'.$mobile_image['width'].'"' : ''; ?><?= !empty($mobile_image['height']) ? ' height="'.$mobile_image['height'].'"' : ''; ?><?= !empty($mobile_image['srcset']) ? ' srcset="'.$mobile_image['srcset'].'"' : ''; ?><?= !empty($mobile_image['sizes']) ? ' sizes="'.$mobile_image['sizes'].'"' : ''; ?><?= !empty($mobile_image['alt']) ? ' alt="'.$mobile_image['alt'].'"' : ''; ?><?= !empty($mobile_image['classes']) ? ' class="'.implode(' ', $mobile_image['classes']).'"' : ''; ?>/>
		<? else : ?>
			<div class="mobile-image-container">
				<img<?= !empty($mobile_image['src']) ? ' src="'.$mobile_image['src'].'"' : ''; ?><?= !empty($mobile_image['width']) ? ' width="'.$mobile_image['width'].'"' : ''; ?><?= !empty($mobile_image['height']) ? ' height="'.$mobile_image['height'].'"' : ''; ?><?= !empty($mobile_image['srcset']) ? ' srcset="'.$mobile_image['srcset'].'"' : ''; ?><?= !empty($mobile_image['sizes']) ? ' sizes="'.$mobile_image['sizes'].'"' : ''; ?><?= !empty($mobile_image['alt']) ? ' alt="'.$mobile_image['alt'].'"' : ''; ?><?= !empty($mobile_image['classes']) ? ' class="'.implode(' ', $mobile_image['classes']).'"' : ''; ?>/>
			</div>
		<? endif; ?>
	<? endif; ?>
	<? if (!empty($h1) || !empty($content)) : ?>
		<div class="content<?= !empty($content_classes) ? ' '.implode(' ', $content_classes) : ''; ?>">
			<div class="inner-content">
				<div class="wrapper<?= !empty($wrapper_classes) ? ' '.implode(' ', $wrapper_classes) : ''; ?>">
					<div class="container<?= !empty($container_classes) ? ' '.implode(' ', $container_classes) : ''; ?>">
						<? if (!empty($h1)) : ?>
							<h1<?= !empty($h1_classes) ? ' class="'.implode(' ', $h1_classes).'"' : ''; ?>><?= $h1; ?></h1>
						<? endif; ?>
						<? if (!empty($content)) : ?>
							<?= apply_filters('the_content', $content); ?>
						<? endif; ?>
						<? if (!empty($h2)) : ?>
							<h2 class="sub-heading<?= !empty($h2_classes) ? ' ' . implode(' ' , $h2_classes) : ' primary' ;?>"><?= $h2; ?></h2>
						<? endif; ?>
						<? if (!empty($cta)) : ?>
							<?= apply_filters('the_content', $cta); ?>
						<? endif; ?>
					</div>
				</div>
			</div>
		</div>
	<? endif; ?>
</section>
