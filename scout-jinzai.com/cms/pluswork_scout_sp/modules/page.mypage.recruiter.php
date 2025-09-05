<?php
global $sc_user;

if (!cr_user_has_role(["recruiter"],$sc_user->ID)) {
	echo 'このページを閲覧する権限がありません。';
	return;
}
	
?>

<h2>候補者検索</h2>
<?php get_template_part( 'modules/user.searchform' ); ?>

<h2>アプローチ済み候補者一覧</h2>
<?php get_template_part( 'modules/user.mail_users' ); ?>


<?php
//=== page.mail_template_list.php とほぼ同じ
?>
<?php
global $sc_user;
if (empty($sc_user)) 
	return;

$query = new WP_Query(array(
	"post_type" => "mail_template",
	'orderby' => 'date', 
	'order' => 'DESC',
	
	'posts_per_page' => 3,
	"author" => $sc_user->ID, 
));
//echo $query->request;

?><h2>スカウトメールテンプレート一覧</h2>
<?php if ($query->have_posts()): ?>
<div class="mail_list mail_template_list reset_list mb50">
	<div class="box"><ul>
<?php 
while($query->have_posts()): 
	$query->the_post();
	
	//$subject = cr_strip(get_post_meta( get_the_ID(), "subject", true), 20);
	$title = get_the_title(); 
	
	$subject = get_post_meta( get_the_ID(), "subject", true);
	$body = get_post_meta( get_the_ID(), "body", true);
	$excerpt = cr_strip($subject." " .$body, 35);
?>
		<li><a href="<?php 
			echo add_query_arg(array("mail_template_id" => get_the_ID()) , 
								sc_get_page_link("page.mail_template_detail"));
		?>">
			<div class="mail_info">
				<div class="date">作成日時:<?php the_time("Y年n月j日"); ?></div>
				<div class="subject"><?php echo h($title); ?>&nbsp;</div>
				<div class="excerpt"><?php echo h($excerpt); ?>&nbsp;</div>
			</div>
		</a></li>
<?php
endwhile;
?>
	</ul></div>
	<div class="more">
		<a href="<?php echo sc_get_page_link("page.mail_template_list"); ?>">&gt;&gt; スカウトメールテンプレート一覧をもっと見る</a>
	</div>
</div>
<?php else: ?>
<div class="mail_list mail_template_list reset_list mb50">
	<div class="more">
		<a href="<?php echo sc_get_page_link("page.mail_template_detail"); ?>">&gt;&gt; スカウトメールテンプレートを追加する</a>
	</div>
</div>
<?php endif; ?>
