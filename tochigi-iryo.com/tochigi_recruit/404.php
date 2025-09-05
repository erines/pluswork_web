<?php get_header(); ?>

	<div id="wrap">
		<div id="contents" class="cl">
			<p class="breadcrumb"><?php
				if(function_exists('bcn_display'))
					bcn_display();
			?></p>
			<div id="main">
				<!-- メインコンテンツここから ================================================================ -->
				<h2>記事が見つかりませんでした。</h2>
				
				<p>検索で見つかるかもしれません。</p>
				<div style="margin-left: 20px;">
					<?php get_search_form(); ?>
				</div>
				<?php get_template_part( 'include', 'main-footer' ); ?>
				<!-- メインコンテンツここまで ================================================================ -->
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>


