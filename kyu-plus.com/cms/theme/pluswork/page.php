<?php get_header(); ?>
<?php 
	if (have_posts()) : 
		the_post(); ?>
				
	<div id="wrap">
		<div id="contents" class="cl">
			<div id="main">
				<p class="breadcrumb"><?php
					if(function_exists('bcn_display'))
						bcn_display();
				?></p>
				<h2><?php the_title(); ?></h2>
				
				<?php the_content(); ?>
				<?php get_template_part( 'include', 'page-children' ); ?>
				<?php get_template_part( 'include', 'main-footer' ); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>


<?php endif; ?>

<?php get_footer(); ?>


