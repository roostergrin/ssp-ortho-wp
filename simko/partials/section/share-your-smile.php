<? global $forms; ?>
<section class="share-your-smile">
	<div class="content">
		<div class="inner-content">
			<div class="wrapper">
				<article>
					<? if (!empty($main_heading)) : ?>
						<h3 class="primary"><?= $main_heading; ?></h3>
					<? endif; ?>
					<? if (!empty($main_content)) : ?>
						<?= apply_filters('the_content', $main_content); ?>
					<? endif; ?>
					<div class="form-wrapper">
						<? $forms->generateForm('review'); ?>
					</div>
					<hr>
					<? if (!empty($mobile_image)) : ?>
						<img<?= !empty($mobile_image['src']) ? ' src="'.$mobile_image['src'].'"' : ''; ?><?= !empty($mobile_image['width']) ? ' width="'.$mobile_image['width'].'"' : ''; ?><?= !empty($mobile_image['height']) ? ' height="'.$mobile_image['height'].'"' : ''; ?><?= !empty($mobile_image['srcset']) ? ' srcset="'.$mobile_image['srcset'].'"' : ''; ?><?= !empty($mobile_image['sizes']) ? ' sizes="'.$mobile_image['sizes'].'"' : ''; ?><?= !empty($mobile_image['alt']) ? ' alt="'.$mobile_image['alt'].'"' : ''; ?><?= !empty($mobile_image['classes']) ? ' class="'.implode(' ', $mobile_image['classes']).'"' : ''; ?> loading="lazy" />
					<? endif; ?>
					<? if (!empty($second_heading)) : ?>
						<h3 class="primary"><?= $second_heading; ?></h3>
					<? endif; ?>
					<? if (!empty($second_content)) : ?>
						<?= apply_filters('the_content', $second_content); ?>
					<? endif; ?>
				</article>
				<? if (!empty($image)) : ?>
					<aside class="desktop">
						<img<?= !empty($image['src']) ? ' src="'.$image['src'].'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> loading="lazy" />
					</aside>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
