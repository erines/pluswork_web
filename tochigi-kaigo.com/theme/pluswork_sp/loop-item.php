<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found width90">
		<h1 class="entry-title"><?php _e( '求人が見つかりません', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'お探しの条件での求人は見つかりませんでした。条件を変更して再度検索してください。', 'twentyten' ); ?></p>
		</div>
		<!-- .entry-content -->
	</div>
	<!-- #post-0 -->
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
<li>
<div class="list_inbox_wrapper">
	<div class="list_inbox_space">
<div <?php post_class(array("list_inbox")); ?>>

		<div class="list_title">
        <a href="<?php echo add_query_arg($_GET, get_the_permalink()); ?>"><?php the_title(); ?></a></div>
        
		
        
        
        
        <?php $labels = get_the_terms(0, "label"); ?>
			<?php if ($labels && !is_wp_error($labels)) : ?>
			<ul class="list_status clearfix">
				<?php foreach ($labels as $term) : ?>
				<li><?php echo esc_html($term->name); ?></li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
        <div class="clear"><hr/></div>
        
        
           
        
        
		<div class="list_photo">
			<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail(array(140, 140, true), array("alt" => get_the_title() . " イメージ")); ?>
			<?php elseif (is_crawler()): ?>
				<img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_img_s.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ">
			<?php else:?>
				<img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_img_s.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ">
			<?php endif; ?>
		</div>
        
        
        
        
        
        <div class="list_info">
        	<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
				<?php if (get_field("施設形態")) : ?>
				<tr>
					<th>施設形態</th>
				<td><?php the_field("施設形態"); ?></td>
				</tr>
				<?php endif; ?>
				<tr>
				<th>勤務地</th>
				<td><?php
				$field = get_field("就業場所");
				if (!empty($field)) :
					echo strtr(esc_html(strip_tags($field)), array("\n" => ", "));
				endif;
				?>
				</td>
				</tr>
				<tr>
				<th>給与</th>
				<td><?php the_field("賃金"); ?></td>
				</tr>
		</tbody>
		</table>
        </div>
        <div class="clear"><hr /></div>
        
        <div class="list_pr">
           <p><?php the_field("キャッチコピー"); ?></p>
           </div>

<?php if (is_crawler()): ?>
        <div class="list_btn">
            <div class="left list_btn_img">
		<a href="<?php echo add_query_arg($_GET, get_the_permalink()); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/detail_btn.gif" alt="この求人の詳細を見る" class="wide"></a>
        </div>
        <div class="right list_btn_img">
        <a href="<?php echo get_post_meta(get_the_ID(), "_crawler_url", true); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn.gif" alt="この求人に今すぐエントリーする" class="wide" /></a>
        </div>
        <div class="clear"><hr/></div>
        </div>
<?php else: ?>
<?php
	$post_name = get_page(get_the_ID())->post_name;
?>
        <div class="list_btn">
    		<p><a href="<?php echo add_query_arg($_GET, get_the_permalink()); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/detail_btn_info.gif" alt="この求人の詳細を見る" class="wide"></a></p>
            <div class="left list_btn_img"><a href="tel:0285248115" onclick="<?php setGATelData('電話リンク', 'タップ', $post_name); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/detail_btn_tel.gif" class="wide" alt=""/></a></div>
        <div class="right list_btn_img"><a href="<?php echo add_query_arg(array("c" => get_the_ID()), site_url("contact/jobsp")); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn.gif" alt="この求人に今すぐエントリーする" class="wide" /></a></div>
        <div class="clear"><hr/></div>
        </div>
<?php endif; ?>
           
</div><!--/list_inbox-->

</div></div>
</li>

<?php endwhile; // End the loop. Whew. ?>