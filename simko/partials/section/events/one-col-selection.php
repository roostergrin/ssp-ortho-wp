<section id="events" class="one-col-selection <?= !empty($classes) ? implode(' ', $classes) : ''; ?>">
    <div class="content">
        <div class="inner-content">
            <h2 class="white center"><?= $heading; ?></h2>
            <p class="white center"><?= $content; ?></p>

            <div class="form-wrapper">
                <div class="fancy-select">
                <? if (!empty($brand_locations)): ?>
                    <div class="fancy-select-title">Select your office location</div>
                    <div class="options hidden">
                        <ul class="select-options">
                            <? foreach ($brand_locations as $l): ?>
                                <li><a href="<?= brand_url('/'.$l->relative_url.'/confidence-counts-club/'); ?>#events"><?= $l->post_title ?></a></li>
                            <? endforeach ?>
                        </ul>
                    </div>
                <? endif ?>
                </div>
            </div>
        </div>
    </div>
</section>