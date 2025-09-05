<?php get_header(); ?>
<?php 
	if (have_posts()) : 
		the_post(); ?>
	<div class="page_title"><div class="in"><?php include dirname(__FILE__)."/include-title.php"; ?></div></div>
	<div class="breadcrumb"><?php cr_breadcrumb(); ?></div>
			
	<div id="wrap">
		<div id="contents" class="cl">
			<div id="main">
				<div class="entry cl"><?php the_content(); ?></div>
				<?php get_template_part( 'include', 'category-posts' ); ?>
				<?php get_template_part( 'include', 'main-footer' ); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>


<?php endif; ?>

<?php get_footer(); ?>

