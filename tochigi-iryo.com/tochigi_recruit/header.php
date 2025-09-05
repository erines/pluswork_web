<?php

//if (!is_user_logged_in())
//	exit;

global $is_lp_complete;

?><!DOCTYPE html>
<!--[if lte IE 7 ]><html class="ie8 ie7"><![endif]--> 
<!--[if IE 8 ]><html class="ie8"><![endif]--> 
<!--[if IE 9 ]><html class="ie9"><![endif]--> 
<!--[if (gt IE 9)|!(IE)]><!--><html><!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="robots" content="index, follow" />
	<meta name="robots" content="all" />
	<link href="<?php bloginfo('stylesheet_url'); ?>?<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all" />
<?php 
	wp_enqueue_script( 'commonjs', get_stylesheet_directory_uri() . '/js/common.js?'.time(), array( 'jquery') ); 
	wp_enqueue_script( 'fixed_js', get_stylesheet_directory_uri() . '/js/fixed.js?'.time(), array( 'jquery') ); 
//	wp_enqueue_script( 'scroll2top', get_stylesheet_directory_uri() . '/js/scroll2top.js', array( 'jquery') ); 
	//wp_enqueue_script( 'slider_js', get_stylesheet_directory_uri() . '/js/slider.js', array( 'jquery') ); 
	//wp_enqueue_script( 'fixed_menu', get_stylesheet_directory_uri() . '/js/fixed_menu.js', array( 'jquery') ); 
?>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
	
	<meta name="viewport" content="width=1280" />

	<?php 
		wp_head(); 
	?>
	
	<!-- swipe -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/swiper/css/swiper.css?<?php echo time(); ?>" />
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/swiper/js/swiper.jquery.min.js?<?php echo time(); ?>"></script>
	
	<!-- modal -->
	<!--
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/modal/modal.css?<?php echo time(); ?>" />
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/modal/modal.js?<?php echo time(); ?>"></script>
	-->
	<!-- Google Material Font -->
	<link rel='stylesheet' id='material-icons-css' href='https://fonts.googleapis.com/icon?family=Material+Icons&#038;ver=4.8' type='text/css' media='all' />
</head>
<body <?php body_class(); ?>>
<div id="viewport">
<?php if (empty($is_lp_complete)): ?>
	<div id="header">
		<div class="inner cl">
			<h1 class="ts_"><a href="<?php echo home_url("/"); ?>">栃木医療求人センター</a></h1>
			<div class="nav">
				<ul class="cl"><!--
					--><li><a href="<?php echo home_url("/"); ?>">Home</a></li><!--
					--><li><a href="<?php echo home_url("/"); ?>#office_info">About US</a></li><!--
					--><li><a href="<?php echo home_url("/contact"); ?>">お問合せ</a></li><!--
				--></ul>
			</div>
		</div>
	</div>
<?php endif; ?>