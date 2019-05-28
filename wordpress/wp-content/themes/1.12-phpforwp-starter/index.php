<?php get_header(); ?>

    <div id="content">

      <!-- Static Front Page -->
      <?php if ( is_front_page() && !is_home() ) : ?>
      Static Front Page

      <!-- Blog Home -->
      <?php elseif ( is_home()  ) : ?>
      Blog Home


      <!-- Page (Not Front Page) -->
      <?php elseif ( is_page() && !is_front_page() ) : ?>
      Page (Not Front Page)

      <!-- Single Post -->
      <?php elseif ( is_single() && !is_attachment() ) : ?>
      Single Post


      <!-- Single Attachment (Media) -->
      <?php elseif ( is_attachment() ) : ?>
      Single Attachment (Media)

      <!-- Category Archive -->
      <?php elseif ( is_category() ) : ?>
      <?php single_cat_title(); ?>


      <!-- Tag Archive -->
      <?php elseif ( is_tag() ) : ?>
      <?php single_tag_title(); ?>

      <!-- Author Archive -->
      <?php elseif ( is_author() ) : ?>
      <?php the_archive_title(); ?>

      <!-- Date Archive -->
      <?php elseif ( is_date() ) : ?>
      <?php the_archive_title(); ?>

      <!-- 404 Page -->
      <?php elseif ( is_404() ) : ?>
      404 Page
      <?php endif; ?>

    </div>

<?php get_footer(); ?>
