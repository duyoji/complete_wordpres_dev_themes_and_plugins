<?php
/**
 * Plugin Name: WP Plugin add menu
 * Plugin URI:  https://github.com/duyoji/complete_wordpres_dev_themes_and_plugins
 * Description: プラグインのDescription部分の内容
 * Version:     1.0.0
 * Author:      Tsuyoshi
 * Contributors Tsuyoshi
 * Author URI:  https://github.com/duyoji
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wpplugin
 * Domain Path: /languages
 */

if ( !defined('WPINC') ) {
  die;
}

/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page(){
  add_menu_page(
    __( 'カスタムメニュータイトル', 'wpplugin' ),
    'カスタムメニュー1',
    'manage_options',
    'wpplugin-slug',
    'my_custom_menu_page',
    'dashicons-admin-site-alt3'
  );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

function my_custom_menu_page()
{
  if ( ! current_user_can( 'manage_options' ) )
  {
    return;
  }
  ?>

  <div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <p><?php esc_html_e( '何かしらのコンテンツ', 'wpplugin' ); ?></p>
  </div>

  <?php
}

?>