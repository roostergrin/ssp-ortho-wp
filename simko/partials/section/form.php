<?
global $forms;
$location = is_location();
$content = $content ?? get_the_content();
?>
<section class="form<?= !empty($classes) ? ' ' . implode(' ', $classes) : '';?>" id="form">
	<div class="content">
		<div class="inner-content">
			<article>
                <?= !empty($heading) ? '<h1>'.($heading).'</h1>' : ''; ?>
				<?= apply_filters('the_content', $content) ?>
			</article>
			<aside>
                <div class="form-wrapper">
					<?php if( is_page('free-orthodontic-consultation') && $brand->ID === 8643): ?>
						<p> ALT FORM </p>
					<?php else: ?>
                    	<? $forms->generateForm($form); ?>
					<?php endif; ?>			
                </div>
			</aside>
		</div>
	</div>
</section>
