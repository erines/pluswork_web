<?php
$Job = CR_Job();
if (! $Job->queryRecommend(2)) 
	return ;

//if (! $Job->have_posts())
//	return;
?>
<div class="joblist recommend">
	<div class="recommend_title">この求人を見た人は<br />こんな求人もチェックしています。</div>
	<div class="list">
		<ul><?php
			while($Job->fetch()):
				include dirname(__FILE__)."/_joblist_item.php";
			endwhile;
		?></ul>
	</div>
</div>
