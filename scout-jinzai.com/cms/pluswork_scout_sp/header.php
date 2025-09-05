<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1" />
	<meta name="format-detection" content="telephone=no" />
	
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<link rel='stylesheet' id='material-icons-css'  href='//fonts.googleapis.com/icon?family=Material+Icons&#038;ver=4.8' type='text/css' media='all' />
	
<?php foreach(array("style","common"/*,"page","top","info","job"*/) as $_css): ?>
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/<?php echo $_css; ?>.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all" />	
<?php endforeach; ?>
<?php 
foreach(array("common","fixed","scroll2top") as $_js):
	wp_enqueue_script( $_js. '_js', 
						get_stylesheet_directory_uri() . '/js/'.$_js.'.js?'.time(), 
						array( 'jquery') ); 
endforeach;
?>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="viewport">
	<div id="header" class="header_fixed">
		<div class="inner cl">
			<div class="logo">
				<h1><?php echo h(sc_get_option("header_text")); ?></h1>
				<div class="image"><a href="<?php 
					if (sc_is_page("page.applicant_regist"))
						echo home_url("/lp/");
					else
						echo sc_get_front_page(); 
				?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_logo.png?<?php echo time(); ?>" alt="" /></a></div>
			</div>
			<!--
			<div class="search"><form action="#" method="get">
				<input type="text" name="s" placeholder="フリーワードで求人を探す" />
				<div class="submit op">
					<span class="icon">
						<span class="material-icons">&#xE8B6;</span>
					</span>
					<input type="submit" />
				</div>
			</form></div>
			-->
			<div class="menulist">
			<?php
			global $sc_user;
			if (!empty($sc_user)):
			?>
				<div class="lately op">
					<a href="<?php echo add_query_arg(array("logout"=>1),sc_get_page_link("page.login")); ?>">
						<span class="material-icons">&#xE90B;</span>
						<span class="text">ログアウト</span>
					</a>
				</div>
			<?php
			endif;
			?>
				<!--
				<div class="menu op"><a href="javascript: void(0);">
					<span class="text">メニュー</span>
				</a></div>
				-->
				<!--
				<div class="lately op">
					<a href="#">
						<span class="material-icons">&#xE889;</span>
						<span class="text">最近見た求人</span>
					</a>
				</div>
				-->
			</div>
		</div>
	</div>