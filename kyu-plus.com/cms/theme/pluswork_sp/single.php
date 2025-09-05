<?php get_header(); ?>
	<div id="main">
		<div class="posts">
			<div class="breadcrumb"><?php
				if(function_exists('bcn_display'))
					bcn_display();
			?></div>
			
			<?php 
				if (have_posts()) : 
					while (have_posts()) : the_post(); ?>
						<h2><a href="<?php the_permalink() ?>"><?php the_title();?></a></h2>
						
						<div class="mb20">
							<?php the_content(); ?>
							<?php wp_link_pages(array(
								'before' => '<p><strong>Pages:</strong> ', 
								'after' => '</p>',  
								'next_or_number' => 'number'));  
							?>
						</div>
					<?php endwhile; ?>
			<?php endif; ?>
			<?php get_template_part( 'include', 'category-posts' ); ?>
		</div>
		<?php get_template_part( 'include', 'main-footer' ); ?>
	</div>

<?php get_footer(); ?>


