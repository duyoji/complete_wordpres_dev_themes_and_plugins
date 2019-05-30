<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span>

  <header class="entry-header">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php echo ( get_the_post_thumbnail($post->ID, 'medium') ); ?>
  </header>

  <div class="byline">
    <?php esc_html_e('筆者:'); ?> <?php the_author_posts_link(); ?>
  </div>

  <div class="entry-content">
    <p><?php the_excerpt(); ?></p>
  </div>
</article>