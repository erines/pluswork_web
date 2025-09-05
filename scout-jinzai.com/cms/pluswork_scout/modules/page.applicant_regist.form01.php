<?php
global $ScForm;
?>
<form action="<?php echo sc_get_page_link("page.applicant_regist"); ?>" method="post">
	<input type="hidden" name="sc_page" value="2" />

<div class="reset_list contact_form mb50">
	<h2>基本情報</h2>
	<p>あなたの基本情報を下記に入力してください。</p>
	<div class="box"><table class="maintable fixed_table">
		<tr class="required">
			<th>お名前</th>
			<td>
				<input type="text" name="data[sc_name]" value="<?php echo h($ScForm->get_value("sc_name")); ?>" />
				<?php echo $ScForm->get_error("sc_name"); ?>
			</td>
		</tr>
		<tr>
			<th>年齢</th>
			<td><input type="text" name="data[sc_age]" value="<?php echo h($ScForm->get_value("sc_age")); ?>" /></td>
		</tr>
		<tr>
			<th>性別</th>
			<td><?php 
					echo sc_form_radio('data[sc_gender]', 
							MyScoutsiteConfig::$genders, $ScForm->get_value("sc_gender") ); 
				?></td>
		</tr>
		<tr class="required">
			<th>居住地域</th>
			<td>
				<?php
					echo sc_form_term_select('data[sc_residence]', 'area' ,$ScForm->get_value("sc_residence") );
				?>
				<?php echo $ScForm->get_error("sc_residence"); ?>
			</td>
		</tr>
		<tr class="required">
			<th>保有資格</th>
			<td><?php 
					echo sc_form_checkboxes('data[sc_shikaku]', 
							MyScoutsiteConfig::$shikaku, $ScForm->get_value("sc_shikaku") ); 
				?><?php echo $ScForm->get_error("sc_shikaku"); ?></td>
		</tr>
		<tr class="required">
			<th>メールアドレス</th>
			<td><input type="text" name="data[email]" value="<?php echo h($ScForm->get_value("email")); ?>" /><?php echo $ScForm->get_error("email"); ?></td>
		</tr>
		<tr>
			<th>希望条件</th>
			<td><textarea name="data[sc_kibou]"><?php echo h($ScForm->get_value("sc_kibou")); ?></textarea></td>
		</tr>
		<tr class="required">
			<th>個人情報の取り扱いについて</th>
			<td>
				<div class="privacy_contents mb20"><?php
					$s =  file_get_contents(dirname(__FILE__)."/privacy.php");
					echo nl2br(h(do_shortcode($s)));
				?></div>
			<?php 
					echo sc_form_radio('data[sc_privacy]', 
							array(1=>"同意する",0=>"同意しない"), $ScForm->get_value("sc_privacy") ); 
				?>
			<?php echo $ScForm->get_error("sc_privacy"); ?>
			</td>
		</tr>


	</table></div>
	
	<div class="submit mb20 cl">
		<div class="btn btn01">
			<button type="submit" name="step3" value="1" >簡単スカウト登録</button>
		</div>
		<div class="center">※以上で登録できます。</div>
	</div>
	<div class="submit cl">
		<div class="btn btn01">
			<button type="submit" name="step2" value="1" >さらに詳しく入力</button>
		</div>
		<div class="center">※採用担当者の目に触れやすくなります。</div>
	</div>
	
	<div class="submit mt20 center">※登録いただいてもしつこい電話やメールをすることはありません</div>
</div>

</form>
