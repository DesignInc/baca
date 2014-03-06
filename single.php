<?php 

get_header(); ?>

<div class="content-area" id="primary">
  <div class="site-content" id="content" role="main">
    
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post();
    
    $header_image_link = get_bloginfo( 'template_directory' ) . "/images/baca-page-header.jpg";
    global $post; ?>

    <section id="page-title" style="background-image: url('<?php echo $header_image_link; ?>')">
      <h1><?php echo get_the_title(12); ?></h1>
    </section>
    
    <div class="group" id="page-content">
      <div id="content-container">

        <h2><?php the_title(); ?></h2>

        <p><?php the_date('jS F Y'); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

        <div id="thumb"><?php echo get_the_post_thumbnail($post->ID, 'blog-thumnb'); ?></div>

        <?php the_content(); ?>

        <?php comments_template(); ?>
        
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php get_sidebar( 'news' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
