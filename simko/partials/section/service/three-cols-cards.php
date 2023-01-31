<? wp_enqueue_script('internal-three-cols-cards'); ?>
<section class="three-cols-cards">
	<div class="content">
		<div class="inner-content">
			<? if (!empty($cards)) : ?>
				<div class="main-container">
					<? foreach ($cards as $card): ?>
						<div class="card">
							<h3 class="title"><?= $card['title']; ?></h3>
							<?= apply_filters('the_content', $card['copy']); ?>
						</div>
					<? endforeach ?>
				</div>
			<? endif; ?>
		</div>
    </div>
</section>
