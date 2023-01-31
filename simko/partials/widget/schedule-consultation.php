<?
global $wp;

$page_template = get_page_template();
$page_template_arr = explode( '/', $page_template );

if ($wp->request === 'orthodontist-office' || is_404() || get_the_id() == 13049) return;
if( !empty( $page_template ) && end( $page_template_arr ) == 'sleep-apnea.php' ) return;
$template_array = explode('/', get_page_template());
if (in_array(end($template_array), ['appointment.php', 'careers.php', 'refer-a-friend.php', 'patient-forms.php', 'free-consultations.php', 'emergency-care-and-repair.php', 'share-feedback.php', 'community-involvement.php', 'custom-mouthguard.php', 'dentist-referral.php'])) return;
$location = is_location();
?>
<? if(get_the_ID() == 220) : ?>
	<div class="widget schedule-consultation">
		<h2>Share the joy of a healthy, beauty smile!</h2>
		<div class="container">
			<a href="<?= brand_url('refer-a-friend-program'); ?>" class="cta text white">Refer a friend!</a>
		</div>
	</div>
<? else: ?>
	<div class="widget schedule-consultation<?= !empty($widget_classes) ? ' '.implode(' ', $widget_classes) : ''; ?>">
        <? if( !empty( $page_template ) && end( $page_template_arr ) == 'confidence-counts.php'): ?>
            <h2>Schedule a free evaluation today!</h2>
        <? else: ?>
            <h2>Schedule your free consultation today!</h2>
        <? endif; ?>
		
		<div class="container">
			<?
				if (!empty($location)) echo do_shortcode('[phone_link text="Call %number%" class="cta text white"]');
				if (!empty($cta)) {
					echo do_shortcode($cta);
				} else {
					echo do_shortcode('[free_orthodontic_consultation_link text="Book online" class="cta text white"]');
				}
			?>
		</div>
	</div>
<? endif; ?>
