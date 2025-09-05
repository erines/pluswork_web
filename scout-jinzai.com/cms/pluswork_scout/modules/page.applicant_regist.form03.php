<?php
global $ScForm;
?>
<form action="<?php echo sc_get_page_link("page.applicant_regist"); ?>" method="post">
	<input type="hidden" name="sc_page" value="4" />

<div class="reset_list contact_form contact_form_confirm mb50">
	<p>下記、あなたが入力した情報について間違いがないかご確認ください。<br />「登録」ボタンをクリックするとあなたの入力した情報が登録されます。</p>
	
	<h2>基本情報</h2>

	<div class="box mb20"><table class="maintable fixed_table">
		<tr class="required">
			<th>お名前</th>
			<td><?php 
				echo $ScForm->get_text("sc_name"); 
			?></td>
		</tr>
		<tr>
			<th>年齢</th>
			<td><?php 
				echo $ScForm->get_text("sc_age"); 
			?></td>
		</tr>
		<tr>
			<th>性別</th>
			<td><?php echo $ScForm->get_text("sc_gender", array("values" => MyScoutsiteConfig::$genders)); ?></td>
		</tr>
		<tr class="required">
			<th>居住地域</th>
			<td><?php echo $ScForm->get_text("sc_residence"); ?></td>
		</tr>
		<tr class="required">
			<th>保有資格</th>
			<td><?php 
				echo $ScForm->get_text("sc_shikaku", array("values" => MyScoutsiteConfig::$shikaku)); 
			?></td>
		</tr>
		<tr class="required">
			<th>メールアドレス</th>
			<td><?php echo $ScForm->get_text("email"); ?></td>
		</tr>
		<tr>
			<th>希望条件</th>
			<td><?php echo $ScForm->get_text("sc_kibou"); ?></td>
		</tr>


	</table></div>
<?php if (empty($_GET["skip"])): ?>
	<h2>就業状況</h2>

	<div class="box mb20"><table class="maintable fixed_table">
		<tr>
			<th>現在の状況</th>
			<td><?php 
				echo $ScForm->get_text("sc_joukyou", array("values" => MyScoutsiteConfig::$joukyou)); 
			?></td>
		</tr>
		<tr>
			<th>最終学歴</th>
			<td><?php echo $ScForm->get_text("sc_last_school_name"); ?></td>
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
				<td><?php echo $ScForm->get_text($_key."_gyoushu", 
									array("values" => array("介護"=>"介護","その他"=>"その他"))); 
				?></td>
			</tr>
			<tr>
				<th>職務内容</th>
				<td><?php echo $ScForm->get_text($_key."_detail"); ?></td>
			</tr>
			<tr>
				<th>勤務期間</th>
				<td><?php echo $ScForm->get_text($_key."_kikan"); ?></td>
			</tr>
			<tr>
				<th>雇用形態</th>
				<td><?php echo $ScForm->get_text($_key."_employee_type", 
									array("values" => MyScoutsiteConfig::$employee_types)); 
				?></td>
			</tr>

		</table>
	<?php endfor; ?>
	</div>
<?php endif; ?>
	<div class="submit btn btn01">
		<button type="submit">この内容で登録する</button>
	</div>
</div>

</form>
