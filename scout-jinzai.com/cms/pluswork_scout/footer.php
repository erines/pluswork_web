

	
	<div id="footer">	
		<div class="inner cl">
		<!--
			<div class="logo">
				<div class="text">テキストテキストテキストテキストテキストテキスト</div>
				<div class="image"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_logo.png" alt="" /></a></div>
			</div>
			-->
			<?php //get_template_part( 'modules/sns' ); ?>
		</div>
		<div class="links"><div class="in cl">
			<div class="nav reset_list"><ul class="cl">
				<li><a href="<?php echo home_url("/contact"); ?>">お問い合わせ</a></li>
				<li><a href="<?php echo home_url("/privacy"); ?>">個人情報保護方針</a></li>
			</ul></div>
			<div class="copyright">Copyright&copy; <?php echo sc_get_option("company_name"); ?> All Rights Reserved.</div>

		</div></div>
	</div>
</div>


<div class="arrow2top">
	<a href="#" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer_pagetop.png" alt="" /></a>
</div>



<?php wp_footer(); ?>
</body>
</html>
