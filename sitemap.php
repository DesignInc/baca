<?php 
/*
Template Name: Sitemap
*/

get_header(); ?>
<div class="content-area" id="primary">
  <div class="site-content" id="content" role="main">
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    
    <div class="group" id="full-width">
      <div id="content-container">
        <h2><?php the_title(); ?></h2>
        <div class="clear"></div>
        <?php the_content(); ?>

        <div id="sitemap">

          <div class='site-map'>
            <?php wp_list_pages( array( 'title_li' => __('About us'), 'child_of' => 8 ) ); ?>
          </div>

          <div class='site-map'>
            <?php wp_list_pages( array( 'title_li' => __('Services'), 'child_of' => 16 ) ); ?>
          </div>

          <div class='site-map'>
            <?php wp_list_pages( array( 'title_li' => __('Policy'), 'child_of' => 188 ) ); ?>
          </div>

          <div class='site-map'>
            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu' => 'footer menu', 'container' => 'nav', 'container_class' => 'group', 'exclude' => 211 ) ); ?>
          </div>

        </div>
      </div>

      <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>
</div>
<?php get_footer(); ?>