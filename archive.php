<?php

get_header(); ?>

<div class="content-area" id="primary">

  <div class="site-content" id="content" role="main">

	<?php 

    if(has_post_thumbnail()) {
    	$header_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'page-image');
    	$header_image_link = $header_image[0];
    } else {
    	$header_image_link = get_bloginfo( 'template_directory' ) . "/images/header1.jpg";
    }
    global $post; ?>
    
    <section id="page-title" style="background-image: url('<?php echo $header_image_link; ?>')">
      	<h1>Archived news from <?php the_time('Y'); ?></h1>
    </section>

    <div class="group" id="page-content">
      	<div id="content-container">

      		<?php if(have_posts()) : 
				while(have_posts()) : the_post(); ?>

				<section class="blog-item">

					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

					<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'blog-thumb'); ?></a>

					<p class="date"><?php echo get_the_date('jS F Y'); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

					<?php the_excerpt(); ?>

				</section>

				<?php endwhile; ?>

				<?php if(function_exists('wp_pagenavi')) { ?>
					<?php wp_pagenavi(); ?>   
				<?php } else { ?>      
					<div class="navigation"><p><?php posts_nav_link('&#8734;','&laquo;&laquo; Previous Posts','Older Posts &raquo;&raquo;'); ?></p></div>
				<?php } ?>

			<?php endif; ?>

		</div>	
      <?php get_sidebar('news'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>