<?
# Template Name: Safety Procedures
get_header();
partial('section.hero.with-image', [
	'image' => [
		'src' => 'https://via.placeholder.com/1410x680',
		'width' => '1410',
		'height' => '680',
		'alt' => '',
		'classes' => [
			'bg-img',
			'bg-img-top-center'
		],
	],
	'heading' => 'Our commitment to safety',
	'content' => '<p>The safety and comfort of our patients and staff is our top priority at Kristo Orthodontics. Our clinics stay on the leading edge of dentistry and orthodontics and incorporate advanced safety measures to safeguard health and ensure the greatest level of care for our patients.</p><p>We always maintain the highest infection and cross-contamination prevention standards in our clinics, exceeding the standards recommended by the American Dental Association (ADA), the American Association of Orthodontists (AAO), the Center for Disease Control (CDC), and Occupational Safety and Health Administration (OSHA) to ensure that our patients and our team are safe.</p>'
]);
partial('section.copy.full', [
	'classes' => [],
	'h2' => 'COVID-19 precautions',
	'h2_classes' => ['h1'],
	'content' => '<p>The CDC recommends social distancing to decrease the likelihood of transmitting Coronavirus. With that advice in mind, we have implemented the following precautions in our clinics:</p>',
]);
partial('section.copy.two-cols', [
	'classes' => [],
	'h2' => 'Before your appointment',
	'h2_classes' => ['primary'],
	'columns' => [
		'<ul class="triangles"><li>Appointments will be scheduled to minimize contact with other patients in the waiting room.</li><li>All patients, parents, and visitors who wish to enter the office will be required to wear a cloth face covering or mask over their nose and mouth. Medical masks continue to be in very short supply and we cannot offer them.</li><li>Everyone entering the clinic will be screened using an infrared touch-free forehead thermometer. Any person with a temperature of 99.6 degrees or above may be rescheduled unless emergency dental or orthodontic pain, swelling or infection is present.</li></ul>',
		'<ul class="triangles"><li><span>You’ll be asked to complete an <a href="#">electronic form</a> prior to each appointment about COVID-19 symptoms.</span></li><li>Please arrive on time for your appointments, rather than too early, and wait in your car. Respond to your appointment confirmation text to notify us of your arrival, and we’ll call or text you when we’re ready to seat you and begin your appointment.</li><li>Please do not have siblings or extra people accompany you to your appointments when possible. We can follow-up by phone with parents.</li></ul>'
	],
]);
partial('section.cards', [
	'classes' => ['three-columns'],
	'cards' => [
		[
			'classes' => ['bg-primary'],
			'h2' => 'Patients',
			'h2_classes' => ['white'],
			'content' => '<ul class="triangles white"><li>Dental chair use will be staggered in the clinic to maintain a safe distance between patients. This will reduce the number of patients we can see each day so please be patient with us.</li><li>As an extra precaution, we’ll ask patients to rinse with 1.5% hydrogen peroxide (Peroxyl) before each appointment. Coronavirus is vulnerable to oxidation; this will reduce the salivary load of oral microbes.</li><li>Remote Dental Monitoring will be available for patients who are able to be evaluated via smartphone or tablet if no immediate adjustment is necessary.</li></ul>'
		],
		[
			'classes' => ['bg-primary'],
			'h2' => 'Waiting room',
			'h2_classes' => ['white'],
			'content' => '<ul class="triangles white"><li>Hand sanitizer is available and will be required for everyone entering the clinic.</li><li>Magazines, paper reading materials, and tablets have been removed from our waiting rooms, and we spaced out and limited seating. No coffee or refreshments will be served at this time.</li></ul>'
		],
		[
			'classes' => ['bg-primary'],
			'h2' => 'Staff',
			'h2_classes' => ['white'],
			'content' => '<ul class="triangles white"><li>All our employees will be taking their temperature twice a day, and if their temperature reaches 99.6 degrees or above, they will be instructed to stay home.</li><li>We’ll continue to provide a safe, sterile environment for our patients by cleaning and sanitizing all areas frequently and after each use.</li></ul>'
		]
	],
]);
get_footer();
