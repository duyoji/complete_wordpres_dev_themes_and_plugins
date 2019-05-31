<?php get_header(); ?>

  <div id="primary" class="content-area extended">
    <main id="main" class="site-main" role="main">
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <h1><?php the_title(); ?></h1>
        </header>

        <div class="entry-content">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'full' ); ?>
          </a>

          <?php the_content(); ?>

          <p>
            スキルリスト:
            <?php the_terms( $post->ID, 'skills' ); ?>
          </p>

        </div>
      </article>
      <?php endwhile; endif; ?>

      <p>Template: single-portfolio.php</p>


    </main>
  </div>

<?php get_footer(); ?>
