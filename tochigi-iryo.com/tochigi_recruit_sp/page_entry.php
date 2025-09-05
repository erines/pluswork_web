<?php
 /*
Template Name: エントリーフォーム
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
		<?php 

//echo do_shortcode('[mwform_formkey key="14"]'); 
get_template_part( '_entry_form' ); 
?>
	</div>


<?php get_footer(); ?>


