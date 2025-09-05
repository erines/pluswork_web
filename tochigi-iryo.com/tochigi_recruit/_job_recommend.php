<?php

$Job = CR_Job();
if (! $Job->queryRecommend(10)) 
	return ;

if (! $Job->have_posts())
	return;
?>
<div class="recommend">
	<h4>この求人を見た人はこんな求人もチェックしています。</h4>
	<div class="inner swiper-container">
		<ul class="cl swiper-wrapper">
	<?php
	while($Job->fetch()):
		$types = $Job->getTypes(false);
		
		$_types = array();
		foreach($types as $_type) {
			if (!empty($_type->name))
				$_types[] = $_type->name;
		}
		
	?>
			<li class="swiper-slide">
				<div class="image"><a href="<?php the_permalink(); ?>" class="op"><?php 
					if ($image = $Job->get_image("image01"))
						echo $image;
				?></a></div>
				<div class="title"><a href="<?php the_permalink(); ?>"><?php 
					echo $Job->strip(get_the_title(), 40); 
				?></a></div>
				<div class="text"><?php echo strip_tags($Job->get_field("pr", 64)); ?></div>
			</li>
	<?php
	endwhile;
	?>
		</ul>
		
	</div>
	<div class="prev"><a href="javascript: void(0);" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/recommend_nav_prev.png" alt="" /></a></div>
	<div class="next"><a href="javascript: void(0);" class="op"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/recommend_nav_next.png" alt="" /></a></div>
</div>