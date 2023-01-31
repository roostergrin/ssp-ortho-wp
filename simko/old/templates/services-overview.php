<?
# Template Name: Services Overview
get_header();
partial('section.hero.with-image', [
	'image' => [
		'src' => 'https://via.placeholder.com/1410x590',
		'width' => '1410',
		'height' => '590',
		'alt' => '',
		'classes' => [
			'bg-img',
			'bg-img-top-center'
		],
	],
	'heading' => 'Customized orthodontic treatments for all ages',
	'content' => '<p>There’s no age limit for getting a healthy, beautiful smile at Kristo Orthodontics! Orthodontic treatment at any age can improve appearance, boost self-confidence, and make a substantial impact on the health of teeth and jaws.. The specialized team and doctors at Kristo provide appropriately timed orthodontic treatment to improve overall functionality and bite alignment in addition to safely straightening teeth to create amazing smiles that can be enjoyed for a lifetime.</p>'
]);
partial('section.copy.three-fifths', [
	'classes' => ['reverse'],
	'h2' => 'Orthodontic treatment for children',
	'h2_classes' => ['h1'],
	'column1' => '<p>The American Association of Orthodontists (AAO) recommends scheduling your child’s initial orthodontist visit around the age of seven, and at Kristo Orthodontics we agree! An early evaluation by a Kristo Orthodontist can help intercept and identify problems with the teeth and jaws that would benefit from early correction, potentially eliminating the need for more serious treatment when children are older.</p><p>During a child’s initial orthodontic evaluation with us, most children have a mix of both primary teeth and permanent teeth. early treatment is recommended before all permanent teeth are present, a two-phase treatment plan may be proposed.</p><a href="#" class="cta text">View types of braces</a>',
	'column2' => '<img src="https://via.placeholder.com/370x400" width="370" height="400" alt="" />',
]);
partial('section.copy.two-cols', [
	'classes' => ['white'],
	'content_classes' => ['bg-primary'],
	'h2' => 'Our two-phase treatments for children',
	'h2_classes' => ['white'],
	'columns' => [
		'<p class="heading">Phase one</p><p>This is a treatment of 1 to 2 years for the early correction of tooth and jaw problems. In most cases, a single phase orthodontic treatment can be just as effective in giving your child a healthy, beautiful smile.</p><p>You can trust your orthodontist at Kristo Orthodontics to honestly advise you on all treatment options available to you and the ideal time for your child to begin treatment in order to achieve your goals and desired results, without incurring unnecessary costs.</p>',
		'<p class="heading">Phase two</p><p>The second phase of treatment may take place for up to 2 more years to shape the ideal smile. For 1 to 3 years patients wear a retainer while the permanent teeth come in.</p>'
	],
]);
partial('section.copy.three-fifths', [
	'h2' => 'Orthodontic treatment for teens',
	'h2_classes' => ['h1'],
	'column1' => '<p>The most common time to begin orthodontic treatment is between the ages of 12 and 16. At this point, your teen typically has most their permanent teeth in place which makes it an ideal time to improve oral health and their smile’s general appearance.</p><p>When your teen is ready to begin corrective orthodontic treatment, your orthodontist at Kristo will provide treatment recommendations that align with your unique goals and lifestyle. Treatment with braces is most popular for teens, and advances have made today’s braces smaller, sleeker and more comfortable than ever before. Invisalign clear aligners are another treatment option for some teens, offering treatment that is nearly invisible and completely removable for sports, music, eating, etc.</p>',
	'column2' => '<img src="https://via.placeholder.com/370x400" width="370" height="400" alt="" />',
]);
partial('section.copy.full', [
	'classes' => ['bg-gray'],
	'h3' => '“How long will I have to wear braces?”',
	'content' => '<p>One question we often hear from teens is, “How long will I have to wear braces?” For teens, the jaws and teeth typically respond quickly to orthodontic treatment, and overall treatment averages about 24 months. Each teen’s treatment journey is unique, and there is no single correct way or overall treatment time to accomplish the desired goals for your teen. When you meet with your orthodontist at Kristo, your doctor will make informed recommendations just for your teen, so you can make an educated decision about their orthodontic treatment.</p><a href="#" class="cta text">View types of braces</a>',
]);
partial('section.copy.three-fifths', [
	'classes' => ['reverse'],
	'h2' => 'Orthodontic treatment for adults',
	'h2_classes' => ['h1'],
	'column1' => '<p>More and more adults are seeking out orthodontic treatment later in life, for a variety of reasons. Many adult patients seek treatment to correct shifting that takes place in the adult years, which can lead to problems like tooth decay, gum disease, difficulty chewing, and abnormal wearing of tooth enamel. Many adults also seek treatment for aesthetic reasons, to get a brilliant smile and gain self-confidence.</p><p>Whatever the reason, adults who seek treatment from the specialists at Kristo Orthodontics are able to achieve their orthodontic goals in more discreet and convenient ways than before. With our modern braces and Invisalign, the world’s most advanced clear aligner system, it’s never too late to get a healthier mouth, straight teeth, and a more confident smile!</p><a href="#" class="cta text">About Invisalign<sup>®</sup></a>',
	'column2' => '<img src="https://via.placeholder.com/370x400" width="370" height="400" alt="" />',
]);
partial('section.copy.full', [
	'classes' => [],
	'h2' => 'What common problems do orthodontists treat?',
	'h2_classes' => ['h1'],
	'content' => '<p>At Kristo, we feel everyone deserves to have healthy, beautiful teeth and smiles. Our orthodontists are specially trained to correct teeth and bite problems, referred to as malocclusions. In addition to boosting self-esteem and confidence with brilliant smiles, orthodontic treatment decreases your risk of future and potentially costly dental problems.</p>',
]);
partial('section.cards', [
	'classes' => ['four-columns'],
	'h2' => 'Some of the most common issues we see in patients of all ages include:',
	'h2_classes' => ['primary'],
	'cards' => [
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-open',
			'title' => 'Crossbite',
			'content' => '<p>The upper teeth fit inside the lower teeth, shifting the jaw to one side and causing a misalignment of the bone.</p>'
		],
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-open',
			'title' => 'Underbite',
			'content' => '<p>The lower jaw extends in front of the upper jaw, causing stress on the jaw joints as well as additional tooth wear.</p>'
		],
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-financing',
			'title' => 'Open bite',
			'content' => '<p>The back teeth either come together, but the front teeth do not (anterior open bite), or the front teeth meet, but the back teeth do not (posterior open bite). Swallowing and speech problems may result.</p>'
		],
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-exam',
			'title' => 'Deep bite',
			'content' => '<p>The upper teeth extend too far down over the bottom teeth, causing the upper teeth to bite into the lower gums and the lower teeth to bite into the roof of the mouth. This creates the potential for gum disease and abnormal enamel wear.</p>'
		],
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-price',
			'title' => 'Teeth crowding',
			'content' => '<p>When teeth lack sufficient space in the mouth, they can overlap or rotate, resulting in a crooked appearance. This makes them difficult to clean, and can lead to cavities and gum disease.</p>'
		],
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-open',
			'title' => 'Spacing issues',
			'content' => '<p>In cases of missing teeth, undersized teeth, or oversized jaws, the resulting spaces can allow food to get stuck, causing cavities and gum disease.</p>'
		],
		[
			'classes' => ['bg-gray-2'],
			'icon' => 'icon-financing',
			'title' => 'Protrusion',
			'content' => '<p>Sometimes referred to as “buck teeth,” protrusion occurs when the upper jaw is positioned too far forward, or the lower jaw is positioned too far back. If left uncorrected, the upper teeth will be prone to breakage, and it may be difficult to comfortably close the mouth and lips. In addition, dry oral tissue can result in tooth decay and speech problems.</p>'
		],
		[
			'classes' => ['bg-primary'],
			'h2' => 'No dentist referral is necessary!',
			'content' => '<p>If you’re confronted with any of these orthodontic conditions, schedule your free consultation with Kristo Orthodontics today.</p>'
		],
	],
]);
partial('section.smile-gallery');
partial('section.copy.with-wide-image', [
	'h2' => 'What’s the difference between a dentist and an orthodontist?',
	'h2_classes' => ['h1'],
	'content' => '<p>An orthodontist is a dental specialist who has received an additional 2 to 3 years of training beyond the initial four years of dental school just on orthodontics. This additional formalized education makes orthodontists at Kristo Orthodontics experts in the healthy alignment and safe movement of teeth and jaws.</p><p>Kristo Orthodontics always puts patients first, and our team’s specialized education, skills, and expertise ensure we’re a superior partner to properly diagnose your orthodontic concerns and recommend appropriate treatment options to get you the confident, healthy smile you deserve!</p>',
	'cta' => [
		'text' => 'Meet our team',
		'href' => '#',
		'classes' => ['cta', 'text'],
	],
	'image' => [
		'src' => 'https://via.placeholder.com/570x510',
		'alt' => '',
		'classes' => [],
		'width' => '570',
		'height' => '510',
	],
]);
partial('section.copy.full', [
	'classes' => ['schedule'],
	'h2' => 'Schedule your free consultation today!',
	'h2_classes' => ['h1', 'primary'],
	'content' => '<p>Your consultation will include a free orthodontic exam with photos, X-ray images, and customized information on treatment plans that include virtual dental monitoring technology.</p><div class="contact"><a href="tel:+17158355182" class="cta text">Call 715-835-5182</a><a href="/free-consultations/" class="cta text">Book online</a></div>',
]);
get_footer();
