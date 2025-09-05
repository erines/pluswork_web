<?php
/**
 * Syncrise Added Function's
 */
new theme_miekaigo();

class theme_miekaigo
{

	public static $locs = array(
		"宇都宮市" => array("宇都宮市"),
		"栃木市" => array("栃木市"),
		"足利市" => array("足利市"),
		"小山市" => array("小山市"),
		"佐野市" => array("佐野市"),
		"那須塩原市" => array("那須塩原市"),
		"鹿沼市" => array("鹿沼市"),
		"日光市" => array("日光市"),
		"真岡市" => array("真岡市"),
		"大田原市" => array("大田原市"),
		"下野市" => array("下野市"),
		"矢板市"   => array("矢板市"),
		"さくら市" => array("さくら市"),
		"結城市" => array("結城市"),
		"筑西市" => array("筑西市"),
		"古河市" => array("古河市"),
		"下妻市" => array("下妻市"),
		"桜川市" => array("桜川市"),
		"八千代町" => array("八千代町"),
		"下都賀郡"  => array("下都賀郡"),
		"河内郡"  => array("河内郡"),
		"芳賀郡"  => array("芳賀郡"),
		"塩谷郡"  => array("塩谷郡"),
		"那須郡"  => array("那須郡"),
	);

	public static function get_loc_value($key)
	{
		return isset(self::$locs[$key]) ? (array) self::$locs[$key] : array($key);
	}

	public static function the_loc_label($key)
	{
		$label = "";
		$value = self::get_loc_value($key);

		if (!empty($value)) {
			$label .= $key;

			if (count($value) > 1)
				$label .= sprintf("(%s)", implode("・", $value));
		}

		echo esc_html($label);
	}

	public static function the_loc_value($key)
	{
		echo esc_attr(implode("+", self::get_loc_value($key)));
	}

	public static $facility = array(
		"特別養護老人ホーム" => array("特別養護老人ホーム"),
		"介護老人保健施設"   => array("介護老人保健施設"),
		"有料老人ホーム"     => array("有料老人ホーム"),
		"グループホーム"     => array("グループホーム"),
		"ショートステイ"     => array("ショートステイ"),
		"デイサービス"       => array("デイサービス"),
		"訪問介護"           => array("訪問介護"),
		"居宅介護支援"       => array("居宅介護支援"),
		"障がい者福祉サービス"    => array("障がい者福祉サービス"),
	);

	public static function get_facility_value($key)
	{
		return isset(self::$facility[$key]) ? (array) self::$facility[$key] : array($key);
	}

	public static function the_facility_label($key)
	{
		$label = "";
		$value = self::get_facility_value($key);

		if (!empty($value)) {
			$label .= $key;

			if (count($value) > 1)
				$label .= sprintf("(%s)", implode("・", $value));
		}

		echo esc_html($label);
	}

	public static function the_facility_value($key)
	{
		echo esc_attr(implode("+", self::get_facility_value($key)));
	}

	public function __construct()
	{
		add_action("init", array($this, "init"));
		add_action("after_setup_theme", array($this, "after_setup_theme"));
	}

	public function init()
	{
		add_filter("user_has_cap", array($this, "_user_has_cap"), 9999, 4);
	}

	public function after_setup_theme()
	{
		/*
		 * WP: WP_Query関連処理の追加
		 */
		// Filter: クエリキーを追加
		add_filter("query_vars", array($this, "query_vars"));
		// Action: 就業場所検索を追加
		add_action("posts_clauses_request", array($this, "posts_clauses_request_item_locs"), 10, 2);
		add_action("posts_clauses_request", array($this, "posts_clauses_request_item_facility"), 10, 2);
		add_filter("posts_clauses", array($this, "posts_clauses_order_item"), 10, 2);

		add_filter("qc/mwform_value/type_item", array($this, "mwform_value_type_item"), 10, 3);
		add_action("qc/mwform_formkey/type_item", array($this, "mwform_formkey_type_item"), 10, 2);
	}

	public function query_vars($query_vars)
	{
		$query_vars[] = "locs";
		$query_vars[] = "faci";
		return $query_vars;
	}

	/**
	 * QUERYに就業場所の文字列検索を追加
	 * @param unknown $pieces
	 * @param WP_Query $query
	 * @return array
	 */
	public function posts_clauses_request_item_locs($pieces, WP_Query &$query)
	{
		global $wpdb;

		$locs = $query->get("locs");
		$loc_values = array();

		if (empty($locs))
			return $pieces;

		foreach ((array) $locs as $loc)
			$loc_values = array_merge($loc_values, self::get_loc_value($loc));

		$loc_values = array_map("trim", $loc_values);
		$loc_values = array_filter($loc_values, "strlen");

		if (!empty($loc_values)) {
			$wheres = array();
			$compare = "OR";

			if (in_array("!", $loc_values)) {
				$loc_values = array();
				$compare = "AND";

				foreach (self::$locs as $locs) {
					if (empty($locs) || $locs == "!")
						continue;
					foreach ($locs as $value)
						$wheres[] = sprintf("CAST(locmt.meta_value AS CHAR) NOT LIKE '%%%s%%'", esc_sql($value));
				}

			} else {
				foreach ($loc_values as $value) {
					$wheres[] = sprintf("CAST(locmt.meta_value AS CHAR) LIKE '%%%s%%'", esc_sql($value));
				}

			}

			$pieces['join'] .= " INNER JOIN ({$wpdb->postmeta} AS locmt) ON ({$wpdb->posts}.ID = locmt.post_id)";
			$pieces['where'] .= sprintf(" AND (locmt.meta_key = '%s' AND (%s))", "就業場所", implode(" {$compare} ", $wheres));
		}

		return $pieces;
	}

	/**
	 * QUERYに施設形態の文字列検索を追加
	 * @param unknown $pieces
	 * @param WP_Query $query
	 * @return array
	 */
	public function posts_clauses_request_item_facility($pieces, WP_Query &$query)
	{
		global $wpdb;

		$facilities = $query->get("faci");
		$facility_values = array();

		if (empty($facilities))
			return $pieces;

		foreach ((array) $facilities as $facility)
			$facility_values = array_merge($facility_values, self::get_facility_value($facility));

		$facility_values = array_map("trim", $facility_values);
		$facility_values = array_filter($facility_values, "strlen");

		if (!empty($facility_values)) {
			$wheres = array();
			$compare = "OR";

			if (in_array("!", $facility_values)) {
				$facility_values = array();
				$compare = "AND";

				foreach (self::$facility as $facility) {
					if (empty($facility) || $facility == "!")
						continue;
					foreach ($facility as $value)
						$wheres[] = sprintf("CAST(facmt.meta_value AS CHAR) NOT LIKE '%%%s%%'", esc_sql($value));
				}

			} else {
				foreach ($facility_values as $value) {
					$wheres[] = sprintf("CAST(facmt.meta_value AS CHAR) LIKE '%%%s%%'", esc_sql($value));
				}

			}

			$pieces['join']  .= " INNER JOIN ({$wpdb->postmeta} AS facmt) ON ({$wpdb->posts}.ID = facmt.post_id)";
			$pieces['where'] .= sprintf(" AND ((facmt.meta_key = '就業場所' OR facmt.meta_key = '仕事の内容' OR facmt.meta_key = '事業内容') AND (%s))", implode(" {$compare} ", $wheres));

		}

		return $pieces;
	}

	/**
	 * 講座一覧時のリクエストSQL変更
	 * @param unknown $pieces
	 * @param WP_Query $query
	 * @return multitype:
	 */
	public function posts_clauses_order_item($pieces, WP_Query $query)
	{
		global $wpdb;

		if (!is_admin() && is_archive()) { # 非管理画面＆アーカイブ表示時のみ適用
			$is_course = false;

			if ($query->is_tax("genre")) {
				$is_course = true;
			} else
			if ($query->get("post_type") == "item") {
				$is_course = true;
			}

			// 検索対象に講座が含まれる場合
			if ($is_course) {

				$ref = $query->get("r");
				extract($pieces);

				if (empty($ref)) { # 参照フラグが未定義時、クローラー講座を後回しに表示強制
					$join    .= " LEFT JOIN ({$wpdb->postmeta} AS cmeta) ON ({$wpdb->posts}.ID = cmeta.post_id AND cmeta.meta_key = '_is_crawler')";
					$orderby  = "(cmeta.meta_value IS NULL OR CAST(cmeta.meta_value AS UNSIGNED) <> 1) DESC, {$wpdb->posts}.post_date DESC";
				} else
				if ($ref == "recommend") { # 「おすすめ」のみの場合、おすすめ優先順位でソート強制
					$join    .= " LEFT JOIN ({$wpdb->postmeta} AS cmeta) ON ({$wpdb->posts}.ID = cmeta.post_id AND cmeta.meta_key = '_recommend_order')";
					$orderby  = "CAST(cmeta.meta_value AS UNSIGNED) DESC, {$wpdb->posts}.post_date DESC";
				} else
				if ($query->get("orderby") == "") { # その他でソート順が指定されていない場合、更新日付でソート
					$orderby  = "{$wpdb->posts}.post_date DESC";
				}

				$pieces = compact(array_keys($pieces));
			}
		}

		return $pieces;
	}

	function _user_has_cap($all_caps, $caps, $args, \WP_User $user)
	{
		if ( $user->ID != get_current_user_id() ) {
			return $all_caps;
		}

		if ( isset( $all_caps['contributor'] ) && $all_caps['contributor'] ) {
			$all_caps = array_merge($all_caps, array(
				"upload_files"       => true,
				"delete_items"       => true,
				"create_items" 	     => true,
				"read_private_items" => true,
				"edit_items"         => true,
				"level_2"            => true,
			));
		}

		return $all_caps;
	}

	public function mwform_formkey_type_item(WP_Post $post, $formkey)
	{
		wp_enqueue_script("item-form", get_template_directory_uri()."/js/item-form.js", array("jquery"));
	}

	/**
	 * フォームの内容を書き換える
	 * @param String $value フォーム値
	 * @param String $key フォーム項目名
	 * @param WP_Post $post
	 * @return string
	 */
	public function mwform_value_type_item($value, $key, WP_Post $post) {
		if ($key == "職種") {
			$value = strip_tags(get_the_term_list($post->ID, "genre", "", ", ", ""));
		}

		return $value;
	}
}


/**
 * ウィジェットエリアの追加
 */
if (function_exists('register_sidebar')) {

	register_sidebar(array(
	 'name' => '関連求人-Main',
	 'id' => 'main_connect',
	 'description' => '関連求人-Main',
	 'before_widget' => '',
	 'after_widget' => ''
	 ));
	 
	register_sidebar(array(
	 'name' => '関連求人-スマホ',
	 'id' => 'sp_connect',
	 'description' => '関連求人-スマホ',
	 'before_widget' => '',
	 'after_widget' => ''
	 ));
	 
}


/**
 * ビジュアルエディタの整形
 */
add_editor_style( 'css/editor-styles.css');


/* 固定ページのビジュアルエディター解除
============================================= */
function disable_visual_editor_in_page(){
	global $typenow;
	if( $typenow == 'page' ){
		add_filter('user_can_richedit', 'disable_visual_editor_filter');
	}
}
function disable_visual_editor_filter(){
	return false;
}
add_action( 'load-post.php', 'disable_visual_editor_in_page' );
add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );



/* メニューの位置を調整
============================================= */
register_nav_menu('fnav', 'フッターメニュー');
register_nav_menu('cat_job', '求人カテゴリー');







/* スクリプトの管理
============================================= */

if (!is_admin()) {
	function register_script(){
		wp_register_script('easing', get_bloginfo('stylesheet_directory').'/js/jquery.easing.min.js');
		wp_register_script('slide', get_bloginfo('stylesheet_directory').'/js/jquery.bxslider.js');
		wp_register_script('ui-select', get_bloginfo('stylesheet_directory').'/js/jquery-ui-1.9.2.custom.js');
		wp_register_script('multiselect', get_bloginfo('stylesheet_directory').'/js/jquery.multiselect.js');
	}
	function add_script() {
		register_script();
			wp_enqueue_script('ui-select');
			wp_enqueue_script('multiselect');
		if (is_home()) {
			wp_enqueue_script('easing');
			wp_enqueue_script('slide');
		}
		elseif (is_page(array())) {
			wp_enqueue_script('');
		}
	}
	add_action('wp_print_scripts', 'add_script');
}










/* 新着一覧ページャー
============================================= */
function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

     global $paged;//現在のページ値
     if(empty($paged)) $paged = 1;//デフォルトのページ

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;//全ページ数を取得
         if(!$pages)//全ページ数が空の場合は、１とする
         {
             $pages = 1;
         }
     }

     if(1 != $pages)//全ページが１でない場合はページネーションを表示する
     {
		 echo "<div class=\"pagenation\">\n";
		 echo "<ul>\n";
		 //Prev：現在のページ値が１より大きい場合は表示
         if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>前へ</a></li>\n";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                //三項演算子での条件分岐
                echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
             }
         }
		//Next：総ページ数より現在のページ値が小さい場合は表示
		if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">次へ</a></li>\n";
		echo "</ul>\n";
		echo "</div>\n";
     }
}





/* 前後リンクを生成（長いタイトルを丸める）
============================================= */

function WS_previous_post_link($maxlen = -1, $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {
WS_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, true, $maxlen);
}
function WS_next_post_link($maxlen = -1, $format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '') {
WS_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, false);
}

function WS_adjacent_post_link($maxlen = -1, $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '', $previous = true) {

if ( $previous && is_attachment() )
$post = & get_post($GLOBALS['post']->post_parent);
else
$post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);

if ( !$post )
return;

$tCnt = mb_strlen( $post->post_title, get_bloginfo('charset') );
if(($maxlen > 0)&&($tCnt > $maxlen)) {
$title = mb_substr( $post->post_title, 0, $maxlen, get_bloginfo('charset') ) . '…';
} else {
$title = $post->post_title;
}

if ( empty($post->post_title) )
$title = $previous ? __('Previous Post') : __('Next Post');

$title = apply_filters('the_title', $title, $post->ID);
$date = mysql2date(get_option('date_format'), $post->post_date);
$rel = $previous ? 'prev' : 'next';

$string = '<a href="'.get_permalink($post).'" rel="'.$rel.'">';
$link = str_replace('%title', $title, $link);
$link = str_replace('%date', $date, $link);
$link = $string . $link . '</a>';

$format = str_replace('%link', $link, $format);
echo $format;
}






// Googleアナリティクスの電話用イベントを発行する
function setGATelData($category = "電話リンク", $action = "", $label = "", $value = "")
{
	$ga = "ga('send', 'event', '{$category}'";
	if ($action) {
		$ga .= ", '{$action}'";
	}
	if ($label) {
		$ga .= ", '{$label}'";
	}
	if ($value) {
		$ga .= ", '{$value}'";
	}
	$ga .= ");";
	echo $ga;
}



?>
