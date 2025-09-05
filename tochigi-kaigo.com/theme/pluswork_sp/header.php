<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header("meta"); ?>

<!-- HEADER -->
<div id="header">
<h1 class="h_logo left"><a href="<?php echo site_url(); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/logo.gif" alt="栃木で介護のお仕事さがしなら「栃木介護求人センター」" class="wide" /></a></h1>

<div class="h_menu right">
<a href="<?php echo site_url("#search_contents"); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/h_search.gif" alt="求人情報の検索はこちら" class="wide right"/></a>
<a href="<?php echo site_url("contact/form-sp"); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/h_contact.gif" alt="お問い合わせはこちら" class="wide right"/></a>
	<div class="button-toggle"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/h_menu.gif" alt="こちらをタップするとメニューが表示されます" class="wide right"/></div>
</div>
<div class="clear"><hr/></div>

<nav>
		<div class="menu">
			<?php wp_nav_menu( array(
			'theme_location'=>'sp_header',
			'container' =>'',
			'menu_class' =>'',
			'items_wrap' =>'<ul>%3$s</ul>'));
			?>
        </div>
</nav>
<div class="clear"><hr/></div>

</div>
</div>
<!-- /HEADER -->







<!-- MAIN -->
<div id="main">
<h2><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/main.jpg" alt="栃木の介護職に特化しているから、高月給・土日休み・ブランクOKなどご希望条件の求人が見つかります！" class="wide" /></h2>
</div>
<!-- /MAIN -->







<!-- CONTENTS -->
<div id="contents">




