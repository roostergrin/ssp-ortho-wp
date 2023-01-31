<?
global $forms;
?>

<section id="events" class="two-cols-events-form <?= !empty($classes) ? implode(' ', $classes) : ''; ?>">
    <div class="content">
        <div class="inner-content">
            <article>
                <h1><?= $heading; ?></h1>

                <? foreach ($events as $event): ?>                    
                    <?                        
                        $desc = get_post_meta( $event->ID,'event_details_content', true);
                        $event_title_date = get_event_title_date($event)
                    ?>
                    <div class="event-container">
                        <p class="event-title-date white"><?= $event_title_date; ?></p>
                        <p class="event-desc white"><?= $desc ?></p>

                        <? if( $event->is_scholarship == 1 ): ?><a class="scholarship-link" href="<?= $event->scholarship_learn_more; ?>" target="_blank">Learn more</a><? endif; ?>
                    </div>
                <? endforeach; ?>
            </article>

            <aside>
                <div class="form-wrapper">
                    <p class="white">Each event requires an individual registration.</p>
                    <? $forms->generateForm('event'); ?>
                </div>
			</aside>
        </div>
    </div>
</section>