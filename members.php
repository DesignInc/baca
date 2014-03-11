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
          

          <form method="post" action="">
            <p>Filter by Business Type:
              <select id="members_business_filter" name="members_business_filter">
                <option value=""></option>
                <option value="Airport" >Airport</option>
                <option value="Broker" >Broker</option>
                <option value="Handling agent" >Handling agent</option>
                <option value="Individual" >Individual</option>
                <option value="Insurance" >Insurance</option>
                <option value="Legal, corporate and Insurance" >Legal, corporate and Insurance</option>
                <option value="Marketing and design" >Marketing and design</option>
                <option value="Operator" >Operator</option>
                <option value="Operator Helicopter" >Operator Helicopter</option>
                <option value="Operator helicopters" >Operator helicopters</option>
                <option value="Other" >Other</option>
                <option value="Publisher" >Publisher</option>
                <option value="Retired Member" >Retired Member</option>
                <option value="Support services" >Support services</option>
              </select>
              <input type="submit" value="Go">
            </p>
          </form>
          <form method="post" action="">
            <p>Filter by Country:
              <select id="members_country_filter" name="members_country_filter">
                <option value=""></option>
                <option value="Australia" >Australia</option>
                <option value="Austria" >Austria</option>
                <option value="Belgium" >Belgium</option>
                <option value="Bermuda" >Bermuda</option>
                <option value="Bulgaria" >Bulgaria</option>
                <option value="Czech Republic" >Czech Republic</option>
                <option value="Denmark" >Denmark</option>
                <option value="France" >France</option>
                <option value="Germany" >Germany</option>
                <option value="Greece" >Greece</option>
                <option value="Ireland" >Ireland</option>
                <option value="Isle of Man" >Isle of Man</option>
                <option value="Israel" >Israel</option>
                <option value="Italy" >Italy</option>
                <option value="Kenya" >Kenya</option>
                <option value="Luxembourg" >Luxembourg</option>
                <option value="Malta" >Malta</option>
                <option value="Monaco" >Monaco</option>
                <option value="Qatar" >Qatar</option>
                <option value="Russia" >Russia</option>
                <option value="Slovenia" >Slovenia</option>
                <option value="Spain" >Spain</option>
                <option value="Sweden" >Sweden</option>
                <option value="Switzerland" >Switzerland</option>
                <option value="The Netherlands" >The Netherlands</option>
                <option value="Turkey" >Turkey</option>
                <option value="UK" >UK</option>
                <option value="United Arab Emirates" >United Arab Emirates</option>
                <option value="USA" >USA</option>
                </select>
                <input type="submit" value="Go">
            </p>
          </form>

          <ul id="list_members" class="list">
              <?php 
              if (isset($_POST['members_business_filter'])) {
                $members_business_filter = $_POST['members_business_filter'];
                $args = array(
                  'role' => 'subscriber',
                  'order' => 'ASC',
                  'meta_key' => 'member_business_type',
                  'meta_value' => $members_business_filter
                );
              }
              elseif (isset($_POST['members_country_filter'])) {
                $members_country_filter = $_POST['members_country_filter'];
                $args = array(
                  'role' => 'subscriber',
                  'order' => 'ASC',
                  'meta_key' => 'member_country_type',
                  'meta_value' => $members_country_filter
                );
              }
              else {
                $args = array(
                    'role' => 'Subscriber',
                    'order' => 'ASC',
                );
              }
              
              $user_query = new WP_User_Query( $args );

              if ( !empty( $user_query->results ) ) {
                  foreach ( $user_query->results as $user ) {
                    echo '<li><p class="name">';
                    if(is_user_logged_in()) {
                      echo '<a href="' . get_bloginfo('url') . '/author/' . $user->user_login . '" rel="bookmark" title="' . $user->display_name . '">';
                    }
                    echo $user->display_name;
                    if(is_user_logged_in()) { echo '</a>'; }
                    echo '</p></li>';
                  }
              } else {
                  echo '<li>No users have been found.</li>';
              } 
              // include ('businessType_ajax.php');

              foreach ($_POST as $key => $value) {
                $key.' : '. $value.'<br />';
              }

              ?> 
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