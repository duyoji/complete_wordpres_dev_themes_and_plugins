<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span>
  <p><?php esc_html_e('ギャラリーをお楽しみください', TEXT_DOMAIN) ?></p>

  <header class="entry-header">
    <h1>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h1>
  </header>

  <div class="entry-content">
    <p><?php the_content(); ?></p>
  </div>

  <?php if( comments_open() ) : ?>
    <?php comments_template(); ?>
  <?php endif; ?>
</article>