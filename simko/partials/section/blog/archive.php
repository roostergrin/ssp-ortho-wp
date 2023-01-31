<?
$post_url = brand_url('/orthodontic-blog/'.basename(get_permalink($large_post)).'/');
$large_image_src_1x = wp_get_attachment_image_src(get_post_thumbnail_id($large_post), 'large', false);
$large_image_src_2x = wp_get_attachment_image_src(get_post_thumbnail_id($large_post), '2048x2048', false);
$large_image = !empty(get_post_thumbnail_id($large_post)) ? responsive_static_img(['src' => $large_image_src_1x[0], 'srcset' => $large_image_src_1x[0].' 1x, '.$large_image_src_2x[0].' 2x', 'sizes' => '100vw', 'width' => $large_image_src_1x[1], 'height' => $large_image_src_1x[2], 'alt' => !empty(get_post_meta(get_post_thumbnail_id($large_post), '_wp_attachment_image_alt', true)) ? get_post_meta(get_post_thumbnail_id($large_post), '_wp_attachment_image_alt', true) : str_replace('_', ' ', get_the_title(get_post_thumbnail_id($large_post))), 'class' => '']) : '';
?>
<section class="blog archive">
	<div class="content">
		<div class="inner-content">
			<div class="main-container">
				<div class="content-container">
					<h1 class="primary">Our blog</h1>
					<div class="blog-posts">
						<div class="large-posts">
							<? partial('widget.blog.large', [
								'image' => $large_image,
								'content' => [
									'h2' => $large_post->post_title,
									'h2_classes' => ['white'],
									'categories' => wp_get_post_categories($large_post->ID),
									'copy' => excerptizeCharacters(do_shortcode($large_post->post_content), 310),
									'cta' => [
										'href' => $post_url,
										'classes' => ['cta', 'text', 'white'],
										'text' => 'Read article'
									]
								]
							]); ?>
						</div>
						<div class="small-posts">
							<?
								foreach ($small_posts as $post) {
									$small_image_src_1x = wp_get_attachment_image_src(get_post_thumbnail_id($post), 'medium_large', false);
									$small_image_src_2x = wp_get_attachment_image_src(get_post_thumbnail_id($post), '1536x1536', false);
									$small_image = !empty(get_post_thumbnail_id($post)) ? responsive_static_img(['src' => $small_image_src_1x[0], 'srcset' => $small_image_src_1x[0].' 1x, '.$small_image_src_2x[0].' 2x', 'sizes' => '100vw', 'width' => $small_image_src_1x[1], 'height' => $small_image_src_1x[2], 'alt' => !empty(get_post_meta(get_post_thumbnail_id($post), '_wp_attachment_image_alt', true)) ? get_post_meta(get_post_thumbnail_id($post), '_wp_attachment_image_alt', true) : str_replace('_', ' ', get_the_title(get_post_thumbnail_id($post))), 'class' => '']) : '';
									$post_url = brand_url('/orthodontic-blog/'.basename(get_permalink($post)).'/');

									partial('widget.blog.small', [
										'image' => $small_image,
										'content' => [
											'h3' => $post->post_title,
											'h3_classes' => ['h4', 'white'],
											'categories' => wp_get_post_categories($post->ID),
											'copy' => excerptizeCharacters(do_shortcode($post->post_content), 198),
											'cta' => [
												'href' => $post_url,
												'classes' => ['cta', 'text', 'white'],
												'text' => 'Read article'
											]
										]
									]);
								}
							?>
						</div>
					</div>
					<? /*<? if($found_posts >= 5): ?>
					<a id="load-more" href="#" data-page="2" class="cta primary">Load more</a>
					<? endif ?> */ ?>
				</div>
				<? partial('widget.blog.sidebar'); ?>
			</div>
		</div>
	</div>
</section>
