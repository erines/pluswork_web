<?php get_header(); ?>
<?php 
	if (have_posts()) : 
		the_post(); ?>
				
	<div id="wrap">
		<div id="contents" class="cl">
			<div id="main">
				<?php get_template_part( '_job_detail' ); ?>
				<?php get_template_part( '_job_recommend' ); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>


<?php endif; ?>
<?php get_footer(); ?>


