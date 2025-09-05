	<footer class="cl">
		<div class="copyright">Copyright <?php echo date("Y"); ?> 株式会社プラスワーク. All rights reserved.</div>
	</footer>
</div>

<?php 
$tel = "";
if (cr_get_option("job_tel_flg") && is_singular("job")) {
	$Job = CR_Job();
	$tel = $Job->get_field("tel_number");
} 
if (empty($tel) ) {
	$tel = cr_get_option("tel");
}
if (is_front_page()) :

?>

<div class="fixed_nav footer_fixed"><div class="inner cl">
	<div class="btn contact">
		<a href="<?php echo home_url("/contact"); ?>" class="op">
			<div class="balloon"><div class="in">簡単<br />30秒!</div></div>
			<div class="text">WEBで応募</div>
		</a>
	</div>
	<div class="btn tel">
		<a href="<?php echo "tel:", $tel; ?>" class="op">
			<div class="balloon"><div class="in">今すぐ</div></div>
			<div class="text">
				<div class="text01">電話で応募</div>
				<!--<div class="number"><?php echo $tel; ?></div>-->
				<div class="hours">受付時間 9:00~18:00</div>
			</div>
		</a>
	</div>
</div></div>


<?php
else:
?>


<div class="fixed_nav footer_fixed"><div class="inner cl">
	<div class="btn contact">
		<a href="<?php 
			if ((!function_exists("casley_recruit_is_amp") || !casley_recruit_is_amp()) && is_singular("job")) {
				echo '#entry_form';
			} else {
				echo home_url("/entry"); 
				if (is_singular("job"))
					echo '?j='. get_the_ID(); 
			}
			?>" class="op">
			<div class="balloon"><div class="in">簡単<br />30秒!</div></div>
			<div class="text">WEBで応募</div>
		</a>
	</div>
	<div class="btn tel">
		<a href="<?php echo "tel:", $tel; ?>" class="op">
			<div class="balloon"><div class="in">今すぐ</div></div>
			<div class="text">
				<div class="text01">電話で応募</div>
				<!--<div class="number"><?php echo $tel; ?></div>-->
				<div class="hours">受付時間 9:00~18:00</div>
			</div>
		</a>
	</div>
</div></div>


<?php
endif;
?>
<?php 
		if (!function_exists("casley_recruit_is_amp") || !casley_recruit_is_amp())
			wp_footer(); 
?>

</body>
</html>
