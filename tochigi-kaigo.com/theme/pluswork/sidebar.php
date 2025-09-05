<?php
/**
 * Sidebar template containing the primary and secondary widget areas
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		<div id="primary" class="widget-area" role="complementary">
        
        
        
<!-- SIDE -->
<div id="side">

<div class="side-bnr">
	<a href="http://www.pluswork.jp/contents/jobcollege/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/school-bnr.jpg" alt="資格取得案内" class="alpha" /></a>
</div>

<div class="info">
<div><strong><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/s_info_ttl.jpg" alt="お役立ち情報" /></strong></div>

<div class="info_box">
	<ul>
<?php $args = array(
        'numberposts' => 3,                //表示（取得）する記事の数
        'post_type' => 'info'    //投稿タイプの指定
    );
    $customPosts = get_posts($args);
    if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>
    
    
    	<li>
        	<a href="<?php the_permalink(); ?>">
        	<p><?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail(array(48, 48, true), array('class' => 'alpha', "alt" => get_the_title() . " イメージ")); ?>
			<?php else:?>
				<img src="<?php echo get_stylesheet_directory_uri()?>/img/common/info_img_s.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ" class="alpha">
			<?php endif; ?>
            </p>
        	<em><?php echo mb_strimwidth(strip_tags(get_the_excerpt()), 0, 65, "..."); ?></em><div class="clear"><hr/></div></a>
        </li>
    <?php endforeach; ?>
    <?php else : //記事が無い場合 ?>
        <li><p>記事はまだありません。</p></li>
    <?php endif;
    wp_reset_postdata(); //クエリのリセット ?>
    
	</ul>
    
<div><a href="<?php echo site_url("info"); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/s_info_more.gif" alt="お役立ち情報をもっと読む" class="alpha" /></a></div>
</div>
</div>







<div class="category">
<div><strong><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/s_ctg_ttl.jpg" alt="求人カテゴリ" /></strong></div>

<div class="category_box">
  <?php
  wp_nav_menu(
  	array(
  		"theme_location" => "cat_job",
  		"container"      => "",
  		"menu_class"     => "",
  		"before"         => "<strong>",
  		"after"          => "</strong>"
  	)
  );
  ?>
</div>
</div>







<div class="guide">
<div><strong><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/s_guide_ttl.jpg" alt="転職ガイド" /></strong></div>

<div class="guide_box">
  <ul>
  	<li><a href="<?php echo site_url("guide#guide01"); ?>"><p>求人情報の探し方<br />
皆さんは仕事を探すとき、どんな媒体を使いますか？最近であれ...</p></a></li>
    <li><a href="<?php echo site_url("guide#guide02"); ?>"><p>書類作成のポイント<br />
応募書類には主に、「履歴書」と「職務経歴書」の2つの提出を...</p></a></li>
    <li><a href="<?php echo site_url("guide#guide03"); ?>"><p>面接のポイント<br />
面接の際に面接官が見ているのは下記のポイントになります。...</p></a></li>
</ul>

<div><a href="<?php echo site_url("guide"); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/s_guide_more.gif" alt="転職ガイドをもっと読む" class="alpha" /></a></div>
</div>
</div>






<div class="s_outline">
  <div class="s_contact_btn"><a href="<?php echo site_url("contact"); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/s_contact.gif" alt="お問い合わせフォーム" class="alpha" /></a></div></div>
  
<div><a href="<?php echo site_url("question"); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/s_bnr1.jpg" alt="よくあるご質問" class="alpha" /></a></div>



</div>
<!-- /SIDE -->




</div>







