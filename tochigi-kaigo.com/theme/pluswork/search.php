<?php
/**
 * Template for displaying Search Results pages
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
    

<?php if ( have_posts() ) : ?>    
    <div class="title01_wrapper">
		<div class="title01">
    	<div class="searchresult"><?php printf( '<strong>' . get_search_query() . '</strong>' .' の 検索結果' ); ?></div>
    	</div>
	</div> 
    
<div class="white_box_inner">
	<div class="news_wrapper">
    <?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
	</div>
</div><!-- .white_box_inner --> 
                
                
<?php else : ?>       
	<div class="title01_wrapper">
		<div class="title01">
    	<div class="searchresult"><strong><?php _e( '検索結果が見つかりません' ); ?></strong></div>
    	</div>
	</div>
    
<div class="white_box_inner">
	<div class="news_wrapper">
						<p class="error_text"><?php _e( 'お探しの検索項目に該当するページが存在しません。<br />検索項目を変更して再度検索してください。' ); ?></p>
						<?php get_search_form(); ?>
	</div>
</div><!-- .white_box_inner --> 


<?php endif; ?>




				    </div><!-- white_box -->
				</div>
                

</div><!-- #contents -->
<!-- /メインカラム -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
