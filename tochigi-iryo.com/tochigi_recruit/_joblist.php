<?php
$Job = CR_Job();
if (is_post_type_archive()) {
	global $wp_query;
	$Job->query = $wp_query;
} else  {
	$Job->query();
}
if (! $Job->have_posts()) {
	echo '<div class="job_list" style="height: 400px;">';
	echo '<div class="job_head"><h3>現在募集中のお仕事</h3></div>';
	echo '<p>該当する求人はありませんでした。</p>';
	echo '</div>';
	return;
}

$Job->fetch();
?>
<div class="job_list">
	<div class="job_head">
		<h3>現在募集中のお仕事はこちら！</h3>
		<div class="modified">
			最終更新日：<?php echo $Job->modified('Y年n月j日'); ?>
		</div>
	</div>
	<ul>
	<?php
	do {
		$types = $Job->getTypes(false);
		
		$_types = array();
		foreach($types as $_type) {
			if (!empty($_type->name))
				$_types[] = $_type->name;
		}
		
	?>
		<li>
			<div class="head cl">
				<div class="icons">
					<ul>
					<?php 
					$tmp = array();
					foreach($types as $type): 
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
						<li class="new"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_new_icon.png" alt="NEW" width="45" height="35" /></span></li>
					<?php
					endif;
					?>
					</ul>
				</div>
				<h3><?php the_title(); ?></h3>
			</div>
			<div class="inner cl">
				<div class="image"><a href="<?php the_permalink(); ?>" class="op"><?php 
					if ($image = $Job->get_image("image01","job_image01",array("max_width" => 272)))
						echo $image;
				?></a></div>
				<div class="table">
					<table class="maintable"><tbody>
					<?php
					foreach(array("type_detail"=>"職種","address"=>"勤務地","employment_type"=>"雇用形態","salary"=>"給与")
							as $_key => $_str):
					?>
						<tr>
							<th><?php echo $_str; ?></th>
							<td><?php 
								if ($_key == "address") {
									//$_place = $Job->get_field("place");
									//$_access = $Job->get_field("access");
									$_address = array();
									for ($i=1;$i<=4;$i++) {
										if ($_tmp = $Job->get_field("address_$i"))
											$_address[] = $_tmp;
									}
									$_address = join(" ", $_address);
									echo $_address;
								} else {
									echo $Job->get_field($_key, 48);
								}
							?></td>
						</tr>
					<?php
					endforeach;
					?>
					</tbody></table>
				</div>
			</div>
			<div class="entry_btns">
				<ul class="cl">
					<li class="detail_btn"><a href="<?php the_permalink(); ?>" class="op"><div class="in">詳細を見る</div></a></li>
					<li class="entry_btn"><a href="<?php echo home_url("/entry"); ?>?j=<?php echo get_the_ID(); ?>" class="op"><div class="in">今すぐ応募する</div></a></li>
				</ul>
			</div>
		</li>
	<?php 
	} while($Job->fetch());
	?>
	</ul>
</div>

<?php
$Job->pagination();
?>