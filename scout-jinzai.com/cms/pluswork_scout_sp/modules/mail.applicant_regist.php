<?php
global $ScForm;
?>
会員登録フォームからデータ送信がありました。

■基本情報
・お名前：<?php echo $ScForm->get_text("sc_name",array("raw"=>true)); ?>	
・年齢：<?php echo $ScForm->get_text("sc_age",array("raw"=>true)); ?>	
・性別：<?php echo $ScForm->get_text("sc_gender", array("values" => MyScoutsiteConfig::$genders, "raw"=>true)); ?>	
・居住地域：<?php echo $ScForm->get_text("sc_residence",array("raw"=>true)); ?>	
・保有資格：<?php echo $ScForm->get_text("sc_shikaku", array("values" => MyScoutsiteConfig::$shikaku, "raw"=>true)); ?>	
・メールアドレス：<?php echo $ScForm->get_text("email",array("raw"=>true)); ?>	
・希望条件：<?php echo $ScForm->get_text("sc_kibou",array("raw"=>true)); ?>	

■就業状況
・現在の状況：<?php echo $ScForm->get_text("sc_joukyou", array("values" => MyScoutsiteConfig::$joukyou, "raw"=>true)); ?>	
<?php for($i=1;$i<=3;$i++): 
		$_key = sprintf("sc_experience%02d", $i);
?>
・職歴<?php echo $i; ?>	
　・業種・職種：<?php echo $ScForm->get_text($_key."_gyoushu", 
									array("values" => array("介護"=>"介護","その他"=>"その他"),
											"raw"=>true)); ?>	
　・職務内容：<?php echo $ScForm->get_text($_key."_detail",array("raw"=>true)); ?>	
　・勤務期間：<?php echo $ScForm->get_text($_key."_kikan",array("raw"=>true)); ?>	
　・雇用形態：<?php echo $ScForm->get_text($_key."_employee_type", 
									array("values" => MyScoutsiteConfig::$employee_types,
												"raw"=>true)); ?>	
<?php endfor; ?>

-------------------
<?php echo sc_get_option("company_name"); ?>