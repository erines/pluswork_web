<?php
global $sc_user;

if (!cr_user_has_role(["recruiter"],$sc_user->ID)) {
	echo 'このページを閲覧する権限がありません。';
	return;
}


global $sc_mail_template;
$data = $sc_mail_template;
if (strtolower($_SERVER["REQUEST_METHOD"]) === "post" && !empty($_POST["data"])) {
	$data = $_POST["data"];
}

$url = sc_get_page_link("page.mail_template_detail"); 
if (!empty($sc_mail_template)) {
	$url = add_query_arg(array("mail_template_id" => $sc_mail_template["mail_template_id"]), $url);
} 

?><h2>メールテンプレート<?php echo (!empty($sc_mail_template) ? "詳細/編集" : "作成"); ?>作成</h2>
<?php if (!empty($sc_mail_template)): ?>
	<?php
		if (!empty($_GET["complate_add"])) 
			echo '<div class="form_message"><p>メールテンプレートの追加が完了しました。</p></div>';
		if (!empty($_GET["complete_update"])) 
			echo '<div class="form_message"><p>メールテンプレートの更新が完了しました。</p></div>';
	?>
<?php else: ?>
	<p>候補者へのアプローチメールを送信するためのメールテンプレートを作成します。</p>
<?php endif; ?>
<div class="user_mail_form contact_form mail_form reset_list mb50"><form action="<?php echo h($url); ?>" method="post">
	<div class="box"><table class="maintable fixed_table">
		<tr class="required">
			<th>テンプレート名</th>
			<td><input type="text" class="post_title" name="data[title]" value="<?php echo h($data["title"]); ?>" /></td>
		</tr>
		<tr>
			<th>件名</th>
			<td><input type="text" name="data[subject]" value="<?php echo h($data["subject"]); ?>" /></td>
		</tr>
		<tr>
			<th>本文</th>
			<td><textarea name="data[body]"><?php
				echo h($data["body"]);
			?></textarea></td>
		</tr>
	</table></div>
	<div class="submit btn btn02">
		<button type="submit" class="op"><span class="text">保存</span></button>
	</div>
</form></div>

<script>
jQuery(function($) {
	$(".user_mail_form form").submit(function() {
		var $form = $(this);
		if ($.trim($form.find('.post_title').val()) === "") {
			alert('テンプレート名が入力されていません。');
			return false;
		}
		return true;
	});
});
</script>
