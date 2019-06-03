<?php
/*
Plugin Name: 6.09 - Enqueue JS
Plugin URI: https://github.com/zgordon/wp-dev-course
Description: Demo plugin for learning how to enqueue JS with a plugin.
Version: 1.0.0
Contributors: zgordon
Author: Zac Gordon
Author URI: https://zacgordon.com
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wpplugin
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

define( 'WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue Plugin CSS
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-styles.php');

// Enqueue Plugin JavaScript
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-scripts.php');

// Create Plugin Admin Menus and Setting Pages
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-menus.php');

// Add a link to your settings page in your plugin
function wpplugin_add_settings_link( $links ) {
  $settings_link = '<a href="admin.php?page=wpplugin">' . __( 'Settings' ) . '</a>';
  array_push( $links, $settings_link );
  return $links;
}
$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'wpplugin_add_settings_link' );

?>
