<?php get_header(); ?>
<div class="content-area" id="primary">
  <div class="site-content" id="content" role="main">
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post();
    if(has_post_thumbnail()) {
    	$header_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'page-image');
    	$header_image_link = $header_image[0];
    } else {
    	$header_image_link = get_bloginfo( 'template_directory' ) . "/images/baca-page-header.jpg";
    }
    global $post; ?>
    <section id="page-title" style="background-image: url('<?php echo $header_image_link; ?>')">
      <h1>Council Members</h1>
    </section>
    
    <div class="group" id="page-content">
      <div id="content-container">
        <div id="left-side">
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        </div>
        <div id="right-side">
          <?php $member_logo = wp_get_attachment_image_src(get_field('member_profile_image'), 'member-logo');
          $member_logo_src = $member_logo[0]; ?>
          <img alt="<?php the_title(); ?>" src="<?php echo $member_logo_src; ?>">
        </div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php get_sidebar( 'council' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
