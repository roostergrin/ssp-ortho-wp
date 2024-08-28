<?
global $is_IE, $is_edge;
$brand = is_brand();
$location = is_location();
$colors = explode(', ', $brand->colors);
$fonts = $brand->fonts;
$html_classes = $body_classes = [];
if(is_user_logged_in()) $html_classes[] = 'admin-bar';
if($is_IE || $is_edge) $body_classes[] = 'IE';

$interstital_banner_locations = get_post_meta($brand->ID, 'brand_interstitial_locations_relationship', True);
if( !empty($interstital_banner_locations) && !empty($location) && in_array($location->ID, $interstital_banner_locations)){
	$interstital_banner = true;
	$html_classes[] = 'interstitial-banner-open';
}

$html_classes = array_filter(array_unique($html_classes));
$html_classes = empty($html_classes) ? '' : ' class="'.implode(' ', $html_classes).'" ';
?>
<!DOCTYPE html>
<html <? language_attributes(); echo $html_classes; ?>>
	<head>
		<title><? wp_title(' | ', true, 'right'); ?></title>
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
		<? wp_head(); ?>
		<style>
			:root {
				--color-primary: <?= !empty($colors[0]) ? $colors[0] : '#418ce1'; ?>;
				--color-secondary:<?= !empty($colors[1]) ? $colors[1] : '#9FC5F0'; ?>;
				--color-tertiary:<?= !empty($colors[2]) ? $colors[2] : '#66A2E7'; ?>;
				--color-gray-1:<?= !empty($colors[3]) ? $colors[3] : '#46464a'; ?>;
				--font-secondary: <?= !empty($fonts) ? $fonts : '\'Kumbh Sans\', sans-serif'; ?>;
			}
		</style>
		<?php if( $brand->ID === 8643 || $brand->ID === 3291 || $brand->ID === 13032 || $brand->ID === 16332 || $brand->ID === 16618 || $brand->ID === 12097): ?>
			<script 
				type="text/javascript"
				defer 
				src="https://analytics.liine.com/v1/bootstrapped/42f33e1134074fb0bbef3b2fe2ea0680.js"
			>
			</script>

			<script src="https://app-widget.jotform.io/scripts/getUrlReferrer.js" defer></script>
		<?php endif; ?>	
	</head>
	<body <? body_class($body_classes) ?>>
		<main>
			<? do_action('body'); ?>
            <? partial('section.header-mobile'); ?>
			<? partial('section.header'); ?>
