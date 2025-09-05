<?php
global $is_lp_complete;

//if (!is_user_logged_in())
//	exit;
?><?php if (!is_front_page()): ?>
	<?php get_template_part( "include",'tel' ); ?>
<?php endif; ?>

	<div id="footer">
		<div class="inner">
			<?php if (empty($is_lp_complete)): ?>
			<div class="logo"><a href="<?php echo home_url("/"); ?>">栃木医療求人センター</a></div>
			<?php endif; ?>
		</div>
		<div class="copyright">
			Copyright <?php echo date("Y"); ?> Pluswork Co.,Ltd. All rights reserved.
		</div>
	</div>
</div>

<?php if (strpos($_SERVER["REQUEST_URI"],'/contact') === false && 
		strpos($_SERVER["REQUEST_URI"],'/lp/complete') === false && 
		strpos($_SERVER["REQUEST_URI"],'/entry') === false): ?>


<div class="fixed_nav"><div class="inner cl">
	<div class="title">ご応募・お問合せは<br />こちらから！</div>
	<div class="btn contact">
		<a href="<?php 
			if (is_front_page())
				echo home_url('/contact');
			else 
				echo home_url("/entry"); 
				if (is_singular("job"))
					echo '?j='. get_the_ID(); 
		?>" class="op">
			<div class="balloon"><div class="in">簡単<br />30秒！</div></div>
			<div class="text"><!--✉--><!--<i class="material-icons">&#xE0E1;</i>-->WEBで応募</div>
		</a>
	</div>
	<div class="btn tel">
		<span class="i">
			<div class="balloon"><div class="in">今すぐ</div></div>
			<div class="text"><!--☎--><!--<i class="material-icons">&#xE61D;</i>-->
				<div class="text01">電話で応募</div>
				<div class="number"><!--0285-24-8115--><?php
					$tel = "";
					if (cr_get_option("job_tel_flg") && is_singular("job")) {
						$Job = CR_Job();
						$tel = $Job->get_field("tel_number");
					} 
					if (empty($tel) ) {
						$tel = cr_get_option("tel");
					}
					echo $tel;
				?></div>
			</div>
			<div class="hours">受付時間 平日 9:00~20:00</div>
		</span>
	</div>
</div></div>


<?php endif; ?>
<?php 
		wp_footer(); 
?>
</body>
</html>
