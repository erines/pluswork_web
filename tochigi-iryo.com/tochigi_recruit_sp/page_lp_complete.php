<?php
 /*
Template Name: LPサンクスページ
*/
global $is_lp_complete;
$is_lp_complete = true;
?><?php get_header(); ?>
<?php 
	if (have_posts()) : 
		the_post(); ?>
	<div id="main">
		<div class="posts">
			<div class="breadcrumb">&nbsp;</div>
		</div>
		<div class="posts">
				<h2><?php the_title(); ?></h2>
				
				<div class="entry cl"><?php the_content(); ?></div>
		</div>
	</div>


<?php endif; ?>

<?php get_footer(); ?>


