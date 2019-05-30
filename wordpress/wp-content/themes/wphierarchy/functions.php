<?php

if (!function_exists('wphierarchy_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which runs
   * before the init hook. The init hook is too late for some features, such as indicating
   * support post thumbnails.
   */
  function wphierarchy_setup()
  {
    define('TEXT_DOMAIN', 'wphierarchy');

    // Add theme supports
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support(
      'post-formats',
      [
        'aside',
        'gallery',
        'link',
        'image',
        'singular',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
      ]
    );
    add_theme_support('html5');
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('starter-content');
  }
endif; // wphierarchy_setup
add_action('after_setup_theme', 'wphierarchy_setup');


// Load our CSS

function wphierarchy_styles()
{
  wp_enqueue_style(
    'main-css',
    get_stylesheet_directory_uri() . '/style.css',
    [],
    time(),
    'all'
  );
}

add_action('wp_enqueue_scripts', 'wphierarchy_styles');


// Register Menu Locations
register_nav_menus([
  'main-menu' => esc_html__( 'Main Menu', 'wphierarchy' )
]);

// Setup Widget area
function wphierarchy_widgets_init()
{
  register_sidebar([
    'name' => esc_html__('メインサイドバー', TEXT_DOMAIN),
    'id' => 'main-sidebar',
    'description' => esc_html__('main-sidebarにウィジェットを追加', TEXT_DOMAIN),
    'before_widget' => '<section class="widget">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ]);
}
add_action('widgets_init', 'wphierarchy_widgets_init');