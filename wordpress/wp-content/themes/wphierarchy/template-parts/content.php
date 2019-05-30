<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span>

  <header class="entry-header">
    <h1><?php the_title(); ?></h1>
    <?php echo ( get_the_post_thumbnail($post->ID, 'medium') ); ?>
  </header>

  <div class="byline">
    <?php esc_html_e('筆者:'); ?> <?php the_author_posts_link(); ?>
  </div>

  <div class="entry-content">
    <p><?php the_content(); ?></p>
  </div>

  <?php if( comments_open() ) : ?>
    <?php comments_template(); ?>
  <?php endif; ?>
</article>