<?php get_header(); ?>
	<div class="page_title"><div class="in"><?php include dirname(__FILE__)."/include-title.php"; ?></div></div>
	<div class="breadcrumb"><?php cr_breadcrumb(); ?></div>
			
	<div id="wrap">
		<div id="contents" class="cl">
			<div id="main">
				<!-- メインコンテンツここから ================================================================ -->
				<!--
				<p>検索で見つかるかもしれません。</p>
				<div style="margin-left: 20px;">
					<?php get_search_form(); ?>
				</div>
				-->
				<p>お探しのページが見つかりませんでした。<br /><a href="<?php echo home_url("/"); ?>">トップページへ戻る</a></p>
				<?php get_template_part( 'include', 'main-footer' ); ?>

				<!-- メインコンテンツここまで ================================================================ -->
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>


<?php get_footer(); ?>


