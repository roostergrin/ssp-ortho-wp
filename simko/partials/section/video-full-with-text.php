<?php
wp_enqueue_script('internal-video-full-with-text');
$video_src = $video_src ?? 'https://www.youtube.com/embed/xB2c4xzlYr4';


wp_enqueue_script('internal-global');
wp_localize_script('internal-global', 'youtube_video', [
	'video_src' => $video_src
]);
wp_enqueue_script('youtube-video');

?>
<section class="video-full-with-text<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<div class="content">
		<div class="inner-content">
			<div class="image-container" id="youtube-video">
				<img<?= !empty($image['src']) ? ' src="'.$image['src'].'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['id']) ? ' id="'.implode(' ', $image['id']).'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> />
				<div class="youtube-container active">
					<iframe class="youtube-video bg-img" width="900" height="600" src="<?= !empty($video_src) ? $video_src : 'https://www.youtube.com/embed/xB2c4xzlYr4';?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="content-container">
				<? if (!empty($content) && empty($content_below)) : ?>
					<article>
						<h2><?= !empty($h2) ? $h2 : ''; ?></h2>
						<?= apply_filters('the_content', $content); ?>
					</article>
				<? endif; ?>
			</div>
		</div>
        <?php if(!empty($content_below)): ?>
        <div class="inner-content">
            <div class="sub-content">
                <h2><?= !empty($h2) ? $h2 : ''; ?></h2>
	            <?= apply_filters('the_content', $content); ?>
            </div>
        </div>
        <?php endif; ?>
	</div>
</section>
