<?
global $wp;

wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-smile-gallery');

$default_title = esc_attr($gallery[0]->post_title);
$default_before_image_1x = wp_get_attachment_image_src($gallery[0]->before_image, 'medium_large')[0];
$default_before_image_2x = wp_get_attachment_image_src($gallery[0]->before_image, '1536x1536')[0];
$default_after_image_1x = wp_get_attachment_image_src($gallery[0]->after_image, 'medium_large')[0];
$default_after_image_2x = wp_get_attachment_image_src($gallery[0]->after_image, '1536x1536')[0];
?>
<? if (!empty($gallery)): ?>
<section class="smile-gallery">
	<div class="content">
		<div class="inner-content">
			<? if (!empty($h3)) : ?>
				<h3<?= !empty($h3_classes) ? ' class="'.implode(' ', $h3_classes).'"' : ''; ?>><?= $h3; ?></h3>
			<? endif; ?>
			<? if (!empty($content)) { echo apply_filters('the_content', $content); } ?>
			<? if (!empty($cta)) : ?>
				<p><?= $cta; ?></p>
			<? endif; ?>
			<?= !empty($shortcode) ? '<p>'.(apply_filters('the_content', $shortcode)).'</p>' : ''; ?>
			<div class="gallery">
				<div class="one-third">
					<ul class="before-images">
					<? foreach ($gallery as $key => $smile) : ?>
						<?
							$before_image_1x = wp_get_attachment_image_src($smile->before_image, 'medium_large');
							$before_image_2x = wp_get_attachment_image_src($smile->before_image, '1536x1536');
							$after_image_1x = wp_get_attachment_image_src($smile->after_image, 'medium_large');
						?>
						<li class="img<?= $key === 0 ? ' active' : '' ?>">
							<?= responsive_static_img([
								'src' => $before_image_1x[0],
								'srcset' => ($before_image_1x[0]).' 1x, '.($before_image_2x[0]).' 2x',
								'width' => 165,
								'height' => 100,
								'alt' => 'After ' . esc_attr($smile->post_title),
								'data-position' => $key + 1,
								'data-before' => $before_image_1x[0],
								'data-after' => $after_image_1x[0],
								'data-before-content' => '<strong>Before</strong>',
								'data-after-content' => '<strong>After</strong>',
							]); ?>
						</li>
					<? endforeach ?>
					</ul>
					<div class="before-images owl-carousel">
					<? foreach ($gallery as $key => $smile): ?>
						<?
							$before_image_1x = wp_get_attachment_image_src($smile->before_image, 'medium_large');
							$before_image_2x = wp_get_attachment_image_src($smile->before_image, '1536x1536');
							$after_image_1x = wp_get_attachment_image_src($smile->after_image, 'medium_large');
						?>
						<?= responsive_static_img([
							'src' => $before_image_1x[0],
							'srcset' => ($before_image_1x[0]).' 1x, '.($before_image_2x[0]).' 2x',
							'width' => 165,
							'height' => 100,
							'alt' => 'Before '.esc_attr($smile->post_title),
							'data-position' => $key + 1,
							'data-before' => $before_image_1x[0],
							'data-after' => $after_image_1x[0],
							'data-before-content' => '<strong>Before</strong>',
							'data-after-content' => '<strong>After</strong>',
						]); ?>
					<? endforeach ?>
					</div>
				</div>
				<div class="two-thirds img-comp-container">
					<div class="img-comp-img">
						<?= responsive_static_img([
							'src' => $default_after_image_1x,
							'srcset' => ($default_after_image_1x).' 1x, '.($default_after_image_2x).' 2x',
							'width' => '780',
							'height' => '460',
							'alt' => 'After '.($default_title),
							'data-position' => $key + 1,
							'data-before' => $default_before_image_1x,
							'data-after' => $default_after_image_1x,
							'data-before-content' => '<strong>Before</strong>',
							'data-after-content' => '<strong>After</strong>',
						]); ?>
						<p><strong>After</strong></p>
					</div>
					<div class="img-comp-img img-comp-overlay">
						<?= responsive_static_img([
							'src' => $default_before_image_1x,
							'srcset' => ($default_before_image_1x).' 1x, '.($default_before_image_2x).' 2x',
							'alt' => 'Before '.($default_title),
							'width' => '780',
							'height' => '460',
							'data-position' => $key + 1,
							'data-before' => $default_before_image_1x,
							'data-after' => $default_after_image_1x,
							'data-before-content' => '<strong>Before</strong>',
							'data-after-content' => '<strong>After</strong>',
						]); ?>
						<p><strong>Before</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<? endif ?>
