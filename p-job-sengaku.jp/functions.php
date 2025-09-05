<?php
/**
 * セットアップ処理
 *
 * @return void
 */
function my_theme_setup() {
  // アイキャッチ画像を有効化
  add_theme_support( 'post-thumbnails' );
  // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support( 'automatic-feed-links' );
  // タイトルタグ自動生成
  add_theme_support( 'title-tag' );
  // HTML5でマークアップ
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );
}
add_action( 'after_setup_theme', 'my_theme_setup' );



/**
 * CSSとJavaScriptの読み込み
 *
 * @return void
 */
function my_theme_script_init() {
  // WordPress提供のjquery.jsを読み込まない
  wp_deregister_script( 'jquery' );
  // jQueryの読み込み
  wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true );
  // swiper
  wp_enqueue_script( 'swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js', array(), '8.4.7', true );
  wp_enqueue_style( 'swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.css', array(), '8.4.7', false );
  // 自作jsファイルの読み込み
  wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0.0', true);
  // 自作cssファイルの読み込み
  wp_enqueue_style( 'my-style', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0.2', false );
}
add_action( 'wp_enqueue_scripts', 'my_theme_script_init' );

/**
 * 記事表示時の整形無効
 *
 * @return void
 */
function my_theme_remove_wpautop() {
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );

	add_filter( 'tiny_mce_before_init', 'my_theme_disable_tinymce_formatting' );
}
add_action( 'after_setup_theme', 'my_theme_remove_wpautop' );

/**
* Disable formatting in the TinyMCE editor.
*
* @param array $init_array An array of TinyMCE settings.
* @return array The modified array of TinyMCE settings.
*/
function my_theme_disable_tinymce_formatting( $init_array ) {
	global $allowedposttags;

	$init_array['valid_elements']          = '*[*]';
	$init_array['extended_valid_elements'] = '*[*]';
	$init_array['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
	$init_array['indent']                  = true;
	$init_array['wpautop']                 = false;
	$init_array['force_p_newlines']        = false;

	return $init_array;
}

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
} 

//投稿のタグをチェックボックスで選択できるようにする
function change_post_tag_to_checkbox() {
  $args = get_taxonomy('post_tag');
  $args -> hierarchical = true;//Gutenberg用
  $args -> meta_box_cb = 'post_categories_meta_box';//Classicエディタ用
  register_taxonomy( 'post_tag', 'post', $args);
}
add_action( 'init', 'change_post_tag_to_checkbox', 1 );



//固定ページページネーション
function subroopPagination($end_size = 1, $mid_size = 0, $prev_next = true) {
  // global $search_query;
  global $search_query;
  $max_page = $search_query->max_num_pages;//最大ページ
  $current = $search_query->query['paged'];//現在のページ
  $page_format = paginate_links(
    array(
      'total' => $max_page,
      'type'  => 'array',
      'prev_text' => '＜',
      'next_text' => '＞',
      'end_size' => $end_size,//初期値:2両端のﾍﾟｰｼﾞﾘﾝｸの数
      'mid_size' => $mid_size,//初期値:1両端ページリンクを表示数
      'prev_next' => $prev_next,//初期値:true [前へ][次へ]のリンクを含むか
    )
  );
  $code = '';
  if( is_array($page_format) ) {
  $code .= '<div class="navigation post-navigation">';
  $code .= '<ul class="nav-links">';
  foreach ( $page_format as $page ) {
    $code .= $page;
  }
    $code .= '</ul>';
    $code .= '</div>';
  }
  wp_reset_query();
  return $code;
}

