<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	
    
    
<div class="clear"><hr/></div>

</div>
<!-- /CONTENTS -->


















<!-- FOOTER -->
<div id="footer">

<div class="fnav">
<div class="wrapper">

<?php wp_nav_menu( array(
'theme_location'=>'sp_footer',
'container' =>'',
'menu_class' =>'',
'items_wrap' =>'<ul>%3$s</ul>'));
?>

<div class="clear"><hr /></div>
</div>
</div>



<div class="pagetop">
<a href="#header"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/pagetop.gif" border="0" alt="ページトップへ戻る" class="wide" /></a>
</div>



<div class="copyright"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/copy.gif" border="0" alt="Copyright ©2014 Pluswork Co.,Ltd. All Rights Reserved." class="wide" /></div>


</div>
<!-- /FOOTER -->





    
<script type="text/javascript">
//ページ内リンク、#非表示。スムーズスクロール
  jQuery('a[href^=#]').click(function(){
    var speed = 800;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    jQuery("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
</script> 


<script type="text/javascript">
jQuery(function($){
	$(".menu").css("display","none");
	$(".button-toggle").on("click", function() {
		$(".menu").slideToggle();
	});
});
</script> 








<?php
	/*
	 * Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51960824-2', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
