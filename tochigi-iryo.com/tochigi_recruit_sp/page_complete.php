<?php
 /*
Template Name: お問い合わせ完了
*/
?><?php get_header(); ?>
	<div id="main">
		<div class="posts">
			<div class="breadcrumb"><?php
				if(function_exists('bcn_display'))
					bcn_display();
			?></div>
		</div>
		<div class="posts">
			<h2><?php the_title();?></h2>
			<?php 
				get_template_part( '_complete' ); 
			?>
		</div>
	</div>


<?php get_footer(); ?>


