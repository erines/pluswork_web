<?php
//if (!is_user_logged_in())
	//exit;

global $is_lp_complete;

?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1" />
	<meta name="format-detection" content="telephone=no" />
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ; ?>?<?php echo time(); ?>" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/job.css?<?php echo time(); ?>" />

<?php 
	wp_enqueue_script( 'smp_common', get_stylesheet_directory_uri() . '/js/smp_common.js?'.time(), array( 'jquery') ); 
	wp_enqueue_script( 'scroll2top', get_stylesheet_directory_uri() . '/js/scroll2top.js?'.time(), array( 'jquery') ); 
	wp_enqueue_script( 'continue_js', get_stylesheet_directory_uri() . '/js/continue.js', array( 'jquery') ); 
?>

	<?php 
		if (!function_exists("casley_recruit_is_amp") || !casley_recruit_is_amp())
			wp_head(); 
	?>
	
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/fixed.js?<?php echo time(); ?>"></script>
	
	<!-- swipe -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/swiper/css/swiper.css" />
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/swiper/js/swiper.jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/job.js"></script>
	
	<!-- Google Font -->
	<link rel='stylesheet' id='material-icons-css'  href='//fonts.googleapis.com/icon?family=Material+Icons&#038;ver=4.8' type='text/css' media='all' />	
</head>
<body <?php body_class(); ?>>
<div id="viewport">		
<?php if (empty($is_lp_complete)): ?>
	<header class="header_fixed">
		<div class="inner cl">
			<h1><a href="<?php echo home_url("/"); ?>">栃木医療求人センター</a></h1>
			<div class="menu"><a href="javascript: void(0);" class="show-sub"></a></div>
		</div>
		<div class="sub fixed_sub_menu">
			<div class="inner"><ul style="display: none;">
					<li><a href="<?php echo home_url("/"); ?>">HOME</a></li>
					<li><a href="<?php if (!is_front_page()) echo home_url("/"); ?>#office_info">ABOUT US</a></li>
					<li><a href="<?php echo home_url("/contact"); ?>">お問合わせ</a></li>
			</ul></div>
		</div>
	</header>
<?php endif; ?>