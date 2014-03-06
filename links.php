<?php  
/*
Template Name: Links
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
    
    <div class="group" id="page-content">
      <div id="content-container">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>

        <?php
            if(get_field('links')): ?>

              <table id="links">
             
              <?php while(has_sub_field('links')): ?>

                <tr class="test">
                  <td width="40%"><a href="<?php the_sub_field('links_url'); ?>" target="_blank"><img src="<?php the_sub_field('links_image'); ?>"></a></td>
                  <td width="60%">
                    <p><a href="<?php the_sub_field('links_url'); ?>" target="_blank"><?php the_sub_field('links_text'); ?></a></p>
                    <p><?php the_sub_field('extra_text'); ?></p>
                  </td>
                </tr>
                 
              <?php endwhile; ?>
             
              </table>
                 
        <?php endif; ?>

      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php get_sidebar( 'council' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
