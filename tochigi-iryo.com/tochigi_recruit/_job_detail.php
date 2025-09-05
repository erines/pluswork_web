<?php
$Job = CR_Job();
$types = $Job->getTypes(false);
$tags = $Job->getTags(true);

$_types = array();
foreach($types as $_type) {
	if (!empty($_type->name))
		$_types[] = $_type->name;
}

?>
<div class="job_detail">
	<div class="head cl">
		<div class="icons">
			<ul>
				<?php 
				$tmp = array();
				foreach($types as $type): 
					if (!($icon = $Job->getTypeIcon($type,"icon02")))
						if (!($icon = $Job->getTypeIcon($type,"icon01")))
							continue;
					if (!empty($tmp[$icon]))
						continue;
					$tmp[$icon] = true;
				?>
					<li><span><?php echo $icon; ?></span></li>
				<?php 
				endforeach; ?>
				<?php
				if ($Job->isNew()) :
				?>
					<li class="new"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_new_icon.png" alt="NEW" /></span></li>
				<?php
				endif;
				?>
			</ul>
		</div>
		<h3><?php the_title(); ?></h3>
	</div>
	<div class="inner">
		<div class="tags">
			<ul class="cl">
			<?php foreach($tags as $tag): ?>
				<li><?php echo htmlspecialchars($tag); ?></li>
			<?php endforeach; ?>
			</ul>
		</div>
		<div class="modified">
			&gt; 更新日：<?php echo $Job->modified('Y年n月j日'); ?>
		</div>
		<div class="cl">
			<div class="section01">
				<div class="image"><?php 
					if ($image = $Job->get_image("image01"))
						echo $image;
				?></div>
				<div class="text">
					<p><?php echo nl2br(htmlspecialchars($Job->get_field("image01_text"))); ?></p>
				</div>
			</div>
			<div class="section02">
				<h4>PRポイント</h4>
				<?php if ($_tmp = $Job->get_field("catchcopy")) : ?>
					<div class="catchcopy"><?php echo nl2br(htmlspecialchars($_tmp, ENT_QUOTES)); ?></div>
				<?php endif; ?>
				<div class="text"><?php echo $Job->get_field("pr",-1,false);// echo nl2br(htmlspecialchars($Job->get_field("pr"), ENT_QUOTES)); ?></div>
			</div>
		</div>
<?php
	$images = array();
	for($i=1;$i<=8;$i++) {
		if ($image = $Job->get_image(sprintf("image_sub%02d", $i), "job_image_size01")) {
			$text = $Job->get_field(sprintf("image_sub%02d", $i)."_text");
			$images[] = array(
				"image" => $image,
				"text" => $text, 
			);
		}
	}
	if (!empty($images)):
?>

		<div class="images">
			<ul class="cl">
			<?php foreach($images as $image): ?>
				<li>
					<div class="image"><?php  echo $image["image"]; ?></div>
					<div class="text"><?php  echo nl2br(htmlspecialchars($image["text"])); ?></div>
				</li>
			<?php endforeach; ?>
			</ul>
		</div>
<?php
	endif;
?>

<?php
	$_list = array(
		"employment_type" => "雇用形態",
		"salary" => "給与",
		"salary_text" => "給与コメント",
		"taigu" => "待遇",
		"type_detail" => "職種",
		"work_detail" => "仕事内容",
		"requirement" => "求める人材",
		"work_hours" => "勤務時間",
		"holiday" => "休日・休暇",
	);
	$list = array();
	foreach($_list as $_key => $_name) {
		if ($_value = $Job->get_field($_key)) {
			if ($_key == "salary") {
				$list[$_name] = $_value;
				//if ($__value = $Job->get_field("salary_text"))
				//	$list[$_name] .= "\n". $__value;
			} else {
				$list[$_name] = $_value;
			}
			//$list[$_name] = nl2br(htmlspecialchars($list[$_name],ENT_QUOTES);
		}
	}
	if (!empty($list)):
?>
		<div class="section03">
			<h4>募集要項</h4>
			<table class="maintable"><tbody>
<?php
		foreach($list  as $_name => $_value):
?>
						<tr>
							<th><?php echo $_name; ?></th>
							<td><?php echo nl2br(htmlspecialchars($_value, ENT_QUOTES)); ?></td>
						</tr>

<?php
		endforeach;
?>				
			</tbody></table>
		</div>
<?php
	endif;
?>
<?php
$image = $Job->get_image("senpai_image01");
$text = $Job->get_field("senpai_text01");
if (!empty($image) || !empty($text)):
?>
		<h4>先輩インタビュー</h4>
		<div class="cl">
			<div class="section01">
				<div class="image"><?php 
					echo $image;
				?></div>
			</div>
			<div class="section02">
				<div class="text"><?php echo nl2br(htmlspecialchars($text, ENT_QUOTES)); ?></div>
			</div>
		</div>
<?php
endif;
?>
<?php
$_place = $Job->get_field("place");
$_access = $Job->get_field("access");
$_address = array();
for ($i=1;$i<=4;$i++) {
	if ($_tmp = $Job->get_field("address_$i"))
		$_address[] = $_tmp;
}
$_address = join(" ", $_address);
	
if (!empty($_place) || !empty($_access) || !empty($_address)):
?>
		<div class="section04">
			<h4>所在地・アクセス</h4>
			<div class="map" data-address="<?php echo htmlspecialchars($_address, ENT_QUOTES); ?>"><?php
			$_show = get_field("address_map__show");
			$_map_data = get_field("address_map");
			if ($_show && !empty($_map_data)) {
				echo do_shortcode(sprintf('[map addr="%s" lat="%s" lng="%s" width="100%%" height="272px"]', 
							htmlspecialchars(str_replace("\n","",$_map_data["address"])) ,
							htmlspecialchars($_map_data["lat"]) ,
							htmlspecialchars($_map_data["lng"]) 
							
							));
			} else {
				if ($_address) {
					echo do_shortcode(sprintf('[map addr="%s" width="100%%" height="272px"]', 
								htmlspecialchars(str_replace("\n","",$_address))));
				}
			}

			/*	if ($_address = $Job->get_field("address")) {
					echo do_shortcode(sprintf('[map addr="%s" width="100%%" height="272px"]', 
								htmlspecialchars(str_replace("\n","",$_address))));
				} */
			?></div>
			<div class="workplace">
				<div class="title">
					<div class="subtitle">勤務地</div>
					<div class="text"><?php echo nl2br(htmlspecialchars($_place, ENT_QUOTES)); ?>&nbsp;</div>
				</div>
				<div class="in">
<?php if ($_address): ?>
					<div class="place">
						<p>【所在地】<br /><?php echo nl2br(htmlspecialchars($_address, ENT_QUOTES)); ?></p>
					</div>
<?php endif; ?>
<?php if ($_access): ?>
					<div class="access">
						<p>【アクセス】<br /><?php echo nl2br(htmlspecialchars($_access, ENT_QUOTES)); ?></p>
					</div>
<?php endif; ?>
				</div>
			</div>
		</div>
<?php endif; ?>



<?php
	$_list = array(
		"corporate_name" => "企業名",
		"corporate_place" => "本社所在地",
		"corporate_built" => "設立",
		"corporate_employee" => "従業員数",
		"corporate_capital" => "資本金",
		"corporate_business" => "事業内容",
	);
	$list = array();
	foreach($_list as $_key => $_name) {
		if ($_value = $Job->get_field($_key)) {
			if ($_key == "salary") {
				$list[$_name] = $_value;
				if ($__value = $Job->get_field("salary_text"))
					$list[$_name] .= "\n". $__value;
			} else {
				$list[$_name] = $_value;
			}
			//$list[$_name] = nl2br(htmlspecialchars($list[$_name],ENT_QUOTES);
		}
	}
	if (!empty($list)):
?>
		<div class="section03">
			<h4>企業情報</h4>
			<table class="maintable"><tbody>
<?php
		foreach($list  as $_name => $_value):
?>
						<tr>
							<th><?php echo $_name; ?></th>
							<td><?php echo nl2br(htmlspecialchars($_value, ENT_QUOTES)); ?></td>
						</tr>

<?php
		endforeach;
?>				
			</tbody></table>
		</div>
<?php
	endif;
?>

<?php
	$_list = array(
		"application_flow" => "応募方法",
		"application_contact" => "応募受付後の連絡",
		"application_process" => "選考プロセス",
		"application_message" => "コンサルタントから一言",
	);
	$list = array();
	foreach($_list as $_key => $_name) {
		if ($_value = $Job->get_field($_key)) {
			if ($_key == "salary") {
				$list[$_name] = $_value;
				if ($__value = $Job->get_field("salary_text"))
					$list[$_name] .= "\n". $__value;
			} else {
				$list[$_name] = $_value;
			}
			//$list[$_name] = nl2br(htmlspecialchars($list[$_name],ENT_QUOTES);
		}
	}
	if (!empty($list)):
?>
		<div class="section03">
			<h4>応募方法</h4>
			<table class="maintable"><tbody>
<?php
		foreach($list  as $_name => $_value):
?>
						<tr>
							<th><?php echo $_name; ?></th>
							<td><?php echo nl2br(htmlspecialchars($_value, ENT_QUOTES)); ?></td>
						</tr>

<?php
		endforeach;
?>				
			</tbody></table>
		</div>
<?php
	endif;
?>


	</div>
</div>