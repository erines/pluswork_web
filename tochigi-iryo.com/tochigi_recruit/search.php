<?php get_header(); ?>
	<div id="wrap">
		<div id="contents" class="cl">
			<p class="breadcrumb"><?php
				if(function_exists('bcn_display'))
					bcn_display();
			?></p>

			<div id="main">
				<!-- メインコンテンツここから ================================================================ -->
				<h2>「<?php the_search_query(); ?>」の検索結果</h2>
				
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
					<div style="margin: 20px;">
					<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
				<?php get_template_part( 'include', 'main-footer' ); ?>

				<!-- メインコンテンツここまで ================================================================ -->
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>


<?php get_footer(); ?>


