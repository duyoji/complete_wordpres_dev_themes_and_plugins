<?php
  // Template Name: 横幅いっぱい
  // Template Post Type: post, page, portfolio
?>
<?php get_header(); ?>

  <div id="primary" class="content-area extended">
    <main id="main" class="site-main" role="main">
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
      <?php endwhile; else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
      <?php endif; ?>

      <p>Template: template-full-width.php</p>

    </main>
  </div>

<?php get_footer(); ?>
