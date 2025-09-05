<?php
/**
 * 求人関連のパンクズ？表示用パーツ
 */
global $wp_query, $paged;

$baseurl = get_post_type_archive_link("item");

$labels = array(
);

$locs   = $wp_query->get("locs");
if (!empty($locs)) {
	$locs  = (array) $locs;
	$label = $locs[0];

	if (count($locs) > 1) {
		$label .= sprintf("(他%s件)", count($locs));
	}

	$baseurl = add_query_arg("locs", $locs, $baseurl);

	$labels['locs'] = array("エリア", $label, $baseurl);
}

$gens   = $wp_query->get("genid");
if (!empty($gens)) {
	$gens = (array) $gens;
	$term = get_term((int) $gens[0], "genre");
	$label = $term->name;

	if (count($gens) > 1) {
		$label .= sprintf("(他%s件)", count($gens));
	}

	$baseurl = add_query_arg("genid", $gens, $baseurl);

	$labels['genid'] = array("職種", $label, $baseurl);
}

$faci   = $wp_query->get("faci");
if (!empty($faci)) {
	$faci  = (array) $faci;
	$label = $faci[0];

	if (count($faci) > 1) {
		$label .= sprintf("(他%s件)", count($faci));
	}

	$baseurl = add_query_arg("faci", $faci, $baseurl);

	$labels['faci'] = array("施設形態", $label, $baseurl);
}

$search = $wp_query->get("s");
if (!empty($search)) {
	$label = sprintf("&ldquo;%s&bdquo;", esc_html($search));
	$baseurl = add_query_arg("s", $search, $baseurl);

	$labels['search'] = array("キーワード", $label, $baseurl);
}

?>

<?php if (is_single()) : ?>
<div id="topicpath" class="<?php if (is_archive()) : ?>searchresult<?php endif;?>">
	<ul>
		<li class="home"><a href="<?php echo site_url(); ?>">HOME</a></li>
		<?php foreach ($labels as $label) : ?>
		<li>
			<!--<?php echo esc_html($label[0]); ?>:-->
			<a href="<?php echo esc_attr($label[2]); ?>"><?php echo $label[1];?></a>
		</li>
		<?php endforeach; ?>
		<li><?php the_title(); ?></li>
	</ul>
</div>
<?php else: ?>
<?php
	$total = $wp_query->found_posts;
	$index = (max(1, $paged) - 1) * $wp_query->get("posts_per_page") + 1;
	$offset = $wp_query->post_count - 1;
?>
<div class="searchresult">
	<?php if (count($labels)) : ?>
	<?php foreach ($labels as $label) : ?>
	<strong><?php echo esc_html($label[1]); ?></strong>
	<?php endforeach; ?>
	の
	<?php endif; ?>
	求人結果

	<?php if ($total > 0) : ?>
	(<?php echo number_format_i18n($total); ?>件中<?php echo number_format_i18n($index); ?><?php if ($offset > 0) : ?>～<?php echo number_format_i18n($index + $offset); ?>件<?php endif; ?>表示)
	<?php endif; ?>
</div>
<?php endif; ?>
