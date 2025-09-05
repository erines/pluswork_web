<?php get_header(); ?>
	<div id="main">
	<?php 
		if (have_posts()) : 
			while (have_posts()) : the_post(); 
	?>
<?php
$Job = CR_Job();
$types = $Job->getTypes(false);
$tags = $Job->getTags(true);



?>
		<div class="job_detail">
			<h2><?php the_title();?></h2>

			<?php if ($image = $Job->get_image("image01")): ?>
				<div class="job_image"><?php 
					if ($image = $Job->get_image("image01"))
						echo $image;
				?></div>
				<?php if ($text = $Job->get_field("image01_text")): ?>
					<div class="job_image_text"><?php echo nl2br(htmlspecialchars($text)); ?></div>
				<?php endif; ?>
			<?php endif; ?>
			<div class="title">
				<div class="modified">更新日：<?php echo $Job->modified('Y年n月j日'); ?></div>
				<div class="types"><?php
					$_types = array();
					foreach($types as $_type) {
						if (!empty($_type->name))
							$_types[] = sprintf('【%s】',$_type->name);
					}
					echo join("", $_types);
				?></div>
				<div class="tags"><!--
					--><ul class="cl"><!--
					<?php foreach($tags as $tag): ?>
						--><li><?php echo htmlspecialchars($tag); ?></li><!--
					<?php endforeach; ?>
					--></ul><!--
				--></div>
			</div>
			<!--
			<div class="nav">
				<div class="btns btns2">
					<ul class="cl">
						<li><a href="#entry_form"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nav01_01.png" alt="WEB応募" class="responsive" /></a></li>
						<li><a href="tel:"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nav01_02.png" alt="TEL応募" class="responsive" /></a></li>
					</ul>
				</div>
			</div>
			-->
			<!--<h2><?php the_title();?></h2>-->
			<!--<h4>PRポイント</h4>-->
			<?php if ($_tmp = $Job->get_field("catchcopy")) : ?>
				<div class="catchcopy"><?php echo nl2br(htmlspecialchars($_tmp, ENT_QUOTES)); ?></div>
			<?php endif; ?>
			<div class="pr"><?php echo $Job->get_field("pr",-1,false); // echo nl2br(htmlspecialchars($Job->get_field("pr"), ENT_QUOTES)); ?></div>
<?php
	$images = array();
	for($i=1;$i<=8;$i++) {
		if ($image = $Job->get_image(sprintf("image_sub%02d", $i))) {
			$text = $Job->get_field(sprintf("image_sub%02d", $i)."_text");
			$images[] = array(
				"image" => $image,
				"text" => $text, 
			);
		}
	}
	if (!empty($images)):
?>
			<div class="imagelist images">
				<div class="list swiper-container" data-children-same-height=".text">
					<ul class="cl swiper-wrapper">
					<?php foreach($images as $image): ?>
						<li class="swiper-slide">
							<div class="image"><?php  echo $image["image"]; ?></div>
							<div class="text"><?php  echo nl2br(htmlspecialchars($image["text"])); ?></div>
						</li>
					<?php endforeach; ?>
					</ul>
					
					<div class="swiper-pagination"></div>
				</div>
			</div>
<?php endif; ?>

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
			<div class="detail">
				<h3>募集要項</h3>
				<div class="inner">
					<dl>
<?php
		foreach($list  as $_name => $_value):
?>
							<dt><?php echo $_name; ?></dt>
							<dd><?php echo nl2br(htmlspecialchars($_value,ENT_QUOTES)); ?></dd>
<?php
		endforeach;
?>				
					</dl>
				</div>
			</div>
<?php
	endif;
?>
<?php
$image = $Job->get_image("senpai_image01");
$text = $Job->get_field("senpai_text01");
if (!empty($image) || !empty($text)):
?>
		<h3>先輩インタビュー</h3>
		<?php if (!empty($image)): ?>
			<div class="mlr mb08p"><?php  echo $image; ?></div>
		<?php endif; ?>
		<?php if (!empty($text)): ?>
			<div class="mlr mb08p"><?php echo nl2br(htmlspecialchars($text)); ?></div>
		<?php endif; ?>
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
			<div class="detail">
				<h3>所在地・アクセス</h3>
				<div class="inner">
					<dl>
<?php if ($_place): ?>
						<dt>勤務地</dt>
						<dd><?php echo nl2br(htmlspecialchars($_place, ENT_QUOTES)); ?></dd>
<?php endif; ?>
<?php if ($_address): ?>
						<dt>所在地</dt>
						<dd><?php echo nl2br(htmlspecialchars($_address, ENT_QUOTES)); ?></dd>
<?php endif; ?>
<?php if ($_access): ?>
						<dt>アクセス</dt>
						<dd><?php echo nl2br(htmlspecialchars($_access, ENT_QUOTES)); ?></dd>
<?php endif; ?>
					</dl>
					
					<div class="gmap"><?php
						$_show = get_field("address_map__show");
						$_map_data = get_field("address_map");
						if ($_show && !empty($_map_data)) {
							echo do_shortcode(
								sprintf('[map addr="%s" lat="%s" lng="%s" width="100%%" height="272px" is_static="true"]', 
										htmlspecialchars(str_replace("\n","",$_map_data["address"])) ,
										htmlspecialchars($_map_data["lat"]) ,
										htmlspecialchars($_map_data["lng"]) 
										
										));
						} else {
							if ($_address) {
								echo do_shortcode(
									sprintf('[map addr="%s" width="100%%" height="272px" is_static="true"]', 
											htmlspecialchars(str_replace("\n","",$_address))));
							}
						}
					?></div>
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
			<div class="detail">
				<h3>企業情報</h3>
				<div class="inner">
					<dl>
<?php
		foreach($list  as $_name => $_value):
?>
							<dt><?php echo $_name; ?></dt>
							<dd><?php echo nl2br(htmlspecialchars($_value,ENT_QUOTES)); ?></dd>
<?php
		endforeach;
?>				
					</dl>
				</div>
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
			<div class="detail">
				<h3>応募方法</h3>
				<div class="inner">
					<dl>
<?php
		foreach($list  as $_name => $_value):
?>
							<dt><?php echo $_name; ?></dt>
							<dd><?php echo nl2br(htmlspecialchars($_value,ENT_QUOTES)); ?></dd>
<?php
		endforeach;
?>				
					</dl>
				</div>
			</div>
<?php
	endif;
?>
			<!--
			<div class="detail">
				<h3>応募方法</h3>
				<div class="inner">
					<dl>
						<dt>応募</dt>
						<dd>まずは、ホームページ内の専用フォーム<br />もしくはお電話にて、ご応募下さい</dd>
						
						<dt>説明会/面接</dt>
						<dd>応募完了後、<br />担当者より折返しのご連絡をさせて頂きます。<br />日程調整の上、面接を行います。</dd>
						
						<dt>内定／就職開始</dt>
						<dd>希望するお仕事と、条件が合えば、内定となります。<br />入社日の調整、手続きを行い、初出勤となります。</dd>
					</dl>
				</div>
			</div>
			-->
			<?php get_template_part( '_job_recommend' ); ?>
		</div>
		<?php 
		
		//echo do_shortcode('[mwform_formkey key="21"]'); 
		get_template_part( '_entry_form' ); 
		?>
			<?php endwhile; ?>
	<?php endif; ?>
	</div>

<?php get_footer(); ?>


