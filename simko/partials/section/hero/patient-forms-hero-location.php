<section class="hero patient<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="wrapper">
				<article class="new-patients">
					<div class="heading-container">
						<h2<?= !empty($new_patient_h2_classes) ? ' class="'.implode(' ', $new_patient_h2_classes) . '"' : ''; ?>>New patients</h2>
						<p><?= $new_patient_text; ?></p>
					</div>
						<div class="content-container">
							<? foreach($new_ctas as $cta) : ?>
							<div class="cta-container">
								<p class="bold"><?= $cta['heading']; ?></p>
								<p><?= $cta['content']; ?></p>
								<? foreach($cta['links'] as $link) :?>
								<a href="<?= $link['href']; ?>" class="cta" target="_blank"><?= $link['href_text']; ?></a>
								<? endforeach ;?>
							</div>
							<? endforeach; ?>
						</div>
				</article>
				<? if (!empty($side_image)) : ?>
					<article>
						<img src="<?= $side_image['src']; ?>" alt="<?= $side_image['alt']; ?>" class="patients-img" />
					</article>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
