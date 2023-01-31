<?
# Template Name: Community Involvement
$brand = is_brand();
wp_enqueue_script('internal-logo-carousel');
get_header();

$hero_standard_mobile_image_id = get_post_meta(get_the_ID(), 'community_involvement_hero_mobile_image', true);
$hero_standard_desktop_image_id = get_post_meta(get_the_ID(), 'community_involvement_hero_desktop_image', true);
$hero_section_classes = ['parallax', 'community-involvement', sanitize_title($brand->post_title)];
$hero_standard_h1 = get_post_meta(get_the_ID(),'community_involvement_hero_heading', true);
$hero_position = get_post_meta(get_the_id(), 'community_involvement_hero_position', true) ? 'reverse' : ''; // Default return 0 or left
$hero_text_color = get_post_meta(get_the_id(), 'community_involvement_hero_heading_color', true) ; // Default return 'primary'
$container_color_classes = $hero_text_color === 'primary' ? 'bg-gray' : 'bg-primary';
$copy_full_h2 = get_post_meta(get_the_ID(),'community_involvement_section_two_content', true);
$copy_full_h2_classes = ['h4', 'primary'];
$section_two_cta_text = get_post_meta(get_the_ID(),'community_involvement_section_two_cta_text', true);
$copy_full_content = '<a href="#form" class="cta black text">' . $section_two_cta_text .'</a>';

partial('section.hero.standard', [
    'classes' => $hero_section_classes,
    'desktop_image' => [
        'src' => wp_get_attachment_image_src($hero_standard_desktop_image_id, 'full')[0],
        'alt' => get_post_meta($hero_standard_desktop_image_id, '_wp_attachment_image_alt', true),
        'classes' => ['desktop'],
    ],
    'mobile_image' => [
        'src' =>    wp_get_attachment_image_src($hero_standard_mobile_image_id, 'large')[0],
        'alt' => get_post_meta($hero_standard_mobile_image_id, '_wp_attachment_image_alt', true),
        'width' => wp_get_attachment_image_src($hero_standard_mobile_image_id, 'large')[1],
        'height' => wp_get_attachment_image_src($hero_standard_mobile_image_id, 'large')[2],
        'classes' => ['menu-max-show'],
    ],
]);

partial('section.copy.two-cols-box-with-image', [
	'classes' => ['community-involvement', $hero_position],
    'h1' => $hero_standard_h1,
    'h1_classes' => [$hero_text_color],
	'h2' => $copy_full_h2,
	'h2_classes' => $copy_full_h2_classes,
    'box_classes' => [$container_color_classes],
	'aside_content' => apply_filters('the_content', $copy_full_content),
]);

$overlap_carousel_h2 = get_post_meta(get_the_ID(),'community_involvement_section_three_heading',true);
$overlap_carousel_text = apply_filters('the_content', get_post_meta(get_the_ID(),'community_involvement_section_three_content',true));
$overlap_carousel_cta_text = get_post_meta(get_the_ID(),'community_involvement_section_three_cta_text',true);
$overlap_carousel_cta = [
    'href' => !is_single_location_brand() ? brand_url('/orthodontist-office/') : brand_url('/contact-us/'),
    'text' => !is_single_location_brand() ? $overlap_carousel_cta_text : 'Contact us',
    'classes' => ['cta', 'text'],
];

$community_involvement_slides_count = get_post_meta(get_the_ID(), 'community_involvement_section_three_slides', true);

if( $community_involvement_slides_count > 0){
    $community_involvement_slides = [];
    for($i = 0; $i < $community_involvement_slides_count; $i++){
        $image_ID = get_post_meta(get_the_ID(), 'community_involvement_section_three_slides_'.$i.'_slide_image', true);
        $image_src = wp_get_attachment_image_src($image_ID, 'full')[0];
        $community_involvement_slides[$i]['image']['src'] = $image_src;
        $community_involvement_slides[$i]['mobile_image']['src'] = $image_src;
    }

    partial('section.overlap-carousel', [
        'classes' => [],
        'h3' => $overlap_carousel_h2,
        'h3_classes' => ['primary h2'],
        'text' => $overlap_carousel_text,
        'cta' => $overlap_carousel_cta,
        'slides' => $community_involvement_slides,
    ]);
}

$logo_carousel_count = get_post_meta(get_the_ID(), 'community_involvement_section_four_slides', true);

if( $logo_carousel_count > 0){
    $logo_carousel_logos = [];
    for($i = 0; $i < $logo_carousel_count; $i++){
        $logo = get_post_meta(get_the_ID(), 'community_involvement_section_four_slides_'.$i.'_slide_image', true);
        $logo_url = get_post_meta(get_the_ID(), 'community_involvement_section_four_slides_'.$i.'_slide_image_url', true);
        $logo_text = get_post_meta(get_the_ID(), 'community_involvement_section_four_slides_'.$i.'_slide_image_text', true);
        if(!empty($logo)){
            $logo_carousel_logos[$i]['src'] = wp_get_attachment_image_src($logo, 'full')[0];
            $logo_carousel_logos[$i]['href'] = $logo_url;
            $logo_carousel_logos[$i]['text'] = '';
        } else {
            $logo_carousel_logos[$i]['src'] = '';
            $logo_carousel_logos[$i]['href'] = $logo_url;
            $logo_carousel_logos[$i]['text'] = $logo_text;
        }
    }

    partial('section.logo-carousel', [
        'logos' => $logo_carousel_logos,
    ]);
}

$form_heading = get_post_meta(get_the_ID(),'community_involvement_section_five_heading', true);
$form_content = get_post_meta(get_the_ID(),'community_involvement_section_five_content', true);
partial('section.form', [
	'form' => 'community',
	'content' => '<h3 class="h2 primary">' . $form_heading .'</h3>'. apply_filters('the_content', $form_content)
]);
get_footer();
