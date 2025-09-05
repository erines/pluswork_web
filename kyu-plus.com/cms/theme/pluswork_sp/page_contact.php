<?php
 /*
Template Name: お問い合わせページ
*/
?>
<?php get_header(); ?>
	<div id="main">
		<div class="posts">
			<div class="breadcrumb"><?php
				if(function_exists('bcn_display'))
					bcn_display();
			?></div>
		</div>
		<?php get_template_part( '_contact_form' ); ?>
	</div>


<?php get_footer(); ?>


