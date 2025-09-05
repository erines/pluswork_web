<?php
/**
 * Template for displaying all single posts
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

			<?php
			/*
			 * Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
			?>

				    </div><!-- white_box -->
				</div>
                
                
</div><!-- #contents -->
<!-- /メインカラム -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
