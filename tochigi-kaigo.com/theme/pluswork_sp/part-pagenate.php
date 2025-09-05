<?php
/**
 * ページ送り用表示パーツ
 */
global $paged, $wp_query;

$columns = null;
$range_columns = 2;
$max_columns = $range_columns * 2;

if (empty($paged)) {
	$paged = 1;
}

if (empty($pages)) {
	global $wp_query;

	$pages = $wp_query->max_num_pages;

	if (empty($pages)) {
		$pages = 1;
	}
}

if ($pages > 1) {
	$columns = array(
		"current" => $paged,
		"min"     => null,
		"max"     => null,
		"next"    => $paged < $pages ? $paged + 1 : null,
		"prev"    => $paged > 1 ? $paged - 1 : null ,
		"pages"   => array(),
	);

	$min = max(1, $paged - $range_columns);
	$max = min($pages, $min + $max_columns);
	$min = max(1, $max - $max_columns);

	for ($i = $min; $i <= $max; $i++) {
		$columns['pages'][] = $i;
	}

	if ($min > 1) {
		$columns['min'] = 1;
	}

	if ($max < $pages) {
		$columns['max'] = $pages;
	}
}

?>

<?php if ($columns) : ?>
<ul class="pager">
	<?php if ($columns['min']) : ?>
	<li class="first_page"><a href="<?php echo get_pagenum_link($columns['min']); ?>"><span>&lt;&lt;</span></a></li>
	<?php endif; ?>

	<?php if ($columns['prev']) : ?>
	<li class="prev_page"><a href="<?php echo get_pagenum_link($columns['prev']); ?>"><span>&lt; 前へ</span></a></li>
	<?php endif; ?>

	<?php if ($columns['next']) : ?>
	<li class="next_page"><a href="<?php echo get_pagenum_link($columns['next']); ?>"><span>次へ &gt;</span></a></li>
	<?php endif; ?>

	<?php if ($columns['max']) : ?>
	<li class="last_page"><a href="<?php echo get_pagenum_link($columns['max']); ?>"><span>&gt;&gt;</span></a></li>
	<?php endif; ?>
</ul>
<div class="clear"><hr/></div>
<?php endif; ?>