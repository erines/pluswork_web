<?php
$Job = CR_Job();
if (is_post_type_archive()) {
	global $wp_query;
	$Job->query = $wp_query;
} else  {
	$Job->query();
}
if (! $Job->have_posts()):
	echo '<div class="posts"><p>該当する求人はありませんでした。</p></div>';
	return;
endif;
$Job->fetch();
?>
		<div class="joblist">
			<div class="title">
				<h2>現在募集中の求人一覧</h2>
				<div class="modified">更新日：<?php echo $Job->modified('Y年n月j日'); ?></div>
			</div>
			<div class="list">
				<ul><?php
					do {
						include dirname(__FILE__)."/_joblist_item.php";
					} while($Job->fetch());
				?></ul>
			</div>
			<?php if (is_front_page()): ?>
			<div class="more">
				<a href="<?php echo get_post_type_archive_link("job"); ?>">もっと見る</a>
			</div>
			<?php else: ?>
			<?php
				$Job->pagination();
			?>
			<?php endif; ?>
		</div>