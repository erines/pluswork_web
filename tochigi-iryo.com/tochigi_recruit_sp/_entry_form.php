<?php 
/**
single-job.php に以下の記述が必要

//echo do_shortcode('[mwform_formkey key="21"]'); 
*/
?>

		<div id="entry_form"><?php 

/*
$_query = new WP_Query(array("page_id"=>33));
if ($_query->have_posts()):
	$_query->the_post();
	the_content();
endif;
wp_reset_postdata();
*/
echo do_shortcode('[mwform_formkey key="21"]'); 
?></div>
<script>
jQuery(function($) {
	var $form = $(".entry_form").closest("form");
	var action = $form.attr("action") || "";
	action += '#entry_form';
	
	$form.attr("action", action);
});
</script>
