<?php
 /*
Template Name: お問い合わせページ
*/
?>
<?php get_header(); ?>
<?php 
	if (have_posts()) : 
		the_post(); ?>
				
	<div id="wrap">
		<div id="contents" class="cl liquid">
			<div id="main">
				<div class="entry cl"><?php the_content(); ?></div>

			</div>
		</div>
	</div>


<?php endif; ?>

<?php get_template_part( "include",'tel' ); ?>
<?php 
global $hide_application;
$hide_application = true;
get_footer(); ?>