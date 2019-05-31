<?php

// Add Theme Support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'customize-selective-refresh-widgets' );

// Load in our CSS
function wptags_enqueue_styles() {

  wp_enqueue_style( 'varela-font-css', 'https://fonts.googleapis.com/css?family=Varela+Round', [], '', 'all' );
  wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', ['varela-font-css'], time(), 'all' );
  wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', [ 'main-css' ], time(), 'all' );

}
add_action( 'wp_enqueue_scripts', 'wptags_enqueue_styles' );

// Load in our JS
function wptags_enqueue_scripts() {

  // wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], time(), true );
  wp_enqueue_script( 'jquery-theme-js', get_stylesheet_directory_uri() . '/assets/js/jquery.theme.js', [ 'jquery' ], time(), true );


}
add_action( 'wp_enqueue_scripts', 'wptags_enqueue_scripts' );

// Control header for the_title
function wptags_title_markup( $title, $id = null ) {

    if ( !is_singular() && in_the_loop() ) {

      $title = '<h2><a href="' . get_permalink( $id ) . '">' . $title . '</a></h2>';

    } else if ( is_singular() && in_the_loop() ) {

      $title = '<h1>' . $title . '</h1>';

    }

    return $title;
}
add_filter( 'the_title', 'wptags_title_markup', 10, 2 );

// Register Menu Locations
register_nav_menus( [
  'main-menu' => esc_html__( 'Main Menu', 'wptags' ),
  'footer-menu' => esc_html__( 'Footer Menu', 'wptags' )
]);


// Setup Widget Areas
function wptags_widgets_init() {
  register_sidebar([
    'name'          => esc_html__( 'Main Sidebar', 'wptags' ),
    'id'            => 'main-sidebar',
    'description'   => esc_html__( 'Add widgets for main sidebar here', 'wptags' ),
    'before_widget' => '<section class="widget">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ]);
}
add_action( 'widgets_init', 'wptags_widgets_init' );

/**
 * ここから以下は削除しても問題ない
 */

// 管理画面（ビジュアルエディタ）にオリジナルのスタイルを適用
// add_editor_style(array('style.css'));

// 1段目に追加
add_filter( 'mce_buttons', 'add_mce_buttons' );
function add_mce_buttons( $buttons ) {
  $add = array(
    'wp_page'
  );
  return array_merge( $buttons, $add );
}

// 2段目に追加
add_filter( 'mce_buttons_2', 'add_mce_buttons_2' );
function add_mce_buttons_2( $buttons ) {
  $add_buttons_2 = array(
    'fontselect',
    'fontsizeselect',
    'backcolor'
  );
  return array_merge( $buttons, $add_buttons_2 );
}

// 3段目に追加
add_filter( 'mce_buttons_3', 'add_mce_buttons_3' );
function add_mce_buttons_3( $buttons ) {
  $add_buttons_3 = array(
    'cut',
    'copy',
    'paste'
  );
  return array_merge( $buttons, $add_buttons_3 );
}

// 4段目に追加
add_filter( 'mce_buttons_4', 'add_mce_buttons_4' );
function add_mce_buttons_4( $buttons ) {
  $add_buttons_4 = array(
    'superscript',
    'subscript'
  );
  return array_merge( $buttons, $add_buttons_4 );
}


?>
