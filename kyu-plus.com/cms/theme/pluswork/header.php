<!DOCTYPE html>
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
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="all" />
<?php 
	wp_enqueue_script( 'commonjs', get_stylesheet_directory_uri() . '/js/common.js?'.time(), array( 'jquery') ); 
//	wp_enqueue_script( 'scroll2top', get_stylesheet_directory_uri() . '/js/scroll2top.js', array( 'jquery') ); 
	//wp_enqueue_script( 'slider_js', get_stylesheet_directory_uri() . '/js/slider.js', array( 'jquery') ); 
	//wp_enqueue_script( 'fixed_menu', get_stylesheet_directory_uri() . '/js/fixed_menu.js', array( 'jquery') ); 
?>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
	
	<meta name="viewport" content="width=1280" />

	<?php wp_head(); ?>
	
	<!-- swipe -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/swiper/css/swiper.css" />
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/swiper/js/swiper.jquery.min.js"></script>
</head>
<body <?php body_class(); ?>>
<div id="viewport">
	<div id="header">
		<div class="inner cl">
			<h1><a href="<?php echo home_url("/"); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_logo.png" alt="関東求人プラス" /></a></h1>
			
			<div class="nav">
				<ul class="cl">
					<li><a href="<?php echo home_url("/"); ?>" class="active"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_nav01.png" class="Home" /></a></li>
					<li><a href="<?php if (!is_front_page()) echo home_url("/"); ?>#office_info"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_nav02.png" class="About Us" /></a></li>
				</ul>
			</div>
			<div class="contact">
				<a href="<?php echo get_page_link(24); ?>" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_contact_btn.png" alt="お問合せ" /></a>
			</div>
		</div>
	</div>

	
	