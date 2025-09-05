<li class="cl"><div class="in cl">
	<div class="modified">更新日：<?php echo $Job->modified('Y年n月j日'); ?></div>
	<div class="job_title"><?php
		/* $types = $Job->getTypes(false);
		
		$_types = array();
		foreach($types as $_type) {
			if (!empty($_type->name))
				$_types[] = sprintf('【%s】',$_type->name); 
		}
		echo join("", $_types);
		*/
		echo $Job->strip(get_the_title(), 40); 
	?></div>
	<div class="table">
		<table><tbody>
			<?php
			foreach(array("type"=>"職種","address"=>"勤務地","employment_type"=>"雇用形態","salary"=>"給与")
					as $_key => $_str):
			?>
				<tr>
					<th><?php echo $_str; ?></th>
					<td><?php echo $Job->get_field($_key, 40); ?></td>
				</tr>
			<?php
			endforeach;
			?>
		</tbody></table>
	</div>
	<div class="detail">
		<a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_list_detail_btn.png" alt="詳しく見る" class="responsive" /></a>
	</div>
	<div class="entry">
		<a href="<?php the_permalink(); ?>#entry_form"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/job_list_entry_btn.png" alt="今すぐ応募" class="responsive" /></a>
	</div>
</div></li>