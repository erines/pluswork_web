<?php
/**
 * Template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

            
            <div id="post-0" class="post error404 not-found">
				<div class="title01_wrapper">
					<div class="title01">
    					<div class="page_title"><?php _e( 'ページが見つかりません', 'twentyten' ); ?></div></div></div>
                        
                        
				<div class="white_box_inner">
					<p class="error_text"><?php _e( 'リクエストされたページが存在しません。<br />前ページへ戻られるか下記検索でお探しください。', 'twentyten' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .white_box_inner -->
			</div><!-- #post-0 -->

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>