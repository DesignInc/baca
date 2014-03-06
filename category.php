<?php

get_header(); ?>

<div class="content-area" id="primary">

  <div class="site-content" id="content" role="main">

	<?php 

    $header_image_link = get_bloginfo( 'template_directory' ) . "/images/baca-page-header.jpg";
    global $post; ?>
    
    <section id="page-title" style="background-image: url('<?php echo $header_image_link; ?>')">
      <h1><?php single_cat_title(); ?></h1>
    </section>

    <div class="group" id="page-content">
      	<div id="content-container">

      		<?php if(have_posts()) : 
				while(have_posts()) : the_post(); ?>

				<section class="blog-item">

					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

					<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'blog-thumb'); ?></a>

					<p><?php echo get_the_date('jS F Y'); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

					<?php the_excerpt(); ?>

				</section>

				<?php endwhile; ?>

				<?php if(function_exists('wp_pagenavi')) { ?>
					<?php wp_pagenavi(); ?>   
				<?php } else { ?>      
					<div class="navigation"><p><?php posts_nav_link('&#8734;','&laquo;&laquo; Previous Posts','Older Posts &raquo;&raquo;'); ?></p></div>
				<?php }

			endif; ?>
			
		</div>	
      <?php get_sidebar('news'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>