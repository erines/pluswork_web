<?php
global $sc_user;
if (empty($sc_user))
	return;

$page = 1;
if (!empty($_GET["start"]) && $_GET["start"] > 1)
	$page = $_GET["start"];

$limit = sc_is_page("page.mypage") ? 3 : 12;
$offset = ($page - 1) * $limit;

$args = array(
	"post_type" => "user_mail_thread",
	'posts_per_page' => $limit,
	"paged" => $page, 
	
	"post_status" => "publish",
	"author" => $sc_user->ID, 
	
	"order" => "ASC",
	"orderby" => "meta_value",
	
	"meta_key" => "last_mail_dt",
);
$_wp_query = new WP_Query($args);
$total = $_wp_query->found_posts;

$prev = $next = null;
if ($page > 1) 
	$prev = add_query_arg(array("start"=>$page-1) , sc_get_page_link("page.mail_box_list") );

if ($page * $limit < $total)
	$next = add_query_arg(array("start"=>$page+1) , sc_get_page_link("page.mail_box_list") );
	
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


?>
<?php if (!sc_is_page("page.mypage")): ?>
	<h2>アプローチ済み候補者一覧 (<?php echo $pager; ?>)</h2>
<?php endif; ?>

<div class="user_list reset_list mb50">
	<ul data-children-same-height="h3|.search_data|.search_tags" class="cl">
<?php 
while($_wp_query->have_posts()):
	$_wp_query->the_post();
	
	$target_user_id = get_post_meta( get_the_ID(), "target_user_id", true);
	$user = cr_user_get($target_user_id);
	
	$last_approach_dt = get_the_time("Y年n月j日");
	include dirname(__FILE__)."/user._item.php";
endwhile; 
?>
	</ul>
<?php if (sc_is_page("page.mypage")): ?>
	<div class="more">
		<a href="<?php echo sc_get_page_link("page.mail_box_list") ; ?>">&gt;&gt; アプローチ済み候補者をもっと見る</a>
	</div>
<?php else: ?>
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
<?php endif; ?>
</div>


