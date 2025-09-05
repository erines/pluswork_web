<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

/*
 * 求人項目の数量取得
 */
$count_items = wp_count_posts("item");
$count_crawlers = wp_count_posts("crawler");

get_header(); ?>









<!-- ここから検索 -->
<div class="search_title" id="search_contents">
	<img src="<?php echo get_stylesheet_directory_uri()?>/img/top/search_ttl.gif" alt="かんたんお仕事検索" class="wide" />
	<div class="job_count">栃木県の求人件数 <span><?php echo number_format_i18n($count_items->publish + $count_crawlers->publish); ?></span>件</div>
</div>

<div class="select_inner width90">

<?php get_template_part("part","jobsearch"); ?>

   	</div><!-- select_inner -->
<!-- ここまで検索 -->






<!-- ここからおすすめ求人 -->
<div class="pickup">
<strong><img src="<?php echo get_stylesheet_directory_uri()?>/img/top/recomend_ttl.gif" alt="現在掲載中の求人情報から、おすすめ求人を厳選ピックアップ！" class="wide" /></strong>
</div>

<div class="pickup_box">

<!-- ↓求人スライド部分 -->

<div id="sliderwrap">
<ul class="bxslider">

<?php
query_posts(array(
	"post_type" => "item",
	"r"         => "recommend",
	"posts_per_page" => 5,
));
?>

<?php if (have_posts()) : ?>
<?php get_template_part("loop", "item"); ?>
<?php endif; ?>

<?php wp_reset_query(); ?>

</ul>
</div>
<!-- ↑求人スライド部分 -->


</div>
<!-- ここまでおすすめ求人 -->

<div class="alignc">
	<a href="<?php echo esc_url(add_query_arg(array("r" => "normal"), get_post_type_archive_link("item"))); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/top/job_more.gif" alt="求人情報をもっと見る" width="80%" /></a>
</div>







<!-- ここから新着情報 -->
<div class="news">
<div class="left news_ttl"><img src="<?php echo get_stylesheet_directory_uri()?>/img/top/news_ttl.gif" alt="新着情報" class="wide" /></div>
<div class="left news_ttl"><a href="<?php echo site_url("news"); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/top/news_more.gif" alt="新着情報をもっと見る" class="wide" /></a></div>
<div class="clear"><hr/></div>

<div class="news_inner">
<?php if ( is_home() || is_front_page() ) : ?>
<ul class="news_mn">
<?php
global $post;
$args = array( 'numberposts' => 5);
$myposts = get_posts( $args );
foreach( $myposts as $post ) :  setup_postdata($post); ?>
<li>
<em><?php the_time("Y.m.d") ?></em>
<p><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></p><div class="clear"><hr /></div></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
</div>

</div>
<!-- ここまで新着情報 -->





<div class="school-bnr">
	<a href="http://www.pluswork.jp/contents/jobcollege/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/school-bnr.jpg" alt="資格取得案内" class="wide" /></a>
</div>




<div class="top_bnr">
<div><a href="<?php echo site_url("guide"); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/top/top_bnr1.jpg" alt="ポイントをおさえて転職を成功させよう！転職ガイドはこちらから" class="wide" /></a></div>
<div><a href="<?php echo site_url("info"); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/top/top_bnr2.jpg" alt="栃木と介護職転職の情報がいっぱい！お役立ち情報はこちらから" class="wide" /></a></div>
</div>















<?php get_footer(); ?>






<script type='text/javascript'>
	jQuery(document).ready(function() {
		var obj = jQuery('.bxslider').fadeIn(700,('easeOutQuart')).bxSlider({
			auto: true,
			autoControls: false,
			controls: true,
			pager: true,
			speed: 500,
			autoHover: true,
			pause:	3000,
			easing: 'swing',
			onSlideAfter: function() { // 自動再生
        obj.startAuto();
			}
		});
	});
</script>

