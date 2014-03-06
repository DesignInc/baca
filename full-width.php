<?php 
/*
Template Name: Full width
*/

get_header(); ?>

<div class="content-area" id="primary">
  <div class="site-content" id="content" role="main">
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    
    <div class="group" id="full-width">
      <div id="content-container">

        <?php if(!is_page(483)) : ?>
        <h2><?php the_title(); ?></h2>
        <?php endif; ?>
        <div class="clear"></div>
        <?php the_content(); ?>
        
      </div>

      <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>
</div>
<?php get_footer(); ?>