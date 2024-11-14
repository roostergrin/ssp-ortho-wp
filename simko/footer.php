	
<?
	partial('section.footer');
	wp_footer();
	$brand = is_brand();
?>
<?php if( $brand->ID === 13032 || $brand->ID === 13590): ?>
	echo do_shortcode('[gtranslate]');
<?php endif; ?>	
		</main>
	</body>
</html>