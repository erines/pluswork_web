<?php
global $sc_user;
global $sc_target_user;

if ( !(	cr_user_has_role(["recruiter"],$sc_user->ID) && 
		cr_user_has_role(["applicant"],$sc_target_user->ID)) &&
	 !(	cr_user_has_role(["applicant"],$sc_user->ID) && 
		cr_user_has_role(["recruiter"],$sc_target_user->ID)) )
{
	echo '指定されたメールボックスは存在しないか、閲覧する権限がありません。<br />別のユーザーでログインしている場合は一旦、ログアウトし、対象のユーザーでログインしなおしてください。';
	return;
}
$thread_id = null;

do {
	if (empty($sc_user) || empty($sc_target_user) || empty($_REQUEST["key"])) 
		break;

	$thread_id = my_scout_get_mail_thread($sc_user->ID, $sc_target_user->ID, false);
	if (empty($thread_id)) 
		break;
	
	$thread_key = get_post_meta( $thread_id, "thread_key", true);
	if (empty($thread_key) || $thread_key !== $_REQUEST["key"]) {
		$thread_id = null;
		break;
	}
} while(false);
if (empty($thread_id)) {
	echo '指定されたメールボックスは存在しないか、閲覧する権限がありません。<br />別のユーザーでログインしている場合は一旦、ログアウトし、対象のユーザーでログインしなおしてください。';
	return;
}
/*
	CREATE TABLE IF NOT EXISTS $table (
		id BIGINT(20) unsigned NOT NULL AUTO_INCREMENT, 
		
		active TINYINT(4) NOT NULL , 
		mail_key VARCHAR(64) NOT NULL , 
		thread_post_id INT NOT NULL,
		
		mail_type TINYINT NOT NULL , 
		user_id INT NOT NULL ,
		target_user_id INT NOT NULL , 
		has_read TINYINT NOT NULL , 
		
		subject TEXT , 
		body TEXT , 
		
		sent_dt DATETIME, 
		note LONGTEXT , 
		
		PRIMARY KEY(id),
		UNIQUE KEY (mail_key) , 
		KEY (thread_post_id, user_id, target_user_id, mail_type) 
	) ENGINE=MyISAM DEFAULT CHARSET=UTF8; ");
*/

global $wpdb;
$table = $wpdb->prefix."___user_mail";

$mails = $wpdb->get_results($wpdb->prepare(
	"SELECT * FROM $table 
	WHERE 
		thread_post_id = %d AND 
		active = 1
	ORDER BY 
		id ASC" , 
	array($thread_id) 
));

//pr($mails);
?>
<h2><?php echo h($sc_target_user->data->display_name); ?>さんとのメール</h2>
<div class="mail_inbox mail_template_list reset_list mb50">
	<div class="box"><ul>
<?php 
foreach($mails as $mail) : 
	$sender = null;
	if ($mail->user_id == $sc_user->ID && $mail->target_user_id == $sc_target_user->ID)
		$sender = $sc_user;
	else if ($mail->user_id == $sc_target_user->ID && $mail->target_user_id == $sc_user->ID)
		$sender = $sc_target_user;
	else 
		continue;	// 不正なデータ
	
	$class = array("show"); // hide short
?>
		<li class="<?php echo join(" ", $class); ?>"><div class="inner cl">
			<div class="anchor" id="mail-<?php echo h($mail->mail_key); ?>"></div>
			<div class="mail_info">
				<div class="date">
					作成日時:<?php echo date("Y年n月j日 H:i:s", strtotime($mail->sent_dt)); ?>
					<div class="from">送信者：<?php echo h($sender->data->display_name); ?>さん</div>
				</div>
				<!--<div class="to">受信者：○○さん</div>-->
				<div class="in">
					<div class="subject"><?php echo h($mail->subject); ?></div>
					<div class="body"><?php echo nl2br(h($mail->body)); ?></div>
				</div>
			</div>
		</div></li>
<?php 
endforeach; ?>
	</ul></div>
</div>
<?php

$_title = h($sc_target_user->data->display_name)."さんへメールを送る";
$_submit = "送信";
include dirname(__FILE__)."/user.mailform.php";
?>
