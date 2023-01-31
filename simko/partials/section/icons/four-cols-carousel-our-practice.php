<?
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-icons-carousel');
?>
<section class="icons carousel four-cols our-practice">
	<div class="content">
		<div class="inner-content">
			<div class="four-cols owl-carousel">
				<?
					for ($i = 0; $i < count($icons); $i++) {
						partial('widget.icons.'.($icons[$i]['icon']), ['text' => $icons[$i]['text']]);
					}
				?>
			</div>
		</div>
	</div>
</section>
