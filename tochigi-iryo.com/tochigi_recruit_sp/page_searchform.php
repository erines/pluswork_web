<?php
 /*
Template Name: 検索フォームページ
*/
// area
$_areas = get_terms("job_area", array(
	"orderby" => "id",
	"order" => "ASC",
	"hide_empty" => false,
));
$_arealist = array();
foreach($_areas as $_area) {
	if (empty($_area->parent)) {
		if (empty($_arealist[$_area->term_id])) {
			$_arealist[$_area->term_id] = array(
				"id" => null,
				"name" => null,
				"list" => array(),
			);
		}
		$_arealist[$_area->term_id]["id"] = $_area->term_id;
		$_arealist[$_area->term_id]["name"] = $_area->name;
	} else {
		if (empty($_arealist[$_area->parent])) {
			$_arealist[$_area->parent] = array(
				"id" => null,
				"name" => null,
				"list" => array(),
			);
		}
		$_arealist[$_area->parent]["list"][] = array("id"=>$_area->term_id, "name"=>$_area->name);
	}
}
// shokushu

$shokushu_list = get_terms("job_facility", array(
	"orderby" => "id",
	"order" => "ASC",
	"hide_empty" => false,
));
?><?php get_header(); ?>
	<div id="main">
		<!--
		<div class="posts">
			<div class="breadcrumb"><?php
			//	if(function_exists('bcn_display'))
			//		bcn_display();
			?></div>
		</div>
		-->
		<div class="search_menu">
<?php

$area_parent = null;
$area_list = array();
foreach($_arealist as $_data) {
	if ($_GET["area"] == $_data["id"]) {
		$area_parent = $_data["id"];
		$area_list = $_data["list"];
	}
}
if (empty($area_list)) {
	foreach($_arealist as $_data) {
		$area_list[] = $_data;
	}
}

$area_url = (!empty($area_parent) ? 
				get_post_type_archive_link("job") : 
				get_page_link(31));
$page_title = (!empty($area_parent["name"]) ? 
				$area_parent["name"] . "から探す" : 
				'エリアから探す');
?>
			<h2><?php echo htmlspecialchars($page_title); ?></h2>
			<div class="list"><ul>
<?php
foreach($area_list as $_area_data):
	printf('<li><a href="%s?area=%s">%s</a></li>',
				htmlspecialchars($area_url, ENT_QUOTES) ,
				htmlspecialchars(urlencode($_area_data["id"]), ENT_QUOTES) ,
				htmlspecialchars($_area_data["name"], ENT_QUOTES) );
endforeach;
?>
			</ul></div>
<?php 
//else:
//endif;
if (empty($area_parent)):
?>
			<form action="<?php echo get_post_type_archive_link("job"); ?>">
				<h2 id="type_detail">職種から探す</h2>
				<div class="list">
					<ul>
<?php
$type_details = array(
	"大型トラックドライバー",
	"中型トラックドライバー",
	"小型トラックドライバー",
	"トレーラー(牽引)ドライバー",
	"軽貨物配送ドライバー",
	"宅配ドライバー",
	"タクシー・ハイヤー",
	"バス乗務員",
	"長距離ドライバー",
	"中距離ドライバー",
	"ルート配送",
	"運転代行",
	"バイク便・出前スタッフ",
	"ドライバーアシスタント",
	"フォークリフトオペレーター",
	"介護ドライバー",
	"ドクターカードライバー",
	"誘導ドライバー",
	"検診車ドライバー",
	"交通誘導員",
	"その他",
);
foreach($shokushu_list as $_shokushu) : 
	printf('<li><label><input type="checkbox" name="shokushu[]" value="%s" /><span class="text">%s</span></labal></li>',
				htmlspecialchars($_shokushu->term_id, ENT_QUOTES) ,
				htmlspecialchars($_shokushu->name, ENT_QUOTES) );
				/*
	printf('<li><a href="%s?type_detail[]=%s" />%s</a></li>',
				get_post_type_archive_link("job") ,
				htmlspecialchars($_type_detail, ENT_QUOTES) ,
				htmlspecialchars($_type_detail, ENT_QUOTES) );
				*/
endforeach;
?>
					</ul>
				</div>
				<h2 id="type">雇用形態から探す</h2>
				<div class="list">
					<ul>
<li><label><span class="text"><input type="checkbox" name="type[]" value="2" />正社員</span></label></li>
<li><label><span class="text"><input type="checkbox" name="type[]" value="3,4" />アルバイト・パート</span></label></li>
<li><label><span class="text"><input type="checkbox" name="type[]" value="5" />契約社員</span></label></li>
<!--
<li><a href="<?php echo get_post_type_archive_link("job") ; ?>?type[]=2">正社員</a></li>
<li><a href="<?php echo get_post_type_archive_link("job") ; ?>?type[]=3,4">アルバイト・パート</a></li>
<li><a href="<?php echo get_post_type_archive_link("job") ; ?>?type[]=5">契約社員</a></li>
-->
					</ul>
				</div>
				<div class="submit">
					<a href="javascript: void(0);">検索する</a>
				</div>
			</form>
<?php
//endif;
endif;
?>
		</div>
	</div>


<?php get_footer(); ?>


