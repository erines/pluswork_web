<?php //親に属する子ページのリンクとタイトルをリストで取得
/*if($post->post_parent)
	$children = wp_list_pages("sort_column=menu_order&title_li=&child_of=".$post->post_parent."&echo=0");
else
	$children = wp_list_pages("sort_column=menu_order&title_li=&child_of=".$post->ID."&echo=0");
*/
$children = wp_list_pages("sort_column=menu_order&title_li=&child_of=".$post->ID."&echo=0&depth=1");
if ($children) :
?>
<div class="side_menu">
<ul class="menu"><?php //リストを表示
	echo $children;
?></ul>
</div>
<?php endif; ?>

