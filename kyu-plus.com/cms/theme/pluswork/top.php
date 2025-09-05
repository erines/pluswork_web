<?php
 /*
Template Name: トップページ
*/
?>
<?php get_header(); ?>
	<div id="main_image">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/main_image.jpg" alt="関東求人プラス" />
	</div>

	<div id="wrap">
		<div id="contents" class="cl liquid">
			<div id="main">
				<!-- メインコンテンツここから ================================================================ -->
				<?php get_template_part( '_joblist' ); ?>
				<?php get_template_part( "include",'tel' ); ?>
				
				<?php wp_reset_postdata();
					the_content();
					?>
				<!-- メインコンテンツここまで ================================================================ -->
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>



<?php 
global $hide_application;
$hide_application = true;
get_footer(); ?>

