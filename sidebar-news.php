<div class="page-sidebar" id="secondary" role="complementary">

    <?php get_search_form(); ?>
  
   <section>
        <h3>Categories</h3>
        <ul>
            <li class="cat-item"><a href="<?php bloginfo('url'); ?>/notices">All Notices</a></li>
            <?php wp_list_categories('title_li=&exclude=1'); ?>
        </ul>
    </section>

    <section>
        <h3>Archives</h3>
        <ul>
            <?php wp_get_archives('type=yearly&format=custom&before=<li class="archive-item">&after=</li>'); ?>
        </ul>
    </section>
  
</div>
