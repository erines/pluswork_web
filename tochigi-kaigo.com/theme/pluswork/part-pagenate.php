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
<ul class="pageNav02">
	<?php if ($columns['min']) : ?>
	<li><a href="<?php echo get_pagenum_link($columns['min']); ?>">&laquo;</a></li>
	<?php endif; ?>

	<?php if ($columns['prev']) : ?>
	<li><a href="<?php echo get_pagenum_link($columns['prev']); ?>">&lt;</a></li>
	<?php endif; ?>

	<?php foreach ((array) $columns['pages'] as $page) : ?>
	<?php if ($page == $columns['current']) : ?>
	<li><span><?php echo esc_html($page); ?></span></li>
	<?php else: ?>
	<li><a href="<?php echo get_pagenum_link($page); ?>"><?php echo esc_html($page); ?></a></li>
	<?php endif; ?>
	<?php endforeach; ?>

	<?php if ($columns['next']) : ?>
	<li><a href="<?php echo get_pagenum_link($columns['next']); ?>">&gt;</a></li>
	<?php endif; ?>

	<?php if ($columns['max']) : ?>
	<li><a href="<?php echo get_pagenum_link($columns['max']); ?>">&raquo;</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>