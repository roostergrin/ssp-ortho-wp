<?
$heading = $heading ?? 'Virtual consultations from home';
$copy = $copy ?? '<p>Virtual consultations are an easy way to begin the new patient process from home and are as easy as 1-2-3 on your smart phone or tablet.</p>';
$location = is_location();


if (empty($image) && empty($mobile_image)) return; ?>
<section class="hero full<?= !empty($classes) ? ' '.implode(' ', $classes) : ''; ?>">
	<? if (!empty($image)) : ?>
		<div class="img-container desktop">
			<img<?= !empty($image['src']) ? ' src="'.$image['src'].'"' : ''; ?><?= !empty($image['width']) ? ' width="'.$image['width'].'"' : ''; ?><?= !empty($image['height']) ? ' height="'.$image['height'].'"' : ''; ?><?= !empty($image['srcset']) ? ' srcset="'.$image['srcset'].'"' : ''; ?><?= !empty($image['sizes']) ? ' sizes="'.$image['sizes'].'"' : ''; ?><?= !empty($image['alt']) ? ' alt="'.$image['alt'].'"' : ''; ?><?= !empty($image['classes']) ? ' class="'.implode(' ', $image['classes']).'"' : ''; ?> loading="lazy" />
			<? if (!empty($overlay)) : ?>
				<div class="overlay"></div>
			<? endif; ?>
		</div>
	<? endif; ?>
	<? if (!empty($mobile_image)) : ?>
		<div class="img-container mobile">
			<img<?= !empty($mobile_image['src']) ? ' src="'.$mobile_image['src'].'"' : ''; ?><?= !empty($mobile_image['width']) ? ' width="'.$mobile_image['width'].'"' : ''; ?><?= !empty($mobile_image['height']) ? ' height="'.$mobile_image['height'].'"' : ''; ?><?= !empty($mobile_image['srcset']) ? ' srcset="'.$mobile_image['srcset'].'"' : ''; ?><?= !empty($mobile_image['sizes']) ? ' sizes="'.$mobile_image['sizes'].'"' : ''; ?><?= !empty($mobile_image['alt']) ? ' alt="'.$mobile_image['alt'].'"' : ''; ?><?= !empty($mobile_image['classes']) ? ' class="'.implode(' ', $mobile_image['classes']).'"' : ''; ?> loading="lazy" />
			<? if (!empty($overlay)) : ?>
				<div class="overlay"></div>
			<? endif; ?>
		</div>
	<? endif; ?>
		<div class="content">
			<div class="inner-content">
				<div class="content-container white">
					<div class="main-container" id="consult-from-home">
                        <div class="container">
                            <h2 class="h3 white"><?= $heading;  ?></h2>
                            <?= $copy;?>
                            <? if($location) {
                            $patient_forms = get_patient_forms($location->ID); // This NEEDS to be redone. We cannot pull from the Entity Tables...
                            ?>
                            <p><a href="<?=$patient_forms->virtualConsultation; ?>" class="cta text white" target="_blank">Start your virtual consultation</a></p>
                            <? } ?>
                        </div>
                        <div class="columns-container">
                        <? foreach($widgets as $partial => $content ) : ?>
                            <div class="column">
                                <? partial($partial, ['content' => $content]); ?>
                            </div>
                        <? endforeach; ?>
                        </div>
                         <? if(is_brand()) { ?>
                        <div class="form-wrapper">
                            <div class="fancy-select" id="virtual-consultation">
                                <div class="fancy-select-title">Select your Kristo office</div>
                                <div class="options hidden">
                                    <ul class="select-options">
                                        <li><a href="#" id="https://us.smilemate.com/practice/a46c1ecd-f968-4a02-9279-59a8bb9616a7">Amery</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/a46c1ecd-f968-4a02-9279-59a8bb9616a7">Baldwin</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/7e92170b-ccdc-47be-991b-f0e00f958909">Black River Falls</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/7e92170b-ccdc-47be-991b-f0e00f958909">Bloomer</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/7e92170b-ccdc-47be-991b-f0e00f958909">Chippewa Falls</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/7e92170b-ccdc-47be-991b-f0e00f958909">Eau Claire</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/fac97cca-c310-424d-ba3f-60d937a24358">Marinette</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/7e92170b-ccdc-47be-991b-f0e00f958909">Menomonie</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/14de6956-012a-4ce4-a0b5-a29844be3d0a">Merrill</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/a46c1ecd-f968-4a02-9279-59a8bb9616a7">New Richmond</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/7e92170b-ccdc-47be-991b-f0e00f958909">Rice Lake</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/a46c1ecd-f968-4a02-9279-59a8bb9616a7">River Falls</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/7e92170b-ccdc-47be-991b-f0e00f958909">Stanley</a></li>
                                        <li><a href="#" id="https://us.smilemate.com/practice/14de6956-012a-4ce4-a0b5-a29844be3d0a">Wausau</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cta-wrapper"><a href="#" class="cta text white hidden" id="start-vc" target="_blank">Start your virtual consultation</a></div>
                        </div>
                        <? } ?>
                    </div>

				</div>
			</div>
		</div>
</section>
