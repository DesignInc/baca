<?php 
/*
Template Name: Home page
*/

get_header(); ?>
<div class='content-area' id='primary'>
  <div class='site-content' id='content' role='main'>
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>

    <section id='home-title'>
      <h1>&lsquo;Where air charter professionals meet&rsquo;</h1>
      <h2><a href='<?php echo get_permalink( 42 ); ?>'>Find out more about who we are &rsaquo;</a></h2>
    </section>

    <div class='group' id='home-page'>
      <div id='content-container'>
        <h3><?php the_content(); ?></h3>

        <section class='featured featured-event'>
          <h1>Current Events</h1>
          <?php if(get_field('current_events_image')) : ?>
            <img alt='Featured Event' src="<?php echo get_field('current_events_image'); ?>">
          <?php endif; ?>
          <div class='top-story'>
            <?php if(get_field( 'current_events_blurb' )) : 
              the_field( 'current_events_blurb' );
            endif; ?>
          </div>
          <h2>Upcoming events</h2>
          <?php if(get_field( 'upcoming_events' )) : 
            the_field( 'upcoming_events' );
          endif; ?>
        </section>

        <section class='featured featured-news'>
          <h1>Current News</h1>
          <?php if(get_field('current_news_image')) : ?>
            <img alt='Featured News' src="<?php echo get_field('current_news_image'); ?>">
          <?php endif; ?>
          <div class='top-story'>
            <?php if(get_field( 'current_news_blurb' )) : 
              the_field( 'current_news_blurb' );
            endif; ?>
          </div>
          <h2>Current news</h2>
          <?php if(get_field( 'current_news' )) : 
            the_field( 'current_news' );
          endif; ?>
        </section>

        <section class='featured featured-knowledge'>
          <h1>Current Issues</h1>
          <?php if(get_field('current_issues_image')) : ?>
            <img alt='Featured Knowledge' src="<?php echo get_field('current_issues_image'); ?>">
          <?php endif; ?>
          <div class='top-story'>
          <?php if(get_field( 'current_issues_blurb' )) : 
            the_field( 'current_issues_blurb' );
          endif; ?>
          </div>
          <h2>Current issues update</h2>
          <?php if(get_field( 'current_issues_update' )) : 
            the_field( 'current_issues_update' );
          endif; ?>
        </section>

      </div>

      <?php endwhile; ?>
      <?php endif; ?>
      <?php get_sidebar( 'home' ); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
