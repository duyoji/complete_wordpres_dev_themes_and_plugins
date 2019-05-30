<?php get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

      <header class="entry-header">
        <h1><?php the_title(); ?></h1>
      </header>

      <div class="entry-content">
        <pre><?php var_export( $post ); ?></pre>

        <p><?php the_content(); ?></p>
      </div>

      <?php if( comments_open() ) : ?>
        <?php comments_template(); ?>
      <?php endif; ?>

      <?php endwhile; else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
      <?php endif; ?>

      <p>Template: attachment.php</p>

    </main>
  </div>

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
