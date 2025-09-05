<?php
/**

Template Name: news-archive


 * Template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>


		<!-- メインカラム -->
		<div id="contents" class="right">
        
<div class="contents_top"> 
	<div class="white_box">
    
    
    <div class="title01_wrapper">
		<div class="title01">
    	<div class="page_title">新着情報</div>
    	</div>
	</div>



<div class="white_box_inner">
	<div class="news_wrapper">

		<?php query_posts('post_type=post&paged='.$paged); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="post">
        
        <a href="<?php the_permalink(); ?>">
        <div class="nw_block">
<ul>
<li>
<span><?php echo date("Y.m.d", strtotime($post->post_date)); ?></span>
<font><?php echo mb_strimwidth($post->post_title, 0, 80, "..."); ?></font>
</li>
</ul>
</div></a>


        </div><!-- .post -->
        
        

    <?php endwhile; ?>
<?php else : ?>
    <div class="post">
        <h2>新着情報が見つかりません</h2>
        <p>お探しの新着情報が見つかりません</p>
    </div>
<?php endif; ?>


	</div>
</div><!-- .white_box_inner -->


<div class="pagenation_line">
<?php
if (function_exists("pagination")) {
	global $wp_query;
	pagination($wp_query->max_num_pages);
}
?> 
</div>



				    </div><!-- white_box -->
				</div>
                
                
</div><!-- #contents -->
<!-- /メインカラム -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
