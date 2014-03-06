<?php 
/*
Template Name: Members page
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
    	$header_image_link = get_bloginfo( 'template_directory' ) . "/images/baca-page-header.jpg";
    }
    global $post; ?>
    <section id="page-title" style="background-image: url('<?php echo $header_image_link; ?>')">
      <h1><?php echo get_the_title($post->post_parent); ?></h1>
    </section>
    
    <div class="group" id="page-content">
      <div id="content-container">
        <h2><?php the_title(); ?></h2>

        <div id="members-list">
          <p>Search members: <input class="search" type="text" /></p>

          <ul class="list">
              <?php $args = array(
                  'role' => 'subscriber',
                  'order' => 'ASC'
              );
              $user_query = new WP_User_Query( $args );

              if ( !empty( $user_query->results ) ) {
                  foreach ( $user_query->results as $user ) {
                    echo '<li><p class="name"><a href="' . get_bloginfo('url') . '/author/' . $user->user_login . '" rel="bookmark" title="' . $user->display_name . '">' . $user->display_name . '</a></p></li>';
                  }
              } else {
                  echo '<li>No users have been found.</li>';
              } ?> 
          </ul>
        </div>

      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php get_sidebar( 'council' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>