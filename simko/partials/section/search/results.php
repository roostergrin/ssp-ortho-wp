<? global $wp_query;
$brand = is_brand();
?>
<? //if(!empty($_GET['s'])): ?>
<section class="search-results">
    <div class="content">
        <div class="inner-content">
            <h1><? if($wp_query->found_posts > 0): ?>You searched for<? endif; ?></h1>
            <div class="advanced-search">
                <form method="POST" id="advanced_site_search" class="advanced_site_search" autocomplete="off" action="/site-search/">
                    <input type="text" name="s" placeholder="New Search" autocomplete="off" value="<?= $_POST['s']; ?>">
                    <button type="submit" class="search-submit" id="search-submit" value=""><i class="icon-search"></i></button>
                </form>
                <div class="search-error"><p></p></div>
                <p class="search-contact-us">Do you have questions or want to learn more? We’re here to help. <a href="<?= brand_url('contact/') ?>">Contact us</a> so one of our team members can help you out.</p>
            </div>
            <? if (count($wp_query->posts) > 0 ): ?>
            <div class="search-wrapper">
                <?   foreach($wp_query->posts as $post):
                if(get_page_template_slug($post->ID) != 'templates/landing-page.php' && $post->ID !=10501 && $post->ID !=11783):
                        partial('section.search.item', [
                            'post_result' => $post,
                        ]);
                    endif;
                   endforeach; ?>
                </div>
            <? else: ?>
                <div class="search-content">
                   <h2 id="no-search-results-found">Sorry, we were unable to find results matching your search.</h2>
                </div>
            <? endif; ?>
        </div>
    </div>
</section>
<? //endif ?>
