<?

//=====================================[AUTOLOADER]=====================================//
spl_autoload_register(function($class_name) {
    if (strstr($class_name, '\\')) { // This allows us to use namespaces
        $class_name = explode('\\', $class_name);
        $class_name = end($class_name);
    }
    $file = get_stylesheet_directory().'/inc/classes/'.$class_name.'.php'; if(file_exists($file)) { include_once $file; return; }
});

//=====================================[GLOBAL CLASS INSTANCES]=====================================//
add_action('login_enqueue_scripts', function() {
    $brand = is_brand();
    ob_start();
    ?>
    <style type="text/css">
        .login {
            background: #eaeaea;
        }
        .login #backtoblog a, .login #nav a {
            color: #418ce1 !important;
        }
        .login form {
            background: #418ce1 !important;
        }
        .login label {
            color: #fff !important;
        }
        #login h1 a, .login h1 a {
            background-image: url("<?= wp_get_attachment_url($brand->logo_desktop) ?>");
            height:111px;
            width:320px;
            background-size: 320px 111px;
            background-repeat: no-repeat;
        }
        .wp-core-ui .button-primary {
            background: #ffffff !important;
            border-color: #ffffff !important;
            box-shadow: none !important;
            color: #418ce1 !important;
            text-decoration: none !important;
            text-shadow: none !important;
            font-weight: bold;
            border-radius: 0 !important;
        }
        .login #login_error {
            border-left: 4px solid #eb5847 !important;
        }
        .login .message {
            border-left: 4px solid #418ce1 !important;
        }
    </style>
    <?
    echo ob_get_clean();
});

add_filter('login_headerurl', function() { return home_url(); });

add_action('init', function() {
    if(isset($_GET['rebuild'])) flush_rewrite_rules(true);
    elseif(isset($_GET['purge-cache']) && function_exists('w3tc_flush_all')) {
        w3tc_flush_all();
        echo 'Cache purged!';
        die;
    }
});

add_action('wp_footer', function() {
    echo '<div id="google-recaptcha-container"></div>';

});

$header_classes = [];
$navigation = null;

add_action('wp_head', function() {
    $brand = is_brand();    

    if(get_page_template_slug() === 'templates/leg-three.php' || get_page_template_slug() === 'templates/leg-four.php') {
        ?>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <?
    }
    ?>

    <link rel="shortcut icon" href="<?= wp_get_attachment_image_url($brand->favicon); ?>" type="image/png" />

    <? if(!is_live()) return; ?>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?= $brand->gtm_container_id ?>');</script>

    <?    
        $g_measurement_id = get_field('brand_ga4_measurement_id', $brand->ID); 
        if($g_measurement_id):
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $g_measurement_id; ?>"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?= $g_measurement_id; ?>');
    </script>
    <? endif; 
});

add_action('body', function() {
    if(!is_live()) return;
    $brand = is_brand();
    ?>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $brand->gtm_container_id ?>"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?
});

if (is_dev()) {
    add_action('wp_footer', function() { ?>
        <script>
            window.markerConfig = {
                destination: '5ffcd104e453f769b2e9e2e1',
            };
        </script>
        <script>
            !function(e,r,t){if(e.__Marker)return;e.__Marker={};var n=r.createElement("script");n.async=1,n.src="https://edge.marker.io/latest/shim.js";var s=r.getElementsByTagName("script")[0];s.parentNode.insertBefore(n,s)}(window,document);
        </script>
        <?
    });
}

// Fix WordPress file naming conventions for media uploads
// add_action('init', function() {
// 	if ($_SERVER['REMOTE_ADDR']) {
// 		add_filter('wp_get_attachment_metadata', function($data) {
// 			foreach ($data['sizes'] as $image_size => $data) {
// 				$width = $data['width'];
// 				$height = $data['height'];
// 				$data['sizes'][$image_size]['file'] = str_replace('-'.$width.'x'.$height, $image_size, '-'.$data['sizes'][$image_size]['file']);
// 			}
// 			return $data;
// 		});

// 		add_filter('wp_handle_upload_prefilter', function($file) {
// 			if (!empty($_REQUEST['post'])) {
// 				// Gutenberg REST request
// 				$parent = get_post(absint($_REQUEST['post']));
// 				$post_name = $parent->post_title;
// 			} elseif (!empty($_REQUEST['post_id'])) {
// 				// Media Manager AJAX request
// 				$parent = get_post(absint($_REQUEST['post_id']));
// 				$post_name = $parent->post_title;
// 			} else {
// 				$post_name = 'No parent';
// 			}

// 			if (is_user_logged_in()) {
// 				$user = wp_get_current_user();
// 				$user_name = $user->display_name;
// 			} else {
// 				$user_name = 'Not logged in';
// 			}

// 			$pathinfo = pathinfo($file['name']);
// 			$file['name'] = $post_name.'.'.$pathinfo['extension'];
// 			return $file;
// 		}, 10, 1);
// 	}
// });

add_action('after_setup_theme', function() {
    add_theme_support('post-thumbnails');

    // Blog hero 1x and 2x image sizes with 16 cropped orientations
    foreach (['left', 'center', 'right'] as $w) {
        foreach (['top', 'center', 'bottom'] as $h) {
            foreach ([1, 2] as $density) {
                add_image_size('blog_'.$w.'_'.$h.'_'.$density.'x', 817*$density, 450*$density, [$w, $h]);
            }
        }
    }

    require_once get_stylesheet_directory().'/lib/MDG/autoload.php';
    require_once get_stylesheet_directory().'/inc/utility-functions.php';

    # Theme-related
    global $brands; 					$brands = new Brands();
    global $providers; 					$providers = new Providers();
    global $locations; 					$locations = new Locations();
    global $regions; 					$regions = new Regions();    
    global $edu_associations; 			$edu_associations = new EducationalAssociations();
    global $pro_affiliations; 			$pro_affiliations = new ProfessionalAffiliations();
    global $reviews; 					$reviews = new Reviews();
    global $smile_transformations; 		$smile_transformations = new SmileTransformations();
    global $insurance_providers; 		$insurance_providers = new InsuranceProviders();
    global $events; 					$events = new Events(); // restore when Confidence Counts is ready to go live

    # Preserve ordering for the following:
    global $site_404_settings;			$site_404_settings = new \MDG\Site404Settings();
    global $forms; 						$forms = new \MDG\Forms();
    global $structured_data;			$structured_data = new \MDG\StructuredData();

    if (is_live()) {
        global $optimize;				$optimize = new \MDG\Optimize();
    }

    include_once get_stylesheet_directory() . '/inc/acf.php';
});

//=====================================[SELECT 2 HOOKS]=====================================//
function add_icon_selection_fields($key) {
    add_filter($key, function($field) {
        $field['choices'] = [
            '100-green' => '<span class="icon-adjust" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/100-green.svg" height="20" />&nbsp;&nbsp;100</span>',
            '3d-scan' => '<span class="icon-adjust" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_3d-scan.svg" height="20" />&nbsp;&nbsp;3D Scan</span>',
            'adjust' => '<span class="icon-adjust" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/dental-monitoring_greater-control.svg" height="20" />&nbsp;&nbsp;Adjust Icon</span>',
            'general_time' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/general_time.svg" height="20" />&nbsp;&nbsp;General Time Icon</span>',
            'badge' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_flexible-financing.svg" height="20" />&nbsp;&nbsp;Badge Icon</span>',
            'bandaid' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/orthodontic-emergency_injury.svg" height="20" />&nbsp;&nbsp;Bandaid Icon</span>',
            'calculator-animation' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_financing-consultation.svg" height="20" />&nbsp;&nbsp;Calculator Animation</span>',
            'calculator' => '<span class="icon-calculator white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_financing-consultation.svg" height="20" />&nbsp;&nbsp;Calculator Icon</span>',
            'calculator2' => '<span class="icon-calculator white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/calculator2.svg" height="20" />&nbsp;&nbsp;Calculator2 Icon</span>',
            'care-and-maintenance_aligners' => '<span class="icon-care-and-maintenance_aligners white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/care-and-maintenance_aligners.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Aligners</span>',
            'care-and-maintenance_brush-and-paste' => '<span class="icon-care-and-maintenance_brush-and-paste white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/care-and-maintenance_brush-and-paste.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Brush and Paste</span>',
            'care_and_maintenance_dental_mold' => '<span class="icon-care_and_maintenance_dental_mold white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/care-and-maintenance_dental-mold-preview-only.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Dental Mold</span>',
            'care-and-maintenance_disinfect-foam' => '<span class="icon-care-and-maintenance_disinfect-foam white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/care-and-maintenance_disinfect-foam.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Disinfectant Foam</span>',
            'care-and-maintenance_floss' => '<span class="icon-icon-care-and-maintenance_floss white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/care-and-maintenance_floss.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Floss</span>',
            'care-and-maintenance_pets' => '<span class="icon-icon-care-and-maintenance_pets white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/care-and-maintenance_pets.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Pets</span>',
            'care-and-maintenance_rinse' => '<span class="icon-icon-care-and-maintenance_rinse white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/care-and-maintenance_rinse.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Rinse</span>',
            'care-and-maintenance_replace' => '<span class="icon-icon-care-and-maintenance_replace white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/care-and-maintenance_replace.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Replace</span>',
            'care-and-maintenance_xylitol-mints' => '<span class="icon-icon-care-and-maintenance_xylitol-mints white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/care-and-maintenance_xylitol-mints.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Xylitol Mints</span>',
            'clarity-clear' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/orthodontic-illustrations-clarity-clear.svg" height="20" />&nbsp;&nbsp;Clarity Clear Icon</span>',
            'foods-to-avoid_high-sugar-or-acidic' => '<span class="icon-icon-foods-to-avoid_high-sugar-or-acidic white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/foods-to-avoid_high-sugar-or-acidic.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Avoid Sugar</span>',
            'foods-to-avoid_cut-food' => '<span class="icon-icon-foods-to-avoid_cut-food white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/foods-to-avoid_cut-food.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Cut Food</span>',
            'foods-to-avoid_soft-food' => '<span class="icon-icon-foods-to-avoid_soft-food white" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/foods-to-avoid_soft-food.svg" height="20" />&nbsp;&nbsp;Care and Maintenance - Soft Food</span>',
            'chair-animation' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_orthodontic-treatment.svg" height="20" />&nbsp;&nbsp;Chair Animation</span>',
            'chair' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_orthodontic-treatment.svg" height="20" />&nbsp;&nbsp;Chair Icon</span>',
            'check-mark' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/general_check_mark.svg" height="20" />&nbsp;&nbsp;Check Mark Icon</span>',
            'clear-aligners' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/shifting-teeth.svg" height="20" />&nbsp;&nbsp;Clear Aligners Icon</span>',
            'compassion' => '<span class="icon-completed" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/commitment_compassion.svg" height="20" />&nbsp;&nbsp;Compassion Icon</span>',
            'completed' => '<span class="icon-completed" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/invisalign_treatment-complete.svg" height="20" />&nbsp;&nbsp;Completed Icon</span>',
            'dental-exam' => '<span class="icon-completed" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/dental-exam.svg" height="20" />&nbsp;&nbsp;Dental Exam Icon</span>',
            'dental-monitoring_high-quality-care' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/dental-monitoring_high-quality-care.svg" height="20" />&nbsp;&nbsp;Dental Monitoring High Quality Icon</span>',
            'dental-monitoring_optimized-treatment' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/dental-monitoring_optimized-treatment.svg" height="20" />&nbsp;&nbsp;Dental Monitoring Graph Icon</span>',
            'dental-monitoring_weekly-feedback' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/dental-monitoring_weekly-feedback.svg" height="20" />&nbsp;&nbsp;Dental Monitoring Calendar Icon</span>',
            'dollar' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_price-match.svg" height="20" />&nbsp;&nbsp;Dollar Icon</span>',
            'single-dollar' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_price-match.svg" height="20" />&nbsp;&nbsp;Single Dollar Icon</span>',
            'palatal-expanders' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/orthodontic-illustrations_palatal-expander.svg" height="20" />&nbsp;&nbsp;Palatal Expanders Icon</span>',
            'family' => '<span class="icon-family" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/invisalign_audience.svg" height="20" />&nbsp;&nbsp;Family Icon</span>',
            'female-mouth-lips' => '<span class="icon-female-mouth-lips" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/female-mouth-lips.svg" height="20" />&nbsp;&nbsp;Female Mouth Icon</span>',
            'football-helmet' => '<span class="icon-footbal-helmet" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/football-helmet.svg" height="20" />&nbsp;&nbsp;Footbal Helmet Icon</span>',
            'forsus-spring' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/orthodontic-illustrations-forsus-spring.svg" height="20" />&nbsp;&nbsp;Forsus Spring</span>',
            'fun' => '<span class="icon-female-mouth-lips" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/commitment_fun.svg" height="20" />&nbsp;&nbsp;Fun Icon</span>',
            'gratitude' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/commitment_gratitude.svg" height="20" />&nbsp;&nbsp;Gratitude Icon</span>',
            'hand-clap' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/hand-clap-large.svg" height="20" />&nbsp;&nbsp;Hand Clap</span>',
            'hand-clap-dtm' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/hand-clap-large-dtm.svg" height="20" />&nbsp;&nbsp;Hand Clap (DTM)</span>',
            'hand-clap-pgo' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/hand-clap-large-pgo.svg" height="20" />&nbsp;&nbsp;Hand Clap (PGO)</span>',
            'herbst-appliance' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/orthodontic-illustrations_herbst-appliance.svg" height="20" />&nbsp;&nbsp;Herbst Appliance Icon</span>',
            'improved-oral-health' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/improved-oral-health-mod.svg" height="20" />&nbsp;&nbsp;Improved Health Icon</span>',
            'infection' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/orthodontic-emergency_infection.svg" height="20" />&nbsp;&nbsp;Infection Icon</span>',
            'integrity' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/commitment_integrity.svg" height="20" />&nbsp;&nbsp;Integrity Icon</span>',
            'interarch-bands' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/orthodontic-illustrations_interarch-bands.svg" height="20" />&nbsp;&nbsp;Interarch Bands Icon</span>',
            'itero' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/invisalign_iTero Scan.svg" height="20" />&nbsp;&nbsp;iTero Scan Icon</span>',
            'itero-scan' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/itero-scan.svg" height="20" />&nbsp;&nbsp;iTero Scan Icon 2</span>',
            'lightbulb' => '<span class="icon-lightbulb" style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/commitment_knowledge.svg" height="20" />&nbsp;&nbsp;Light Bulb Icon</span>',
            'monthly-payments-01' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/monthly-payments-01.svg" height="20" />&nbsp;&nbsp;Monthly Payments Icon 1</span>',
            'monthly-payments-02' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/monthly-payments-02.svg" height="20" />&nbsp;&nbsp;Monthly Payments Icon 2</span>',
            'morning-appointments' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_early-appointments.svg" height="20" />&nbsp;&nbsp;Morning Appointments Icon</span>',
            'office-locations' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_convenient-locations.svg" height="20" />&nbsp;&nbsp;Office Locations Icon</span>',
            'personalized-treatment-plan' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_personalized-treatment-plan.svg" height="20" />&nbsp;&nbsp;Personalized Treatment Plan Icon</span>',
            'preventative-maintenance' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/preventative_maintenance.svg" height="20" />&nbsp;&nbsp;Preventative Maintenance Icon</span>',
            'quad-helix' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/orthodontic-illustrations-quad-helix.svg" height="20" />&nbsp;&nbsp;Quad Helix</span>',
            'quiet-audible' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/quiet-audible.svg" height="20" />&nbsp;&nbsp;Quiet Audible</span>',
            'safety_dont-touch' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_dont-touch.svg" height="20" />&nbsp;&nbsp;Safety Don’t Touch Icon</span>',
            'safety_hand-sanitizer' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_hand-sanitizer.svg" height="20" />&nbsp;&nbsp;Safety Hand Sanitizer Icon</span>',
            'safety_hand-washing' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_hand-washing.svg" height="20" />&nbsp;&nbsp;Safety Hand Washing Icon</span>',
            'safety_limit-people' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_limit-people.svg" height="20" />&nbsp;&nbsp;Safety Limit People Icon</span>',
            'safety_mask' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_mask.svg" height="20" />&nbsp;&nbsp;Saftey Mask Icon</span>',
            'safety_personal-protective-equipment' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_personal-protective-equipment.svg" height="20" />&nbsp;&nbsp;Safety Personal Protective Equipment Icon</span>',
            'safety_refreshments' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_refreshments.svg" height="20" />&nbsp;&nbsp;Safety Refreshments Icon</span>',
            'safety_sanitization' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_sanitization.svg" height="20" />&nbsp;&nbsp;Safety Sanitation Icon</span>',
            'safety_seating' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_seating.svg" height="20" />&nbsp;&nbsp;Safety Seating Icon</span>',
            'safety_social-distancing' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_social-distancing.svg" height="20" />&nbsp;&nbsp;Safety Social Distancing Icon</span>',
            'safety_temperature' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/safety_temperature.svg" height="20" />&nbsp;&nbsp;Safety Temperature Check Icon</span>',
            'shifting-teeth' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/shifting-teeth.svg" height="20" />&nbsp;&nbsp;Shifting Teeth Icon</span>',
            'sign' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_no-referral-necessary.svg" height="20" />&nbsp;&nbsp;Sign Icon</span>',
            'smiles' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/smile.svg" height="20" />&nbsp;&nbsp;Smile Icon</span>',
            'smile-red-lips-teeth' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/smile-red-lips-teeth.svg" height="20" />&nbsp;&nbsp;Smile Colored</span>',
            'success-planning' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_success-planning.svg" height="20" />&nbsp;&nbsp;Success Planning Icon</span>',
            'sunglasses-smiley' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/sunglasses-smiley.svg" height="20" />&nbsp;&nbsp;Sunglasses Smiley Icon</span>',
            'teamwork' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/commitment_teamwork.svg" height="20" />&nbsp;&nbsp;Teamwork Icon</span>',
            'tooth-plus' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/tooth-plus.svg" height="20" />&nbsp;&nbsp;Tooth Plus Icon</span>',
            'tooth-shine' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/orthodontic-emergency_significant-pain.svg" height="20" />&nbsp;&nbsp;Tooth Shining Icon</span>',
            'traditional-braces' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/orthodontic-illustrations_traditional-braces.svg" height="20" />&nbsp;&nbsp;Traditional Braces Icon</span>',
            'trophy' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/trophy.svg" height="20" />&nbsp;&nbsp;Trophy Icon</span>',
            'virtual-consultations_smartphone' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/virtual-consultations_smartphone.svg" height="20" />&nbsp;&nbsp;Virtual Consultations Smartphone Icon</span>',
            'virtual-consultations_personalized-report' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/virtual-consultations_personalized-report.svg" height="20" />&nbsp;&nbsp;Virtual Consultations Personalized Report Icon</span>',
            'virtual-consultations_contact-form' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/virtual-consultations_contact-form.svg" height="20" />&nbsp;&nbsp;Virtual Consultations Contact Form Icon</span>',
            'virtual-consultations_upload' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/virtual-consultations_upload.svg" height="20" />&nbsp;&nbsp;Virtual Consultations Upload</span>',
            'virtual-consultations_personalized-report-pie-charts' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/virtual-consultations_personalized-report-pie-charts.svg" height="20" />&nbsp;&nbsp;Virtual Consultations Chart</span>',
            'general_forms' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/general_forms.svg" height="20" />&nbsp;&nbsp;General Forms Icon</span>',
            'hourglass' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/hourglass.svg" height="20" />&nbsp;&nbsp;Hourglass Icon</span>',
            'humans-sitting' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/humans-sitting.svg" height="20" />&nbsp;&nbsp;Humans Sitting Icon</span>',
            'xrays' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/benefit_digital-x-rays.svg" height="20" />&nbsp;&nbsp;X-Rays Icon</span>',
            'digital-xrays' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/digital-xrays.svg" height="20" />&nbsp;&nbsp;Digital X-Rays Icon</span>',
            'insurance' => '<span style="display:flex;align-items:center;line-height:20px;"><img src="'.(get_stylesheet_directory_uri()).'/images/icons/insurance-icon-active.svg" height="20" />&nbsp;&nbsp;Insurance Icon</span>',
        ];

        return $field;
    }, 10, 3);
}

add_icon_selection_fields('acf/load_field/key=brand_section_two_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=brand_section_two_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=brand_section_two_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=brand_section_two_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=brand_section_six_icon');
add_icon_selection_fields('acf/load_field/key=location_section_two_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=location_section_two_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=location_section_two_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=location_section_two_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=location_section_twelve_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_three_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_three_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_three_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_seven_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_seven_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_four_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_four_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_four_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_four_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_seven_step_1_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_seven_step_1_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_seven_step_1_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_seven_step_2_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_seven_step_2_point_five_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_ten_faq_1_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_ten_faq_2_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_ten_faq_3_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_ten_faq_4_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_ten_faq_5_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_section_ten_faq_6_icon');
add_icon_selection_fields('acf/load_field/key=virtual_monitoring_section_three_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=virtual_monitoring_section_three_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=virtual_monitoring_section_three_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=virtual_monitoring_section_three_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=patient_care_philosophy_section_four_icons_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=patient_care_philosophy_section_four_icons_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=patient_care_philosophy_section_four_icons_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=patient_care_philosophy_section_four_icons_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=patient_care_philosophy_section_seven_icon_select_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_three_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_three_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_four_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_four_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_four_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_four_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_five_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_five_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_five_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_five_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_six_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_six_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_six_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=safer_orthodontic_care_section_six_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_two_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_two_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_two_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_two_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_four_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_four_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_four_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_four_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_five_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_five_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_five_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_five_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_six_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_six_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_six_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=orthodontic_care_and_maintenance_section_six_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=emergency_care_and_repair_section_two_icon_1');
add_icon_selection_fields('acf/load_field/key=emergency_care_and_repair_section_two_icon_2');
add_icon_selection_fields('acf/load_field/key=financing_section_three_icon_1');
add_icon_selection_fields('acf/load_field/key=financing_section_three_icon_2');
add_icon_selection_fields('acf/load_field/key=financing_section_three_icon_3');
add_icon_selection_fields('acf/load_field/key=financing_section_three_icon_4');
add_icon_selection_fields('acf/load_field/key=free_consultation_section_two_icon_select_icon');
add_icon_selection_fields('acf/load_field/key=free_consultation_section_five_icon_select_icon');
add_icon_selection_fields('acf/load_field/key=patient_forms_section_two_icon_select_icon');
add_icon_selection_fields('acf/load_field/key=why_orthodontic_treatment_section_twelve_graph_2_level_2_icon');
add_icon_selection_fields('acf/load_field/key=custom_mouthguard_section_two_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=custom_mouthguard_section_two_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=custom_mouthguard_section_two_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=custom_mouthguard_section_two_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_four_slides_slide_1_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_four_slides_slide_2_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_four_slides_slide_3_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_four_slides_slide_4_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_four_slides_slide_5_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_four_slides_slide_6_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_four_slides_slide_7_icon');
add_icon_selection_fields('acf/load_field/key=braces_section_four_slides_slide_8_icon');
add_icon_selection_fields('acf/load_field/key=why_orthodontic_treatment_section_seven_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_virtual_care_section_two_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_virtual_care_section_two_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_virtual_care_section_two_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_virtual_care_section_four_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_virtual_care_section_four_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_virtual_care_section_four_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=invisalign_virtual_care_section_four_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=sleep_apnea_section_nine_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=sleep_apnea_section_nine_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=sleep_apnea_section_nine_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=sleep_apnea_section_nine_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=confidence_counts_section_three_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=confidence_counts_section_three_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=confidence_counts_section_three_icon_3_icon');
add_icon_selection_fields('acf/load_field/key=confidence_counts_section_three_icon_4_icon');
add_icon_selection_fields('acf/load_field/key=confidence_counts_section_three_icon_5_icon');
add_icon_selection_fields('acf/load_field/key=confidence_counts_section_three_icon_6_icon');
add_icon_selection_fields('acf/load_field/key=confidence_counts_section_four_icon_1_icon');
add_icon_selection_fields('acf/load_field/key=confidence_counts_section_four_icon_2_icon');
add_icon_selection_fields('acf/load_field/key=confidence_counts_section_four_icon_3_icon');

//=====================================[Custom Columns for Posts & Pages]=====================================//
add_filter('manage_post_posts_columns', function($columns) {
    $columns = [
        'cb' => $columns['cb'],
        'title' => $columns['title'],
        'author' => $columns['author'],
        'categories' => $columns['categories'],
        'brands' => __('Brands Relationship', 'post'),
        'date' => $columns['date'],
        'seotitle' => $columns['seotitle'],
        'seodesc' => $columns['seodesc'],
    ];

    return $columns;
}, 10, 1);

add_action('manage_post_posts_custom_column', function($column, $post_id) {
    switch ($column) {
        case 'brands':
            $brands = get_brands_for_post($post_id, 1);
            echo !empty($brands) ? implode(', ', $brands) : '—';
            break;
    }
}, 10, 2);

add_filter('manage_page_posts_columns', function($columns) {
    $columns = [
        'cb' => $columns['cb'],
        'title' => $columns['title'],
        'author' => $columns['author'],
        'brand' => __('Brand Relationship', 'post'),
        'parent' => __('Page Parent', 'post'),
        'date' => $columns['date'],
        'seotitle' => $columns['seotitle'],
        'seodesc' => $columns['seodesc'],
    ];

    return $columns;
}, 10, 1);

add_action('manage_page_posts_custom_column', function($column, $post_id) {
    switch ($column) {
        case 'brand':
            $brand = get_brand_for_page($post_id, 1);
            echo !empty($brand) ? implode(', ', $brand) : '-';
            break;
        case 'parent':
            $parent = get_parent_for_page($post_id, 1);
            echo !empty($parent) ? $parent : '-';
            break;
    }
}, 10, 2);

//=====================================[Filter Relationship & Post_Object fields]=====================================//
function filter_acf_queries($key) {
    add_filter($key, function($args, $field, $post_id) {                  
        $brand = is_brand();
        $brand_location_ids = wp_list_pluck(get_locations_for_brand($brand->ID), 'ID');
        $pattern = '("'.implode('"|"', $brand_location_ids).'")';
        
        foreach ($args['post_type'] as $post_type) {
            if ($post_type == 'post') {
                $args['meta_query'] = [
                    [
                        'key' => 'post_brand_relationship',
                        'value' => '"'.$brand->ID.'"',
                        'compare' => 'LIKE'
                    ]
                ];
            } 
            
            if ($post_type == 'page') {
                $args['meta_query'] = [
                    [
                        'key' => 'page_brand_relationship',
                        'value' => '"'.$brand->ID.'"',                        
                        'compare' => 'LIKE'
                    ]
                ];
            } 
            
            if ($post_type == 'provider') {
                $args['meta_query'] = [
                    [
                        'key' => 'provider_location_relationship',
                        'value' => $pattern,
                        'compare' => 'REGEXP'
                    ]
                ];
            } 
            
            if ($post_type == 'location') { 
                
                if( $field['key'] == 'brand_interstitial_locations_relationship' ) {
                    $args['meta_query'] = [
                        [
                            'key' => 'location_brand_relationship',
                            'value' => $post_id,
                            'compare' => 'LIKE'
                        ]
                    ];
                } else {
                    $args['meta_query'] = [
                        [
                            'key' => 'location_brand_relationship',
                            'value' => '"'.$brand->ID.'"',                            
                            'compare' => 'LIKE'
                        ]
                    ];
                }
            }
        }

        return $args;
    }, 10, 3);
}
filter_acf_queries('acf/fields/post_object/query');

/**
 * custom ACF relationship field filters
 */
add_filter('acf/fields/relationship/result/name=page_brand_relationship', function( $text, $post, $field, $post_id ) {
    $text .= ' - ' . ' brand';
    return $text;
}, 10, 4 );
add_filter('acf/fields/relationship/result/name=provider_brand_relationship', function( $text, $post, $field, $post_id ) {
    $text .= ' - ' . ' brand';
    return $text;
}, 10, 4 );
add_filter('acf/fields/relationship/result/name=provider_location_relationship', function( $text, $post, $field, $post_id ) {
    $text .= ' - ' . 'post ID: ' . $post->ID;
    return $text;
}, 10, 4 );
add_filter('acf/fields/relationship/result/name=insurance_provider_page_relationship', function( $text, $post, $field, $post_id ) {
    global $locations, $brands;

    $brand_id = get_post_meta($post->ID, 'page_brand_relationship', true);        
    $page_location_id = get_post_meta($post->ID, 'page_location_parent', true);
    if( !empty( $page_location_id ) ) {
        $text .= ' - ' .  $locations->locations[$page_location_id]->post_title;
    } else {
        if( !empty($brand_id)) {            
            $brand_name = $brands->brands[$brand_id[0]]->post_title;        
            $brand_name = str_replace('Orthodontics', '', $brand_name);
            $text .= ' - ' .  $brand_name . ' brand level';
        }
    }     
    
    return $text;
}, 10, 4 );


function sim_acf_relationship_query( $args, $field, $post_id ) {    
    $args['meta_query'] = [];      
    return $args;
};
add_filter('acf/fields/relationship/query/name=meet_the_team_providers_relationship', 'sim_acf_relationship_query', 10, 3 );
add_filter('acf/fields/relationship/query/name=provider_location_relationship', function($args, $field, $post_id) {
    $args['posts_per_page'] = 40;
    return $args;
}, 10, 3 );
/* end ACF relationship field filters */


//=====================================[Shortcode List]=====================================//
add_action('add_meta_boxes', function() {
    $screens = ['page', 'brand', 'location', 'region', 'provider', 'edu_association', 'pro_affiliation', 'review', 'smile_transformation', 'insurance_provider'];
    foreach ($screens as $screen) {
        add_meta_box(
            'mdg_shortcode_key', // ID
            'Shortcode List', // Title
            'mdg_shortcode_list_html', // Content callback
            $screen, // Post type
            'side', // Context
            'low' // Priority
        );
    }
});

function mdg_shortcode_list_html($post) {
    ?>
    <h2>Brand URL</h2>
    <p><code>[BRAND_URL path="whats-the-difference-between-a-dentist-and-orthodontist" text="Any text here" class="Any class here" title="Any text here"]</code></p>
    <h2>Homepage Link</h2>
    <p><code>[brand_link class="cta text" target="_self"]</code></p>
    <h2>Our team</h2>
    <p><strong>Meet the team</strong><br/><code>[meet_our_orthodontic_team_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Dr. Steve Kristo</strong><br/><code>[dr_steve_kristo_link text="Any text here" class="cta text" title="Any text here" target="_blank"]</code></p>
    <p><strong>Dr. Bob Bronski</strong><br/><code>[dr_bob_bronski_link text="Any text here" class="cta text" title="Any text here" target="_parent"]</code></p>
    <p><strong>Dr. Jared Holloway</strong><br/><code>[dr_jared_holloway_link text="Any text here" class="cta text" title="Any text here" target="_top"]</code></p>
    <p><strong>Dr. Kan Tsunoda</strong><br/><code>[dr_kan_tsunoda_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Dr. Harrison Siu</strong><br/><code>[dr_harrison_siu_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Dr. Gregory Dietmeier</strong><br/><code>[dr_gregory_dietmeier_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Dr. Kevin Chapman</strong><br/><code>[dr_kevin_chapman_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <h2>Services</h2>
    <p><strong>Why orthodontic treatment</strong><br/><code>[why_orthodontic_treatment_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Braces</strong><br/><code>[braces_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Invisalign treatment<sup>&reg;</sup></strong><br/><code>[invisalign_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Invisalign Virtual Care</strong><br/><code>[invisalign_vc_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <!-- Removed Virtual Monitoring -->
    <!-- <p><strong>Virtual monitoring</strong><br/><code>[virtual_monitoring_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p> -->
    <p><strong>Smile transformations</strong><br/><code>[orthodontic_treatment_results_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <h2>Our approach</h2>
    <p><strong>Patient care philosophy</strong><br/><code>[patient_care_philosophy_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Safety & procedures</strong><br/><code>[safety_and_procedures_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Community involvement</strong><br/><code>[community_involvement_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <h2>For patients</h2>
    <p><strong>Refer a friend program</strong><br/><code>[refer_a_friend_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Orthodontic care & maintenance</strong><br/><code>[orthodontic_care_maintenance_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Emergency care & repair</strong><br/><code>[emergency_care_repairs_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <h2>Financing</h2>
    <p><code>[affordable_orthodontist_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <h2>Blog</h2>
    <p><code>[blog_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <h2>Appointments</h2>
    <p><code>[appointments_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <h2>Free Consultation</h2>
    <p><code>[free_orthodontic_consultation_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <h2>Others</h2>
    <p><strong>Find a location</strong><br/><code>[locations_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Contact us</strong><br/><code>[contact_us_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Dentist referral</strong><br/><code>[orthodontic_referral_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Careers</strong><br/><code>[careers_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Privacy policy</strong><br/><code>[privacy_policy_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Non-discrimination</strong><br/><code>[non_discrimination_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Site map</strong><br/><code>[site_map_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Braces</strong><br/><code>[herbst_appliance_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Braces</strong><br/><code>[palatal_expander_link text="Any text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <p><strong>Confidence Counts Club</strong><br/><code>[confidence_counts_club_link text="text here" class="cta text" title="Any text here" target="_self"]</code></p>
    <h2>Phone Links</h2>
    <p><strong>Phone number</strong><br/><code>[phone_link text="Call %number%" class="Any class here"]</code></p>
    <p><strong>After hours phone number</strong><br/><code>[after_hours_phone_link text="Call %number%" class="Any class here"]</code></p>
    <p><strong>Toll free phone number</strong><br/><code>[toll_free_phone_link text="Call %number%" class="Any class here"]</code></p>
    <?
}

//=====================================[ACTIONS & FILTERS]=====================================//
add_action('admin_head', function() {
    ?>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
        .acf-field-vertical-position .acf-label,
        .acf-field-vertical-position .acf-input,
        .acf-field-horizontal-position .acf-label,
        .acf-field-horizontal-position .acf-input {
            display: flex;
            align-content: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
    <?
});

add_filter('pre_option_upload_url_path', function($path) {
    if(is_local()) {
        global $HOSTNAMES_LOCAL;
        $hostname = reset($HOSTNAMES_LOCAL); # TODO: change to use website_entity
        return 'http://'.$hostname.'/wp-content/uploads';
    }
    return $path;
});

add_action('admin_footer', function() {
    ?><script type="text/javascript" src="<?= get_stylesheet_directory_uri().'/js/admin-scripts.js'; ?>"></script><?
});

//=====================================[INCLUDES]=====================================//
include_once get_stylesheet_directory().'/lib/MDG/autoload.php';
include_once get_stylesheet_directory().'/inc/less-compiler.php';
include_once get_stylesheet_directory().'/inc/reset.php';
include_once get_stylesheet_directory().'/inc/scripts.php';
include_once get_stylesheet_directory().'/inc/shortcodes.php';
include_once get_stylesheet_directory().'/inc/utility-functions.php';
include_once get_template_directory().'/inc/nav-walker.php';

//=====================================[ROUTING]=====================================//
# Update the post link based on the based on the brand relationship
add_filter('post_link', function($post_link, $post, $leavename) {
    global $brands;

    $brand_relationship = get_post_meta($post->ID, 'post_brand_relationship', true);
    if (!empty($brand_relationship)) {
        $current_brand = $brands->brands[$brand_relationship[0]];
        $brand_host_name = brand_host($current_brand);
        $url_array = explode('/', $post_link);
        $current_host_name = $url_array[0].'//'.$url_array[1].$url_array[2];
        $post_link = str_replace($current_host_name, $brand_host_name, $post_link);
        apply_filters('the_permalink', $post_link, $post->ID);
        apply_filters('edit_post_link', $post_link, $post->ID, 'Edit Page');
    }
    return $post_link;
}, 10, 3);

# For brand pages, posts and providers, disable auto-incrementing slugs; allow duplicate slugs for brand-level pages, posts and providers
add_filter('pre_wp_unique_post_slug', function($override, $slug, $post_ID, $post_status, $post_type, $post_parent) {
    if($post_type == 'post' || $post_type == 'provider' || empty($post_type)) return $slug;
    elseif($post_type != 'page' || wp_get_post_parent_id($post_ID) !== 0) return null;
    return $slug;
}, 10, 6);

# Manipulate query for get_page_by_path; defined in wp-includes/post.php:5348
# Resolves duplicate slugs for brand-level pages
add_filter('query', function($query) {
    if(
        !is_admin()
        && strpos(trim($query), 'SELECT ID, post_name, post_parent, post_type') === 0
        && strstr($query, "WHERE post_name IN ('")
        && strstr($query, "AND post_type IN ('page'")
    ) {
        global $wpdb;

        $brand = is_brand();
        if(empty($brand) || !is_object($brand) || empty($brand->ID)) return $query;

        $brand_id = absint($brand->ID);

        if(empty($brand_id)) return $query;

        $where = "ID IN (
		SELECT
			DISTINCT i_p.ID
		FROM {$wpdb->postmeta} i_pm
		JOIN {$wpdb->posts} i_p ON
			i_p.ID = i_pm.post_id
			AND i_p.post_type = 'page'
			AND i_p.post_status='publish'
			AND i_p.post_parent=0
			AND i_pm.meta_key = 'page_brand_relationship'
			AND i_pm.meta_value LIKE '%:\"{$brand_id}\";%'
		GROUP BY
			i_p.ID
		) AND";
        $query = str_replace('WHERE post_name IN (', "WHERE {$where} post_name IN (", $query);
    }
    return $query;
}, 10, 1);

# Restrict providers from being accessed directly via URL, unless explicity tagged to the brand/office
add_action('pre_get_posts', function($query) {
    if(!is_admin() && $query->is_main_query() && $query->get('post_type') == 'provider') {
        $provider_ids = array_filter(array_map('absint', array_unique(wp_list_pluck(get_providers() ?? [], 'ID'))));
        if(!empty($provider_ids)) $query->set('post__in', $provider_ids);
    } elseif (!is_admin() && $query->is_main_query() && $query->get('post_type') == 'location') {
        $brand_location_ids = wp_list_pluck(get_locations_for_brand(is_brand()->ID), 'ID');
        if(!empty($brand_location_ids)) $query->set('post__in', $brand_location_ids);
    }
}, 10, 1);

# Restrict blog posts from being accessed directly via URL, unless explicity tagged to the brand/office
add_filter('posts_where', function($where, $query) {
    if(
        !is_admin()
        && $query->is_main_query()
        && strstr($where, ".post_type = 'post'")
        && strstr($where, ".post_name = '")
        && $query->get('post_type') == ''
    ) {
        global $wpdb;
        $brand = is_brand();

        $q = new WP_Query([
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query' => [
                [
                    'key' => 'post_brand_relationship',
                    'value' => $brand->ID,
                    'compare' => 'LIKE'
                ],
            ],
            'fields' => 'ids',
        ]);

        $post_ids = array_unique(array_filter(array_map('absint', $q->posts)));
        if(!empty($post_ids)) {
            $where .= ' AND '.$wpdb->posts.'.ID IN ('.implode(',', $post_ids).')';
        }

        # Disable canonical redirects (based on GUID) when the URL is truly a 404 on the website requested
        add_filter('redirect_canonical', function($redirect_url, $requested_url) {
            return null;
        }, 10, 2);
    }
    return $where;
}, 10, 2);

# Update the page link based on the based on the brand relationship
add_filter('page_link', function($page_link, $post_id, $sample) {
    global $brands;
    $brand_relationship = get_post_meta($post_id, 'page_brand_relationship', true);
    if (!empty($brand_relationship)) {
        $current_brand = $brands->brands[$brand_relationship[0]];
        $brand_host_name = brand_host($current_brand);
        $url_array = explode('/', $page_link);
        $current_host_name = $url_array[0].'//'.$url_array[1].$url_array[2];
        $page_link = str_replace($current_host_name, $brand_host_name, $page_link);
        apply_filters('the_permalink', $page_link, $post_id);
        apply_filters('edit_post_link', $page_link, $post_id, 'Edit Page');
    }
    return $page_link;
}, 10, 3);

# Adding allowed origins for cors policy
add_filter('allowed_http_origins', function($origins) {
    $origins[] = 'https://local-prairiegroveorthodontics-com.mdgadvertising.com';
    $origins[] = 'https://dev-prairiegroveorthodontics-com.mdgadvertising.com';
    $origins[] = 'https://admin-prairiegroveorthodontics-com.mdgadvertising.com';
    $origins[] = 'https://www.prairiegroveorthodontics.com';
    $origins[] = 'https://local-greatriverortho-com.mdgadvertising.com';
    $origins[] = 'https://dev-greatriverortho-com.mdgadvertising.com';
    $origins[] = 'https://admin-greatriverortho-com.mdgadvertising.com';
    $origins[] = 'https://greatriverortho.com';
    $origins[] = 'https://local-kristoorthodontics-com.mdgadvertising.com';
    $origins[] = 'https://dev-kristoorthodontics-com.mdgadvertising.com';
    $origins[] = 'https://admin-kristoorthodontics-com.mdgadvertising.com';
    $origins[] = 'https://kristoorthodontics.com';
    return $origins;
});

# Adding to ignore cors policy
add_action('wp_headers', function($headers) {
    $headers['access-control-allow-origin'] = '*';
    return $headers;
});

# Prepend "orthodontist-office" to the office name in URL permastructs where pages are tagged to offices
add_filter('get_page_uri', function($uri, $page) {
    global $wp_post_types;
    if (
        get_post_type($page) === 'page'
        && get_post_type($page->post_parent) === 'location'
        && !empty($wp_post_types['location']->rewrite['slug'])
    ) {
        return $wp_post_types['location']->rewrite['slug'].'/'.$uri;
    }
    return $uri;
}, 10, 2);

# Update the post_parent of a page to an office ("location") ID when tagged to an office
add_action('wp_after_insert_post', function($post_id, $post, $update) {
    if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
        return;
    }

    if ($post->post_type == 'page') {
        if (!empty($_POST['acf']['page_location_parent']) && empty($GLOBALS['__original_wp_after_insert_post'])) {
            $post_data = [
                'ID' => $post_id,
                'post_name' => $_POST['post_name'],
                'post_parent' => $_POST['acf']['page_location_parent'],
            ];
            $GLOBALS['__original_wp_after_insert_post'] = true;
            wp_update_post($post_data);
        }
    }
}, 10, 3);

# Virtualize pages tagged to locations (URL segment length = 3)
add_action('wp', function($template) {
    global $wp, $wp_post_types;

    $segments = explode('/', $wp->request);
    $this_type = $post_parent = $post_name = null;

    if(
        is_404()
        && !empty($wp_post_types['location']->rewrite['slug'])
        && starts_with($wp->request, $wp_post_types['location']->rewrite['slug'].'/')
        && !is_single_location_brand()
    ) {
        
        if(count($segments) == 3 || count($segments) == 4 || count($segments) == 5) {
            $brand = is_brand();
            $location = get_page_by_path($segments[1], OBJECT, 'location');
            if(empty($location)) return;            
            
            if (count($segments) == 3) {
                $post_name = $segments[2];
                $post_parent = $location->ID ?? 0;
                $post_type = 'page';
            } 
            
            if (count($segments) == 4) {
                $post_name = $segments[3];
                $post_subject = $segments[2];
                $post_parent = 0;
                if ($post_subject === 'orthodontic-blog') {
                    $post_type = 'post';
                } elseif ($post_subject === 'orthodontic-team') {
                    $post_type = 'provider';
                }
            } 
            
            if (count($segments) == 5 && $segments[3] === 'category') {
                $post_type = 'post';
                $this_type = 'archive';
            }

            $query_params = [
                'post_type' => $post_type,
                'post_parent' => $post_parent,
                'name' => $post_name,
                'posts_per_page' => 1,
                'post_status' => 'publish',
            ];

            // if location-based blog post page... 
            if( count($segments) == 4 && $post_parent == 0 && $post_subject == 'orthodontic-blog' ){
                $query_params['meta_query'] = [
                    [
                        'key' => 'post_brand_relationship',
                        'value' => $brand->ID,
                        'compare' => 'LIKE'
                    ]
                ];                
            }

            $q = new WP_Query($query_params);
            $p = current($q->posts);

            if($post_type === 'post' && $this_type === 'archive') {
                $term = get_term_by('slug', $segments[4], 'category');
                $meta_title = $term->name;

                add_filter('wp_title', function($text) use ($meta_title) { return $meta_title.' | '.do_shortcode('[BRAND_TITLE]'); });
                add_filter('aioseop_title', function($text) use ($meta_title) { return $meta_title.' | '.do_shortcode('[BRAND_TITLE]'); });
                include_once get_stylesheet_directory().'/templates/blog.php';
                status_header(200);

                exit;
            }

            if(!empty($p) && !empty($p->ID)) {
                do_virtual_page(get_post($p->ID));
                $meta_title = get_post_meta($p->ID, '_aioseop_title', true);
                $meta_description = get_post_meta($p->ID, '_aioseop_description', true);
                
                add_filter('wp_title', function($text) use ($meta_title) { return $meta_title.' | '.do_shortcode('[BRAND_TITLE]'); });
                add_filter('aioseop_title', function($text) use ($meta_title) { return $meta_title.' | '.do_shortcode('[BRAND_TITLE]'); });
                add_filter('aioseop_description', function($text) use ($meta_description) { return $meta_description; });
                if ($post_type === 'provider') {
                    include_once get_stylesheet_directory().'/single-provider.php';
                    exit;
                } elseif ($post_type === 'post' && $this_type === 'archive') {
                    include_once get_stylesheet_directory().'/templates/blog.php';
                    exit;
                } elseif ($post_type === 'post') {
                    include_once get_stylesheet_directory().'/single.php';
                    exit;
                }
            }            
        }
    }
});

// Send location home page for single-location brands to 404
add_action('wp', function() {
    if (is_singular('location') && is_single_location_brand()) {
        global $wp_query;
        $wp_query->set_404();
    }
});

add_filter('template_include', function($template) {
    if(is_404()) return get_stylesheet_directory().'/templates/404.php';
    return $template;
});

// Theme defaults
add_action('init', function() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
    register_nav_menus([
        'super' => 'Super Navigation',
        'header' => 'Header Navigation',
        'mobile' => 'Mobile Navigation',
        'footer' => 'Footer Navigation',
    ]);

    add_filter('pre_option_siteurl', function() {
        return empty(brand_host()) ? '' : rtrim(brand_host(), '/');
    });

    add_filter('pre_option_home', function() {
        return empty(brand_host()) ? '' : rtrim(brand_host(), '/');
    });
});

/**
 * remove WP Admin page editor
 * from Confidence Counts templates
 */ 
add_action( 'admin_init', function() {
    $post_id;
    
    if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
    if( isset( $_POST['post'] ) ) $post_id = $_POST['post_ID'];      
    if( !isset( $post_id ) ) return;
 
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
     
    if( $template_file == 'templates/confidence-counts.php' ){
        remove_post_type_support('page', 'editor');
    }
});

//=====================================[TEMPLATES]=====================================//

function format_tel($tel, $format) {
    switch ($format) {
        default:
        case 'dot':
            return  (substr($tel, 0, 3)) . '.' . (substr($tel, 3, 3)) . '.' . (substr($tel, 6, 4));
            break;
        case 'dash':
            return  (substr($tel, 0, 3)) . '-' . (substr($tel, 3, 3)) . '-' . (substr($tel, 6, 4));
            break;
        case 'parentheses':
            return  '(' . (substr($tel, 0, 3)) . ') ' . (substr($tel, 3, 3)) . '-' . (substr($tel, 6, 4));
            break;
    }
}

// Filter open graph images
add_filter('aiosp_opengraph_meta', function($value, $property, $subproperty) {
    global $post;

    $brand = is_brand();

    if(in_array($subproperty, ['published_time', 'modified_time'])) {
        return;
    }

    if ($post->post_type == 'post') {
        $attachment_url = get_the_post_thumbnail_url($post);

        switch($subproperty) {
            case 'thumbnail':
                $value = $attachment_url;
                break;
            case 'thumbnail_1':
                $value = $attachment_url;
                break;
            case 'twitter_thumbnail':
                $value = $attachment_url;
                break;
        }
    } else {
        if ($brand->post_title === 'Kristo Orthodontics') {
            switch($subproperty) {
                case 'thumbnail':
                    $value = brand_host().'/wp-content/uploads/2021/02/Kristo_Orthodontics_RGB_color-1200x628-1.png';
                    break;
                case 'thumbnail_1':
                    $value = brand_host().'/wp-content/uploads/2021/02/Kristo_Orthodontics_RGB_color-1200x628-1.png';
                    break;
                case 'twitter_thumbnail':
                    $value = brand_host().'/wp-content/uploads/2021/02/Kristo_Orthodontics_RGB_color-1200x628-1.png';
                    break;
            }
        } elseif ($brand->post_title === 'Prairie Grove Orthodontics') {
            switch($subproperty) {
                case 'thumbnail':
                    $value = brand_host().'/wp-content/uploads/2021/08/PGO_OG_1200x628.jpeg';
                    break;
                case 'thumbnail_1':
                    $value = brand_host().'/wp-content/uploads/2021/08/PGO_OG_1200x628.jpeg';
                    break;
                case 'twitter_thumbnail':
                    $value = brand_host().'/wp-content/uploads/2021/08/PGO_OG_1200x628.jpeg';
                    break;
            }
        } elseif ($brand->post_title === 'Great River Orthodontics') {
            switch($subproperty) {
                case 'thumbnail':
                    $value = brand_host().'/wp-content/uploads/2021/05/GreatRiver_1200x628-01.png';
                    break;
                case 'thumbnail_1':
                    $value = brand_host().'/wp-content/uploads/2021/05/GreatRiver_1200x628-01.png';
                    break;
                case 'twitter_thumbnail':
                    $value = brand_host().'/wp-content/uploads/2021/05/GreatRiver_1200x628-01.png';
                    break;
            }
        }
    }

    return $value;
}, 10, 3);

add_filter('aioseop_canonical_url', function($url) {
    global $wp;

    $segments = explode('/', $wp->request);
    $relative_url = get_relative_url($wp->request);    
    $url = empty($relative_url) ? brand_url('/') : brand_url('/'.$relative_url.'/');    
    $this_type = $post_name = null;
    $post_parent = 0;
    
    if(count($segments) == 3 || count($segments) == 4 || count($segments) == 5) {
        $location = get_page_by_path($segments[1], OBJECT, 'location');
        if(empty($location)) return $url;          

        if (count($segments) == 3) {            
            $post_name = $segments[2];
            $post_parent = $location->ID;
            $post_type = 'page';
        } 
        
        if (count($segments) == 4) {
            $post_name = $segments[3];
            $post_subject = $segments[2];
            
            if ($post_subject === 'orthodontic-blog') {
                $post_type = 'post';
            } elseif ($post_subject === 'orthodontic-team') {
                $post_type = 'provider';
            }
        } 
        
        if (count($segments) == 5 && $segments[3] === 'category') {
            $post_type = 'post';
            $this_type = 'archive';            
        }

        if($this_type == 'archive') {            
            $term = get_term_by('slug', $segments[4], 'category');
            $term_path = get_relative_url( get_term_link( $term->term_id ) );
            $url = brand_host().'/'.$segments[0].'/'.$segments[1].'/'.($term_path).'/';
            return $url;
        }         
            
        $q = new WP_Query([
            'post_type' => $post_type,
            'post_parent' => $post_parent,
            'name' => $post_name,
            'posts_per_page' => 1,
            'post_status' => 'publish',
        ]);

        $p = current($q->posts);                 
        $relative_url = get_relative_url(get_permalink($p->ID));
        $url = brand_host().'/'.($relative_url).'/';        

        if(
            ($post_subject === 'orthodontic-team' && $post_type === 'provider') ||
            ($post_type === 'post' && $this_type != 'archive')
          ) {
            $url = brand_host().'/'.$segments[0].'/'.$segments[1].'/'.($relative_url).'/';
        }                
    }

    return $url;
}, 1e6, 1);

// All in One SEO sitemap.xml filters
add_filter('aiosp_sitemap_data', function($sitemap_data, $sitemap_type, $page_number, $aioseop_options) {
    $brand = is_brand();
    $sitemap_data = [];
    $location_objects = get_locations_for_brand($brand->ID);
    usort($location_objects, function($a, $b) {
        return $a->post_title <=> $b->post_title;
    });
    if ($sitemap_type == 'root') {
        $sitemap_data[] = [
            'loc' => brand_host().'/post-sitemap.xml',
            'changefreq' => 'weekly',
            'priority' => 0.7,
        ];
        $sitemap_data[] = [
            'loc' => site_url('/page-sitemap.xml'),
            'changefreq' => 'weekly',
            'priority' => 0.7,
        ];
        $sitemap_data[] = [
            'loc' => brand_host().'/location-sitemap.xml',
            'changefreq' => 'weekly',
            'priority' => 0.7,
        ];
        $sitemap_data[] = [
            'loc' => site_url('/provider-sitemap.xml'),
            'changefreq' => 'weekly',
            'priority' => 0.7,
        ];
    } elseif ($sitemap_type == 'post') {
        // Filter out posts for brand
        $posts_sitemap = [];
        $post_slugs = list_all_blogs(true, true);
        if (!empty($post_slugs)) {
            foreach ($post_slugs as $post) {                
                $post_url = get_permalink($post->ID);
                $relative_url = get_relative_url($post_url);
                $posts_sitemap[] = [
                    'loc' => brand_url('/'.($relative_url).'/'),
                    'changefreq' => 'weekly',
                    'priority' => 0.7,
                ];
                if (!empty($location_objects && !is_single_location_brand())) {
                    foreach ($location_objects as $location) {
                        $location_url = brand_url('/'.($location->relative_url).'/orthodontic-blog/'.$post->post_name.'/');
                        $posts_sitemap[] = [
                            'loc' => $location_url,
                            'changefreq' => 'weekly',
                            'priority' => 0.7,
                        ];
                    }
                }
            }
        }
        $sitemap_data = array_merge($sitemap_data, $posts_sitemap);
    } elseif ($sitemap_type == 'page') {
        // Filter out pages for brand
        $pages_sitemap = [];
        $exclusions = sitemap_exclusions();
        $page_slugs = list_all_pages(true);
        if (!empty($page_slugs)) {
            usort($page_slugs, function($a, $b) {
                return $a->post_title <=> $b->post_title;
            });
            foreach ($page_slugs as $page) {
                $url = get_permalink($page->ID);
                $relative_url = get_relative_url($url);
                if (in_array($page->post_name, $exclusions)) continue;
                $pages_sitemap[] = [
                    'loc' => brand_url('/'.($relative_url).'/'),
                    'changefreq' => 'weekly',
                    'priority' => 0.7,
                ];
            }
        }
        $sitemap_data = array_merge($sitemap_data, $pages_sitemap);
    } elseif ($sitemap_type == 'location') {
        // Filter out pages for brand
        $locations_sitemap = [];
        if (!empty($location_objects)) {
            foreach ($location_objects as $location) {
                $url = !is_single_location_brand() ? brand_url('/'.($location->relative_url).'/') : brand_url('/');
                $locations_sitemap[] = [
                    'loc' => $url,
                    'changefreq' => 'weekly',
                    'priority' => 0.7,
                ];
            }
        }
        $sitemap_data = array_merge($sitemap_data, $locations_sitemap);
    } elseif ($sitemap_type == 'provider') {
        // Filter out pages for brand
        $providers_sitemap = [];
        $provider_objects = get_providers();
        if (!empty($provider_objects)) {
            usort($provider_objects, function($a, $b) {
                return $a->menu_order <=> $b->menu_order;
            });
            foreach ($provider_objects as $provider) {
                $provider_url = brand_url('/'.($provider->relative_url).'/');
                $location_provider_relationship = !empty($provider->location_relationship) ? unserialize($provider->location_relationship) : false;
                $providers_sitemap[] = [
                    'loc' => $provider_url,
                    'changefreq' => 'weekly',
                    'priority' => 0.7,
                ];
                if (!empty($location_objects && !is_single_location_brand())) {
                    foreach ($location_objects as $location) {
                        if (in_array($location->ID, $location_provider_relationship)) {
                            $location_url = brand_url('/'.($location->relative_url).'/orthodontic-team/'.$provider->post_name.'/');
                            $providers_sitemap[] = [
                                'loc' => $location_url,
                                'changefreq' => 'weekly',
                                'priority' => 0.7,
                            ];
                        }
                    }
                }
            }
        }
        $sitemap_data = array_merge($sitemap_data, $providers_sitemap);
    }

    return $sitemap_data;
}, 10, 4);

add_filter('body_class', function($class) {
    global $wp;
    $brand = is_brand();
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $current_url = explode('?', $current_url)[0];
    $location = is_location();
    $relative_url = get_relative_url($current_url);
    $relative_array = explode('/', $relative_url);
    $posts = list_all_blogs(true);
    $post_slugs = list_all_blogs();
    $body_class = [];
    if (starts_with($relative_url, 'orthodontic-blog/category/')) {
        // Post category
        $body_class = ['archive'];
        if (is_date()) $body_class[] = 'date';
        if (absint(basename($relative_url))) $body_class[] = 'page';
        if (strstr($relative_url, '/category/') && !in_array('page', $body_class)) $body_class = array_merge($body_class, ['category', 'category-'.basename($relative_url)]);
    } elseif (in_array(end($relative_array), $post_slugs)) {
        // Posts
        $current_post = false;
        if (in_array(end($relative_array), $post_slugs)) {
            foreach ($posts as $p) {
                if ($p->post_name === end($relative_array)) $current_post = $p;
            }
        }
        $body_class = array_merge($body_class, ['post-template-default', 'single', 'single-post', 'postid-'.$current_post->ID]);
    } elseif (rtrim($current_url, '/') === brand_host()) {
        $body_class = array_merge($body_class, ['page-template', 'page-template-templates', 'page-template-brand-home', 'default-map-view']);
    } elseif (!empty($location) && $current_url === get_permalink($location->ID)) {
        $body_class = array_merge($body_class, ['page-template', 'page-template-templates', 'page-template-location-home']);
    } elseif (strstr($relative_url, 'orthodontic-team')) {
        $body_class = array_merge($body_class, ['page-template', 'page-template-templates', 'page-template-bio', 'default-map-view', end($relative_array)]);
    } else {
        // Pages
        if (if_landing_page_get_lp_phone()) {
            $body_class = array_merge($body_class, ['page-template', 'page-template-templates', 'ppc-nav', 'page-template-'.str_replace('-2', '', end($relative_array))]);
        } else {
            $body_class = array_merge($body_class, ['page-template', 'page-template-templates', 'page-template-'.str_replace('-2', '', end($relative_array))]);
        }
    }

    // add brand to body tag class
    if($brand != false) $body_class = array_merge($body_class, [$brand->post_name]);

    return $body_class;
});

add_filter('robots_txt', function($output) {
    if(!is_live()) {
        ob_start();
        ?>
        User-agent: *
        Disallow: /
        <?
        return ob_get_clean();
    }

    return $output;
});

// Noindex, nofollow
add_filter('option_blog_public', function($val) {
    return is_live() ? 1 : 0;
});

add_action('wp_dashboard_setup', function() {
    wp_add_dashboard_widget(
        sanitize_title('Form Submissions Summary'), 'Form Submissions Summary', function() {
        include_once get_stylesheet_directory().'/inc/form-submissions/form_submission_manager.php';
        $table = new Form_Submissions_Table();
        $forms = $table->mapping;
        ?>
        <div id="dashboard_right_now">
            <p><strong>Today&rsquo;s Submissions</strong></p>
            <ul>
                <?
                foreach($forms as $form):
                    $form_total = $table->get_total_for_form($form, false, true);
                    ?>
                    <li class="page-count">
                        <a href="<?= admin_url('admin.php?page=form-submissions&form-name='.$form) ?>"><?= get_form_name($form) ?> Form: <?= number_format($form_total) ?></a>
                    </li>
                <? endforeach ?>
            </ul>
            <hr />
            <p><strong>All-Time Submissions</strong></p>
            <ul>
                <?
                foreach($forms as $form):
                    $form_total = $table->get_total_for_form($form, false, false);
                    ?>
                    <li class="page-count">
                        <a href="<?= admin_url('admin.php?page=form-submissions&form-name='.$form) ?>"><?= get_form_name($form) ?> Form: <?= number_format($form_total) ?></a>
                    </li>
                <? endforeach ?>
            </ul>
        </div>
        <?
    }
    );
});

function load_more_blog_posts() {
    if (empty($_POST) || empty($_POST['page'])) wp_send_json_error('You must have a page set');
    global $locations;

    $brand = is_brand();
    $location = is_location();
    $page = $_POST['page'] ?? 2;
    $post_type = 'post';
    $post_status = 'publish';
    $posts_per_page = $_POST['posts_per_page'] ?? 4;
    $query_args = [
        'paged' => $page,
        'post_type' => $post_type,
        'post_status' => $post_status,
        'posts_per_page' => $posts_per_page + 1,
        'meta_query' => [
            [
                'key' => 'post_brand_relationship',
                'value' => $brand->ID,
                'compare' => 'LIKE'
            ]
        ]
    ];
    $term_id = absint($_POST['t_id'] ?? '');
    $entity_id = absint($_POST['e_id'] ?? '');
    if (!empty($term_id)) $query_args['cat'] = $term_id;

    $current_entity = null;
    if($brand->ID == $entity_id) $current_entity = $brand;
    elseif(!empty($location) && $location->ID == $entity_id) $current_entity = $location;
    elseif(empty($location) && !empty($locations->locations ?? [])) {
        foreach($locations->locations as $office) {
            if($office->ID == $entity_id) {
                $current_entity = $office;
                break;
            }
        }
    }

    if(empty($current_entity)) {
        wp_send_json_error([]);
    }

    # Entity context switch
    $original_entity = $platform_entity;
    $platform_entity = $current_entity;

    ob_start();
    $posts = new WP_Query($query_args);
    if ($posts->have_posts()) {
        $results = $posts->posts;
        $first_post = array_pop($posts->posts);
        foreach ($results as $r) {
            $p = get_post($r->ID);

            $small_image_src_1x = wp_get_attachment_image_src(get_post_thumbnail_id($p), 'medium_large', false);
            $small_image_src_2x = wp_get_attachment_image_src(get_post_thumbnail_id($p), '1536x1536', false);
            $small_image = !empty(get_post_thumbnail_id($p)) ? responsive_static_img(['src' => str_replace('http:', 'https:', $small_image_src_1x[0]), 'srcset' => str_replace('http:', 'https:', $small_image_src_1x[0]).' 1x, '.str_replace('http:', 'https:', $small_image_src_2x[0]).' 2x', 'sizes' => '100vw', 'width' => $small_image_src_1x[1], 'height' => $small_image_src_1x[2], 'alt' => !empty(get_post_meta(get_post_thumbnail_id($p), '_wp_attachment_image_alt', true)) ? get_post_meta(get_post_thumbnail_id($p), '_wp_attachment_image_alt', true) : str_replace('_', ' ', get_the_title(get_post_thumbnail_id($p))), 'class' => '']) : '';
            partial('widget.blog.small', [
                'image' => $small_image,
                'classes' => ['animate__animated animate__zoomInDown'],
                'content' => [
                    'h3' => $p->post_title,
                    'h3_classes' => ['h4', 'white'],
                    'categories' => wp_get_post_categories($p->ID),
                    'copy' => excerptizeCharacters($p->post_content, 198),
                    'cta' => [
                        'href' => brand_url('/orthodontic-blog/'.basename(get_permalink($p->ID)).'/'),
                        'classes' => ['cta', 'text', 'white'],
                        'text' => 'Read article',
                    ]
                ]
            ]);
        }
    }
    wp_reset_postdata();

    # Restore current entity context
    $platform_entity = $original_entity;

    $html = ob_get_clean();
    $response = (object)[
        'more' => $page < $posts->max_num_pages,
        'html' => $html,
        'max_pages' => $posts->max_num_pages,
    ];
    die(json_encode($response));
}
add_action('wp_ajax_blog_page', 'load_more_blog_posts');
add_action('wp_ajax_nopriv_blog_page', 'load_more_blog_posts');

/*	Add back end filters to post types	*/
//	Custom dropdown meta_box_cb
function cb_taxonomy_brand_select_meta_box($post, $box) {
    $defaults = ['taxonomy' => 'brand'];

    if (!isset($box['args']) || !is_array($box['args'])) $args = array();
    else $args = $box['args'];

    extract(wp_parse_args($args, $defaults), EXTR_SKIP);

    $tax = get_taxonomy($taxonomy);
    $selected = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
    $hierarchical = $tax->hierarchical;
    ?>
    <div id="taxonomy-<? echo $taxonomy; ?>" class="selectdiv">
        <?
        if (current_user_can($tax->cap->edit_terms)):
            if ($hierarchical) {
                wp_dropdown_categories(array(
                    'taxonomy' => $taxonomy,
                    'class' => 'widefat',
                    'hide_empty' => false,
                    'name' => "tax_input[$taxonomy][]",
                    'selected' => count($selected) >= 1 ? $selected[0] : '',
                    'orderby' => 'name',
                    'hierarchical' => false,
                    'show_option_all' => "All"
                ));
            } else {
                ?>
                <select name="<?= "tax_input[$taxonomy][]"; ?>" class="widefat">
                    <option value="0">Select a brand</option>
                    <? foreach (get_terms($taxonomy, array('hide_empty' => false)) as $term): ?>
                        <option value="<?= esc_attr($term->slug); ?>" <?= selected($term->term_id, count($selected) >= 1 ? $selected[0] : ''); ?>><?= esc_html($term->name); ?></option>
                    <? endforeach; ?>
                </select>
            <? 	}
        endif;
        ?>
    </div>
    <?
}
function cb_taxonomy_page_name_select_meta_box($post, $box) {
    $defaults = ['taxonomy' => 'page_name'];

    if (!isset($box['args']) || !is_array($box['args'])) $args = array();
    else $args = $box['args'];

    extract(wp_parse_args($args, $defaults), EXTR_SKIP);

    $tax = get_taxonomy($taxonomy);
    $selected = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
    $hierarchical = $tax->hierarchical;
    ?>
    <div id="taxonomy-<? echo $taxonomy; ?>" class="selectdiv">
        <?
        if (current_user_can($tax->cap->edit_terms)):
            if ($hierarchical) {
                wp_dropdown_categories(array(
                    'taxonomy' => $taxonomy,
                    'class' => 'widefat',
                    'hide_empty' => false,
                    'name' => "tax_input[$taxonomy][]",
                    'selected' => count($selected) >= 1 ? $selected[0] : '',
                    'orderby' => 'name',
                    'hierarchical' => false,
                    'show_option_all' => "All"
                ));
            } else {
                ?>
                <select name="<?= "tax_input[$taxonomy][]"; ?>" class="widefat">
                    <option value="0">Select a page</option>
                    <? foreach (get_terms($taxonomy, array('hide_empty' => false)) as $term): ?>
                        <option value="<?= esc_attr($term->slug); ?>" <?= selected($term->term_id, count($selected) >= 1 ? $selected[0] : ''); ?>><?= esc_html($term->name); ?></option>
                    <? endforeach; ?>
                </select>
            <? 	}
        endif;
        ?>
    </div>
    <?
}
function cb_taxonomy_placement_select_meta_box($post, $box) {
    $defaults = ['taxonomy' => 'placement'];

    if (!isset($box['args']) || !is_array($box['args'])) $args = array();
    else $args = $box['args'];

    extract(wp_parse_args($args, $defaults), EXTR_SKIP);

    $tax = get_taxonomy($taxonomy);
    $selected = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
    $hierarchical = $tax->hierarchical;
    ?>
    <div id="taxonomy-<? echo $taxonomy; ?>" class="selectdiv">
        <?
        if (current_user_can($tax->cap->edit_terms)):
            if ($hierarchical) {
                wp_dropdown_categories(array(
                    'taxonomy' => $taxonomy,
                    'class' => 'widefat',
                    'hide_empty' => false,
                    'name' => "tax_input[$taxonomy][]",
                    'selected' => count($selected) >= 1 ? $selected[0] : '',
                    'orderby' => 'name',
                    'hierarchical' => false,
                    'show_option_all' => "All"
                ));
            } else {
                ?>
                <select name="<?= "tax_input[$taxonomy][]"; ?>" class="widefat">
                    <option value="0">Select a placement</option>
                    <? foreach (get_terms($taxonomy, array('hide_empty' => false)) as $term): ?>
                        <option value="<?= esc_attr($term->slug); ?>" <?= selected($term->term_id, count($selected) >= 1 ? $selected[0] : ''); ?>><?= esc_html($term->name); ?></option>
                    <? endforeach; ?>
                </select>
            <? 	}
        endif;
        ?>
    </div>
    <?
}
//	Register custom taxonomies for attachments
add_action('init', function() {
    register_taxonomy('brand', ['attachment'], [
        'labels' => [
            'name'              => 'Brands',
            'singular_name'     => 'Brand',
            'search_items'      => 'Search Brands',
            'all_items'         => 'All Brands',
            'parent_item'       => 'Parent Brand',
            'parent_item_colon' => 'Parent Brand:',
            'edit_item'         => 'Edit Brand',
            'update_item'       => 'Update Brand',
            'add_new_item'      => 'Add New Brand',
            'new_item_name'     => 'New Brand Name',
            'menu_name'         => 'Brand',
        ],
        'show_ui' => true,
        'show_in_menu' => true,
        'meta_box_cb' => 'cb_taxonomy_brand_select_meta_box',
        'hierarchical' => false,
        'query_var' => true,
        'rewrite' => true,
        'show_admin_column' => true,
    ]);

    register_taxonomy('page_name', ['attachment'], [
        'labels' => [
            'name'              => _x('Pages', 'page_name'),
            'singular_name'     => _x('Page', 'page_name'),
            'search_items'      => _x('Search Pages', 'page_name'),
            'all_items'         => _x('All Pages', 'page_name'),
            'parent_item'       => _x('Parent Page', 'page_name'),
            'parent_item_colon' => _x('Parent Page:', 'page_name'),
            'edit_item'         => _x('Edit Page', 'page_name'),
            'update_item'       => _x('Update Page', 'page_name'),
            'add_new_item'      => _x('Add New Page', 'page_name'),
            'new_item_name'     => _x('New Page Name', 'page_name'),
            'menu_name'         => _x('Page', 'page_name'),
        ],
        'show_ui' => true,
        'show_in_menu' => true,
        'meta_box_cb' => 'cb_taxonomy_page_name_select_meta_box',
        'hierarchical' => false,
        'query_var' => true,
        'rewrite' => true,
        'show_admin_column' => true,
    ]);

    register_taxonomy('placement', ['attachment'], [
        'labels' => [
            'name'              => _x('Placements', 'placement'),
            'singular_name'     => _x('Placement', 'placement'),
            'search_items'      => _x('Search Placements', 'placement'),
            'all_items'         => _x('All Placements', 'placement'),
            'parent_item'       => _x('Parent Placement', 'placement'),
            'parent_item_colon' => _x('Parent Placement:', 'placement'),
            'edit_item'         => _x('Edit Placement', 'placement'),
            'update_item'       => _x('Update Placement', 'placement'),
            'add_new_item'      => _x('Add New Placement', 'placement'),
            'new_item_name'     => _x('New Placement Name', 'placement'),
            'menu_name'         => _x('Placement', 'placement'),
        ],
        'show_ui' => true,
        'show_in_menu' => true,
        'meta_box_cb' => 'cb_taxonomy_placement_select_meta_box',
        'hierarchical' => false,
        'query_var' => true,
        'rewrite' => true,
        'show_admin_column' => true,
    ]);
});
//	Enqueue and localize JS scripts to filter attachments
add_action('wp_enqueue_media', function() {
    wp_enqueue_script('media-library-taxonomy-filter', get_stylesheet_directory_uri().'/js/collection-filter.js', ['media-editor', 'media-views']);
    // Load 'terms' into a JavaScript variable that collection-filter.js has access to
    wp_localize_script('media-library-taxonomy-filter', 'BrandMediaLibraryTaxonomyFilterData', [
        'terms' => get_terms('brand', ['hide_empty' => false])
    ]);

    wp_localize_script('media-library-taxonomy-filter', 'PageMediaLibraryTaxonomyFilterData', [
        'terms' => get_terms('page_name', ['hide_empty' => false])
    ]);

    wp_localize_script('media-library-taxonomy-filter', 'PlacementMediaLibraryTaxonomyFilterData', [
        'terms' => get_terms('placement', ['hide_empty' => false])
    ]);
    // Overrides back end code styling
    add_action( 'admin_footer', function(){
        echo '<style>
            .attachments-browser .media-toolbar-secondary {
                display: -webkit-box;
                display: -moz-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                width: 66%;
                position: relative;
            }
            .attachments-browser .media-toolbar-secondary select.attachment-filters {
                -webkit-flex-grow:0;
                -webkit-flex-shrink:1;
                -webkit-flex-basis:calc(20% - 12px);
                -webkit-box-flex: 0;
                -moz-box-flex: 0;
                -webkit-flex: 0 1 calc(20% - 12px);
                -ms-flex: 0 1 calc(20% - 12px);
                flex: 0 1 calc(20% - 12px);
                margin-right: 5px;
            }
            .attachments-browser .media-toolbar-secondary select.attachment-filters,
            .attachments-browser .media-toolbar-secondary button {
                -webkit-align-self: center;
                -ms-flex-item-align: center;
                align-self: center;
            }
            .media-toolbar.wp-filter .view-switch {
                display: -webkit-box;
                display: -moz-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
            }
            .wp-filter .search-form input[type=search] {
                width: 80%;
            }
            .media-frame.mode-grid .spinner {
                position: absolute;
                right: -20px;
                top: 10px;
            }
            @media screen and (max-width:1450px) {
                .media-frame.mode-grid .media-toolbar {
                    display: -webkit-box;
                    display: -moz-box;
                    display: -ms-flexbox;
                    display: -webkit-flex;
                    display: flex;
                    -webkit-box-orient: vertical;
                    -moz-box-orient: vertical;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column;
                }
                .attachments-browser .media-toolbar-secondary,
                .attachments-browser .media-toolbar-primary {
                    width: 90%;
                    max-width: 90%;
                }
            }
        </style>';
    });
});

//	Filter menus in list view
function filter_attachments_by_brand_filter() {
    $screen = get_current_screen();
    if ( 'upload' == $screen->id ) {
        $dropdown_options = array(
            'taxonomy' => 'brand',
            'show_option_all' => __( 'View all Brands', 'Brands' ),
            'hide_empty' => false,
            'hierarchical' => false,
            'value_field'       => 'slug',
            'name'              => 'brand',
            'orderby' => 'name', );
        wp_dropdown_categories( $dropdown_options );

        $dropdown_options_page = array(
            'taxonomy' => 'page_name',
            'show_option_all' => 'View all Pages',
            'hide_empty' => false,
            'hierarchical' => false,
            'value_field'       => 'slug',
            'name'              => 'page_name',
            'orderby' => 'name', );
        wp_dropdown_categories( $dropdown_options_page );

        $dropdown_options_placement = array(
            'taxonomy' => 'placement',
            'show_option_all' => __( 'View all Placements', 'Placements' ),
            'hide_empty' => false,
            'hierarchical' => false,
            'value_field'       => 'slug',
            'name'              => 'placement',
            'orderby' => 'name', );
        wp_dropdown_categories( $dropdown_options_placement );
    }
}
add_action( 'restrict_manage_posts', 'filter_attachments_by_brand_filter' );

//	Filter Pages and Posts by Brand
function filter_pages_by_brand_dropdown() {
    $scr = get_current_screen();
    if ( $scr->base == 'edit' && $scr->post_type == 'page' || $scr->post_type == 'post') {
        $scr->post_type == 'page' ? $meta_val = 'page_brand_relationship' : $meta_val = 'post_brand_relationship';
        $selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

        global $brands;
        $choices = array();
        foreach($brands->brands as $brand) {
            $choices[$brand->ID] = $brand->post_title;
        }

        echo'<select name="'. $meta_val .'">';
        echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All Brands</option>';
        foreach( $choices as $key => $value ) {
            echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
        }
        echo'</select>';
    }
}
add_action('restrict_manage_posts', 'filter_pages_by_brand_dropdown');

function filter_pages_by_brand_filter($query) {
    if(is_admin() && array_key_exists( 'post_type', $_GET )) {
        if ( $query->is_main_query() && $_GET['post_type'] == 'page' || $_GET['post_type'] == 'post') {
            $_GET['post_type'] == 'page' ? $meta_val = 'page_brand_relationship' : $meta_val = 'post_brand_relationship';

            if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all') {
                $query->set('meta_query', array( array(
                    'key' => $meta_val,
                    'value' => serialize([$_GET[$meta_val]])
                ) ) );
            }
        }
    }
}
add_action('pre_get_posts','filter_pages_by_brand_filter');

//	Filter providers
function filter_providers_by_brand_dropdown() {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'provider') {
        $meta_val = 'provider_brand_relationship';
        $selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

        global $brands;
        $choices = array();
        foreach($brands->brands as $brand) {
            $choices[$brand->ID] = $brand->post_title;
        }

        echo'<select name="'. $meta_val .'">';
        echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All Brands</option>';
        foreach( $choices as $key => $value ) {
            echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
        }
        echo'</select>';
    }
}
add_action('restrict_manage_posts', 'filter_providers_by_brand_dropdown');

function filter_providers_by_brand_filter($query) {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'provider' && $query->is_main_query()) {
        $meta_val = 'provider_brand_relationship';
        if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all') {
            $query->set('meta_query', array( array(
                'key' => $meta_val,
                'value' => '"' . $_GET[$meta_val] . '"',
                'compare' => 'LIKE'
            ) ) );
        }
    }
}
add_action('pre_get_posts','filter_providers_by_brand_filter');

//	Filter Smile Transformations
function filter_smile_transformations_by_region_dropdown() {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'smile_transformation') {
        $meta_val = 'smile_transformation_region_relationship';
        $selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

        global $regions;
        $choices = array();
        foreach($regions->regions as $region) {
            $choices[$region->ID] = $region->post_title;
        }

        echo'<select name="'. $meta_val .'">';
        echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All regions</option>';
        foreach( $choices as $key => $value ) {
            echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
        }
        echo'</select>';
    }
}
add_action('restrict_manage_posts', 'filter_smile_transformations_by_region_dropdown');

function filter_smile_transformations_by_region_filter($query) {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'smile_transformation' && $query->is_main_query()) {
        $meta_val = 'smile_transformation_region_relationship';
        if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all') {
            $query->set('meta_query', array( array(
                'key' => $meta_val,
                'value' => '"' . $_GET[$meta_val] . '"',
                'compare' => 'LIKE'
            ) ) );
        }
    }
}
add_action('pre_get_posts','filter_smile_transformations_by_region_filter');


//	Filter Smile Transformations by Providers
function filter_smile_transformations_by_provider_dropdown() {
	if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'smile_transformation') {
		$meta_val = 'smile_transformation_provider_relationship';
		$selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

		global $providers;
		$choices = array();
		foreach($providers->providers as $provider) {
			$choices[$provider->ID] = $provider->first_name . ' ' . $provider->last_name;
		}
	
		echo'<select name="'. $meta_val .'">';
			echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All Providers</option>';
			foreach( $choices as $key => $value ) {
				echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
			}
		echo'</select>';
	}
}

add_action('restrict_manage_posts', 'filter_smile_transformations_by_provider_dropdown');

function filter_smile_transformations_by_provider_filter($query) {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'smile_transformation' && $query->is_main_query()) {
        $meta_val = 'smile_transformation_provider_relationship';
        if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all') {
            $query->set('meta_query', array( array(
                'key' => $meta_val,
                'value' => '"' . $_GET[$meta_val] . '"',
                'compare' => 'LIKE'
            ) ) );
        }
    }
}
add_action('pre_get_posts','filter_smile_transformations_by_provider_filter');



//	Filter Smile Transformations by Owners
function filter_smile_transformations_by_owner_dropdown() {
	if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'smile_transformation') {
		$meta_val = 'smile_transformation_owner_relationship';
		$selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

		global $providers;
		$choices = array();
		foreach($providers->providers as $provider) {
			$choices[$provider->ID] = $provider->first_name . ' ' . $provider->last_name;
		}
	
		echo'<select name="'. $meta_val .'">';
			echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>Owners</option>';
			foreach( $choices as $key => $value ) {
				echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
			}
		echo'</select>';
	}
}

add_action('restrict_manage_posts', 'filter_smile_transformations_by_owner_dropdown');

function filter_smile_transformations_by_owner_filter($query) {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'smile_transformation' && $query->is_main_query()) {
        $meta_val = 'smile_transformation_owner_relationship';
        if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all') {
            $query->set('meta_query', array( array(
                'key' => $meta_val,
                'value' => '"' . $_GET[$meta_val] . '"',
                'compare' => 'LIKE'
            ) ) );
        }
    }
}
add_action('pre_get_posts','filter_smile_transformations_by_owner_filter'); 


//	Filter locations
function filter_locations_by_brand_dropdown() {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'location') {
        $meta_val = 'location_brand_relationship';
        $selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

        global $brands;
        $choices = array();
        foreach($brands->brands as $brand) {
            $choices[$brand->ID] = $brand->post_title;
        }

        echo'<select name="'. $meta_val .'">';
        echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All Brands</option>';
        foreach( $choices as $key => $value ) {
            echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
        }
        echo'</select>';
    }
}
add_action('restrict_manage_posts', 'filter_locations_by_brand_dropdown');

function filter_locations_by_brand_filter($query) {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'location' && $query->is_main_query()) {
        $meta_val = 'location_brand_relationship';
        if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all') {
            $query->set('meta_query', array( array(
                'key' => $meta_val,
                'value' => '"' . $_GET[$meta_val] . '"',
                'compare' => 'LIKE'
            ) ) );
        }
    }
}
add_action('pre_get_posts','filter_locations_by_brand_filter');

//	Filter reviews
function filter_reviews_by_brand_dropdown() {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'review') {
        $meta_val = 'review_relationships';
        $selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

        global $brands;
        $choices = array();
        foreach($brands->brands as $brand) {
            $choices[$brand->ID] = $brand->post_title;
        }

        echo'<select name="'. $meta_val .'">';
        echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All Brands</option>';
        foreach( $choices as $key => $value ) {
            echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
        }
        echo'</select>';
    }
}
add_action('restrict_manage_posts', 'filter_reviews_by_brand_dropdown');

function filter_reviews_by_brand_filter($query) {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'review' && $query->is_main_query()) {
        $meta_val = 'review_relationships';
        if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all') {
            $query->set('meta_query', array( array(
                'key' => $meta_val,
                'value' => '"' . $_GET[$meta_val] . '"',
                'compare' => 'LIKE'
            ) ) );
        }
    }
}
add_action('pre_get_posts','filter_reviews_by_brand_filter');

//	Filter Edu associations
function filter_edu_associations_by_provider_dropdown() {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'edu_association') {
        $meta_val = 'edu_association_provider_relationship';
        $selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

        global $providers;
        $choices = array();
        foreach($providers->providers as $provider) {
            $choices[$provider->ID] = $provider->post_title;
        }

        echo'<select name="'. $meta_val .'">';
        echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All Providers</option>';
        foreach( $choices as $key => $value ) {
            echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
        }
        echo'</select>';
    }
}
add_action('restrict_manage_posts', 'filter_edu_associations_by_provider_dropdown');

function filter_edu_associations_by_provider_filter($query) {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'edu_association' && $query->is_main_query()) {
        $meta_val = 'edu_association_provider_relationship';
        if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all') {
            $query->set('meta_query', array( array(
                'key' => $meta_val,
                'value' => '"' . $_GET[$meta_val] . '"',
                'compare' => 'LIKE'
            ) ) );
        }
    }
}
add_action('pre_get_posts','filter_edu_associations_by_provider_filter');

// Filter Edu associations by Brand
function filter_edu_associations_by_brand_dropdown() {
	if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'edu_association') {
		$meta_val = 'edu_association_brand_relationship';
		$selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

		global $brands;
		$choices = array();
		foreach($brands->brands as $brand) {
			$choices[$brand->ID] = $brand->post_title;
		}
	
		echo'<select name="'. $meta_val .'">';
			echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All Brands</option>';
			foreach( $choices as $key => $value ) {
				echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
			}
		echo'</select>';
	}
}
add_action('restrict_manage_posts', 'filter_edu_associations_by_brand_dropdown');

function filter_edu_associations_by_brand_filter($query) {
	global $wpdb;

	if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'edu_association' && $query->is_main_query()) {
		$meta_val = 'edu_association_brand_relationship';        

		if( isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all' ) {
            // if(!empty($filtered_regions)){            
            //     $filtered_regions->regions = get_regions_for_brand($_GET[$meta_val]);
            // } else {
            //     $filtered_regions = (object)[];
            //     $filtered_regions->regions = get_regions_for_brand($_GET[$meta_val]);
            // }

			$provider_id_listing = $wpdb->get_var( "SELECT GROUP_CONCAT(p.ID SEPARATOR '|') as providerIDs FROM $wpdb->posts p WHERE ID in ( SELECT pm.post_id as pId FROM $wpdb->postmeta pm WHERE pm.meta_key = 'provider_brand_relationship' AND pm.meta_value LIKE '%$_GET[$meta_val]%' ) AND p.post_status = 'publish'" );

			$query->set( 'meta_query', array(
				array(
					'key' => 'edu_association_provider_relationship',
					'value' => $provider_id_listing,
					'compare' => 'REGEXP'
				) 
			) );
		}
    }
}
add_action('pre_get_posts','filter_edu_associations_by_brand_filter'); 

//	Filter Edu associations by Region
function filter_edu_associations_by_region_dropdown() {
	if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'edu_association') {
		$meta_val = 'edu_association_region_relationship';
		$selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

		global $regions;
		$choices = array();

		foreach($regions->regions as $region) {
			$choices[$region->ID] = $region->post_title;
		}
	
		echo'<select name="'. $meta_val .'">';
			echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All Regions</option>';
			foreach( $choices as $key => $value ) {
				echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
			}
		echo'</select>';
	}
}
add_action('restrict_manage_posts', 'filter_edu_associations_by_region_dropdown');

function filter_edu_associations_by_region_filter($query) {
	global $wpdb, $regions;

	if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'edu_association' && $query->is_main_query()) {
		$meta_val = 'edu_association_region_relationship';
		if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all' && $_GET['edu_association_provider_relationship'] == 'all') {
			$locations_by_region_id = $wpdb->get_var( "SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = 'region_location_relationship' AND post_id = $_GET[$meta_val]" );
			$locations_by_region_id = unserialize( $locations_by_region_id );
			$provider_id_listing_str = '';
			$providers_for_location = [];

			foreach ($locations_by_region_id as $outer_key => $location_id) {
				$providers_for_location = $wpdb->get_results( "SELECT * FROM $wpdb->postmeta WHERE meta_key = 'provider_location_relationship' AND meta_value LIKE '%$location_id%'" );

				foreach ($providers_for_location as $inner_key => $provider) {
					$provider_id_listing_str .= $provider->post_id;
					
					if ( (COUNT($providers_for_location) - 1) > $inner_key) {
						$provider_id_listing_str .= '|';
					}
				}

				if ( (COUNT($locations_by_region_id) - 1) > $outer_key) {
					$provider_id_listing_str .= '|';
				}
			}

			$query->set( 'meta_query', array(
				array(
					'key' => 'edu_association_provider_relationship',
					'value' => $provider_id_listing_str,
					'compare' => 'REGEXP'
				) 
			) );
		}
        // print_stmt($regions, true);
    }
}
add_action('pre_get_posts','filter_edu_associations_by_region_filter'); 

//	Filter Professional Associations by Provider
function filter_pro_affiliations_by_provider_dropdown() {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'pro_affiliation') {
        $meta_val = 'pro_affiliation_provider_relationship';
        $selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

        global $providers;
        $choices = array();
        foreach($providers->providers as $provider) {
            $choices[$provider->ID] = $provider->post_title;
        }

        echo'<select name="'. $meta_val .'">';
        echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All Providers</option>';
        foreach( $choices as $key => $value ) {
            echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
        }
        echo'</select>';
    }
}
add_action('restrict_manage_posts', 'filter_pro_affiliations_by_provider_dropdown');

function filter_pro_affiliations_by_provider_filter($query) {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'pro_affiliation' && $query->is_main_query()) {
        $meta_val = 'pro_affiliation_provider_relationship';
        if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all') {
            $query->set('meta_query', array( array(
                'key' => $meta_val,
                'value' => '"' . $_GET[$meta_val] . '"',
                'compare' => 'LIKE'
            ) ) );
        }
    }
}
add_action('pre_get_posts','filter_pro_affiliations_by_provider_filter'); 

// Filter Events by Brand
//	Filter locations
function filter_events_by_brand_dropdown() {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'event') {
        $meta_val = 'event_brand_relationship';
        $selected = filter_input(INPUT_GET, $meta_val, FILTER_SANITIZE_STRING );

        global $brands;
        $choices = array();
        foreach($brands->brands as $brand) {
            $choices[$brand->ID] = $brand->post_title;
        }

        echo'<select name="'. $meta_val .'">';
        echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>All Brands</option>';
        foreach( $choices as $key => $value ) {
            echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
        }
        echo'</select>';
    }
}
add_action('restrict_manage_posts', 'filter_events_by_brand_dropdown');

function filter_events_by_brand_filter($query) {
    if(is_admin() && isset($_GET['post_type']) && $_GET['post_type'] === 'event' && $query->is_main_query()) {
        $meta_val = 'event_brand_relationship';
        if (isset($_GET[$meta_val]) && $_GET[$meta_val] != 'all') {
            $query->set('meta_query', array( array(
                'key' => $meta_val,
                'value' => '"' . $_GET[$meta_val] . '"',
                'compare' => 'LIKE'
            ) ) );
        }
    }
}
add_action('pre_get_posts','filter_events_by_brand_filter');

function sim_set_interstitial_user_session() {
    session_start();
    $_SESSION["interstitial-closed"] = true;
    do_action( 'w3tc_flush_all' );
}
add_action( 'wp_ajax_nopriv_set_interstitial_user_session' , 'sim_set_interstitial_user_session' );
add_action( 'wp_ajax_set_interstitial_user_session', 'sim_set_interstitial_user_session' );