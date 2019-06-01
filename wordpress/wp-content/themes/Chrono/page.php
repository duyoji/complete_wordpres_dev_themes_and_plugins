<?php get_header(); ?>
<main id="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="https://schema.org/Blog"><!-- Blogのメインコンテンツエリア -->
  <div class="container-fluid">
    <div class="main-contents">
      <div class="kiji-section">
        <?php if(have_posts()): the_post(); ?>
          <article itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost" <?php post_class( 'kiji' ) ?>><!-- articleタグのマークアップ -->
            <!-- 記事の概要を表示（関数はAll in One SEO Packの関数を利用しています） -->
	           <meta itemprop="about" content="<?php echo get_post_meta($post->ID, _aioseop_description, true); ?>">
             <section>
               <div class="single-content">
                <!-- パンくずリスト -->
                <div class="breadcrumb">
                  <span class="" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><!-- パンくずリストのマークアップ -->
                    <a href="<?php echo home_url(); ?>" itemprop="url">
                      <span itemprop="title"><i class="fas fa-home"></i></span>
                    </a>&gt;&nbsp;
                  </span>
                  <?php if ( is_single() ) { ?>
                    <span class="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                      <a href="<?php $cat = get_the_category(); echo get_category_link($cat[0]->cat_ID); ?>" itemprop="url">
                        <span itemprop="title"><?php echo $cat[0]->name; ?></span>
                      </a>&gt;&nbsp;
                    </span>
                  <?php } else { ?>
                  <?php } ?>
                  <strong style="color: inherit;font-size: 16px;font-weight: 800;"><?php the_title(); ?></strong>
                </div><!-- パンくずリストここまで -->
                <div class="text text-center">
                  <!-- 記事タイトル -->
                  <div class="kiji-title">
                    <h2 class="entry-title" itemprop="name headline" title="<?php printf(the_title_attribute('echo=0') ); ?>" itemprop="url">
                      <?php the_title(); ?>
                    </h2>
                  </div>
                  <!-- サムネイル画像を表示 -->
                  <?php if(has_post_thumbnail()): ?>
                    <div class="kiji-thumbnail">
                      <?php the_post_thumbnail( 'large'); ?>
                    </div>
                  <?php endif; ?>
                  </div><!-- End Text -->
                  <!-- 記事本文表示 -->
                  <div itemprop="articleBody" class="kiji-content">
                    <?php the_content(); ?>
                  </div>
                <!-- シェアボタン -->
                <?php
                $url_encode = urlencode(get_permalink());
                $title_encode = urlencode(get_the_title()).'｜'.get_bloginfo('name');
                ?>
                <div class="share">
                  <ul>
                    <div class="row text-center">
                      <div class="col-md-4">
                        <li class="facebook">
                          <a class="btn btn-lg btn-facebook" href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
                            <i class="fab fa-facebook-f"></i><span> facebook</span>
                          </a>
                        </li>
                      </div>
                      <div class="col-md-4">
                        <li class="tweet">
                          <a class="btn btn-lg btn-twitter" href="//twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
                            <i class="fab fa-twitter"></i><span> tweet</span>
                          </a>
                        </li>
                      </div>
                      <div class="col-md-4">
                        <li class="hatena">
                          <a class="btn btn-lg btn-hatena" href="//b.hatena.ne.jp/entry/<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;"><p><span class="font-weight-bold">B!</span> hatebu</p>
                          </a>
                        </li>
                      </div>
                    </div><!-- End Row -->
                  </ul>
                </div><!-- End Share -->
                <!-- シェアボタンここまで -->
              </div><!-- End Single Content -->
            </section>
          </article>
        <?php endif; ?>
      </div><!-- End Kiji Section -->

      <?php get_sidebar(); ?>
    </div><!-- End Main-Contents -->
  </div><!-- End Container-Fruid -->
</main>
<?php get_footer(); ?>
