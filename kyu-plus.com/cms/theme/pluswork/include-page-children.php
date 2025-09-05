<?php //親に属する子ページのリンクとタイトルをリストで取得
if($post->post_parent)
	$children = wp_list_pages("sort_column=menu_order&title_li=&child_of=".$post->post_parent."&echo=0");
else
	$children = wp_list_pages("sort_column=menu_order&title_li=&child_of=".$post->ID."&echo=0");

if ($children) :
?>
<hr size="3" color="#2D57D3" class="mt40" />
<div class="baselist">
<ul><?php //リストを表示
	echo $children;
?></ul>
</div>
<?php endif; ?>

