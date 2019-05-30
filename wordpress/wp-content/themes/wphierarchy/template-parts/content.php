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