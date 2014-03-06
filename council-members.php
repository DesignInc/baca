<?php 
/*
Template Name: Council members
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

        <table id="council-members">
          <tr>
            <td>
              <?php 
                $tony = get_post(516);
                $title = $tony->post_title;
                $url = get_bloginfo( 'url' ) . '/council-member/tony-coe';
                $member_image = wp_get_attachment_image_src(518, 'member-image');
                $member_image_src = $member_image[0];
              ?>
              <a href="<?php echo $url; ?>" rel="bookmark">
                <img alt="<?php echo $title; ?>" src="<?php echo $member_image_src; ?>"></a>
            </td>
            <td valign="top">
              <p class="name">
              <span>Chairman</span></br>
              <a href="<?php echo $url; ?>" rel="bookmark" title="<?php echo $title; ?>"><?php echo $title; ?></a>
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <?php 
                $volker = get_post(127); 
                $title = $volker->post_title;
                $url = get_bloginfo( 'url' ) . '/council-member/volker-meissner';
                $member_image = wp_get_attachment_image_src(128, 'member-image');
                $member_image_src = $member_image[0];
              ?>
              <a href="<?php echo $url; ?>" rel="bookmark">
                <img alt="<?php echo $title; ?>" src="<?php echo $member_image_src; ?>"></a>
            </td>
            <td valign="top">
              <p class="name">
              <span>Deputy Chairman</span></br>
              <a href="<?php echo $url; ?>" rel="bookmark" title="<?php echo $title; ?>"><?php echo $title; ?></a>
              </p>
            </td>
          </tr>
            <?php
              $args = array(
                'post_type' => 'baca_council_members',
                'post_status' => 'publish', 
                'post__not_in' => array( 516, 127 ),
                'posts_per_page' => 20
              );
              $my_query = null;
              $my_query = new WP_Query($args);
              if( $my_query->have_posts() ) {
                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                  <tr>
                    <td>
                      <?php 
                        $member_image = wp_get_attachment_image_src(get_field('member_profile_image'), 'member-image');
                        $member_image_src = $member_image[0];
                      ?>
                      <a href="<?php the_permalink() ?>" rel="bookmark">
                        <img alt="<?php the_title(); ?>" src="<?php echo $member_image_src; ?>"></a>
                    </td>
                    <td valign="top"><p class="name"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p></td>
                  </tr>
                <?php endwhile;
              }
              wp_reset_query(); // Restore global post data stomped by the_post().
            ?>
        </table>

      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
