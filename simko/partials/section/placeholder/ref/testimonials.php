<?
wp_enqueue_style('lib-owl-carousel');
wp_enqueue_script('internal-owl-carousel');
?>
<section class="testimonials">
	<div class="content">
		<div class="inner-content">
			<div class="testimonials-carousel owl-carousel">
				<? foreach(range(1,4) as $i): ?>
				<div class="testimonial-item">
					<div class="container">
						<div class="testimonial-rating" data-rating="5"></div>
						<div class="testimonial-content h1">
							<p>Butterfly Effects provides excellent ABA services. <br class="desktop" />Their programs are well prepared and customized <br class="desktop" />to fit each individual client. Their staffs are well <br class="desktop" />trained, friendly, patient and respond immediately <br class="desktop" />to all requests.</p>
						</div>
						<div class="testimonial-attribution small">Hannah P.</div>
						<div class="testimonial-cta">
							<a href="#" class="cta blue-invert primary">Success stories</a>
						</div>
					</div>
				</div>
				<? endforeach ?>
			</div>
		</div>
	</div>
</section>