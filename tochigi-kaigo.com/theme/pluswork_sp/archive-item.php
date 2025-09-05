<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

        


<div class="title01_wrapper">
	<div class="title01">
<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>
<?php get_template_part("part", "pankuzu-job"); ?>
	</div>
</div>


<div>
<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archive.php and that will be used instead.
	 */
	get_template_part("part", "pagenate");
?>
</div>

 
<ul class="list">
<?php rewind_posts();
	get_template_part( 'loop', 'item' );
?>
</ul>



<div>
<?php rewind_posts();
	get_template_part("part", "pagenate");
?>
</div>




<div class="re-search">
<div class="re-search_ttl">再検索する</div>
<div class="form_contents_wrapper">
<?php
	/*
	 * 検索フォーム表示
	 */
	get_template_part("part", "jobsearch");
?>
</div>
</div>






<?php get_footer(); ?>
