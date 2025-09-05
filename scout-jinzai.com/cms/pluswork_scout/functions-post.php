<?php

class MyPostManager {
	public $custom_post_types = array();
	
	function __construct() {
		
	}
	static function getInstance() {
		static $i = null;
		if ($i === null)
			$i = new self();
		return $i;
	}
	function register($post_type="", $post_name="") {
		return $this->register_post_type($post_type,$post_name);
	}
	function register_post_type($post_type="", $post_name="", $options=array()) {
		/*
			register_post_type("customer", 'お客様の声', array(
				"label" => array(
					// 上書きしたい項目
				),
				"options" => array(
					// 上書きしたい項目
				),
				"taxonomies" => array(
					'case_category' => "解決事例カテゴリ",
					
					"category", // 既存のものの場合
				) , // 宅そのみー
				"custom" => array(
					// register_custom 参照
				),
			));
		*/
		$taxonomies = array();
		if (!empty($options["taxonomies"])) {
			foreach((array)$options["taxonomies"] as $_key => $_value) {
				if (is_numeric($_key)) {
					$taxonomies[] = $_value;
				} else {
					$taxonomies[] = $_key;
					
					// この場合、たくそのみー登録
					$this->register_taxonomy($_key, $_value, $post_type);
				}
			}
		}
		
		$labels = array(
			'name' => $post_name,
			'singular_name' => $post_name,
			'menu_name' => $post_name,
			'add_new' => '新規追加',
			'add_new_item' => '新規'.$post_name.'追加',
			'edit' => '編集',
			'edit_item' => $post_name. 'を編集',
			'new_item' => '新規'.$post_name,
			'view' => '表示',
			'view_item' => $post_name.'を表示',
			'search_items' => $post_name.'を検索',
			'not_found' => '見つかりません。',
			'not_found_in_trash' => 'ゴミ箱にはありません。',
			'parent' => '親記事',
		);
		$post_options = array(
			'label' => $post_name,
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => $post_type, 'with_front' => true),
			'query_var' => true,
			'has_archive' => true,
			'supports' => array('title','editor'),
			'taxonomies' => array(),
			'labels' => $labels, 
		);
		register_post_type($post_type, $post_options); 
		$this->custom_post_types[] = $post_type;
		
		if (!empty($options["custom"])) {
			if (!isset($options["custom_option"]))
				$options["custom_option"] = array();
			$this->register_custom($post_type, $options["custom"], (array)$options["custom_option"]); 
		}
		return $this;
	}
	function register_taxonomy($slug="", $name="", $post_type=null) {
		/**
			register_taxonomy("case_category", "解決事例カテゴリ");
		*/
		$labels = array(
			'search_items' => $name,
			'popular_items' => $name,
			'all_items' => 'すべての'.$name,
			'parent_item' => '親'.$name,
			'parent_item_colon' => '親'.$name."：",
			'edit_item' => $name.'を編集',
			'update_item' => $name.'を更新',
			'add_new_item' => $name.'を新規追加',
			'new_item_name' => '新しい'.$name,
			// 'separate_items_with_commas' => '',
			'add_or_remove_items' => $name.'の追加、または削除',
			'choose_from_most_used' => 'もっとも使われている'.$name,
		);
		$options = array(
			'hierarchical' => true,
			'label' => '解決事例カテゴリ',
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => false,
			'labels' => $labels,
		);
		register_taxonomy( $slug,(array)$post_type, $options);
		return $this;
	}
	function register_custom($post_type_key, $fields=array(), $options=array()) {
		/*
		register_custom("customer", array(
			// フィールド情報
			"image01" => array(
				'label' => '画像（トップページ用）',
				// 'name' => 'image01',
				'type' => 'image',
				'desc' => 'トップページ用の画像です。226x120推奨',
				
				"size_key" => "customer_image01", // width/heightとどっちか必須
				"width" => 226,
				"height" => 120, 
			),
			"text01" => array(
				"label" => '説明文（トップページ用）',
				"desc" => "トップページに表示される説明文です。省略時は本文の記事から抜粋されます。",
				"type"=> "text", // text, textarea
				"palceholder" => "",
				"formatting" => "html", // html
			),
			
		), array(
			// オプション情報
		))
		

		*/
		static $i = 0;
		
		$post_type = get_post_type_object($post_type_key);
		$post_name = $post_type->labels->singular_name;
		$acf_options = array(
			"id" => "acf-".($i++),
			"title" => $post_name ,
			"fields" => array(), // fields,
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => $post_type_key,
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		);

		foreach($fields as $_key => $_data) {
			$_type = $_data["type"];	
			$_o = array();
			
			switch($_type) {
				case 'image' :
					//add_image_size('case_image01', 160, 150);
					if (empty($_data["size_key"])) {
						$size_key = $post_type_key . "_" . $_key;
						add_image_size($size_key, (int)$_data["width"], (int)$_data["height"]);
						
						$_data["size_key"] = $size_key;
					}
					
					$_o = array(
						'key' => 'field_'. substr(md5($post_name), 0,12).($i++), // 'field_56f75f22c41d7',
						'label' => (string)$_data["label"],
						'name' => $_key,
						'type' => 'image',
						'instructions' => (string)$_data["desc"],
						'save_format' => 'id',
						'preview_size' => $_data["size_key"],
						'library' => 'all',
					);
					$acf_options["fields"][] = $_o;
				break;
				case 'text' :
				case 'textarea' :
				default: 
					if ($_type !== "textarea")
						$_type = "text";
					$_o = array (
						'key' => 'field_'. substr(md5($post_name), 0,12).($i++), // 'field_56f75f22c41d7',
						'label' => (string)$_data["label"],
						'name' => $_key,
						'type' => $_type,
						'instructions' => (string)$_data["desc"],
						'default_value' => '',
						'placeholder' => (string)$_data["placeholder"],
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					);
					$acf_options["fields"][] = $_o;
				break;
			}
		}

		register_field_group($acf_options);
		return $this;
	}
}
?>