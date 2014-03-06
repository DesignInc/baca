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
      	<h2 class="pagetitle">Search Results for 
      		<?php /* Search result and count */ 
      		$allsearch = &new WP_Query("s=$s&showposts=-1"); 
      		$key = wp_specialchars($s, 1); 
      		$count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); 
      		echo $key; _e('</span>'); _e(' &mdash; '); 
      		echo $count . ' '; _e('articles'); 
      		wp_reset_query(); ?>
      	</h2>
    </section>

    <div class="group" id="page-content">
      	<div id="content-container">

			<?php if(have_posts()) : 
				while(have_posts()) : the_post(); ?>

				<section class="blog-item">

					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

					<?php echo get_the_post_thumbnail($post->ID, 'blog-thumb'); ?>

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