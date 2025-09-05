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
			<div class="nav">
				<div class="btns btns2">
					<ul class="cl">
						<li><a href="#entry_form"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nav01_01.png" alt="WEB応募" class="responsive" /></a></li>
						<li><a href="tel:0285248115"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nav01_02.png" alt="TEL応募" class="responsive" /></a></li>
					</ul>
				</div>
			</div>
			<h2><?php the_title();?></h2>
			<h4>PRポイント</h4>
			<div class="pr"><?php the_content(); ?></div>
<?php
	$images = array();
	for($i=1;$i<=3;$i++) {
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
				<div class="list swiper-container">
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
	$images = array();
	for($i=1;$i<=4;$i++) {
		if ($image = $Job->get_image(sprintf("image_office%02d", $i))) {
			$text = $Job->get_field(sprintf("image_office%02d", $i)."_text");
			$images[] = array(
				"image" => $image,
				"text" => $text, 
			);
		}
	}
	if (!empty($images)):
?>
			<h3>職場風景</h3>
			<div class="imagelist office_images">
				<div class="list swiper-container">
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
			<div class="detail">
				<h3>募集要項</h3>
				<div class="inner">
					<dl>
					<?php
					foreach(array("employment_type"=>"雇用形態","salary"=>"給与","type"=>"職種",
							"incentive" => "昇給・賞与","taigu" => "待遇・諸手当",
							"work_detail" => "仕事内容","work_hours"=>"勤務時間",
							"requirement" => "求める人材","holiday"=>"休日・休暇", "application"=>"応募方法")
							as $_key => $_str):
						if ($s = $Job->get_field($_key)):
					?>
							<dt><?php echo $_str; ?></dt>
							<dd><?php echo nl2br(htmlspecialchars($s, ENT_QUOTES)); ?></dd>
					<?php
						endif;
					endforeach;
					?>
					</dl>
				</div>
			</div>
			
			<div class="detail">
				<h3>勤務地</h3>
				<div class="inner">
					<dl>
						<dt>勤務地</dt>
						<dd><?php echo nl2br(htmlspecialchars($Job->get_field("place"), ENT_QUOTES)); ?></dd>
						
						<dt>アクセス</dt>
						<dd><?php echo nl2br(htmlspecialchars($Job->get_field("traffic"), ENT_QUOTES)); ?></dd>
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
							if ($_address = $Job->get_field("address")) {
								echo do_shortcode(
									sprintf('[map addr="%s" width="100%%" height="272px" is_static="true"]', 
											htmlspecialchars(str_replace("\n","",$_address))));
							}
						}
					?></div>
				</div>
			</div>
			
			<div class="detail">
				<h3>応募方法</h3>
				<div class="inner">
					<dl>
						<dt>応募</dt>
						<dd>まずは、ホームページ内の専用フォーム<br />もしくはお電話にて、ご応募下さい</dd>
						
						<dt>面接</dt>
						<dd>応募完了後、<br />担当者より折返しのご連絡をさせて頂きます。<br />日程調整の上、面接を行います。</dd>
						
						<dt>内定／就職開始</dt>
						<dd>希望するお仕事と、条件が合えば、内定となります。<br />入社日の調整、手続きを行い、初出勤となります。</dd>
					</dl>
				</div>
			</div>
			
			<?php get_template_part( '_job_recommend' ); ?>
		</div>
		<?php get_template_part( '_entry_form' ); ?>
			<?php endwhile; ?>
	<?php endif; ?>
	</div>

<?php get_footer(); ?>


