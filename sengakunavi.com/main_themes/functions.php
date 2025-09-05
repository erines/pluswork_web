<?php

function enqueue_custom_scripts() {
    // Enqueue main.js script
    wp_enqueue_script('script', get_template_directory_uri().'/js/main.js', array(), '6.1', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function set_post_types_admin_order( $wp_query ) {
    if (is_admin() && isset($wp_query->query['post_type'])) {
        $post_type = $wp_query->query['post_type'];
        if ( $post_type == 'corp') {
            $wp_query->set('orderby', 'date');
            $wp_query->set('order', 'DESC');
        }
    }
}
add_filter('pre_get_posts', 'set_post_types_admin_order');


// 掲載企業投稿カスタム投稿追加
function cpt_register_corp() {
  $labels = [
	  "singular_name"=>"corp",
	  "edit_item"=>"corp",
  ];
  $args = [
	  "label" => "掲載企業",
	  "labels"=>$labels,
	  "description"=>"",
	  "public"=>true,
	  "show_in_rest"=>true,
	  "rest_base"=>"",
	  "rest_controller_class"=>"WP_REST_Posts_Controler",
	  "has_archive"=>true,
	  "dalete_with_user"=>false,
	  "excude_from_search"=>false,
	  "map_meta_cap"=>true,
	  "hierarchical"=>true,
	  "rewrite"=>["slug"=>"corp","with_front"=>true],
	  "query_var"=>true,
	  "menu_position"=>3,
	  "supports"=>["title","editor","thumbnail"],
  ];
  register_post_type("corp",$args);
	flush_rewrite_rules( false ); 
}
add_action('init','cpt_register_corp');






// カスタム投稿にカテゴリー追加
function cpt_register_dep() {
  $labels = [
	  "singular_name"=>"dep",
  ];
  $args = [
	  "label" => "カテゴリー",
	  "labels"=>$labels,
	  "publicy_queryable"=>true,
	  "public"=>true,
	  "hierarchical"=>true,
	  "show_in_menu"=>true,
	  "query_var"=>true,
	  "rewrite"=>["slug"=>"dep","with_front"=>true],
	  "show_admin_column"=>false,
	  "show_in_rest"=>true,
	  "rest_base"=>"dep",
	  "rest_controller_class"=>"WP_REST_Terms_Controller",
	  "show_in_quick_edit"=>false,
  ];
  register_taxonomy("dep",["corp"],$args);
}
add_action('init','cpt_register_dep');

// カスタム投稿に投稿者追加
add_action('admin_menu', 'myplugin_add_custom_box'); function myplugin_add_custom_box() { if (function_exists('add_meta_box')) { add_meta_box('myplugin_sectionid', __('作成者', 'myplugin_textdomain'), 'post_author_meta_box', 'corp', 'advanced'); } }


// 栃木採用勉強会カスタム投稿追加
function tochicreate_post_type() {
  register_post_type(
    'tochigi_studydate',
    array(
      'label' => '栃木採用勉強会日程',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_position' => 3,
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
      ),
    )
  );
  register_taxonomy(
    'tochigi_studydate-cat',
    'tochigi_studydate',
    array(
      'label' => 'カテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_in_rest' => true,
    )
  );
  register_taxonomy(
    'tochigi_studydate-tag',
    'tochigi_studydate',
    array(
      'label' => 'タグ',
      'hierarchical' => false,
      'public' => true,
      'show_in_rest' => true,
      'update_count_callback' => '_update_post_term_count',
    )
  );
}
add_action( 'init', 'tochicreate_post_type' );

// 茨城採用勉強会カスタム投稿追加
function ibacreate_post_type() {
  register_post_type(
    'ibaraki_studydate',
    array(
      'label' => '茨城採用勉強会日程',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_position' => 3,
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
      ),
    )
  );
  register_taxonomy(
    'ibaraki_studydate-cat',
    'ibaraki_studydate',
    array(
      'label' => 'カテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_in_rest' => true,
    )
  );
  register_taxonomy(
    'ibaraki_studydate-tag',
    'ibaraki_studydate',
    array(
      'label' => 'タグ',
      'hierarchical' => false,
      'public' => true,
      'show_in_rest' => true,
      'update_count_callback' => '_update_post_term_count',
    )
  );
}
add_action( 'init', 'ibacreate_post_type' );

// javascript読み込み
function script () {
  wp_enqueue_script('script', get_template_directory_uri().'/js/main.js',array(),'6.1.1',true);
}
add_action('wp_enqueue_scripts','script');

//サイト内検索
function custom_search($search, $wp_query) {
	global $wpdb;
if (!$wp_query->is_search)
return $search;
if (!isset($wp_query->query_vars))
return $search;
	// タグ名・カテゴリ名・カスタムフィールド も検索対象にする
	$search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
	if ( count($search_words) > 0 ) {
		$search = '';
 		array_unshift($search_words, $_GET['pref']);
		foreach ( $search_words as $word ) {
			if ( !empty($word) ) {
				$search_word = $wpdb->escape("%{$word}%");
				$search .= " AND (
						{$wpdb->posts}.post_title LIKE '{$search_word}'
						OR {$wpdb->posts}.post_content LIKE '{$search_word}'
						OR {$wpdb->posts}.ID IN (
							SELECT distinct r.object_id
							FROM {$wpdb->term_relationships} AS r
							INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
							INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
							WHERE t.name LIKE '{$search_word}'
						OR t.slug LIKE '{$search_word}'
						OR tt.description LIKE '{$search_word}'
						)
						OR {$wpdb->posts}.ID IN (
							SELECT distinct p.post_id
							FROM {$wpdb->postmeta} AS p
							WHERE p.meta_value LIKE '{$search_word}'
						)
				) ";
			}
		}
	} 
	return $search;
}
add_filter('posts_search','custom_search', 10, 2);

//検索全角スペース対応
function empty_search( $query ) {
	if ( $query->is_main_query() && $query->is_search && ! $query->is_admin ) {
	$s = $query->get( 's' );
	$s = str_replace('　',' ', $s );
	$query->set( 's', $s );
	}
}
add_action( 'pre_get_posts', 'empty_search' );
function my_do_shortcode_tag_tel( $output, $tag, $attr, $m ) {
	if ( $tag == 'mwform_text' && $attr['name'] == 'phone_number' ) {
	$output = rtrim( substr( $output , 0 , -3 ) ) . ' inputmode=”tel” />' . “\n”;
	}
	return $output;
	}
add_filter( 'do_shortcode_tag', 'my_do_shortcode_tag_tel', 10, 4 );

// 栃木採用勉強会日程 投稿ページ
function tochi_add_event_list( $children, $atts ) {
	if ('tochigi_date' == $atts['name']){
			$events = get_posts( array(
				'post_type' => 'tochigi_studydate',
				'posts_per_page' => -1,
			));
			foreach ( $events as $tochigi_date ) {
				$children[$tochigi_date->post_title] = $tochigi_date->post_title;
			}
	}
	return $children;
}
add_filter( 'mwform_choices_mw-wp-form-461', 'tochi_add_event_list', 10, 2 );
// 茨城採用勉強会日程 投稿ページ
function iba_add_event_list( $children, $atts ) {
	if ('ibaraki_date' == $atts['name']){
			$events = get_posts( array(
				'post_type' => 'ibaraki_studydate',
				'posts_per_page' => -1,
			));
			foreach ( $events as $ibaraki_date ) {
				$children[$ibaraki_date->post_title] = $ibaraki_date->post_title;
			}
	}
	return $children;
}
add_filter( 'mwform_choices_mw-wp-form-530', 'iba_add_event_list', 10, 2 );
// メール送信設定
function admin_mail( $Mail, $values, $Data ) {
    $data = $Data->gets();
// 管理者宛てメール1
    if (isset($data['form_mail_1']) && !empty($data['form_mail_1'])) {
  		$Mail->to = $data['form_mail_1'];
   		$Mail->send();
		}else{
		$Mail->to = 'sengakunavi@pluswork.jp';
		}
			$Mail->to = 'sengakunavi@pluswork.jp';
				add_filter( 'mwform_is_mail_sended', function(){
		return true;
				});
				return $Mail;
}
add_filter( 'mwform_admin_mail_mw-wp-form-538', 'admin_mail', 10, 3 );
// 日本語の必須項目バリデーションルール
if ( class_exists( 'MW_WP_Form_Abstract_Validation_Rule' ) ) {
	class MW_WP_Form_Validation_Rule_Japanese extends MW_WP_Form_Abstract_Validation_Rule {
		protected $name = 'japanese';

		public function rule( $key, array $options = array() ) {
			$value = $this->Data->get( $key );
			if ( is_null( $value ) ) {
				return;
			}
			if ( preg_match( '/[一-龠]+|[ぁ-ん]+|[ァ-ヴー]/u', $value ) ) {
				return;
			}
			$defaults = array(
				'message' => '日本語で入力してください。'
			);
			$options = array_merge( $defaults, $options );
			return $options['message'];
		}

		public function admin( $key, $value ) {
			?>
			<label><input type="checkbox" <?php checked( $value[ $this->get_name() ], 1 ); ?> name="<?php echo MWF_Config::NAME; ?>[validation][<?php echo $key; ?>][<?php echo esc_attr( $this->get_name() ); ?>]" value="1" />日本語を含む</label>
			<?php
		}
	}

	function mwform_validation_rule_japanese( $validation_rules ) {
		$instance = new MW_WP_Form_Validation_Rule_Japanese();
		$validation_rules[$instance->get_name()] = $instance;
		return $validation_rules;
	}

	add_filter( 'mwform_validation_rules', 'mwform_validation_rule_japanese' );
}
?>