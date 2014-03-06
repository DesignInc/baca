<?php get_header(); ?>

<div class="content-area" id="primary">
  <div class="site-content" id="content" role="main">
    <?php $header_image_link = get_bloginfo( 'template_directory' ) . "/images/baca-page-header.jpg";
    global $user; ?>

    <section id="page-title" style="background-image: url('<?php echo $header_image_link; ?>')">
      <h1><?php echo get_the_title(10); ?></h1>
    </section>
    
    <div class="group" id="page-content">
      <div id="content-container">
        
        <div id="left-side">

        <?php $user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
        
          <h2><?php echo $user->display_name; ?></h2>
          
          <p>
            <?php if ($user->member_address_1 != '') : echo $user->member_address_1 . '<br />'; else: echo NULL; endif;?>
            <?php if ($user->member_address_2 != '') : echo $user->member_address_2 . '<br />'; else: echo NULL; endif;?>
            <?php if ($user->member_address_3 != '') : echo $user->member_address_3 . '<br />'; else: echo NULL; endif;?>
            <?php if ($user->member_address_4 != '') : echo $user->member_address_4 . '<br />'; else: echo NULL; endif;?>
            <?php if ($user->member_town != '') : echo $user->member_town . '<br />'; else: echo NULL; endif;?>
            <?php if ($user->member_county != '') : echo $user->member_county . '<br />'; else: echo NULL; endif;?>
            <?php if ($user->member_postcode != '') : echo $user->member_postcode . '<br />'; else: echo NULL; endif;?>
            <?php if ($user->member_country != '') : echo $user->member_country . '<br />'; else: echo NULL; endif;?>
          </p>

          <p>
            <?php if ($user->member_telephone != '') : echo 'T: ' . $user->member_telephone . '<br />'; else: echo NULL; endif;?>
            <?php if ($user->member_fax != '') : echo 'F: ' . $user->member_fax . '<br />'; else: echo NULL; endif;?>
            <?php if ($user->user_email != '') : echo 'E: <a href="mailto:' . $user->user_email . '">' . $user->user_email . '</a><br />'; else: echo NULL; endif;?>
          </p>

          <?php 
          $rows = get_field('more_contacts', $user);
          if($rows) : 
            foreach($rows as $row) :
              echo '<p>';
              if($row['more_contacts_name']) : echo $row['more_contacts_name'] . '<br />'; endif;
              if($row['more_contacts_position']) : echo $row['more_contacts_position'] . '<br />'; endif;
              if($row['more_contacts_email']) : echo '<a href="mailto:' . $row['more_contacts_email'] . '">' . $row['more_contacts_email'] . '</a><br />'; endif;
              if($row['more_contacts_mobile']) : echo $row['more_contacts_mobile'] . '<br />'; endif;
              echo '</p>';
            endforeach;
          endif; ?>

        </div>

        <div id="right-side">
          <div id="back"><a href="<?php echo get_permalink(10); ?>">Back to Members List</a></div>

          <?php if(get_field('member_logo', $user)) :
            $member_logo = wp_get_attachment_image_src(get_field('member_logo', $user), 'member-logo');
            $member_logo_src = $member_logo[0]; ?>
          <img class="member-logo" alt="<?php the_title(); ?>" src="<?php echo $member_logo_src; ?>">
          <?php endif; ?>
          
          <?php if($user->description != '') : ?>
            <div id="member-blurb">
              <p id="borders"><?php echo $user->description; ?></p>
            </div>
          <?php endif; ?>
          
          <?php if($user->member_sita != '') : ?> 
            <p id="sita">Sita: <?php echo $user->member_sita; ?></p> 
          <?php endif; ?>
          
          <?php if($user->user_url != '') :
            $url = $user->user_url;
            $url_formatted = parse_url($url); ?>
            <p><a class="member-url" href="<?php echo $user->user_url; ?>" target="_blank"><?php echo $url_formatted["host"]; ?></a></p>
          <?php endif; ?>
          
          <div class="clear"></div>
          <p>
          <?php
            if($user->member_twitter_url != '') : 
            $url = get_field( 'member_twitter_url', $user );
            $url = addhttp($url); ?>
            <a class="social" href="<?php echo $url; ?>" target="_blank"><i class="genericond genericon genericon-twitter"></i></a>
          <?php endif; ?>
          <?php
            if($user->member_facebook_url != '') : 
            $url = get_field( 'member_facebook_url', $user );
            $url = addhttp($url); ?>
            <a class="social" href="<?php echo $url; ?>" target="_blank"><i class="genericond genericon genericon-facebook"></i></a>
          <?php endif; ?>
          <?php
            if($user->member_linkedin_url != '') : 
            $url = get_field( 'member_linkedin_url', $user );
            $url = addhttp($url); ?>
            <a class="social" href="<?php echo $url; ?>" target="_blank"><i class="genericond genericon genericon-linkedin-alt"></i></a>
          <?php endif; ?>
          </p>
        </div>

      </div>
      <?php get_sidebar( 'council' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>