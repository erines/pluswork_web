
<?php
	$categories = get_the_category();
	foreach($categories as $category):
		$related_posts = get_posts(array('category__in' => array($category->cat_ID), 
									'exclude' => $post->ID, 'numberposts' => $post->ID, 'numberposts' => -1));
		if($related_posts): ?>
			<h3 class="mt40"><?php echo $category->cat_name; ?>の最新記事</h3>
			
			<div class="baselist">
			<ul>
			<?php foreach($related_posts as $related_post): ?>
				<li><a href="<?php echo get_permalink($related_post->ID); ?>"><?php echo $related_post->post_title; ?></a></li>
			<?php endforeach; ?>
			</ul>
		</div>	
		<?php endif; 
	endforeach; ?>

