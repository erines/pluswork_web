<?php
 /*
Template Name: デフォルトテンプレート（関連ページなし）
*/
?>
<?php get_header(); ?>
<?php 
	if (have_posts()) : 
		the_post(); ?>
				
	<div id="wrap">
		<div id="contents" class="cl">
			<p class="breadcrumb"><?php
				if(function_exists('bcn_display'))
					bcn_display();
			?></p>

			<div id="main">
				<h2><?php the_title(); ?></h2>
				
				<div class="entry cl"><?php the_content(); ?></div>
				<?php get_template_part( 'include', 'main-footer' ); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>


<?php endif; ?>

<?php get_footer(); ?>


