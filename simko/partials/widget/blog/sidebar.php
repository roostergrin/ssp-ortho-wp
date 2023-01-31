<? global $wp; $brand = is_brand(); ?>
<div class="widget blog sidebar-container">
	<div class="inner-container">
		<? if (isset($back)) : ?>
			<a href="<?= brand_url('orthodontic-blog'); ?>" class="cta text back-to-blog">Back to blog</a>
		<? endif; ?>
		<h3 class="h5 primary"><?= $brand->blog_sidebar_heading; ?></h3>
		<?= property_exists($brand, 'blog_sidebar_content') ? apply_filters('the_content', $brand->blog_sidebar_content) : ''; ?>
		<ul class="category-list">
			<? foreach (list_brand_categories() as $category) : ?>
				<?if( $category->name === 'Hidden' ) continue;?>
				<li><a href="<?= brand_url('/'.get_relative_url((get_category_link($category))).'/'); ?>"<?= basename($wp->request) == $category->slug ? ' class="active"' : ''; ?>><?= $category->name; ?></a></li>
			<? endforeach; ?>
		</ul>
	</div>
</div>
