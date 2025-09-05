<?php get_header(); ?>
	<div class="page_title"><div class="in"><?php include dirname(__FILE__)."/include-title.php"; ?></div></div>
	<div class="breadcrumb"><?php cr_breadcrumb(); ?></div>
			
	<div id="wrap">
		<div id="contents" class="cl">
			<div id="main">
			<!-- メインコンテンツここから ================================================================ -->
				<?php if (have_posts()) : 	
					$post = $posts[0]; ?>
					<?php while (have_posts()) : the_post(); ?>
						<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php 
										the_title(); 
						?></a></h3>
						
						<p><?php echo mb_substr(strip_tags($post->post_content), 0, 200); ?>
						<a href="<?php the_permalink() ?>" class="more-link"><br /> 続きを読む >></a ></p>
					<?php endwhile; ?>
				
					<?php next_posts_link('<< 前の記事を見る'); ?>
					<?php previous_posts_link('次の記事を見る >>'); ?>
				
				<?php else: ?>
					<p>該当する記事が見つかりませんでした。</p>
					<p>検索で見つかるかもしれません。</p>
					<?php get_search_form(); ?>
				<?php endif; ?>

				<?php get_template_part( 'include', 'main-footer' ); ?>

				<!-- メインコンテンツここまで ================================================================ -->
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>



<?php get_footer(); ?>


