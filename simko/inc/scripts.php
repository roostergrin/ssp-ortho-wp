<?

add_action('wp_default_scripts', function($wp_scripts) { # Moves jQuery to the footer
	if(is_admin()) return;
	$wp_scripts->add_data('jquery', 'group', 1);
	$wp_scripts->add_data('jquery-core', 'group', 1);
	$wp_scripts->add_data('jquery-migrate', 'group', 1);
});

add_filter('script_loader_tag', function ($tag, $handle) {
	if ( 'google-map-api' !== $handle )
		return $tag;
	return str_replace( ' src', ' defer src', $tag );
}, 10, 2);

if( !is_local() ){
	add_action('admin_enqueue_scripts', function() {
		wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/css/admin-style.css', [], filemtime(get_stylesheet_directory().'/css/admin-style.css'));
	});
}

add_action('wp_enqueue_scripts', function() {
	$brand = is_brand();
	$location = is_location();

	if(is_admin()) return;

	wp_enqueue_style('style', get_stylesheet_directory_uri().'/css/style.css', [], filemtime(get_stylesheet_directory().'/css/style.css'));

	if(!is_admin()) {
		wp_enqueue_script('lib-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', [], null, true);
		wp_enqueue_script('lib-mask', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js', [], null, true);
		wp_enqueue_style('lib-animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', [], false, 'all');
		wp_enqueue_style('lib-fileuploader', get_stylesheet_directory_uri().'/lib/fileuploader/dist/jquery.fileuploader.min.css', [], false, 'all');

		wp_enqueue_script('internal-global', get_stylesheet_directory_uri().'/js/jquery.global.js', ['lib-jquery'], filemtime(get_stylesheet_directory().'/js/jquery.global.js'), true);
		wp_add_inline_script('internal-global', 'var wp_vars = ' . json_encode([
			'ajaxUrl' => admin_url('admin-ajax.php'),
			'wpAction' => 'set_interstitial_user_session'
		]), 'before');
		
		wp_enqueue_script('youtube-video', get_stylesheet_directory_uri().'/js/jquery.youtube-video.js', ['lib-jquery'], filemtime(get_stylesheet_directory().'/js/jquery.youtube-video.js'), true);
		wp_enqueue_script('lib-fileuploader', get_stylesheet_directory_uri().'/lib/fileuploader/dist/jquery.fileuploader.min.js', ['lib-jquery'], filemtime(get_stylesheet_directory().'/lib/fileuploader/dist/jquery.fileuploader.min.js'), true);
		wp_register_script('internal-forms', get_stylesheet_directory_uri().'/js/jquery.forms.js', ['lib-jquery', 'lib-mask'], filemtime(get_stylesheet_directory().'/js/jquery.forms.js'), true);
		wp_localize_script('internal-forms', 'ajaxurl', get_stylesheet_directory_uri().'/inc/ajax-handler.php');
		wp_localize_script('internal-forms', 'google_recaptcha_configuration', [
			'site_key' => $brand->recaptcha_site_key,
			'selector_id' => 'google-recaptcha-container',
			'widget_id' => null,
		]);
		wp_enqueue_style('lib-datetimepicker', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.min.css', [], false, 'all');
		wp_enqueue_script('lib-datetimepicker', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js', ['lib-jquery'], null, true);
		wp_enqueue_script('internal-forms');

		// Blog
		if (strstr(get_page_template(), 'blog') || is_single() || strstr(get_page_template(), 'archive')) {
			$entity_id = !empty($location) ? $location->ID : $brand->ID;
			wp_enqueue_script('internal-blog', get_stylesheet_directory_uri().'/js/jquery.blog.js', ['lib-jquery'], filemtime(get_stylesheet_directory().'/js/jquery.blog.js'), true);
			wp_localize_script('internal-blog', 'ajax', [
				'url' => admin_url('admin-ajax.php'),
				'action' => 'blog_page',
				'posts_per_page' => 4,
				'post_type' => 'post',
				'e_id' => $entity_id,
				't_id' => absint(get_query_var('cat') ?? 0),
			]);
		}

		// Google Recaptcha'
		wp_register_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js?render=explicit&onload=onGoogleReCaptchaLoad', [], null, true);

		// Mobile Menu
		wp_enqueue_script('mobile-menu', get_stylesheet_directory_uri().'/js/jquery.mobile-menu.js', ['lib-jquery'],  filemtime(get_stylesheet_directory().'/js/jquery.mobile-menu.js'), true);

		// Validation
		wp_register_script('jquery-validate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js', ['lib-jquery'], '1.17.0', true);
		wp_register_script('jquery-form-validator', get_stylesheet_directory_uri().'/js/jquery.form-validator.js', ['lib-jquery','jquery-validate'],  filemtime(get_stylesheet_directory().'/js/jquery.form-validator.js'), true);

        // Cookies
		wp_register_script('lib-javascript-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', [], null, true);

		// Google Maps
        //wp_register_script('lib-google-maps', 'https://maps.googleapis.com/maps/api/js?libraries=places,geometry&language=en-US&key=AIzaSyAZtUmSEmDI7RQfXr9ly8hPqRyj88S3ZUM&language=en&region=us', [], null, true);
		wp_register_script('lib-google-maps', 'https://maps.googleapis.com/maps/api/js?libraries=places,geometry&language=en-US&key='.$brand->google_maps_api_key.'&region=us', [], null, true);
		wp_register_script('internal-lib-google-maps-infobox', get_template_directory_uri().'/js/lib.google-maps-infobox.js', ['lib-google-maps'], filemtime(get_template_directory().'/js/lib.google-maps-infobox.js'), true);
		wp_register_script('location-single-map', get_template_directory_uri().'/js/jquery.map-single.js', ['lib-jquery', 'internal-storage', 'lib-google-maps', 'internal-lib-google-maps-infobox'], filemtime(get_template_directory().'/js/jquery.map-single.js'), true);
		//wp_register_script('internal-map-bio', get_template_directory_uri().'/js/jquery.map-bio-page.js', ['lib-jquery', 'internal-storage', 'lib-google-maps', 'internal-lib-google-maps-infobox'], filemtime(get_template_directory().'/js/jquery.map-bio-page.js'), true);
		wp_register_script('internal-map', get_template_directory_uri().'/js/jquery.map.js', ['internal-lib-google-maps-infobox', 'internal-storage'], filemtime(get_template_directory().'/js/jquery.map.js'), true);


		wp_enqueue_script('internal-storage', get_template_directory_uri().'/js/jquery.storage.js', ['lib-jquery'], null, true);
		wp_register_script('masked-input', get_stylesheet_directory_uri().'/js/jquery.maskedinput.min.js', ['lib-jquery'],  filemtime(get_stylesheet_directory().'/js/jquery.maskedinput.min.js'), true);
		wp_register_script('internal-smile-gallery', get_stylesheet_directory_uri().'/js/jquery.smile-gallery.js', ['lib-jquery'],  filemtime(get_stylesheet_directory().'/js/jquery.smile-gallery.js'), true);
        wp_register_script('internal-smile-gallery-page', get_stylesheet_directory_uri().'/js/jquery.smile-gallery-page.js', ['lib-jquery'],  filemtime(get_stylesheet_directory().'/js/jquery.smile-gallery-page.js'), true);

		// Carousels
		wp_register_script('internal-custom-carousel', get_stylesheet_directory_uri().'/js/jquery.custom-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.custom-carousel.js'), true);
		wp_register_script('internal-testimonials-carousel', get_stylesheet_directory_uri().'/js/jquery.testimonials-carousel.js', ['lib-jquery'],  filemtime(get_stylesheet_directory().'/js/jquery.testimonials-carousel.js'), true);
		wp_register_style('lib-owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], false, 'all');
		wp_register_script('lib-owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', ['lib-jquery'], '2.3.4', true);
		wp_register_script('internal-smile-gallery', get_stylesheet_directory_uri().'/js/jquery.smile-gallery.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.smile-gallery.js'), true);
		wp_register_script('internal-providers-carousel', get_stylesheet_directory_uri().'/js/jquery.providers-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.providers-carousel.js'), true);
		wp_register_script('internal-hero-carousel', get_stylesheet_directory_uri().'/js/jquery.hero-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.hero-carousel.js'), true);
		wp_register_script('internal-logo-carousel', get_stylesheet_directory_uri().'/js/jquery.logo-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.logo-carousel.js'), true);
		wp_register_script('internal-braces-carousel', get_stylesheet_directory_uri().'/js/jquery.braces-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.braces-carousel.js'), true);
		wp_register_script('internal-events-carousel', get_stylesheet_directory_uri().'/js/jquery.events-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.events-carousel.js'), true);
		wp_register_script('internal-invisalign-carousel', get_stylesheet_directory_uri().'/js/jquery.invisalign-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.invisalign-carousel.js'), true);
		wp_register_script('internal-icons-carousel', get_stylesheet_directory_uri().'/js/jquery.icons-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.icons-carousel.js'), true);
		wp_register_script('internal-tri-carousel', get_stylesheet_directory_uri().'/js/jquery.tri-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.tri-carousel.js'), true);
		wp_register_script('internal-copy-tri-carousel', get_stylesheet_directory_uri().'/js/jquery.copy-tri-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.copy-tri-carousel.js'), true);
		wp_register_script('internal-providers-tri-carousel', get_stylesheet_directory_uri().'/js/jquery.providers.tri-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.providers.tri-carousel.js'), true);
		wp_register_script('internal-all-ages-carousel', get_stylesheet_directory_uri().'/js/widget/jquery.all-ages-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/widget/jquery.all-ages-carousel.js'), true);
		wp_register_script('internal-personalized-treatments-carousel', get_stylesheet_directory_uri().'/js/jquery.personalized-treatments-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.personalized-treatments-carousel.js'), true);
		wp_register_script('internal-three-cols-cards', get_stylesheet_directory_uri().'/js/jquery.three-cols-cards.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.three-cols-cards.js'), true);		
		wp_register_script('internal-consultation-carousel', get_stylesheet_directory_uri().'/js/jquery.consultation-carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.consultation-carousel.js'), true);
		wp_register_script('internal-copy-with-image', get_stylesheet_directory_uri().'/js/jquery.copy-with-image.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/jquery.copy-with-image.js'), true);

		// Partials
		wp_register_script('internal-hero-full', get_stylesheet_directory_uri().'/js/section/hero/jquery.full.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/section/hero/jquery.full.js'), true);
		wp_register_script('internal-invisalign-aligner-carousel', get_stylesheet_directory_uri().'/js/section/service/invisalign/jquery.carousel.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/section/service/invisalign/jquery.carousel.js'), true);
		wp_register_script('internal-invisalign-faq-boxes', get_stylesheet_directory_uri().'/js/section/faq/jquery.boxes.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/section/faq/jquery.boxes.js'), true);
		wp_register_script('internal-hero-full-invisalign', get_stylesheet_directory_uri().'/js/section/hero/jquery.full-invisalign.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/section/hero/jquery.full-invisalign.js'), true);
		wp_register_script('internal-jquery-three-cols-cards', get_stylesheet_directory_uri().'/js/section/service/jquery.three-cols-cards.js', ['lib-jquery', 'lib-owl-carousel'],  filemtime(get_stylesheet_directory().'/js/section/service/jquery.three-cols-cards.js'), true);
		wp_register_script('internal-jquery-for-ages', get_stylesheet_directory_uri().'/js/section/service/jquery.for-ages.js', ['lib-jquery'],  filemtime(get_stylesheet_directory().'/js/section/service/jquery.for-ages.js'), true);
		wp_register_script('internal-video-full-with-text', get_stylesheet_directory_uri().'/js/section/video-full-with-text.js', ['lib-jquery'],  filemtime(get_stylesheet_directory().'/js/section/video-full-with-text.js'), true);
		wp_register_script('internal-two-cols-carousel-with-image', get_stylesheet_directory_uri().'/js/section/icons/two-cols-carousel-with-image.js', ['lib-jquery'],  filemtime(get_stylesheet_directory().'/js/section/icons/two-cols-carousel-with-image.js'), true);
		
		// Legwork stuff
		wp_register_script('legwork', get_stylesheet_directory_uri().'/js/legwork.js', ['lib-jquery'], NULL, true);
		wp_register_script('legwork-jq', 'https://demo.legwork.dev/assets/jquery.js', [], NULL, true);
		wp_register_script('legwork-forms', 'https://demo.legwork.dev/assets/forms.js', ['legwork-jq'], NULL, true);
	}
});
