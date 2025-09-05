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
		<table class="maintable"><tbody>
			<?php
			foreach(array(
				//"type"=>"職種","address"=>"勤務地","employment_type"=>"雇用形態","salary"=>"給与"
				"type_detail"=>"職種","address"=>"勤務地","employment_type"=>"雇用形態","salary"=>"給与"
			)
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
	<div class="detail">
		<a href="<?php the_permalink(); ?>"><div class="in">詳しく見る</div></a>
	</div>
	<div class="entry">
		<a href="<?php the_permalink(); ?>#entry_form"><div class="in">今すぐ応募</div></a>
	</div>
</div></li>