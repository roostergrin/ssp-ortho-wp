<div class="item">
    <div class="type">
        <?
        switch ($post_result->post_type) {
            case 'post':
                echo 'Blog';
                break;
            case 'page':
                echo get_the_title($post_result->ID);
                break;
            default:
                echo ucfirst($post_result->post_type);
                break;
        }
        ?>
    </div>
    <div class="title h4">
		<? if($post_result->post_type != 'page'):?>
			<a href="<?=get_permalink($post_result->ID) ?>"><?=$post_result->post_title; ?></a>
		<? else: ?>
			<a href="<?=get_permalink($post_result->ID) ?>"><?=getH1($post_result->post_content); ?></a>
		<? endif; ?>
	</div>
    <div class="copy"><?=excerptizeCharacters($post_result->post_content, 200, true, '&hellip;<br> <a href="'.get_permalink($post_result->ID).'" class="cta text">Learn&nbsp;more</a>'); ?></div>
</div>