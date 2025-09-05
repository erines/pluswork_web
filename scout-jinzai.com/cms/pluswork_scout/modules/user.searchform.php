<?php
$query = $_GET;
?>

	
<div class="search_form box mb50"><form action="<?php echo sc_get_page_link("page.applicant_search_result"); ?>" method="get">
	<table class="maintable fixed_table contact_form reset_list">
		<tr>
			<th>フリーワード</th>
			<td>
				<input type="text" name="q" value="<?php echo h($query["q"]); ?>" />
			</td>
		</tr>
		<tr>
			<th>エリア</th>
			<td><div class="term_form"><?php 
					echo sc_form_term_checkboxes_dl('sc_residence',"area", $query["sc_residence"], array("value"=>"name"));
				?></div></td>
		</tr>
		<tr>
			<th>業種</th>
			<td><div class="term_form"><?php 
					echo sc_form_term_checkboxes('industry',"industry", $query["industry"]);
				?></div></td>
		</tr>
		<tr>
			<th>職種</th>
			<td><div class="term_form"><?php 
					echo sc_form_term_checkboxes('job_category',"job_category", $query["job_category"]);
				?></div></td>
		</tr>
		<tr>
			<th>資格</th>
			<td><?php 
					echo sc_form_checkboxes('sc_shikaku', 
							MyScoutsiteConfig::$shikaku, $query["sc_shikaku"] ); 
				?></td>
		</tr>
		<tr>
			<th>希望雇用形態</th>
			<td><?php 
					echo sc_form_checkboxes("employee_type", MyScoutsiteConfig::$kibou_employee_types,$query["employee_type"] ); 
				?></td>
		</tr>
	</table>
	
	<div class="submit">
		<div class="btn btn02">
			<button type="submit"><span class="text"><i class="material-icons">&#xE8B6;</i>検索</span></button>
		</div>
	</div>
</form></div>
