<?php
global $sc_user;

if (!cr_user_has_role(["recruiter"],$sc_user->ID)) {
	echo 'このページを閲覧する権限がありません。';
	return;
}
	

$page = 1;
if (!empty($_GET["start"]) && $_GET["start"] > 1)
	$page = $_GET["start"];

$limit = 12;
$offset = ($page - 1) * $limit;

//=== 検索条件
$query = $_GET;

$args = array(
	'role' => 'applicant',
	"order" => "ASC",
	"orderby" => "ID",
	
	"count_total" => true,
	"number" => $limit,
	"offset" => $offset,
	
	"meta_query" => array(
		"relation" => "AND",
		array(
			"key" => "sc_user_status",
			"value" => 1, 
			"compare" => "=",
		),
	),
);
//=== 業種、職種、雇用形態
foreach(array("industry" ,"job_category",/*,"employee_type"*/) as $_term_key) {
	if (!empty($query[$_term_key])) {
		$_meta = array(
			"relation" => "OR",
		);
		for ($i=1;$i<=3;$i++) {
			$_meta[] = array(
				"key" => "sc_experience".$i."_".$_term_key,
				"value" => (array)$query[$_term_key],
				"compare" => "IN",
			);
		}
		
		$args["meta_query"][] = $_meta;
	}
} 
//=== 資格
foreach(array("sc_shikaku") as $_key) {
	if (!empty($query[$_key])) {
		$args["meta_query"][] = array(
			"key" => "sc_shikaku",
			"value" => (array)$query[$_key],
			"compare" => "IN",
		);
	}
} 
//=== エリア
foreach(array("sc_residence") as $_key) {
	if (!empty($query[$_key])) {
		$_meta = array(
			"relation" => "OR",
		);
		foreach($query[$_key] as $_value) {
			if (empty($_value))
				continue;
			
			$_meta[] = array(
				"key" => $_key,
				"value" => $_value,
				"compare" => "LIKE",
			);
		}
		if (!empty($_meta[0]))
			$args["meta_query"][] = $_meta;

	}
} 
//=== 雇用形態（希望雇用形態）
foreach(array("employee_type") as $_key) {
	if (!empty($query[$_key])) {
		$args["meta_query"][] = array(
			"key" => "sc_kibou_employee_type",
			"value" => (array)$query[$_key],
			"compare" => "IN",
		);
	}
} 
//=== フリーワード
if (!empty($query["q"])) {
	$args["meta_query"][] = array(
			"key" => "_search_keywords",
			"value" => $query["q"],
			"compare" => "LIKE",
		);
}


$wp_user_query = new WP_User_Query($args);
$users = $wp_user_query->get_results();
//pr($users);

$total = $wp_user_query->get_total();

$prev = $next = null;
if ($page > 1) 
	$prev = add_query_arg(array_merge($query, array("start"=>$page-1)) , 
							 sc_get_page_link("page.applicant_search_result") );

if ($page * $limit < $total)
	$next = add_query_arg(array_merge($query, array("start"=>$page+1)) , 
							sc_get_page_link("page.applicant_search_result") );
	
$pager = null;
if ($total > $limit && $offset+1 <= $total) {
	$_start = $offset+1;
	$_end = min($total, $offset + $limit);
	
	$pager = sprintf('%d件中%d件', $total, $_start);
	//if ($_start < $_end)
	$pager .= sprintf('～%d件', $_end);
} else {
	$pager = sprintf('%d件', $total);
}

/*if (cr_is_development()) {
	pr($args);
	pr($wp_user_query->request);
} */
?>
<h2>検索結果 (<?php echo $pager; ?>)</h2>
<div class="user_list reset_list mb50">
	<ul data-children-same-height="h3|.search_data|.search_tags" class="cl">
<?php 
foreach($users as $user): 
	include dirname(__FILE__)."/user._item.php";
endforeach; ?>
	</ul>
<?php if (!empty($prev) || !empty($next)): ?>
	<div class="more">
		<?php if (!empty($prev)): ?>
			<a href="<?php echo h($prev); ?>">&lt;&lt; 前のページ</a>
		<?php endif; ?>
		<?php if (!empty($prev) && !empty($next)): ?>
			<span class="sep">|</span>
		<?php endif; ?>
		<?php if (!empty($next)): ?>
			<a href="<?php echo h($next); ?>">次のページ &gt;&gt;</a>
		<?php endif; ?>
	</div>
<?php endif; ?>
</div>


<h2>条件を指定して検索する</h2>
<?php get_template_part( 'modules/user.searchform' ); ?>
