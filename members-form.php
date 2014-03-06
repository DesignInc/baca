<?php
/*
Template Name: Members form
*/

get_header(); ?>

<div class="content-area" id="primary">
  <div class="site-content" id="content" role="main">

    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); 
    if(has_post_thumbnail()) {
      $header_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'page-image');
      $header_image_link = $header_image[0];
    } else {
      $header_image_link = get_bloginfo( 'template_directory' ) . "/images/header1.jpg";
    }
    global $post; ?>

    <section id="page-title" style="background-image: url('<?php echo $header_image_link; ?>')">
      <h1><?php echo get_the_title($post->post_parent); ?></h1>
    </section>
    
    <div class="group" id="registration-page">
      <div id="content-container">
        <?php the_content(); ?>

        
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>