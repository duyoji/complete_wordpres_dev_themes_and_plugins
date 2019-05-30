<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h1>
  </header>

  <div class="byline">
    <?php esc_html_e('筆者:'); ?> <?php the_author(); ?>
  </div>

  <div class="entry-content">
    <?php if( is_singular() ) : ?>
      <p><?php the_content(); ?></p>
    <?php else : ?>
      <p><?php the_excerpt(); ?></p>
    <?php endif; ?>
  </div>

  <?php if( comments_open() ) : ?>
    <?php comments_template(); ?>
  <?php endif; ?>
</article>