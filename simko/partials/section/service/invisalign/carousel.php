<? wp_enqueue_script('internal-invisalign-carousel'); ?>
<? wp_enqueue_script('internal-invisalign-aligner-carousel'); ?>
<section class="invisalign-carousel">
    <div class="content">
        <div class="inner-content">
            <div class="columns">
                <? foreach ($boxes as $box): ?>
                    <div class="column">
                        <div class="slide">
                            <h4 class="h2"><?= $box['heading'] ?></h4>
                            <?= $box['content'] ?>
                        </div>
                    </div>
                <? endforeach ?>
            </div>
        </div>
    </div>
</section>
