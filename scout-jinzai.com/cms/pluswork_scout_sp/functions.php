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
/* register_nav_menus( array( 'footer-1' => 'フッターサイトマップ１', ) );
register_nav_menus( array( 'footer-2' => 'フッターサイトマップ２', ) );
register_nav_menus( array( 'footer-3' => 'フッターサイトマップ３', ) );
register_nav_menus( array( 'footer-4' => 'フッターサイトマップ４', ) ); */
//register_nav_menus( array( 'footer-5' => 'フッターサイトマップ５', ) );


function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

function my_widget_title($title){
  return '';
}
add_filter('widget_title', 'my_widget_title'); 



function my_include_php($atts) {
	$attrs = shortcode_atts($atts);
	$file = $attrs["file"];
	
	if (!empty($file) && preg_match('/^[0-9a-zA-Z\-\_]+$/', $file)) {
		$file = get_stylesheet_directory()."/include-".$file.".php";
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


/*
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
	function query_post($num=10, $post_type="post", $cat=null) {
		$o = array(
			'post_type' => $post_type,
			'posts_per_page' => $num,
			'orderby' => 'date', 
			'order' => 'DESC',
		);
		if (!empty($cat)) 
			$o["cat"] = $cat;
		
		$this->query = new WP_Query($o);
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
			
			$list[] = $cat->name;
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
} */


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
add_filter('widget_text', 'do_shortcode' );

//　リビジョン機能の停止
function disable_autosave() {
	wp_deregister_script('autosave');
}
add_action( 'wp_print_scripts', 'disable_autosave' );

// セルフピングバック停止
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );



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

?>