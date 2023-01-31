<?
# Template Name: Dental Monitoring

$virtual_monitoring_hero_desktop_image = get_post_meta(get_the_id(), 'virtual_monitoring_hero_desktop_image', true);
$virtual_monitoring_hero_mobile_image = get_post_meta(get_the_id(), 'virtual_monitoring_hero_mobile_image', true);

$virtual_monitoring_section_two_heading = get_post_meta(get_the_id(), 'virtual_monitoring_section_two_heading', true);
$virtual_monitoring_section_two_content = get_post_meta(get_the_id(), 'virtual_monitoring_section_two_content', true);
$virtual_monitoring_section_two_cta = get_post_meta(get_the_id(), 'virtual_monitoring_section_two_cta', true);
$virtual_monitoring_section_two_image = get_post_meta(get_the_id(), 'virtual_monitoring_section_two_image', true);

$virtual_monitoring_section_four_vid = get_post_meta(get_the_id(), 'virtual_monitoring_section_four_vid', true);
$virtual_monitoring_section_four_image = get_post_meta(get_the_id(), 'virtual_monitoring_section_four_image', true);
$virtual_monitoring_section_four_heading = get_post_meta(get_the_id(), 'virtual_monitoring_section_four_heading', true);
$virtual_monitoring_section_four_content = get_post_meta(get_the_id(), 'virtual_monitoring_section_four_content', true);

get_header();
partial('section.hero.standard', [
    'classes' => ['parallax', 'dental-monitoring'],
    'desktop_image' => [
        'src' => wp_get_attachment_image_src($virtual_monitoring_hero_desktop_image, 'full')[0],
        'alt' => get_post_meta($virtual_monitoring_hero_desktop_image, '_wp_attachment_image_alt', true),
        'classes' => ['desktop'],
    ],
    'mobile_image' => [
        'src' => wp_get_attachment_image_src($virtual_monitoring_hero_mobile_image, 'full')[0],
        'alt' => get_post_meta($virtual_monitoring_hero_mobile_image, '_wp_attachment_image_alt', true),
        'classes' => ['mobile'],
    ],
]);
partial('section.copy.two-cols-box-with-image', [
    'classes' => ['dental-monitoring', 'reverse'],
    'h1' => $virtual_monitoring_section_two_heading,
    'h1_classes' => ['white'],
    'content' => apply_filters('the_content', $virtual_monitoring_section_two_content) . do_shortcode($virtual_monitoring_section_two_cta),
    'aside_content' => '<img class="copy-img" src="' . wp_get_attachment_image_src($virtual_monitoring_section_two_image, 'medium_large')[0] .'" alt="'. get_post_meta($virtual_monitoring_section_two_image, '_wp_attachment_image_alt', true) .'"/>'
]);
partial('section.dental-monitoring-advantages', []);
partial('section.video-full-with-text', [
    'classes' => [],
    'image' => [
        'src' => wp_get_attachment_image_src($virtual_monitoring_section_four_image, 'full')[0],
        'srcset' => wp_get_attachment_image_src($virtual_monitoring_section_four_image, 'medium_large')[0] . ' 1x, '. wp_get_attachment_image_src($virtual_monitoring_section_four_image, 'large')[0] . ' 2x, '. wp_get_attachment_image_src($virtual_monitoring_section_four_image, 'full')[0] . ' 3x',
        'sizes' => '',
        'alt' => get_post_meta($virtual_monitoring_section_four_image, '_wp_attachment_image_alt', true),
        'classes' => ['bg-img'],
    ],
    'video_src' => $virtual_monitoring_section_four_vid,
    'h2' => $virtual_monitoring_section_four_heading,
    'content' => $virtual_monitoring_section_four_content,
]);
partial('section.three-step-dental-monitoring', []);
get_footer();
