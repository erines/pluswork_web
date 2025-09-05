<?php
if (is_front_page())
	$_url = home_url("/");
else if (is_singular())
	$_url = get_permalink();

if (empty($_url)) {
	$_url = (!empty($_SERVER["HTTPS"]) ? "https" :"http");
	$_url .= '://'.$_SERVER["HTTP_HOST"];
	$_url .= $_SERVER["REQUEST_URI"];
}

?>
			<div class="sns reset_list">
				<ul class="cl">
					<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo h(urlencode($_url)); ?>" target="_blank" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer_sns_fb.png" alt="Facebook" /></a></li>
					<li><a href="https://twitter.com/intent/tweet?text=<?php echo h(urlencode($_url)); ?>" target="_blank" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer_sns_tw.png" alt="Twitter" /></a></li>
					<li><a href="https://plus.google.com/share?url=<?php echo h(urlencode($_url)); ?>"  target="_blank" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer_sns_gp.png" alt="Google Plus" /></a></li>
					<li><a href="http://line.me/R/msg/text/?<?php echo h(urlencode($_url)); ?>"  target="_blank" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer_sns_ln.png" alt="Line" /></a></li>
				</ul>
			</div>