<?php
/*
Template Name: Login
*/

if(is_user_logged_in()) {
	header("Location: " . home_url( "/" ));
}

if($_POST) {
	global $wpdb;
	$username = $wpdb->escape($_REQUEST['username']);
	$password = $wpdb->escape($_REQUEST['password']);
	$remember = $wpdb->escape($_REQUEST['remember']);

	if($remember) $remember = "true";
	else $remember = "false";

	$login_data = array();
	$login_data['user_login'] = $username;
	$login_data['user_password'] = $password;
	$login_data['remember'] = $remember;

	$user_verify = wp_signon( $login_data, false );

	if( is_wp_error($user_verify) ) {
    $error = "<div id=\"signin-error\"><span>Your credentials do not match. Please try again.</span><br />";
    $error .= "Or <a href=\"#\">click here</a> if you have forgotten your login details.</div>";
	} else {
		echo "<script type='text/javascript'>window.location='". home_url() ."'</script>";
		exit();
	}
}

get_header();
?>
<div class="content-area" id="primary">
  <div class="site-content" id="content" role="main">
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    
    <div class="group" id="full-width">
      <div id="content-container">
        <h2><?php the_title(); ?></h2>
        <?php if ($error) : echo $error; endif; ?>

        <div class="clear"></div>
        <form action="<?php the_permalink(); ?>" id="login" method="post" name="form">
          <input id="username" name="username" placeholder="Username" type="text">
          <input id="password" name="password" placeholder="Password" type="password">

          <div class="clear"></div>
          <input class="submit" name="submit" type="submit" value="Sign in">
        </form>

        <div id="links">
          <p><a href="<?php bloginfo('url'); ?>/become-a-member">Not a member?</a></p>
          <p><a href="<?php bloginfo('url'); ?>/wp-login.php?action=lostpassword">Forgotten your password?</a></p>
        </div>
      </div>

      <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>
</div>
<?php get_footer(); ?>