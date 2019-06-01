<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- noindex -->
    <?php if(is_category() || is_date() || is_search() || is_404()) : ?>
      <meta name="robots" content="noindex"/>
    <?php endif; ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- title設定 -->
    <?php if(is_home()): ?>
      <title><?php bloginfo('name'); ?></title>
    <?php elseif(is_single() || is_page() ):?>
      <title><?php the_title(); ?></title>
    <?php elseif(is_category()):?>
      <title><?php single_cat_title();?> | <?php bloginfo('name'); ?></title>
    <?php elseif(is_search()) :?>
         <title>「<?php the_search_query(); ?>」の検索結果 | <?php bloginfo('name'); ?></title>
     <?php elseif(is_date()): ?>
        <title><?php the_time('Y年m月');?> | <?php bloginfo('name'); ?></title>
    <?php endif; ?>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <!-- header -->
    <header id="header" style="background-image:url(<?php echo esc_url(get_theme_mod('header_img')); ?>)"  itemscope="itemscope" itemtype="https://schema.org/WPHeader" ><!-- マークアップ -->

      <div class="container-fluid">
          <div class="header-logo">
            <h1 class="text-center"><a id="h-logo" href="<?php echo home_url(); ?>" itemprop="url">
              <?php bloginfo('name'); ?>
            </a></h1>
          </div>
      </div>
    </header>
    <!-- End header -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <!-- スマホ用メニューボタン -->
        <button style="color: <?php echo get_theme_mod( 'nav_color', '#000'); ?>; "  class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav m-auto">
            <li itemprop="url">
              <a href="<?php echo home_url(); ?>" itemprop="name"><i class="fas fa-home"></i></a>
            </li>
            <?php wp_list_categories('title_li=&depth=1'); ?><!-- <li><a>タグが隠れている -->
          </ul>
        </div>
      </div><!-- End Container Fruid -->
    </nav><!-- End Navigation -->
