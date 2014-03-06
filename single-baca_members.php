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
      <h1>Members</h1>
    </section>
    
    <div class="group" id="page-content">
      <div id="content-container">
        <div id="left-side">
          <h2><?php the_title(); ?></h2>
          
          <p>
            <?php if ($post->member_address_1 != '') : echo $post->member_address_1 . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->member_address_2 != '') : echo $post->member_address_2 . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->member_address_3 != '') : echo $post->member_address_3 . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->member_address_4 != '') : echo $post->member_address_4 . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->member_town != '') : echo $post->member_town . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->member_county != '') : echo $post->member_county . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->member_postcode != '') : echo $post->member_postcode . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->member_country != '') : echo $post->member_country . '<br />'; else: echo NULL; endif;?>
          </p>

          <p>
            <?php if ($post->member_telephone != '') : echo 'T: ' . $post->member_telephone . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->member_fax != '') : echo 'F: ' . $post->member_fax . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->member_email != '') : echo 'E: <a href="mailto:' . $post->member_email . '">' . $post->member_email . '</a><br />'; else: echo NULL; endif;?>
          </p>

          <p>
            <?php if ($post->contact_name_1 != '') : echo $post->contact_name_1 . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->contact_position_1 != '') : echo $post->contact_position_1 . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->contact_email_1 != '') : echo '<a href="mailto:' . $post->contact_email_1 . '">' . $post->contact_email_1 . '</a><br />'; else: echo NULL; endif;?>
            <?php if ($post->contact_mobile_1 != '') : echo $post->contact_mobile_1 . '<br />'; else: echo NULL; endif;?>
          </p>

          <p>
            <?php if ($post->contact_name_2 != '') : echo $post->contact_name_2 . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->contact_position_2 != '') : echo $post->contact_position_2 . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->contact_email_2 != '') : echo '<a href="mailto:' . $post->contact_email_2 . '">' . $post->contact_email_2 . '</a><br />'; else: echo NULL; endif;?>
            <?php if ($post->contact_mobile_2 != '') : echo $post->contact_mobile_2 . '<br />'; else: echo NULL; endif;?>
          </p>

          <p>
            <?php if ($post->contact_name_3 != '') : echo $post->contact_name_3 . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->contact_position_3 != '') : echo $post->contact_position_3 . '<br />'; else: echo NULL; endif;?>
            <?php if ($post->contact_email_3 != '') : echo '<a href="mailto:' . $post->contact_email_3 . '">' . $post->contact_email_3 . '</a><br />'; else: echo NULL; endif;?>
            <?php if ($post->contact_mobile_3 != '') : echo $post->contact_mobile_3 . '<br />'; else: echo NULL; endif;?>
          </p>

          <?php 
          $rows = get_field('more_contacts');
          if($rows) : 
            foreach($rows as $row) :
              echo '<p>';
              if($row['more_contacts_name']) : echo $row['more_contacts_name'] . '<br />'; endif;
              if($row['more_contacts_position']) : echo $row['more_contacts_position'] . '<br />'; endif;
              if($row['more_contacts_email']) : echo $row['more_contacts_email'] . '<br />'; endif;
              if($row['more_contacts_mobile']) : echo $row['more_contacts_mobile'] . '<br />'; endif;
              echo '</p>';
            endforeach;
          endif; ?>

        </div>

        <div id="right-side">
          <div id="back"><a href="<?php echo get_permalink(10); ?>">Back to Members List</a></div>

          <?php 
            if(get_field('member_logo')) :
            $member_logo = wp_get_attachment_image_src(get_field('member_logo'), 'member-logo');
            $member_logo_src = $member_logo[0]; 
          ?>
          <img alt="<?php the_title(); ?>" src="<?php echo $member_logo_src; ?>">
          <?php endif; ?>
          
          <?php if($post->post_content != '') : ?>
            <div id="member-blurb">
              <div id="borders"><?php the_content(); ?></div>
            </div>
          <?php endif; ?>
          
          <?php if($post->member_sita != '') : ?> 
            <p id="sita">Sita: <?php echo $post->member_sita; ?></p> 
          <?php endif; ?>
          
          <?php 
            if($post->member_website_url != '') :
            $url = get_field( 'member_website_url' );
            $url = addhttp($url);
            $url_formatted = parse_url($url);
          ?>
            <p><a class="member-url" href="<?php echo $url; ?>" target="_blank"><?php echo $url_formatted["host"]; ?></a></p>
          <?php endif; ?>
          

          <div style="clear:both"></div>
          <p>
          <?php
            if($post->member_twitter_url != '') : 
            $url = get_field( 'member_twitter_url' );
            $url = addhttp($url); ?>
            <a class="social" href="<?php echo $url; ?>" target="_blank"><i class="genericond genericon genericon-twitter"></i></a>
          <?php endif; ?>
          <?php
            if($post->member_facebook_url != '') : 
            $url = get_field( 'member_facebook_url' );
            $url = addhttp($url); ?>
            <a class="social" href="<?php echo $url; ?>" target="_blank"><i class="genericond genericon genericon-facebook"></i></a>
          <?php endif; ?>
          <?php
            if($post->member_linkedin_url != '') : 
            $url = get_field( 'member_linkedin_url' );
            $url = addhttp($url); ?>
            <a class="social" href="<?php echo $url; ?>" target="_blank"><i class="genericond genericon genericon-linkedin-alt"></i></a>
          <?php endif; ?>
          </p>
        </div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php get_sidebar( 'council' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
