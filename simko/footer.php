	
<?
	partial('section.footer');
	wp_footer();
	$brand = is_brand();
	if( $brand->ID === 13032 || $brand->ID === 13590){
		echo do_shortcode('[gtranslate]')
	}	
?>

		</main>
	</body>
</html>