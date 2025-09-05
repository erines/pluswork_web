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
						<h2><?php the_title();?></h2>
						
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
			<?php get_template_part( 'include', 'page-children' ); ?>
		</div>
		<?php get_template_part( 'include', 'main-footer' ); ?>
	</div>


<?php get_footer(); ?>


