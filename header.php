<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta content="width=device-width" name="viewport">
  <title><?php wp_title(''); ?></title>
  <link href="http://gmpg.org/xfn/11" rel="profile">
  <link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback">
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
<header class="site-header group" id="masthead" role="banner">
  <div class="site-branding">
    <h1 class="site-title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
    </h1>
    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
    <p class="sub-description">Patron - HRH Duke of Edinburgh</p>
  </div>
  <div class="site-slope">
    <img alt="" src="<?php bloginfo( 'template_directory' ); ?>/images/baca-top-slope.svg">
  </div>
  <div class="additional-head">
    <?php if( !is_user_logged_in() ): ?>
      <div class="login-signup">
        <a href="<?php echo get_permalink( 69 ); ?>">Sign in</a>
        <a href="<?php echo get_permalink( 437 ); ?>">Become a member</a>
      </div>
    <?php endif; ?>
    <div class="information">
      <?php if( is_user_logged_in() ):
        global $current_user;
        get_currentuserinfo(); ?>
      <p>Welcome, <?php echo ucwords($current_user->user_login); ?> <a id="logout" href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout">(Logout)</a></p>
      <?php endif; ?>
      <h2>Baltic Air Charter Association</h2>
      <p>T: +44 (0)20 7623 5501 <span>|</span> E: <a href="mailto:enquiries@baca.org.uk">enquiries@baca.org.uk</a></p>
    </div>
  </div>
  <nav class="main-navigation" id="site-navigation" role="navigation">
    <?php wp_nav_menu( array( 'menu' => 'main nav', 'depth' => 2 ) ); ?>
  </nav>
</header>
<div id="main" class="site-main">