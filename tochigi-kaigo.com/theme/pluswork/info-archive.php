<?php
/**

Template Name: info-archive

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
    	<div class="page_title">お役立ち情報</div>
    	</div>
	</div>



<div class="white_box_inner">
	<div class="news_wrapper">
    <?php query_posts('post_type=info&paged='.$paged); ?>

    <?php $args = array(
        'post_type' => 'info',
		'paged' => $paged,
    	'posts_per_page' => 10
    ); ?>
    <?php $the_query = new WP_Query($args); ?>
    <?php if($the_query->have_posts()): ?>
    	
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    	<a href="<?php the_permalink(); ?>">
        <div class="nw_block">
    	<ul>
			<li>
            	<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail(array(48, 48, true), array('class' => 'alpha', "alt" => get_the_title() . " イメージ")); ?>
			<?php else:?>
				<img src="<?php echo get_stylesheet_directory_uri()?>/img/common/info_img_s.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ" class="alpha">
			<?php endif; ?>
            
				<div class="nw_data">
                	<span><?php echo date("Y.m.d", strtotime($post->post_date)); ?></span><br />
					<font><?php echo mb_strimwidth($post->post_title, 0, 80, "..."); ?></font>
                </div>
            <div class="clear"><hr /></div>
			</li>
		</ul>
        </div></a>
    <?php endwhile; ?>
    <?php else : //記事が無い場合 ?>
        <li><p>記事はまだありません。</p></li>
    <?php endif;
    wp_reset_postdata(); //クエリのリセット ?>


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
