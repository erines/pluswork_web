<?php get_header(); ?>
	<div id="main">
		<div class="posts">
			<div class="breadcrumb"><?php
				if(function_exists('bcn_display'))
					bcn_display();
			?></div>
			
			<h2>該当する記事が見つかりませんでした。</h2>
			<div class="mt10 mb20">
				<p>検索で見つかるかもしれません。</p>
				<?php get_search_form(); ?>
			</div>
		</div>
		<?php get_template_part( 'include', 'main-footer' ); ?>
	</div>

		

<?php get_footer(); ?>


