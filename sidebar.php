
<div class="page-sidebar" id="secondary" role="complementary">
  <ul>
    <?php
    global $post;
    if( $post->post_parent !== 14 ) {
        wp_list_pages('depth=-1&child_of=' . $post->post_parent . '&title_li=&link_before=&exclude=495'); // EXCLUDE EXCLUDE  
    } elseif( $post->post_parent == 14 ) { // Events category ?>
        <li><a href="<?php bloginfo('url'); ?>/events-diary">Events Diary</a></li>
        <?php wp_list_pages('depth=-1&child_of=' . $post->post_parent . '&title_li='); 
    } else { 
        wp_list_pages('depth=1&child_of=' . $post->ID . '&title_li=&link_before=&exclude=495');
    } ?>
  </ul>

  <?php if( is_page(84,495) ): // Extra sidebar for 'BACA Escrow Service' & 'Using the service' ONLY ?>
       
      <h2 style="margin-top:50px;">Escrow Service links</h2>
      <ul style="border:none">
        <li><a href="<?php echo get_permalink(495); ?>">Using the service</a></li> 
        <li><a href="<?php bloginfo('template_directory'); ?>/images/StakeholderAgreementUKL.docx">Download the Agreement for £ Sterling transactions</a></li>
        <li><a href="<?php bloginfo('template_directory'); ?>/images/StakeholderAgreementUSD.docx">Download the Agreement for US Dollar transactions</a></li>
        <li><a href="<?php bloginfo('template_directory'); ?>/images/StakeholderAgreementEUR.docx">Download the Agreement for Euro transactions</a></li>
        <li><a href="<?php bloginfo('template_directory'); ?>/images/BACAEscrowService.pdf" target="_blank">The Escrow Brochure (PDF)</a></li>
      </ul>

  <?php endif; ?>

</div>