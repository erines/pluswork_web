<?php
/**
 * ウィジェット-スライダー用テンプレート
 */
global $wp_the_query;
$stylesheet_uri = get_stylesheet_directory_uri();

$more_link = get_post_type_archive_link("item");
$more_link = add_query_arg(urlencode_deep($_GET), $more_link);
$more_link = add_query_arg(array(
	"recommend_posts" => 1,
	"orderby"         => "recommend",
	"order"           => "desc",
), $more_link);
?>

<section class="widget widget-slider reset">
	<div class="contents-wrapper">
		<strong class="title">
			<span><i class="material-icons">&#xE8D0;</i>この求人を見た人はこんな求人もチェックしています</span>
        </strong>
		<a href="<?php echo esc_attr($more_link); ?>" class="more"><span class="after-arrow">おすすめ求人をもっと見る</span></a>
		<div class="clear"></div>

		<div class="inner">
			<ul class="job-slider">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
					$detail_link = add_query_arg(urlencode_deep($_GET), get_the_permalink(get_the_ID()));

					$days  = 7; //Newを表示させたい期間の日数
					$today = date_i18n('U');
					$entry = get_the_time('U');
					$kiji  = date('U', ( $today - $entry )) / 86400;
					?>
					<li id="job-<?php the_ID(); ?>" <?php post_class('left block'); ?>>
						<a href="<?php echo $detail_link; ?>">
							<figure class="job-img relative">
								<?php if (has_post_thumbnail()) : ?>
									<?php the_post_thumbnail(array(190, 190, true), array("alt" => get_the_title() . " イメージ")); ?>
								<?php elseif (is_crawler()): ?>
									<img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_img_l.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ">
								<?php else:?>
									<img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_img_l.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ">
								<?php endif; ?>
							</figure>
							<p class="job-title anime">
								<?php
									if(mb_strlen( get_the_title() ) > 42){
										$title = mb_substr( get_the_title(), 0, 42);
										echo $title.'･･･';
									}else{
										echo get_the_title();
									}
								?>
							</p>
							<span class="job-detail block">
								<span class="ellipsis">
									<?php if ( $area = get_field("就業場所") ) : ?>
										<em><?php echo strip_tags($area); ?></em>
									<?php endif; ?>
								</span>
								<?php if ( $detail = get_field("賃金") ) : ?>
									<span class="ellipsis">
										<?php echo strip_tags($detail); ?>
									</span>
								<?php endif; ?>
							</span>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
</section>

<script>
	jQuery(function ($) {

		//スライダー
		var $recommend_slider = $(".job-slider").fadeIn(700, "easeOutQuart");

		if ($recommend_slider.children().length > 5) {
			$recommend_slider.bxSlider({
				minSlides  : 5,
				maxSlides  : 5,
				moveSlides : 1,
				slideWidth : 184,
				slideMargin: 15
			});
		}

	});
</script>