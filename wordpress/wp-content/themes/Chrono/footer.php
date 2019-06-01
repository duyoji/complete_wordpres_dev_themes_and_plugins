<footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="https://schema.org/WPFooter">
  <div class="container-fluid">
    <div class="row text-center">
      <div class="col-md-6">
        <h4 class="footer-heading">About me!</h4>
        <div class="heading-underline"></div>
        <!-- プロフィール画像 -->
        <figure class="pro-img">
          <img src="<?php echo esc_url(get_theme_mod('set_img_url')); ?>" alt="プロフィール画像">
        </figure>
        <!-- 名前 -->
        <p class="name">
          <?php
          $options = get_option('my_theme_options');
          echo esc_html($options['originName']);
          ?>
        </p>
        <!-- 紹介文 -->
        <p>
          <?php
          $options = get_option('my_theme_options');
          echo esc_html($options['originText']);
          ?>
        </p>
      </div>
      <div class="col-md-6">
        <h4 class="footer-heading">Twitter</h4>
        <div class="heading-underline"></div>
        <!-- twitterタイムライン埋め込み -->
        <a class="twitter-timeline" data-lang="ja" data-width="320" data-height="450" data-theme="light" href="<?php
            $options = get_option('my_theme_options');
            echo esc_html($options['originTwitter']);
           ?>">Tweets by <?php
            $options = get_option('my_theme_options');
            echo esc_html($options['originTwitterID']);
           ?></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div><!-- End Row -->
  </div><!-- End Container-Fruid -->

  <div class="copy text-center bg-dark">
    &copy; Tokimiya, 2019 All Rights Reserved.
  </div>
</footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
