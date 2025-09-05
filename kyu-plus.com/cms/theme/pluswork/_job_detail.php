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
					if (!($icon = $Job->getTypeIcon($type)))
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
					<li><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_new_icon.png" alt="NEW" /></span></li>
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
				<div class="title">
					<p><?php the_title(); ?></p>
				</div>
				<div class="text">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
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

		<div class="office_images">
			<h4>職場風景</h4>
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
		<div class="entry_btns">
			<ul class="cl">
				<li><a href="<?php echo get_page_link(26); ?>?j=<?php echo get_the_ID(); ?>" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_detail_entry_btn01.png" alt="この求人に応募する" /></a></li>
				<li><a href="javascript: void(0);" data-tel="0285-24-8115" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_detail_entry_btn02.png" alt="電話でこの求人に応募する" /></a></li>				
			</ul>
		</div>

		<div class="section03">
			<h4>募集要項</h4>
			<table><tbody>
					<?php
					foreach(array("employment_type"=>"雇用形態","salary"=>"給与","type"=>"職種",
							"incentive" => "昇給・賞与","taigu" => "待遇・諸手当",
							"work_detail" => "仕事内容","work_hours"=>"勤務時間",
							"requirement" => "求める人材","holiday"=>"休日・休暇")
							as $_key => $_str):
						if ($s = $Job->get_field($_key)):
					?>
						<tr>
							<th><?php echo $_str; ?></th>
							<td><?php echo nl2br(htmlspecialchars($s, ENT_QUOTES)); ?></td>
						</tr>
					<?php
						endif;
					endforeach;
					?>
			</tbody></table>
		</div>
		
		<div class="section04">
			<h4>勤務地</h4>
			<div class="map" data-address="<?php echo htmlspecialchars($Job->get_field("address"), ENT_QUOTES); ?>"><?php
			$_show = get_field("address_map__show");
			$_map_data = get_field("address_map");
			if ($_show && !empty($_map_data)) {
				echo do_shortcode(sprintf('[map addr="%s" lat="%s" lng="%s" width="100%%" height="272px"]', 
							htmlspecialchars(str_replace("\n","",$_map_data["address"])) ,
							htmlspecialchars($_map_data["lat"]) ,
							htmlspecialchars($_map_data["lng"]) 
							
							));
			} else {
				if ($_address = $Job->get_field("address")) {
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
					<div class="text"><?php echo nl2br(htmlspecialchars($Job->get_field("place"), ENT_QUOTES)); ?>&nbsp;</div>
				</div>
				<div class="in">
					<div class="place">
						<p>【所在地】<br /><?php echo nl2br(htmlspecialchars($Job->get_field("address"), ENT_QUOTES)); ?></p>
					</div>
					<div class="access">
						<p>【アクセス】<br /><?php echo nl2br(htmlspecialchars($Job->get_field("traffic"), ENT_QUOTES)); ?></p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="entry_btns">
			<ul class="cl">
				<li><a href="<?php echo get_page_link(26); ?>?j=<?php echo get_the_ID(); ?>" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_detail_entry_btn01.png" alt="この求人に応募する" /></a></li>
				<li><a href="javascript: void(0);" data-tel="0285-24-8115" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_detail_entry_btn02.png" alt="電話でこの求人に応募する" /></a></li>	
			</ul>
		</div>
	</div>
</div>