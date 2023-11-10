<?php
  /* wordpress標準機能の拡張 */
  function my_setup(){
    add_theme_support('post-thumbnails'); /* アイキャッチ画像の設定 */
    add_theme_support('automatic-feed-links'); /* RSSフィードのURL生成 */
    add_theme_support('title-tag'); /* titleタグの自動生成 */
    add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) ); /* マークアップをHTML5にする */
  }

  add_action("after_setup_theme", "my_setup");

  /* wordpress管理画面でメニューを管理する */
  function my_menu_init(){
    register_nav_menus(
      array(
        'global' => 'ヘッダーメニュー',
        'drawer' => 'ドロワーメニュー',
        'footer' => 'フッターメニュー',
        'work' => '制作実績メニュー'
      )
    );
  }

  add_action("init", "my_menu_init");

  //WPのウィジェットを有効化
  function my_widget_init(){
    register_sidebar(
      array(
        'name' => 'サイドバー',
        'id' => 'sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
        )
    );
    register_sidebar(
      array(
        'name' => 'テストウィジェット',
        'id' => 'test',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
        )
    );
  }
  add_action('widgets_init', 'my_widget_init');

  /* CSS/JSの読み込み */
  function my_script_init(){
    wp_enqueue_style("font-awesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css", array(), "5.8.2", "all");
    wp_enqueue_style("my", get_template_directory_uri()."/css/style.css", array(), filemtime(get_theme_file_path('css/style.css')), "all");
    wp_enqueue_script("my", get_template_directory_uri()."/js/script.js", array("jquery"), filemtime(get_theme_file_path('/js/script.js')), true);
    if(is_single()){
      wp_enqueue_script("sns", get_template_directory_uri()."/js/sns.js", array("jquery"), filemtime(get_theme_file_path('/js/sns.js')), true);
    }
  }

  add_action("wp_enqueue_scripts", "my_script_init");

/**
 * アーカイブタイトル書き換え
 */
function my_archive_title($title) {

  if (is_category()) { // カテゴリーアーカイブの場合
    $title = single_cat_title('', false);
  } elseif (is_tag()) { // タグアーカイブの場合
    $title = single_tag_title('', false);
  } elseif (is_post_type_archive()) { // 投稿タイプのアーカイブの場合
    $title = post_type_archive_title('', false);
  } elseif (is_tax()) { // タームアーカイブの場合
    $title = single_term_title('', false);
  } elseif (is_author()) { // 作者アーカイブの場合
    $title = get_the_author();
  } elseif (is_date()) { // 日付アーカイブの場合
    $title = '';
    if (get_query_var('year')) {
      $title .= get_query_var('year') . '年';
    }
    if (get_query_var('monthnum')) {
      $title .= get_query_var('monthnum') . '月';
    }
    if (get_query_var('day')) {
      $title .= get_query_var('day') . '日';
    }
  }
  return $title;
};

add_filter('get_the_archive_title', 'my_archive_title');

function my_the_post_category($anchor = true){
  $category = get_the_category();
  if($category && $category[0]){
    if($anchor){
      echo '<a href="' . esc_url(get_category_link($category[0]->term_id)) . '">' . $category[0]->cat_name . '</a>';
    }else{
      echo $category[0]->cat_name;
    }
  }
}

function my_the_post_tag($post_id = 0){
  if($post_id === 0){
    $post_obj = get_queried_object();
    $post_id = $post_obj->ID;
  }

  $post_tags = get_the_tags($post_id);
  if($post_tags){
    foreach($post_tags as $tag){
      echo '<div class="entry-tag-item"><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . $tag->name . '</a></div><!-- /entry-tag-item -->';
    }
  }
}

function my_the_post_term($tax, $anchor = true){
  $id = get_the_ID();
  $terms = get_the_terms($id, $tax);
  if($terms && $terms[0]){
    if($anchor){
      echo '<a href="' . esc_url(get_term_link($terms[0]->term_id)) . '">' . $terms[0]->name . '</a>';
    }else{
      echo $terms[0]->name;
    }
  }
}

function my_the_post_thumbnail($size = 'medium_large'){
  if(has_post_thumbnail()){
    the_post_thumbnail($size);
  }else{
    echo '<img src="' . get_template_directory_uri() . '/img/noimg.png" alt="no image">';
  }
}

function my_link_pages(){
  wp_link_pages(
    array(
      'before' => '<nav class="entry-links">',
      'after' => '</nav>',
      'link_before' => '',
      'link_after' => '',
      'next_or_number' => 'number',
      'separator' => '',
    )
  );
}

function my_get_avatar($size = 96){
  $author_id = get_the_author_meta('ID');
  echo get_avatar($author_id, $size);
}

function class_active_genre($query_id, $term_id){
  if($query_id === $term_id){
    echo 'class="is-active"';
  }
}

/**
 * 検索結果から固定ページを除外する
 */
function my_posts_search($search, $wp_query) {
  // 検索結果ページ・メインクエリ・管理画面以外の3つの条件が揃った場合
  if ($wp_query->is_search() && $wp_query->is_main_query() && !is_admin()) {

    // 検索結果を投稿タイプに絞る
    $search .= " AND post_type = 'post' ";

    return $search;
  }

  return $search;
}
add_filter('posts_search','my_posts_search', 10, 2);

/*****
ショートコード
******/
function my_shortcord($attrs, $content = ''){
  return '<div class="entry-btn"><a class="btn" href="' . $attrs['link'] . '">' . $content . '</a></div><!-- /entry-btn -->';
}
add_shortcode('btn', 'my_shortcord');

function my_searchform_shortcode($attrs, $content = ''){
  return get_search_form(false);
}
add_shortcode('search-form', 'my_searchform_shortcode');

function my_contact_btn_shortcode($attrs, $content){
  return '<div class="entry-contact__btn"><a href="' . $attrs['link'] . '" class="entry-contact__btn__link"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#FFFFFF}</style><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg><span>' . $content . '</span></a></div>';
}
add_shortcode('contact-btn', 'my_contact_btn_shortcode');

