<?php get_header(); ?>
	<div id="main">
		<div class="posts">
			<div class="breadcrumb"><?php
				if(function_exists('bcn_display'))
					bcn_display();
			?></div>
			

		<?php 
		if (have_posts()) : 	
			$post = $posts[0]; 
			
			include dirname(__FILE__)."/include-title.php";
		?>
			<div class="mt10 mb20">
				<?php while (have_posts()) : the_post(); ?>
					<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php 
									the_title(); 
					?></a></h3>
					
					<p><?php echo mb_substr(strip_tags($post->post_content), 0, 200); ?>
					<a href="<?php the_permalink() ?>" class="more-link"><br /> 続きを読む >></a ></p>
				<?php endwhile; ?>
			</div>
		<?php else: ?>
			<?php
				include dirname(__FILE__)."/include-title.php";
			?>
			<div class="mt10 mb20">
				<p>検索で見つかるかもしれません。</p>
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
		</div>
		<?php get_template_part( 'include', 'main-footer' ); ?>
	</div>

		

<?php get_footer(); ?>


