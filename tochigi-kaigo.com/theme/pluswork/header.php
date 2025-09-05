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
<div class="head wrapper">
<h1 class="left"><a href="<?php echo site_url(); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/logo.gif" alt="栃木で介護のお仕事さがしなら「栃木介護求人センター」" /></a></h1>
<div class="right"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/h_tel.gif" alt="お電話は0285-24-8115へお気軽にお問い合わせください"/></div>
<div class="clear"><hr/></div>
</div>
</div>
<!-- /HEADER -->





<!-- gnav -->
  <div id="gnav"><div class="gnav_inner wrapper">
    <nav>
      <?php wp_nav_menu( array(
		'theme_location'=>'primary',
		'container' =>'',
		'menu_class' =>'',
		'items_wrap' =>'<ul>%3$s</ul>'));
		?>
    	<div class="clear"><hr/></div>
    </nav>
  </div></div>
<!-- /gnav -->






<!-- MAIN -->
<div class="main_wrapper"><div class="main">
<h2><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/main_c.jpg" alt="栃木の介護職に特化しているから、高月給・土日休み・ブランクOKなどご希望条件の求人が見つかります！" /></h2>
</div></div>
<!-- /MAIN -->







<!-- CONTENTS -->
<div class="wrapper">




