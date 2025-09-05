<?php
$Job = CR_Job();
if (is_post_type_archive()) {
	global $wp_query;
	$Job->query = $wp_query;
} else  {
	$Job->query();
}
if (! $Job->have_posts())
	return;
$Job->fetch();

?>
<div class="job_list">
	<h2>現在募集中のお仕事</h2>
	<div class="modified">
		&gt; 更新日：<?php echo $Job->modified('Y年n月j日'); ?>
	</div>
	<ul>
	<?php
	//while($Job->fetch()):
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
			<div class="inner cl">
				<div class="image"><a href="<?php the_permalink(); ?>" class="op"><?php 
					if ($image = $Job->get_image("image01"))
						echo $image;
				?></a></div>
				<div class="table">
					<table><tbody>
					<?php
					foreach(array("type"=>"職種","address"=>"勤務地","employment_type"=>"雇用形態","salary"=>"給与")
							as $_key => $_str):
					?>
						<tr>
							<th><?php echo $_str; ?></th>
							<td><?php echo $Job->get_field($_key, 48); ?></td>
						</tr>
					<?php
					endforeach;
					?>
					</tbody></table>
				</div>
			</div>
			<div class="entry_btns">
				<ul class="cl">
					<li><a href="<?php the_permalink(); ?>" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_list_detail_btn.png" alt="詳細を見る" /></a></li>
					<li><a href="<?php echo get_page_link(26); ?>?j=<?php echo get_the_ID(); ?>" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_list_entry_btn.png" alt="今すぐ応募する" /></a></li>
					
					
				</ul>
			</div>
		</li>
	<?php 
	// endwhile;
	} while($Job->fetch());

	?>
	</ul>
</div>

<?php
$Job->pagination();
?>