<?php
/*
Template Name: Become a member
*/

session_start(); 

//if(is_user_logged_in()) {
  //header("Location: " . home_url( "/" ));
//}

if(isset($_POST['submit'])) {
  
    $errors = array();

    foreach ($_POST as $key => $value) {
      ${$key} = $value;
      $_SESSION[$key] = stripslashes($value);
    }

    if(empty($member_name)) {
      $errors['member_name'] = 'Name of applicant';
    }
    if(empty($address1)) {
      $errors['address1'] = 'Address line 1';
    }
    if(empty($address2)) {
      $errors['address2'] = 'Address line 2';
    }
    if(empty($town)) {
      $errors['town'] = 'Town';
    }
    if(empty($postcode)) {
      $errors['postcode'] = 'Postcode';
    }
    if(empty($country)) {
      $errors['country'] = 'Country';
    }
    if(empty($email)) {
      $errors['email'] = 'Email';
    } elseif(!is_email($email)) {
      $errors['email'] = 'Email address is not valid';
    }
    if(empty($checkbox)) {
      $checkbox_error = '<p class="reg-errors">Please confirm the above details are correct and that you agree to abide by the Rules and Code of Practice.</p>';
    }
    
    if(!count($errors) > 0 && !empty($checkbox)) {

        $userdata = array(
        'user_login' => trim(strtolower(str_replace(" ", "", $member_name))),
        'user_pass' => wp_generate_password( 12, false ),
        'first_name' => $member_name,
        'display_name' => $member_name,
        'nickname' => $member_name,
        'user_url' => $website,
        'user_email' => $email,
        'wp_capabilities' => 'Subscriber'
        );

        $user_id = wp_insert_user($userdata);

        // User was successfully entered
        if(!is_wp_error($user_id)) {
            session_destroy(); 
            //header("Location: thank-you");
            //exit();
        }
      
        /*if($user_id) : 
          
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

            $field_key = "field_52f4fedbcdb79";
            $user_id = "user_" . $user_id;
            $value = get_field($field_key, $user_id);
            $value[] = array(
                "more_contacts_name" => $rep1_name, 
                "more_contacts_email" => $rep1_email,
                "more_contacts_mobile" => $rep1_phone
            );
            $value[] = array(
                "more_contacts_name" => rep2_name, 
                "more_contacts_email" => $rep2_email,
                "more_contacts_mobile" => $rep2_phone
            );
            $value[] = array(
                "more_contacts_name" => $row->ContactName3, 
                "more_contacts_email" => $row->ContactEmail3
            );
            update_field( $field_key, $value, $user_id );

            $to = array('gracetopher@hotmail.co.uk', 'chris.grace@designinc.co.uk');
              $headers[] = 'From: Designinc <christopher@designinc.co.uk>';
              //$headers[] = 'Cc: jon@designinc.co.uk, frank@designinc.co.uk';
              $subject = 'Test';
              
              $message = 'Password: '; //. $row->CompanyName;

            function set_html_content_type() {
                return 'text/html';
            }

            add_filter( 'wp_mail_content_type', 'set_html_content_type' );
            wp_mail( $to, $subject, $message, $headers );
            remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
              
            header("Location: speaker-registration-thank-you-page");
            exit();
            */
    }
}

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
    
    <div class="group" id="registration-page">
      <div id="content-container">
        <?php the_content(); ?>

        <?php 
          if ($errors) {
              echo '<div id="reg-error">The following fields are required:</div>';
              foreach($errors as $error) {
                echo '<p class="reg-errors">' . $error . '</p>'; 
              }
          } elseif (is_wp_error($user_id)) {
              $error_string = $user_id->get_error_message();
              echo '<p class="reg-errors">' . $error_string . '</p>';
          } else {

          }
        ?>

        <div class="clear"></div>
        <form action="<?php the_permalink(); ?>" id="registration" method="post" name="form">
          <table>
            <tr>
              <td><input class="field" name="member_name" placeholder="Name of applicant*" value="<?php echo $_SESSION['member_name']; ?>" type="text"></td>
              <td><input class="field" name="rep1_name" placeholder="Designated Representative 1" value="<?php echo $_SESSION['rep1_name']; ?>" type="text"></td>
            </tr>
            <tr>
              <td><input class="field" name="address1" placeholder="Address line 1*" value="<?php echo $_SESSION['address1']; ?>" type="text"></td>
              <td><input class="field" name="rep1_email" placeholder="Email" value="<?php echo $_SESSION['rep1_email']; ?>" type="text"></td>
            </tr>
            <tr>
              <td><input class="field" name="address2" placeholder="Address line 2*" value="<?php echo $_SESSION['address2']; ?>" type="text"></td>
              <td><input class="field" name="rep1_phone" placeholder="Phone" value="<?php echo $_SESSION['rep1_phone']; ?>" type="text"></td>
            </tr>
            <tr>
              <td><input class="field" name="town" placeholder="Town*" value="<?php echo $_SESSION['town']; ?>" type="text"></td>
              <td><input class="field" name="rep2_name" placeholder="Designated Representative 2" value="<?php echo $_SESSION['rep2_name']; ?>" type="text"></td>
            </tr>
            <tr>
              <td><input class="field" name="county" placeholder="County" value="<?php echo $_SESSION['county']; ?>" type="text"></td>
              <td><input class="field" name="rep2_email" placeholder="Email" value="<?php echo $_SESSION['rep2_email']; ?>" type="text"></td>
            </tr>
            <tr>
              <td><input class="field" name="postcode" placeholder="Postcode*" value="<?php echo $_SESSION['postcode']; ?>" type="text"></td>
              <td><input class="field" name="rep2_phone" placeholder="Phone" value="<?php echo $_SESSION['rep2_phone']; ?>" type="text"></td>
            </tr>
            <tr>
              <td><input class="field" name="country" placeholder="Country*" value="<?php echo $_SESSION['country']; ?>" type="text"></td>
              <td><input class="field" name="staff" placeholder="Number of aviation related staff" value="<?php echo $_SESSION['staff']; ?>" type="text"></td>
            </tr>
            <tr>
              <td><input class="field" name="email" placeholder="Email*" value="<?php echo $_SESSION['email']; ?>" type="text"></td>
              <td><input class="field" name="trading" placeholder="Trading since" value="<?php echo $_SESSION['trading']; ?>" type="text"></td>
            </tr>
            <tr>
              <td><input class="field" name="website" placeholder="Website" value="<?php echo $_SESSION['website']; ?>" type="text"></td>
              <td><input class="field" name="activity" placeholder="Principal aviation activity (e.g. Individual, Broker etc.)" value="<?php echo $_SESSION['activity']; ?>" type="text"></td>
            </tr>
          </table>

          <?php if($checkbox_error) : echo $checkbox_error; endif; ?>
          <div id="checkbox"><input type="checkbox" name="checkbox" value="1"></div>
          <div><p>By ticking this box you confirm the above details are correct and that you agree to abide by the Rules and Code of Practice of the Association if elected for membership.</p></div>
          
          <p>Proposer and seconder (designated BACA representatives for their companies) will be emailed to confirm that this applicant is known to them and in their opinion is suitable for membership of BACA.</p>

          <input class="submit" name="submit" type="submit" value="Register">
        </form>
      </div>

      <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>
</div>
<?php get_footer(); ?>