<?php 
if (is_category()) 
	echo single_cat_title('', false);
elseif( is_tag() )
	echo single_tag_title('', false);
elseif (is_day())
	get_the_time('Y年n月j日');
elseif (is_month())
	get_the_time('Y年n月');
elseif (is_year())
	get_the_time('Y年');
elseif (is_post_type_archive())
	post_type_archive_title();
elseif (is_tax())
	echo single_term_title("", false);
elseif (is_404())
	echo '記事が見つかりませんでした。';
elseif (is_search())
	echo '「',get_search_query(), '」の検索結果';
elseif (is_singular())
	the_title();
else {
	$s = "";
	if ($p = get_option("page_for_posts")) {
		$s = get_the_title($p);
	}
	if (empty($s))	
		$s = "新着情報";
	echo $s;
}
?>