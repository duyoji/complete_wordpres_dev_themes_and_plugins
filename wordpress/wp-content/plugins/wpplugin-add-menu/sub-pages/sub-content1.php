<?php

namespace wpplugin_add_menu\sub_pages\sub_content1;

if ( !defined('WPINC') ) {
  die;
}

function my_custom_submenu_page()
{
  if ( ! current_user_can( 'manage_options' ) )
  {
    return;
  }
  ?>

  <div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <p><?php esc_html_e( '何かしらのサブコンテンツ', 'wpplugin' ); ?></p>
  </div>

  <?php
}

?>