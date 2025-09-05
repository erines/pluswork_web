<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1" />
	<meta name="format-detection" content="telephone=no" />
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ; ?>" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/job.css" />

<?php 
	wp_enqueue_script( 'smp_common', get_stylesheet_directory_uri() . '/js/smp_common.js', array( 'jquery') ); 
	wp_enqueue_script( 'scroll2top', get_stylesheet_directory_uri() . '/js/scroll2top.js', array( 'jquery') ); 
	wp_enqueue_script( 'continue_js', get_stylesheet_directory_uri() . '/js/continue.js', array( 'jquery') ); 
?>

	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/fixed.js"></script>
	
	<!-- swipe -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/swiper/css/swiper.css" />
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/swiper/js/swiper.jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/job.js"></script>
</head>
<body <?php body_class(); ?>>
<div id="viewport">
	<header class="header_fixed">
		<div class="inner cl">
			<h1><a href="<?php echo home_url("/"); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_logo.png" alt="関東求人プラス" class="responsive" /></a></h1>
			<div class="menu"><a href="javascript: void(0);" class="show-sub"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_menu.png" alt="メニュー" class="responsive" /></a></div>
		</div>
		<div class="sub fixed_sub_menu">
			<div class="inner"><ul style="display: none;">
				<li><a href="<?php echo home_url("/"); ?>">HOME</a></li>
				<li><a href="<?php echo home_url("/"); ?>?<?php echo time();?>#office_info">ABOUT US</a></li>
				<li><a href="<?php echo get_page_link(24); ?>">お問い合わせ</a></li>
			</ul></div>
		</div>
	</header>