<?
# Template Name: Patient Forms
$brand = is_brand();

if (is_single_location_brand()) {
	$location_id = wp_list_pluck(get_locations_for_brand($brand->ID), 'ID');
	$location_id = reset($location_id);
	$location = $locations->locations[strval($location_id)];
} else {
	$location = is_location();
}

get_header();

if (!empty($location) || is_single_location_brand()) {
	$side_image_id = $brand->patient_forms_side_image;

	$ctas = [
		[
			'heading' => $location->new_patient_consultation_form_heading,
			'content' => $location->new_patient_consultation_form_copy,
			'links' => [
				[
					'href' => $location->new_patient_consultation_form,
					'href_text' => $location->new_patient_consultation_form_link_text,
				],
			]
		],
		[
			'heading' => $location->a_b_form_heading,
			'content' => $location->a_b_form_copy,
			'links' => [
				[
					'href' => $location->form_a,
					'href_text' => $location->form_a_link_text,
				],
				[
					'href' => $location->form_b,
					'href_text' => $location->form_b_link_text,
				],
			]
		],
	];

	$new_patient_copy = $location->new_patient_copy;

	partial('section.hero.patient-forms-hero-location', [
		'classes' => ['patient-forms-location'],
		'new_patient_h2_classes' => [''],
		'new_patient_text' => $new_patient_copy,
		'new_ctas' => $ctas,
		'side_image' => [
			'src' => wp_get_attachment_image_src($side_image_id, 'full')[0],
			'alt' => get_post_meta($side_image_id, '_wp_attachment_image_alt', true),
			'classes' => ['patients-img'],
		]
	]);

	$heading = $location->patient_forms_section_two_heading;
	$copy = $location->patient_forms_section_two_copy;
	$braces_packet = $location->braces_packet;
	$invisalign_aligners_packet = $location->invisalign_aligners_packet;
	$expanders_packet = $location->expanders_packet;
	$herbst_appliance_packet = $location->herbst_appliance_packet;
	$retainer_packet = $location->retainer_packet;
	
} else {
	$hero_desktop_image_id = $brand->patient_forms_hero_desktop_image;
	$hero_mobile_image_id = $brand->patient_forms_hero_mobile_image;
	partial('section.hero.patient-forms-hero', [
		'position' => $brand->patient_forms_hero_position,
		'heading' => $brand->patient_forms_hero_heading,
		'content' => $brand->patient_forms_hero_content,
		'desktop_image' => wp_get_attachment_image_src($hero_desktop_image_id, 'full')[0],
		'mobile_image' => [
			'src' => wp_get_attachment_image_src($hero_mobile_image_id, 'medium_large')[0],
			'alt' => get_post_meta($hero_mobile_image_id, '_wp_attachment_image_alt', true),
			'classes' => ['mobile'],
		],
		'classes' => ['parallax', 'patient-forms', sanitize_title($brand->post_title)],
	]);

	$heading = $brand->patient_forms_section_two_heading;
	$copy = $brand->patient_forms_section_two_copy;
	$braces_packet = $brand->braces_packet;
	$invisalign_aligners_packet = $brand->invisalign_aligners_packet;
	$expanders_packet = $brand->expanders_packet;
	$herbst_appliance_packet = $brand->herbst_appliance_packet;
	$retainer_packet = $brand->retainer_packet;
}


if( 
	sanitize_title($brand->post_title) !== "prairie-grove-orthodontics" &&
	sanitize_title($brand->post_title) !== "ross-orthodontics" &&
	sanitize_title($brand->post_title) !== "central-lakes-orthodontics"
) {

	$icons = [
		[
			'widget_partial' => 'widget.icons.traditional-braces',
			'widget_content' => '',
			'widget_classes' => [],
			'widget_heading' => 'Braces',
			'widget_link' => [
				'href' => wp_get_attachment_url($braces_packet),
				'text' => 'Download packet',
			]
		],
		[
			'widget_partial' => 'widget.icons.clear-aligners',
			'widget_content' => '',
			'widget_classes' => [],
			'widget_heading' => 'Invisalign<sup>&reg;</sup> clear aligners',
			'widget_link' => [
				'href' => wp_get_attachment_url($invisalign_aligners_packet),
				'text' => 'Download packet',
			]
		],
		[
			'widget_partial' => 'widget.icons.retainers',
			'widget_content' => '',
			'widget_classes' => [],
			'widget_heading' => 'Retainers',
			'widget_link' => [
				'href' => wp_get_attachment_url($retainer_packet),
				'text' => 'Download packet',
			]
		],
	];

	
	
	partial('section.icons.static-with-copy', [
		'classes' => ['instruction-downloads'],
		'heading' => '<h2 class="text-center">'. $heading .'</h2>',
		'content' => '<p class="text-center">'. $copy .'</p>',
		'icons' => $icons,
	]);
}

$brand = is_brand();
$location = is_location($brand);

if ($brand->ID == 16618 && $location == true )
{
	
	$icons = [
		[
			'widget_partial' => 'widget.icons.traditional-braces',
			'widget_content' => '',
			'widget_classes' => [],
			'widget_heading' => 'Braces',
			'widget_link' => [
				'href' => wp_get_attachment_url($braces_packet),
				'text' => 'Download packet',
			]
		],		
		[
			'widget_partial' => 'widget.icons.retainers',
			'widget_content' => '',
			'widget_classes' => [],
			'widget_heading' => 'Retainers',
			'widget_link' => [
				'href' => wp_get_attachment_url($retainer_packet),
				'text' => 'Download packet',
			]
		],
	];

	
	
	partial('section.icons.static-with-copy', [
		'classes' => ['instruction-downloads'],
		'heading' => '<h2 class="text-center">'. $heading .'</h2>',
		'content' => '<p class="text-center">'. $copy .'</p>',
		'icons' => $icons,
	]);
}

get_footer();
