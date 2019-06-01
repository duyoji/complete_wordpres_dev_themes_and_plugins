<?php get_header(); ?>
<main id="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog"><!-- Blogのメインコンテンツエリア -->
  <div class="container-fluid">
    <div class="main-contents">
      <div class="kiji-section">
        <!-- 記事ループ開始 -->
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <article itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost" <?php post_class( 'kiji-list' ) ?>><!-- articleタグのマークアップ -->
            <!-- 記事の概要を表示（関数はAll in One SEO Packの関数を利用しています） -->
	           <meta itemprop="about" content="<?php echo get_post_meta($post->ID, _aioseop_description, true); ?>">
            <section>
              <div class="text text-center">
                <!-- 記事タイトル -->
                <h2 class="entry-title" itemprop="name headline">
                  <a class="kiji-link" href="<?php the_permalink(); ?>" title="<?php printf(the_title_attribute('echo=0') ); ?>" itemprop="url">
                    <?php the_title(); ?>
                  </a>
                </h2>
                <!-- 投稿日を表示 -->
                <div class="kiji-date text-center">
                  <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                    <span><i class="far fa-clock"></i></span>
                    <?php echo get_the_date(); ?>
                  </time>
                </div>
              </div><!-- End Text -->
              <!-- サムネイル画像 -->
              <div class="kiji-img" style="background-image:url(<?php echo thumb_url( 'large' ); ?>)" itemscope itemtype='http://schema.org/ImageObject' itemprop="image">
                <!-- サムネイル画像の中にカテゴリ -->
                <div class="label">
                  <p>
                    <?php if (!is_category()): ?>
                      <?php if (has_category()): ?>
                        <?php $postcat = get_the_category(); echo $postcat[0]->name; ?>
                      <?php endif; ?>
                    <?php endif; ?>
                  </p>
                </div>
              </div><!-- End Kihi-Image -->
              <div class="text text-center">
                <!--抜粋-->
                <div class="description">
                  <?php the_excerpt(); ?>
                </div>
                <!-- 記事詳細へのリンク -->
                <a class="kiji-link" href="<?php the_permalink(); ?>">
                  <div class="btn btn-light btn-lg">
                    READ MORE
                  </div>
                </a>
              </div><!-- End Text -->
            </section>
          </article>
        <?php endwhile; endif; ?><!-- ループ終了 -->
        <!-- ページボタン -->
        <div class="pagination"><!-- <li><a><span>タグが隠れている -->
          <?php echo paginate_links(array(
            'type' => 'list',
            'mid_size' => '1',
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;'
          )); ?>
        </div>
      </div><!-- End Kiji-Section -->
      <?php get_sidebar(); ?>
    </div><!-- End Main-Contents -->
  </div><!-- End Container-Fruid -->
</main>
<?php get_footer(); ?>
