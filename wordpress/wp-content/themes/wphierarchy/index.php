<?php get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <h1>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h1>
        </header>

        <div class="entry-content">
          <p><?php the_excerpt(); ?></p>
        </div>
      </article>
      <?php endwhile; else : ?>
        <p><?php esc_html_e('No Posts', TEXT_DOMAIN); ?></p>
      <?php endif; ?>
    </main>
  </div>

<?php get_footer('splash'); ?>
