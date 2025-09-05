<?php
/**
 * ウィジェット-「オススメ求人」用テンプレート
 */
global $wp_the_query;
$template_uri   = get_template_directory_uri();
$stylesheet_uri = get_stylesheet_directory_uri();

$more_link = get_post_type_archive_link("item");
$more_link = add_query_arg(urlencode_deep($_GET), $more_link);
$more_link = add_query_arg(array(
	"recommend_posts" => 1,
	"orderby"         => "recommend",
	"order"           => "desc",
), $more_link);
?>

<section class="widget widget-base reset width90">
	<strong class="title alignc">
    	<span>この求人を見た人は<br>こんな求人もチェックしています</span>
    </strong>
    <ul>
         <?php while (have_posts()) : the_post(); ?>
         <?php $detail_link = add_query_arg(urlencode_deep($_GET), get_the_permalink(get_the_ID())); ?>
            <li id="job-<?php the_ID(); ?>" <?php post_class('block box'); ?>>
                <a href="<?php echo $detail_link; ?>" class="block">
                    <figure>
                        <?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail(array(140, 140, true), array("alt" => get_the_title() . " イメージ")); ?>
						<?php elseif (is_crawler()): ?>
							<img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_img_s.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ">
						<?php else:?>
							<img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_img_s.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ">
						<?php endif; ?>
                     </figure>
                     <div class="inner box">
                        <p class="job-title inline">
							<?php
								if(mb_strlen( get_the_title() ) > 34){
									$title = mb_substr( get_the_title(), 0, 34);
									echo $title.'･･･';
								}else{
									echo get_the_title();
								}
							?>
                        </p>
                        
                        <span class="job-detail block">
                        	<span class="ellipsis rating-mark">
								<?php if ( $area = get_field("就業場所") ) : ?>
									<em><?php echo $area; ?></em>
								<?php endif; ?>
							</span>
							<span class="ellipsis">
								<?php if ( $detail = get_field("賃金") ) : ?>
									<?php echo strip_tags($detail); ?>
								<?php endif; ?>
							</span>
                        </span>
                    </div>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
    
    <a href="<?php echo esc_attr($more_link); ?>" class="more">
		おすすめ求人をもっと見る
    	<i class="material-icons">&#xE315;</i>
	</a>
</section>