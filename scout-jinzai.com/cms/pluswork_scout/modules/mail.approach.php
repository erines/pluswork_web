<?php 
$url = add_query_arg(
				array('user_id' => $sc_user->ID,
						"key" => $target_thread_key), 
				sc_get_page_link("page.mail_box_detail") )."#mail-".$target_mail_key; 
if (strpos($url,"://") === false)
	$url = home_url($url);
?>
件名：<?php echo $subject; ?>	
-----------------------------------
<?php echo $body; ?>	
-----------------------------------

こちらのメールに返信する場合は、下記のURLから返信してください。

<?php echo $url;?>	

<?php if (cr_user_has_role(["recruiter"], $sc_user->ID)) : ?>
※匿名でやり取りしたい場合は必ずこちらのURLから入って下さい
　施設と直接やり取りをされたい場合は、このまま返信しても大丈夫です。
　このまま返信した場合は施設側にメールアドレスが表示されることになります。
　（ログインにはID/パスワードが必要です）
　初回にお送りした登録完了メールに記載されております。
　
　ID/パスワードが不明な場合は当センターへお問合せ下さい。
　<?php /* メールアドレス */ ?>	

<?php elseif (cr_user_has_role(["applicant"], $sc_user->ID)) : ?>
※このメールに直接、返信することはできません。
　下記のURLから返信を行ってください。
　（ログインにはID/パスワードが必要です）
尚、ID/パスワードは初回にお送りしております。
<?php endif; ?>

当センターにお問い合わせ下さい	
-----------------------------------
<?php echo sc_get_option("company_name"); ?>	
<?php echo sc_get_option("form_email"); ?>