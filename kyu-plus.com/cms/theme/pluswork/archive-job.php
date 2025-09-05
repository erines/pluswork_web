<?php get_header(); ?>
	<div id="wrap">
		<div id="contents" class="cl">
			<div id="main">
			<!-- メインコンテンツここから ================================================================ -->
				<?php get_template_part( '_joblist' ); ?>
				<!-- メインコンテンツここまで ================================================================ -->
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>


<?php get_footer(); ?>


