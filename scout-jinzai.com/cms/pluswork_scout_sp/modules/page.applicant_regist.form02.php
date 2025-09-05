<?php
global $ScForm;
?>
<form action="<?php echo sc_get_page_link("page.applicant_regist"); ?>" method="post">
	<input type="hidden" name="sc_page" value="3" />
	
<div class="reset_list contact_form mb50">
	<h2>詳細情報</h2>
	<p>詳細に情報を入力いただくことで採用担当者の目に触れやすくなりますので、出来るだけ入力頂くことをおすすめします。<br />※入力しなくても大丈夫です。</p>

	<div class="box mb20"><table class="maintable fixed_table">
		<tr>
			<th>現在の状況</th>
			<td><?php 
					echo sc_form_radio('my_userdata[sc_joukyou]', MyScoutsiteConfig::$joukyou,
										$ScForm->get_value("sc_joukyou")  ); 
				?></td>
		</tr>
	</table></div>
	<div class="box mb20">
	<?php for($i=1;$i<=3;$i++): 
			$_key = sprintf("sc_experience%02d", $i);
	?>
		<table class="maintable fixed_table " <?php if ($i > 1) echo ' style="margin-top: 10px;" '; ?>>
			<tr>
				<th class="no" rowspan="4">職歴<?php echo $i; ?>.</th>
				<th>業種・職種</th>
				<td><?php 
						echo sc_form_radio('my_userdata['.$_key.'_gyoushu]', 
											array("介護"=>"介護","その他"=>"その他"),
											$ScForm->get_value($_key."_gyoushu")  ); 
					?></td>
			</tr>
			<tr>
				<th>職務内容</th>
				<td><textarea name="data[<?php echo $_key; ?>_detail]" placeholder="例：特別養護老人ホームでの介護"><?php 
					echo h($ScForm->get_value($_key."_detail")); 
				?></textarea></td>
			</tr>
			<tr>
				<th>勤務期間</th>
				<td><input type="text" name="data[<?php echo $_key; ?>_kikan]" value="<?php echo h($ScForm->get_value($_key."_kikan")); ?>" placeholder="0年0ヶ月、約何年など" /></td>
			</tr>
			<tr>
				<th>雇用形態</th>
				<td><?php 
						echo sc_form_radio('my_userdata['.$_key.'_employee_type]', 
											MyScoutsiteConfig::$employee_types,
											$ScForm->get_value($_key."_employee_type")  ); 
					?></td>
			</tr>

		</table>
	<?php endfor; ?>
	</div>
	<div class="box"><table class="maintable fixed_table">

		<tr>
			<th>希望条件</th>
			<td><textarea name="data[sc_kibou]" placeholder="日勤帯希望
夜勤帯希望
土日休み希望など"><?php echo h($ScForm->get_value("sc_kibou")); ?></textarea></td>
		</tr>


	</table></div>
	
	<div class="submit btn btn01">
		<button type="submit">入力内容を確認する</button>
	</div>
	<!--<div class="back">
		<a href="<?php echo sc_get_page_link("page.applicant_regist"); ?>?sc_page=1&back=1">前の画面へ戻る</a>
	</div>-->
</div>

</form>
