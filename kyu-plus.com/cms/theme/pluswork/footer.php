

	<div id="footer">
<?php
global $hide_application;
if (empty($hide_application)):
?>
		<div class="application">
			<h2>応募方法</h2>
			<ol class="cl">
				<li>
					<div class="image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/application_image01.jpg" alt="" /></div>
					<div class="title">応募</div>
					<div class="text">まずは、ホームページ内の専用フォーム<br />もしくはお電話にて、ご応募下さい</div>
				</li>
				<li>
					<div class="image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/application_image02.jpg" alt="" /></div>
					<div class="title">面接</div>
					<div class="text">応募完了後、<br />担当者より折返しのご連絡をさせて頂きます。<br />日程調整の上、面接を行います。</div>
				</li>
				<li>
					<div class="image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/application_image03.jpg" alt=""  /></div>
					<div class="title">内定／就職開始</div>
					<div class="text">希望するお仕事と、条件が合えば、内定となります。<br />入社日の調整、手続きを行い、初出勤となります。</div>
				</li>
			</ol>
		</div>
<?php endif; ?>
		<div class="inner">
			<div class="logo"><a href="<?php echo home_url("/"); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer_logo.png" alt="関東求人プラス" /></a></div>
			<div class="copyright">
				Copyright <?php echo date("Y");?> Pluswork Co.,Ltd. All rights reserved.
			</div>
		</div>
	</div>

</div>

<?php wp_footer(); ?>
</body>
</html>
