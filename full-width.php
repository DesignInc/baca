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

      <?php if(is_page(437) || is_page(827)) : ?>

        <div id="terms_container">
          <div id="terms_copy">
            <?php 
            if (get_field('terms_and_conditions')) :
              the_field('terms_and_conditions');
            endif; ?>
          </div>
          <a id="terms_agree" class="button">Agree</a>
          <div id="terms_instruction">Please read all terms and conditions before agreeing.</div>
        </div>

      <?php endif; ?>

      <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>
</div>
<?php get_footer(); ?>