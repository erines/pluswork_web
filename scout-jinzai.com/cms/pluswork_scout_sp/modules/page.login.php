<?php
global $sc_login_error;
?>
<div class="loginform">
	<h2>ログイン</h2>
	<form action="<?php echo sc_get_page_link("page.login"); ?>" method="post" autocomplete="off" id="loginform"><div class="box">
	<?php 
		if (!empty($_REQUEST["redirect"]) && 
			($redirect_url = @base64_decode($_REQUEST["redirect"])) && 
			strpos($redirect_url, "://") === false) 
		{
			printf('<input type="hidden" name="redirect" value="%s" / >', h($_REQUEST["redirect"]));
		}
		if (!empty($sc_login_error))
			printf('<div class="error">%s</div>', h($sc_login_error));
	?>
		<table class="fixed_table reset_list">
			<tr>
				<th>ID</th>
				<td><input type="text" name="logindata[login_id]" placeholder="" value="<?php
					if (!empty($_POST["logindata"]["login_id"]))
						echo h($_POST["logindata"]["login_id"]);
				?>" /></td>
			</tr>
			<tr>
				<th>パスワード</th>
				<td><input type="password" name="logindata[login_password]" placeholder="" /></td>
			</tr>
		</table>
		<div class="submit btn btn02">
			<button type="submit" class="op"><span class="text">ログイン</span></button>
		</div>
	</div></div>
</div>

<script>
jQuery(function($) {
	if (location.hash) {
		$("#loginform").append($('<input type="hidden" name="hash" />').val(location.hash));
	}
});
</script>
