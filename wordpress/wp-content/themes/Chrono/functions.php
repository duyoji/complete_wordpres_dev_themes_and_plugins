<?php
/*-----------------
WordPress標準機能
------------------*/
function my_setup() {
  add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
  add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
  add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
  add_theme_support( 'html5', array( /* HTML5のタグで出力 */
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );
}
add_action( 'after_setup_theme', 'my_setup' );

/*-------------------------------------------
 <?php wp_head(); ?>による画面の余白を消す
 --------------------------------------------*/
add_filter( 'show_admin_bar', '__return_false' );

/*---------------------
ウィジェットを追加する
-----------------------*/
function widgetarea_init() {
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'side-widget',
    'before_widget' => '<div id="%1$s" class="%2$s sidebar-wrapper">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar-title">',
    'after_title' => '</h4>'
  ));
}
add_action( 'widgets_init', 'widgetarea_init' );

/*------------------
サムネイル画像設定
--------------------*/
function thumb_url($size) {
  if (has_post_thumbnail()) {
    $postthumb = wp_get_attachment_image_src(get_post_thumbnail_id(), $size);
    $url = $postthumb[0];
  } else {
    $url = get_template_directory_uri() . '/img/no-image.jpg';
  }
  return $url;
}

/*---------------------
カスタマイズを追加する
-----------------------*/
function my_theme_customize_register( $wp_customize ) {
  //ヘッダーの背景色設定追加
  $wp_customize->add_setting( 'header_background_color', array(
  'default' => '#fff',
  ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
    'label' => 'ヘッダー背景色',
    'section' => 'colors',
    'settings' => 'header_background_color',
    'priority' => 20,
    )));
  //ヘッダーの文字色設定追加
  $wp_customize->add_setting( 'header_color', array(
  'default' => '#000',
  ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
    'label' => 'ヘッダー文字色',
    'section' => 'colors',
    'settings' => 'header_color',
    'priority' => 21,
    )));
  //メインの背景色設定追加
  $wp_customize->add_setting( 'main_background_color', array(
  'default' => '#fff',
  ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_background_color', array(
    'label' => 'メイン背景色',
    'section' => 'colors',
    'settings' => 'main_background_color',
    'priority' => 20,
    )));
  //メインの文字色設定追加
  $wp_customize->add_setting( 'main_color', array(
  'default' => '#000',
  ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_color', array(
    'label' => 'メイン文字色',
    'section' => 'colors',
    'settings' => 'main_color',
    'priority' => 21,
    )));
  //フッターの背景色設定追加
  $wp_customize->add_setting( 'footer_background_color', array(
  'default' => '#F7F7F7',
  ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
    'label' => 'フッター背景色',
    'section' => 'colors',
    'settings' => 'footer_background_color',
    'priority' => 20,
    )));
    //フッターの文字色設定追加
    $wp_customize->add_setting( 'footer_color', array(
    'default' => '#000',
    ) );
      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color', array(
      'label' => 'フッター文字色',
      'section' => 'colors',
      'settings' => 'footer_color',
      'priority' => 21,
      )));

  //ヘッダーカスタマイズ設定追加
  $wp_customize->add_section( 'img_section', array(
		'title' => 'ヘッダー画像', // 項目名
		'priority' => 60, // 優先順位
		'description' => '画像をアップロードしてください。',
	));
    //ヘッダー画像を設定する
    $wp_customize->add_setting( 'header_img' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_img', array(
      'label' => 'ヘッダー画像',
      'section' => 'img_section',
      'settings' => 'header_img',
      'description' => 'ヘッダー画像を設定してください。',
    )));

  //プロフィールカスタマイズ設定追加
  $wp_customize->add_section( 'my_theme_origin_profile', array(
  'title'     => 'プロフィール編集', // 項目名
  'priority'  => 200, // 優先順位
  ));
    //名前を設定する
    $wp_customize->add_setting( 'my_theme_options[originName]', array(
      'default'   => 'Name',
      'type'      => 'option',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'my_theme_options_origin_name', array(
        'settings'  => 'my_theme_options[originName]',
        'label'     => '名前',
        'section'   => 'my_theme_origin_profile',
        'type'      => 'text',
      ));
    //紹介文を設定する
    $wp_customize->add_setting( 'my_theme_options[originText]', array(
      'default'   => 'Text',
      'type'      => 'option',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'my_theme_options_origin_text', array(
        'settings'  => 'my_theme_options[originText]',
        'label'     => 'テキスト',
        'section'   => 'my_theme_origin_profile',
        'type'      => 'textarea',
      ));
    //twitterのID設定をする
    $wp_customize->add_setting( 'my_theme_options[originTwitterID]', array(
      'default'   => '@',
      'type'      => 'option',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'my_theme_options_origin_twitterID', array(
        'settings'  => 'my_theme_options[originTwitterID]',
        'label'     => 'TwitterID',
        'section'   => 'my_theme_origin_profile',
        'type'      => 'text',
    ));
    //twitter埋め込み設定をする
    $wp_customize->add_setting( 'my_theme_options[originTwitter]', array(
      'default'   => 'https://twitter.com/toki_work26?ref_src=twsrc%5Etfw',
      'type'      => 'option',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'my_theme_options_origin_twitter', array(
      'settings'  => 'my_theme_options[originTwitter]',
      'label'     => 'https://publish.twitter.com/ であなたのタイムラインのURLを取得して貼りつけて下さい。',
      'section'   => 'my_theme_origin_profile',
      'type'      => 'text',
    ));

  //プロフィール画像カスタマイズ設定
  $wp_customize->add_section( 'set_img_section', array(
    'title' => 'プロフィール画像編集', // 項目名
    'priority' => 201, // 優先順位
    'discription' => 'アップロードした画像をプロフィール欄にセットします。'
  ));
    //プロフィール画像設定
    $wp_customize->add_setting('set_img_url');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'set_img_url', array(
      'settings' => 'set_img_url',
      'label' => 'プロフィール画像',
      'section' => 'set_img_section',
      'description' => '画像をアップロードするとプロフィール欄に画像が表示されます。※縦横比1:1の画像にしてください。'
    )));

}
add_action( 'customize_register', 'my_theme_customize_register' );

//色を反映させる
function customizer_color() {
  ?>
  <style type="text/css">
   /* ヘッダー */
  #header {
   background-color: <?php echo get_theme_mod( 'header_background_color', '#fff'); ?>;
  }
  #h-logo {
    color: <?php echo get_theme_mod( 'header_color', '#000'); ?>;
  }

   /* メイン */
  #main {
   background-color: <?php echo get_theme_mod( 'main_background_color', '#fff'); ?>;
  }
  #main {
    color: <?php echo get_theme_mod( 'main_color', '#000'); ?>;
  }

   /* フッター */
  #footer {
   background-color: <?php echo get_theme_mod( 'footer_background_color', '#F7F7F7'); ?>;
   color: <?php echo get_theme_mod( 'footer_color', '#000'); ?>;
  }
  </style>
  <?php
  }
  add_action( 'wp_head', 'customizer_color');

/*------------------------------
OGPタグ/Twitterカード設定を出力
--------------------------------*/
function my_meta_ogp() {
  if( is_front_page() || is_home() || is_singular() ){
    global $post;
    $ogp_title = '';
    $ogp_descr = '';
    $ogp_url = '';
    $ogp_img = '';
    $insert = '';

    if( is_singular() ) { //記事＆固定ページ
       setup_postdata($post);
       $ogp_title = $post->post_title;
       $ogp_descr = mb_substr(get_the_excerpt(), 0, 100);
       $ogp_url = get_permalink();
       wp_reset_postdata();
    } elseif ( is_front_page() || is_home() ) { //トップページ
       $ogp_title = get_bloginfo('name');
       $ogp_descr = get_bloginfo('description');
       $ogp_url = home_url();
    }

    //og:type
    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

    //og:image
    if ( is_singular() && has_post_thumbnail() ) {
       $ps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
       $ogp_img = $ps_thumb[0];
    } else {
     $ogp_img = 'img/no-image.jpg';
    }

    //出力するOGPタグをまとめる
    $insert .= '<meta property="og:title" content="'.esc_attr($ogp_title).'" />' . "\n";
    $insert .= '<meta property="og:description" content="'.esc_attr($ogp_descr).'" />' . "\n";
    $insert .= '<meta property="og:type" content="'.$ogp_type.'" />' . "\n";
    $insert .= '<meta property="og:url" content="'.esc_url($ogp_url).'" />' . "\n";
    $insert .= '<meta property="og:image" content="'.esc_url($ogp_img).'" />' . "\n";
    $insert .= '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />' . "\n";
    $insert .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    $options = get_option('my_theme_options');
    $insert .= '<meta name="twitter:site"
                content="'.esc_html($options['originTwitterID']).'" />' . "\n";
    $insert .= '<meta property="og:locale" content="ja_JP" />' . "\n";

    echo $insert;
  }
} //END my_meta_ogp

add_action('wp_head','my_meta_ogp');//headにOGPを出力

/*------------------------------------------
管理画面にカラムを追加（VIEW数、サムネイル）
-------------------------------------------*/
//アクセス数を保存
function set_post_views($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  }else{
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}

//クローラーのアクセス判別
function is_bot() {
$ua = $_SERVER['HTTP_USER_AGENT'];

$bot = array(
      "googlebot",
      "msnbot",
      "yahoo"
);
foreach( $bot as $bot ) {
  if (stripos( $ua, $bot ) !== false){
    return true;
  }
}
return false;
}

function manage_posts_columns($columns) {
$columns['post_views_count'] = 'view数';
$columns['thumbnail'] = 'サムネイル';
return $columns;
}
function add_column($column_name, $post_id) {
  /*View数呼び出し*/
  if ( $column_name == 'post_views_count' ) {
      $stitle = get_post_meta($post_id, 'post_views_count', true);
    }
    /*サムネイル呼び出し*/
  if ( $column_name == 'thumbnail') {
    $thumb = get_the_post_thumbnail($post_id, array(100,100), 'thumbnail');
  }
   /*ない場合は「なし」を表示する*/
  if ( isset($stitle) && $stitle ) {
    echo attribute_escape($stitle);
  }
  else if ( isset($thumb) && $thumb ) {
    echo $thumb;
  }
  else {
    echo __('None');
  }
}
add_filter( 'manage_posts_columns', 'manage_posts_columns' );
add_action( 'manage_posts_custom_column', 'add_column', 10, 2 );

/*----------------------------------
人気記事を出力（ウィジェットに追加）
----------------------------------*/
/* 人気記事一覧ウィジェット */
class Popular_Posts extends WP_Widget {
/*コンストラクタ*/
function __construct() {
  parent::__construct(
    'popular_posts',
    '人気記事',
    array( 'description' => 'PV数の多い順で記事を表示' )
  );
 }
/*ウィジェット追加画面でのカスタマイズ欄の追加*/
function form($instance) {
  if(empty($instance['title'])) {
    $instance['title'] = '';
  }
  if(empty($instance['number'])) {
    $instance['number'] = 5;
  }
?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('タイトル:'); ?></label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
  name="<?php echo $this->get_field_name('title'); ?>"
  value="<?php echo esc_attr( $instance['title'] ); ?>">
</p>
<p>
  <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('記事表示件数:'); ?></label>
  <input type="text" id="<?php echo $this->get_field_id('limit'); ?>"
  name="<?php echo $this->get_field_name('number'); ?>"
  value="<?php echo esc_attr( $instance['number'] ); ?>" size="3">
</p>
<?php
}
/*カスタマイズ欄の入力内容が変更された場合の処理*/
function update($new_instance, $old_instance) {
  $instance = $old_instance;
  $instance['title'] = strip_tags($new_instance['title']);
  $instance['number'] = is_numeric($new_instance['number']) ? $new_instance['number'] : 5;
    return $instance;
}
/*ウィジェットのに出力される要素の設定*/
function widget($args, $instance) {
  extract($args);
  echo $before_widget;
    if(!empty($instance['title'])) {
      $title = apply_filters('widget_title', $instance['title'] );
    }
    if (!empty($title)) {
      echo $before_title . $title . $after_title;
    } else {
      echo '<h4>人気記事</h4>';
    }
  $number = !empty($instance['number']) ? $instance['number'] : get_option('number');
?>

<!--ここにウィジェットとして呼び出したい要素を記述-->
<aside class="sidekiji">
<ul>
  <?php get_the_ID();//記事のPV情報を取得する
    $args = array('meta_key'=> 'post_views_count',//投稿数をカウントするカスタムフィールド名
                  'orderby' => 'meta_value_num',
                  'order' => 'DESC',
                  'posts_per_page' => $number
    );
    $my_query = new WP_Query( $args );?>
    <?php while ( $my_query->have_posts() ) : $my_query->the_post(); $loopcounter++; ?>
    <li>
      <a href="<?php the_permalink(); ?>">
        <!--順位-->
        <span class="rank-count r-count<?php echo $loopcounter; ?>">
         <?php echo $loopcounter; ?>
        </span>
        <!--サムネイル画像の追加-->
        <?php if( has_post_thumbnail() ): ?>
          <?php the_post_thumbnail('large'); ?>
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpg" alt="NO IMAGE" title="NO IMAGE" />
        <?php endif; ?>
        <div class="sidekiji-text">
          <?php the_title(); ?>
          <br>
          <!--カテゴリ-->
          <span class="popular-category">
            <?php if( has_category() ): ?>
              <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
            <?php endif; ?>
          </span>
        </div>
      </a>
    </li>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</ul>
</aside>

<?php echo $after_widget;
}
}
register_widget('Popular_Posts');
