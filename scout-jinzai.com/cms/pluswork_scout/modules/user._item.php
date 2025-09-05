<?php
	// $user 
	// $last_approach_dt
		
	$date = cr_user_get_meta("sc_birthday", $user->ID);
	$age = cr_user_get_meta("sc_age", $user->ID);
	
	if (empty($age) && !empty($date))
		$age = culc_age($date, '%d歳');
	
	$gender = cr_user_get_meta("sc_gender", $user->ID, MyScoutsiteConfig::$genders);
	if ($gender != '男性' && $gender != "女性")
		$gender = null;
	
	$residence = cr_user_get_meta("sc_residence", $user->ID);
	
	// 最終学歴
	$sc_last_school = array();
	/*
	if ($sc_last_school_y = cr_user_get_meta("sc_last_school_y", $user->ID))
		$sc_last_school[] = sprintf('%d年', $sc_last_school_y);

	if ($sc_last_school_name = cr_user_get_meta("sc_last_school_name", $user->ID))
		$sc_last_school[] = $sc_last_school_name;
		
	if ($sc_last_school_graduate = cr_user_get_meta("sc_last_school_graduate", $user->ID))
		$sc_last_school[] = $sc_last_school_graduate;
		*/
	// 資格
	$shikaku = (array)cr_user_get_meta("sc_shikaku", $user->ID,MyScoutsiteConfig::$shikaku,false);
	/* foreach($shikaku as $_shikaku) {
		$_shikaku = MyScoutsiteConfig::$shikaku[$_shikaku];
	} */
?>

<li><a href="<?php 
	echo add_query_arg(array("user_id"=>$user->ID),
					sc_get_page_link("page.applicant_detail")); 
?>" class="box">
	<div class="name"><i class="material-icons">&#xE421;</i><?php 
				echo h($user->data->display_name); 
	?>さん</div>
	<div class="search_data"><ul class="cl">
		<?php if (!empty($age) || !empty($gender)): ?>
			<li><i class="material-icons">&#xE7FD;</i><?php 
				echo $age, ($age && $gender ? " " : ""), $gender;
			?></li>
		<?php endif; ?>
		<?php if (!empty($residence)): ?>
			<li><i class="material-icons">&#xE55F;</i><?php
				echo h($residence);
			?></li>
		<?php endif; ?>
		<?php if (!empty($sc_last_school)): ?>
			<li><i class="material-icons">&#xE80C;</i><?php
				echo h(join(" ", $sc_last_school)); 
			?></li>
		<?php endif; ?>
	</ul></div>
	<div class="search_tags"><ul class="cl">
	<?php if (!empty($shikaku )): ?>
		<?php foreach($shikaku as $_shikaku): ?>
			<li><?php echo h($_shikaku); ?></li>
		<?php endforeach; ?>
	<?php endif; ?>
	</ul></div>
	<?php if ($last_approach_dt): ?>
		<div class="last_approach">最終アプローチ：<?php echo $last_approach_dt; ?></div>
	<?php endif; ?>
</a></li>
