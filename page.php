<?php get_header(); ?>
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
        <?php if(!is_page(55)) : ?>
          <h2><?php the_title(); ?></h2> 
        <?php else : echo NULL; endif; ?>
        
        <?php the_content(); ?>

        <?php /*

        $row = $wpdb->get_row( "SELECT * FROM members WHERE id = 357" );

        $new_user = array(
          'user_login' => trim(strtolower(str_replace(" ", "", $row->CompanyName))),
          'user_pass' => wp_generate_password( 12, false ),
          'first_name' => $row->CompanyName,
          'display_name' => $row->CompanyName,
          'nickname' => $row->CompanyName,
          'user_url' => $row->Website,
          'user_email' => $row->Email,
          'wp_capabilities' => 'Subscriber'
        );

        $user_id = wp_insert_user($new_user); 

        if($user_id) :

          update_user_meta($user_id, 'member_address_1', $row->Address1);
          update_user_meta($user_id, 'member_address_2', $row->Address2);
          update_user_meta($user_id, 'member_address_3', $row->Address3);
          update_user_meta($user_id, 'member_address_4', $row->Address4);
          update_user_meta($user_id, 'member_town', $row->Town);
          update_user_meta($user_id, 'member_county', $row->County);
          update_user_meta($user_id, 'member_postcode', $row->PostCode);
          update_user_meta($user_id, 'member_country', $row->Country);
          update_user_meta($user_id, 'member_telephone', $row->Telephone);
          update_user_meta($user_id, 'member_fax', $row->Fax);
          update_user_meta($user_id, 'member_business_type', $row->BusinessType);
          update_user_meta($user_id, 'member_sita', $row->Sita);
          update_user_meta($user_id, 'member_date_elected', $row->DateElected);
          update_user_meta($user_id, 'member_year_elected', $row->YearElected);
          update_user_meta($user_id, 'member_date_ceased', $row->DateCeased);
          update_user_meta($user_id, 'member_comments', $row->Comments);

          $field_key = "field_52f4fedbcdb79";
          $user_id = "user_" . $user_id;
          echo $user_id;

          $value = get_field($field_key, $user_id);
          $value[] = array(
              "more_contacts_name" => $row->ContactName, 
              "more_contacts_email" => $row->ContactEmail,
              "more_contacts_mobile" => $row->ContactMobile
          );
          $value[] = array(
              "more_contacts_name" => $row->ContactName2, 
              "more_contacts_email" => $row->ContactEmail2,
              "more_contacts_mobile" => $row->ContactMobile2
          );
          $value[] = array(
              "more_contacts_name" => $row->ContactName3, 
              "more_contacts_email" => $row->ContactEmail3
          );
          update_field( $field_key, $value, $user_id );

          //wp_new_user_notification( $user_id, $new_user->user_pass );

        endif; */
        ?>

      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php 
      if(is_page(55)) : 
        get_sidebar('contactus'); 
      else : 
        get_sidebar();
      endif;
      ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>