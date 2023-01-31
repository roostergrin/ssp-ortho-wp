<?
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-icons-carousel');
?>
<section class="two-cols-carousel-with-image<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="main-container">
				<article>
					<? if (!empty($h3)) : ?>
						<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
					<? endif; ?>
					<? if (!empty($content)) { echo apply_filters('the_content', $content); } ?>
					<? if (!empty($carousel)) : ?>
						<div class="two-cols mobile<?= count($carousel) > 1 ? ' owl-carousel' : ''; ?>">
							<? foreach ($carousel as $icon) : ?>
								<? partial('widget.folding-icons', ['icon' => $icon]); ?>
							<? endforeach; ?>
						</div>
						<div class="desktop icon-wrapper">
							<? foreach ($carousel as $icon) : ?>
								<? partial('widget.folding-icons', ['icon' => $icon]); ?>
							<? endforeach; ?>
						</div>
					<? endif; ?>
				</article>
				<aside>
					<? if (!empty($image)) : ?>
						<div class="img-container desktop">
							<img<?= !empty($image['src']) ? ' src="'.$image['src'].'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> />
						</div>
					<? endif; ?>
					<? if (!empty($mobile_image)) : ?>
						<div class="img-container mobile">
							<img<?= !empty($mobile_image['src']) ? ' src="'.$mobile_image['src'].'"' : ''; ?><?= !empty($mobile_image['srcset']) ? ' srcset="'.$mobile_image['srcset'].'"' : ''; ?><?= !empty($mobile_image['sizes']) ? ' sizes="'.$mobile_image['sizes'].'"' : ''; ?><?= !empty($mobile_image['width']) ? ' width="'.$mobile_image['width'].'"' : ''; ?><?= !empty($mobile_image['height']) ? ' height="'.$mobile_image['height'].'"' : ''; ?><?= !empty($mobile_image['alt']) ? ' alt="'.$mobile_image['alt'].'"' : ''; ?><?= !empty($mobile_image['classes']) ? ' class="'.implode(' ', $mobile_image['classes']).'"' : ''; ?> />
						</div>
					<? endif; ?>
				</aside>
			</div>
		</div>
	</div>
</section>
