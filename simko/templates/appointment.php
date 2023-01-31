<?
# Template Name: Appointment
get_header();
partial('section.form', [
	'form' => 'appointment',
	'heading' => get_post_meta(get_the_ID(), 'appointments_heading', true),
	'content' => get_post_meta(get_the_ID(), 'appointments_content', true),
]);
get_footer();
