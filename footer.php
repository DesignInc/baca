</div>
<!-- #main -->
<footer class='site-footer group' id='colophon' role='contentinfo'>
  <div class='site-info'>
    <p><span>BACA</span><br>The Baltic Charter Exchange<br>38 St Mary Axe<br>London<br>EC3A 8BH<br>England</p>
    <p>T: +44 (0)20 7623 5501<br>F: +44 (0)20 7369 1622</p>
    <p><a href="mailto:enquiries@baca.org.uk">enquiries@baca.org.uk</a></p>
  </div>
  <div class='site-info'>
    <?php wp_list_pages( array( 'title_li' => __('About us'), 'child_of' => 8 ) ); ?>
  </div>
  <div class='site-info'>
    <?php wp_list_pages( array( 'title_li' => __('Services'), 'child_of' => 16, 'exclude' => 495 ) ); ?>
  </div>
  <div class='site-info'>
    <?php wp_list_pages( array( 'title_li' => __('Policy'), 'child_of' => 188 ) ); ?>
  </div>
  <div class='site-info'>
    <p><span>Follow us</span></p>
    <?php
      if(get_field( 'baca_twitter', 6 )) : 
      $url = get_field( 'baca_twitter', 6 );
      $url = addhttp($url); ?>
      <a class="social" href="<?php echo $url; ?>" target="_blank"><i class="genericond genericon genericon-twitter"></i></a>
    <?php endif; ?>
    <?php
      if(get_field( 'baca_facebook', 6 )) : 
      $url = get_field( 'baca_facebook', 6 );
      $url = addhttp($url); ?>
      <a class="social" href="<?php echo $url; ?>" target="_blank"><i class="genericond genericon genericon-facebook"></i></a>
    <?php endif; ?>
    <?php
      if(get_field( 'baca_twitter', 6 )) : 
      $url = get_field( 'baca_linkedin', 6 );
      $url = addhttp($url); ?>
      <a class="social" href="<?php echo $url; ?>" target="_blank"><i class="genericond genericon genericon-linkedin"></i></a>
    <?php endif; ?>
  </div>
  <div class='site-smallprint group'>
    <div class='text-left'>
      <p>2014 &copy; BACA. All rights reserved</p>
    </div>
    <div class='text-right'>
      <p>Site designed by <a href="http://www.designinc.co.uk">Design Inc</a></p>
    </div>
    <div class='text-center'>
      <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu' => 'footer menu', 'container' => 'nav', 'container_class' => 'group' ) ); ?>
    </div>
  </div>
</footer>
</div>
<!-- #page -->


<?php wp_footer(); ?>
</body>
</html>
