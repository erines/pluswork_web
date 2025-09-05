<?php
// $_title = "";
// $_submit = "";

global $sc_user;
$data = array();

$mail_templates = array();

$_query = new WP_Query(array(
	"post_type" => "mail_template",
	'orderby' => 'date', 
	'order' => 'DESC',
	
	'posts_per_page' => -1,
	"author" => $sc_user->ID, 
));
while($_query->have_posts()) {
	$_query->the_post();
	
	$mail_templates[] = array(
		"mail_template_id" => get_the_ID(),
		"title" => get_the_title(), 
		"subject" => get_post_meta( get_the_ID(), "subject", true), 
		"body" => get_post_meta( get_the_ID(), "body", true),
	);
}


?>
<div id="mailform" style="margin: -100px 0 0; padding: 100px 0 0; "></div>
<div class="user_mail_form mail_form contact_form reset_list mb50" id="mailform"><form action="#mailform" method="post">
	<input type="hidden" name="send" value="1" />

	<h2><?php echo $_title; ?></h2>
	<?php
	if (!empty($_GET["sent"]))
		echo '<div class="form_message"><p>メールの送信が完了しました。</p></div>';
	?>
	
	<div class="box"><table class="maintable fixed_table">
		<tr>
			<th>送信者</th>
			<td><?php echo h($sc_user->data->display_name); ?> 様</td>
		</tr>
<?php if (cr_user_has_role(["recruiter"],$sc_user->ID)): ?>
		<tr>
			<th>テンプレート</th>
			<td>
				<select name="template">
					<option value="">▼選択する</option>
					<?php foreach($mail_templates as $_template): ?>
						<option value="<?php echo h($_template["mail_template_id"]); ?>"><?php
							echo h($_template["title"]);
						?></option>
					<?php endforeach; ?>
				</select>
				<span class="note">※選択すると件名、本文に追加されます。</span>
			</td>
		</tr>
<?php endif; ?>
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
		<button type="submit" class="op"><span class="text"><?php echo $_submit; ?></span></button>
	</div>
<?php if (!empty($thread_url)): ?>
	<div class="center mt10"><a href="<?php echo h($thread_url); ?>" class="op">過去のメールのやり取りはこちら</a></div>
<?php endif; ?>
</form></div>

<script>
jQuery(function($) {
	$(".user_mail_form form").submit(function() {
		var $form = $(this);
		
		var $subject = $form.find('input[type="text"][name*="subject"]');
		var $body = $form.find('textarea[name*="body"]');
		
		if ($.trim($subject.val()) == "" && $.trim($body.val()) == "") {
			alert('メールが未入力です。');
			return false;
		}
		if ($.trim($subject.val()) == "") {
			if (!confirm('件名が入力されておりませんが、送信してよろしいでしょうか？'))
				return false;
		}
		else if ($.trim($body.val()) == "") {
			if (!confirm('本文が入力されておりませんが、送信してよろしいでしょうか？'))
				return false;
		}
		else {
			if (!confirm('こちらの内容でメールを送信してよろしいでしょうか？'))
				return false;
		}
		return true;
	});
	
	var mail_templates = <?php echo json_encode($mail_templates); ?>;
	$('select[name="template"]').on("change", function() {
		var $select = $(this);
		var $form = $(this).closest("form");
		
		var $subject = $form.find('input[type="text"][name*="subject"]');
		var $body = $form.find('textarea[name*="body"]');
		
		var mail_template_id = $select.val();
		if (! mail_template_id)
			return;
		
		var mail_template;
		for (var i=mail_templates.length-1; i>=0; i--) {
			if (mail_templates[i].mail_template_id == mail_template_id) {
				mail_template = mail_templates[i];
				break;
			}
		}
		$subject.val( $subject.val() + mail_template.subject );
		$body.val( $body.val() + mail_template.body );
	});
	
});
</script>