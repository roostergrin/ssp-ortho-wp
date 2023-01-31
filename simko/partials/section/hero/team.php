<section class="hero team">
	<div class="content">
		<div class="inner-content">
			<article>
				<? if (!empty($h1)) : ?>
					<h1<?= !empty($h1_classes) ? ' class="'.implode(' ', $h1_classes).'"' : ''; ?>><?= $h1; ?></h1>
				<? endif; ?>
				<? if (!empty($h2)) : ?>
					<h2<?= !empty($h2_classes) ? ' class="'.implode(' ', $h2_classes).'"' : ''; ?>><?= $h2; ?></h2>
				<? endif; ?>
				<? if (!empty($content)) { echo apply_filters('the_content', $content); } ?>
			</article>
			<? if (!empty($team)) : ?>
				<aside>
					<div class="team-container">
						<div class="team">
							<? if (!empty($team['image'])) : ?>
								<div class="img-container">
									<img<?= !empty($team['image']['src']) ? ' src="'.$team['image']['src'].'"' : ''; ?><?= !empty($team['image']['srcset']) ? ' srcset="'.$team['image']['srcset'].'"' : ''; ?><?= !empty($team['image']['sizes']) ? ' sizes="'.$team['image']['sizes'].'"' : ''; ?><?= !empty($team['image']['width']) ? ' width="'.$team['image']['width'].'"' : ''; ?><?= !empty($team['image']['height']) ? ' height="'.$team['image']['height'].'"' : ''; ?><?= !empty($team['image']['alt']) ? ' alt="'.$team['image']['alt'].'"' : ''; ?><?= !empty($team['image']['classes']) ? ' class="'.implode(' ', $team['image']['classes']).'"' : ''; ?> loading="lazy" />
									<div class="overlay">
										<p class="name"><?= $team['heading']['h3']; ?></p>
										<p class="specialty desktop"><?= $team['heading']['title']; ?></p>
										<p class="about desktop"><?= $team['content']; ?></p>
										<a href="<?= $team['href']; ?>" class="cta text link">View doctor bio</a>
									</div>
								</div>
							<? endif; ?>
						</div>
					</div>
				</aside>
			<? endif; ?>
		</div>
	</div>
</section>
