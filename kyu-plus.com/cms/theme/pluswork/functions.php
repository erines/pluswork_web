<?php
add_theme_support('menus');
//add_theme_support( 'post-thumbnails' );

$flg = false;
if(is_admin() && isset( $_GET['post'] )){
	if ($_GET['post'] == get_option( 'page_on_front' )) {
		if ( locate_template( array( 'editor-style-front.css' ) ) ) {
			add_editor_style('editor-style-front.css');
			$flg = true;
		} 
	} else {
		$_post = get_post($_GET["post"]);
		if (!empty($_post->post_type) && $_post->post_type == "job") {
			if ( locate_template( array( 'editor-style-job.css' ) ) ) {
				add_editor_style('editor-style-job.css');
				$flg = true;
			} 
		}
	}
}
if ($flg === false) {
	add_editor_style();
} 
/*
    register_sidebar(array(
		'name' => 'サイドエリア',
        'id' => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        //'before_title' => '<h3 class="widget-title">',
        //'after_title' => '</h3>',
    )); */
/*	register_sidebar(array(
		'name' => 'バナー１',
        'id' => 'banner-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        //'before_title' => '<h3 class="widget-title">',
        //'after_title' => '</h3>',
    ));  */
/*    register_sidebar(array(
		'name' => 'メインビジュアル テキスト',
        'id' => 'main_image-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        //'before_title' => '<h3 class="widget-title">',
        //'after_title' => '</h3>',
    )); */
    // ContentArea 1, located at the contentr.
/*    register_sidebar( array(
        'name' =>  'コンテンツエリア 上',
        'id' => 'content-1',
        'before_widget' => '<li id="%1$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) ); */
/*
    register_sidebar( array(
        'name' =>  'バナー１',
        'id' => 'banner-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) ); */
//register_nav_menus( array( 'gnavi' => 'ヘッダーメニュー', ) );
//register_nav_menus( array( 'SideMenu' => 'サイドコンテンツメニュー', ) );
//register_nav_menus( array( 'footer-1' => 'フッターサイトマップ１', ) );
//register_nav_menus( array( 'footer-2' => 'フッターサイトマップ２', ) );
//register_nav_menus( array( 'footer-3' => 'フッターサイトマップ３', ) );
//register_nav_menus( array( 'footer-4' => 'フッターサイトマップ４', ) );
//register_nav_menus( array( 'footer-5' => 'フッターサイトマップ５', ) );

/*
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );
*/
function my_widget_title($title){
  return '';
}
add_filter('widget_title', 'my_widget_title'); 



function my_include_php($atts) {
	$attrs = shortcode_atts($atts);
	$file = $attrs["file"];
	
	if (!empty($file) && preg_match('/^[0-9a-zA-Z\-\_]+$/', $file)) {
		$file = dirname(__FILE__)."/include-".$file.".php";
		if (is_file($file)) {
			ob_start();
			include $file;
			$s = ob_get_contents();
			ob_end_clean();
			
			return $s;
		}
	}
	return "";
}
add_shortcode('my_include_php', 'my_include_php');

class My_Query {
	public $query = null;
	
	static function getInstance() {
		static $i = null;
		if ($i === null)
			$i = new self();
		return $i;
	}
	function query_page($id) {
		$this->query = new WP_Query(array(
			"page_id" => $id, 
			'posts_per_page' => 1,
			'orderby' => 'date', 
			'order' => 'DESC',
		));
		return $this;
	}
	function query_post($num=10, $post_type="post") {
		$this->query = new WP_Query(array(
			'post_type' => $post_type,
			'posts_per_page' => $num,
			'orderby' => 'date', 
			'order' => 'DESC',
		));
		return $this;
	}

	function have_posts() {
		if ($ret = $this->query->have_posts()) {
			return $ret;
		}
		$this->reset();
		return;
	}
	function the_post() {
		$this->query->the_post();
	}
	function reset() {
		wp_reset_postdata();
	}
	
	function has_tag($tag_name) {
		$tags = get_the_tags();
		foreach($tags as $tag) {
			if ((string)$tag->name === (string)$tag_name) 
				return true;
		}
		return false;
	}

	function get_the_category_name($options=array(), $term_key="") {
		$list = $this->get_the_category_array($options, $term_key);
		return reset($list);
	}
	function get_the_category_array($options=array(), $term_key="") {
		if (empty($term_key)) {
			$categories = get_the_category();
		} else {
			$categories = get_the_terms(get_the_ID(), $term_key);
		}
		$list = array();
		foreach((array)$categories as $cat) {
			if (!empty($options["exclude"])) {
				if (in_array($cat->name, (array)$options["exclude"]))	
					continue;
			}
			if (!empty($cat->name)) {
				$list[] = $cat->name;
			}
		}
		return $list;
	}
}

function the_custom_image($key="image",$size="full") {
	echo get_the_custom_image($key, $size);
}
function get_the_custom_image($key="image",$size="full") {//customer01
	$id = get_field($key);
	if (empty($id))
		return;
	$image = wp_get_attachment_image_src( $id, $size );
	
	$attachment = get_post($id);
	$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
	
	return sprintf('<img src="%s" width="%d" height="%d" alt="%s" />', 
					htmlspecialchars($image[0], ENT_QUOTES), 
					$image[1],
					$image[2],
					htmlspecialchars($alt, ENT_QUOTES));
}

function my_h1() {
	global $post;
	
	if (is_singular() && get_post_meta($post->ID, "h1", true)) 
		echo get_post_meta($post->ID, "h1", true);
	else if (is_front_page())
		echo get_bloginfo("name");
	else if (is_singular()) 
		the_title();
	else
		wp_title('', true, 'right');
}

//ページIDでリンクを貼るショートコード
function permalink_handler( $atts ) {
    extract( shortcode_atts( array(
        'id'     => '',
    ), $atts ) );
 $link = get_permalink($id);
return $link ;
}
add_shortcode('permalink', 'permalink_handler');


//カテゴリIDでリンクを貼るショートコード
function shortcode_category_url($atts) {
	extract(shortcode_atts(array(
		'id' => 0,
	), $atts));
	return $id ? get_category_link($id) : '';
}
add_shortcode('category_url', 'shortcode_category_url');



//HOMEのURLショートコード
function my_home_url( $atts ) {
    return home_url();
}
add_shortcode( 'my_home_url', 'my_home_url' );

//ウィジェットショートコード
function my_widget( $atts ) {
	extract(shortcode_atts(array(
		'id' => 0,
	), $atts));
	
	ob_start();
	dynamic_sidebar($id);
	$s = ob_get_contents();
	ob_end_clean();
	
	return $s;

}
add_shortcode( 'my_widget', 'my_widget' );

// ウィジェットでショートコード
//add_filter('widget_text', 'do_shortcode' );

//=== アコーディオンメニュー
if (0):
wp_enqueue_script( 'jqueryhoverintent', get_stylesheet_directory_uri() . '/js/jquery.hoverIntent.minified.js', array('jquery') );
wp_enqueue_script( 'jquerycookie', get_stylesheet_directory_uri() . '/js/jquery.cookie.js', array('jquery') );
wp_enqueue_script( 'dcjqaccordion', get_stylesheet_directory_uri() . '/js/jquery.dcjqaccordion.2.9.js', array('jquery') );

function accordion_menu($atts) {
	$atts = shortcode_atts( array(
        'menu'     => '',
    ), $atts );
	
	static $uuid = 0;
	$id = "amenu-".(++$uuid);
	
	ob_start();
	?>
			<div class="dcjq-accordion" id="<?php echo $id; ?>">
			<?php
				wp_nav_menu( 
					array( 
						'fallback_cb' => '', 
						'menu' => $atts["menu"],
						'menu_class' => "menu",
						'echo' => true
						) 
					);
			?>
			</div>
			<script type="text/javascript">
				jQuery(function($) {
					jQuery('#<?php echo $id; ?> .menu').dcAccordion({
						eventType: 'click',
						hoverDelay: 0,
						menuClose: false,
						autoClose: true,
						saveState: false,
						autoExpand: false,
						classExpand: 'current-menu-item',
						classDisable: '',
						showCount: true,
						disableLink: true,
						cookie: 'dcjqa_<?php echo $id; ?>',
						speed: 'slow'
					});
				});
			</script>	
	<?php
	
	$s = ob_get_contents();
	ob_end_clean();
	
	return $s;
}

add_shortcode( 'accordion_menu', 'accordion_menu' );
endif;
	
//=== H1 === 
if (0) :
$_post_types = MyPostManager::getInstance()->custom_post_types;
$_post_types[] = "post";
$_post_types[] = "page";
$_post_types = array_unique($_post_types);

$_location = array();
foreach($_post_types as $_post_type) {
	$_location[] = array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => $_post_type,
				'order_no' => 0,
				'group_no' => 0,
			),
		);
}
register_field_group(array (
	'id' => 'acf-448',
	'title' => 'h1設定',
	'fields' => array (
		array (
			'key' => 'field_56fd1c60c5650',
			'label' => 'h1設定',
			'name' => 'h1',
			'type' => 'text',
			'instructions' => 'h1の文言を設定できます。省略時にはページタイトルが表示されます。',
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
		),
	),
	'location' => $_location,
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 0,
));
endif; // if (0) :

//=== ログインロゴ 
if (is_file(dirname(__FILE__)."/images/loginlogo.png")) :
function my_login_logo() { ?>
	<style>
		.login #login h1 a {
			width: 310px;
			height: 70px;
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/loginlogo.png) no-repeat 0 0;
		}
	</style>
	<script>
		setTimeout(function() {
			jQuery(function($) {
				$('.login #login h1 a').attr("href","javascript: void(0);");
			});
		},0);
	</script>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
endif;


function remove_menus () {
/*
    remove_menu_page( 'index.php' );                  // ダッシュボード
    remove_menu_page( 'edit.php' );                   // 投稿
    remove_menu_page( 'upload.php' );                 // メディア
    remove_menu_page( 'edit.php?post_type=page' );    // 固定ページ
    remove_menu_page( 'edit-comments.php' );          // コメント
    remove_menu_page( 'themes.php' );                 // 外観
    remove_menu_page( 'plugins.php' );                // プラグイン
    remove_menu_page( 'users.php' );                  // ユーザー
    remove_menu_page( 'tools.php' );                  // ツール
    remove_menu_page( 'options-general.php' );        // 設定

    remove_menu_page( 'index.php' );                  // ダッシュボード
    remove_menu_page( 'edit.php' );                   // 投稿
    remove_menu_page( 'edit.php?post_type=page' );    // 固定ページ
    remove_menu_page( 'edit-comments.php' );          // コメント
    remove_menu_page( 'themes.php' );                 // 外観
    remove_menu_page( 'plugins.php' );                // プラグイン
    remove_menu_page( 'users.php' );                  // ユーザー
    remove_menu_page( 'tools.php' );                  // ツール
    remove_menu_page( 'options-general.php' );        // 設定
    remove_menu_page( 'admin.php?page=cptui_manage_post_types' );        // CPT UI


remove_menu_page('edit.php?post_type=acf');
*/

}
add_action('admin_init', 'remove_menus', 11);
//add_action('admin_menu', 'remove_menus', 11);

	
add_filter( 'auto_core_update_send_email', '__return_false' );
?>