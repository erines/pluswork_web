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