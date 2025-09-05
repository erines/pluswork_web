<?php
global $sc_user;
global $sc_target_user;

if (empty($sc_target_user)) {
	echo '不正なURLです。';
	return;
}

if (!cr_user_has_role(["recruiter"],$sc_user->ID)) {
	echo 'このページを閲覧する権限がありません。';
	return;
}
	

	$user = $sc_target_user;
	$display_name = h($user->data->display_name); 

	$date = cr_user_get_meta("sc_birthday", $user->ID);
	$age = cr_user_get_meta("sc_age", $user->ID);
	
	if (empty($age) && !empty($date))
		$age = culc_age($date, '%d歳');

	// 最終学歴
	$sc_last_school = array();
	/*if ($sc_last_school_y = cr_user_get_meta("sc_last_school_y", $user->ID))
		$sc_last_school[] = sprintf('%d年', $sc_last_school_y);

	if ($sc_last_school_name = cr_user_get_meta("sc_last_school_name", $user->ID))
		$sc_last_school[] = $sc_last_school_name;
		
	if ($sc_last_school_graduate = cr_user_get_meta("sc_last_school_graduate", $user->ID))
		$sc_last_school[] = $sc_last_school_graduate;
		*/
	// 資格
	$shikaku = (array)cr_user_get_meta("sc_shikaku", $user->ID, MyScoutsiteConfig::$shikaku[$_shikaku], false);
if (!empty($sc_user->ID) && !empty($sc_target_user->ID)) {
	if ($thread_id = my_scout_get_mail_thread($sc_user->ID,$sc_target_user->ID, false)) {
		$target_thread_key = get_post_meta($thread_id, "thread_key", true);
		
		$thread_url = add_query_arg(
					array('user_id' => $sc_target_user->ID,
							"key" => $target_thread_key), 
					sc_get_page_link("page.mail_box_detail") ); 
	}
}
?>
<div class="user_detail reset_list mb50">
	<h2><?php echo h($display_name); ?> さんの基本情報</h2>
	<div class="box"><table class="maintable fixed_table">
		<tr>
			<th>生年月日・年齢</th>
			<td colspan="3"><?php
				if (!empty($date)) {
					echo h($date);
					if (!empty($age))
						echo ' ('.h($age).') ';
				} else if (!empty($age)) {
					echo h($age);
				}
			?></td>
		</tr>
		<tr>
			<th>性別</th>
			<td><?php
				echo h(cr_user_get_meta("sc_gender", $user->ID, MyScoutsiteConfig::$genders));
			?></td>
			<th>居住地域</th>
			<td><?php
				echo h(cr_user_get_meta("sc_residence", $user->ID));
			?></td>
			<!--
			<th>最終学歴</th>
			<td><?php
				echo h(join(" ", $sc_last_school)); 
			?></td>
			-->
		</tr>
		<tr>
			<th>保有資格</th>
			<td><?php
				echo h(join("、", $shikaku));
			?></td>
			<th>現在の状況</th>
			<td><?php
				echo h(cr_user_get_meta("sc_joukyou", $user->ID, MyScoutsiteConfig::$joukyou));
			?></td>
		</tr>
	</table></div>
</div>
<div class="user_detail reset_list mb50">
	<h2><?php echo h($display_name); ?> さんの職歴</h2>
<?php 
for ($i=1;$i<=3; $i++) : 
	$_key = "sc_experience$i";
	
	$_kikan = cr_user_get_meta($_key."_kikan", $user->ID);
	$_employee_type = cr_user_get_meta($_key."_employee_type", $user->ID, MyScoutsiteConfig::$employee_types);
	
	// industry
	$_terms = get_terms( "industry", array(
		'hide_empty'    => false, 
	));
	$_industries = array();
	foreach($_terms as $_term) {
		$_industries[$_term->term_id] = $_term->name;
	}
	
	$_industry = cr_user_get_meta($_key."_industry", $user->ID ,$_industries, false);

	// job_category
	$_terms = get_terms( "job_category", array(
		'hide_empty'    => false, 
	));
	$_job_categories = array();
	foreach($_terms as $_term) {
		$_job_categories[$_term->term_id] = $_term->name;
	}
	
	$_job_category = cr_user_get_meta($_key."_job_category", $user->ID ,$_job_categories, false);
	
	$_detail = cr_user_get_meta($_key."_detail", $user->ID);
	
	if (empty($_kikan) && empty($_employee_type) && empty($_industry) && 
		empty($_job_category) && empty($_detail))
	{
		continue;
	}
?>
	<div class="box mb20"><table class="maintable fixed_table">
		<tr>
			<th rowspan="3" class="no"><?php echo $i; ?>.</th>
			
			<th>勤務期間</th>
			<td><?php echo h($_kikan); ?></td>
			<th>雇用形態</th>
			<td><?php echo h($_employee_type); ?></td>
		</tr>
		<tr>
			<th>業種</th>
			<td><?php echo join("、",(array)$_industry); ?></td>
			<th>職種</th>
			<td><?php echo join("、",(array)$_job_category); ?></td>
		</tr>
		<tr>
			<th>職務内容</th>
			<td colspan="3"><?php echo nl2br(h($_detail)); ?></td>
		</tr>
	</table></div>
<?php
endfor; 
?>

</div>
<div class="user_detail reset_list mb50">
	<h2><?php echo h($display_name); ?> さんの希望条件</h2>
	<div class="box"><table class="maintable fixed_table">
		<tr>
			<th>希望条件</th>
			<td><?php
				echo h(cr_user_get_meta("sc_kibou", $user->ID));
			?></td>
		</tr>
		<tr>
			<th>希望雇用形態</th>
			<td><?php
				$values = (array)cr_user_get_meta("sc_kibou_employee_type", $user->ID, 
								MyScoutsiteConfig::$kibou_employee_types, false);
				echo h(join("、", $values));
			?></td>
		</tr>
		<!--
		<tr>
			<th>業種</th>
			<td>飲食業</td>
		</tr>
		-->
	</table></div>
</div>
<?php
$_title = h($display_name)."さんへアプローチする";
$_submit = "アプローチメールを送信する";
include dirname(__FILE__)."/user.mailform.php";
?>
