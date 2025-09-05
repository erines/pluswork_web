<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package    WordPress
 * @subpackage Twenty_Ten
 * @since      Twenty Ten 1.0
 */

/*
 * 求人項目の数量取得
 */
$count_items    = wp_count_posts("item");
$count_crawlers = wp_count_posts("crawler");

get_header(); ?>

<!-- メインカラム -->
<div id="contents" class="right">

	<!-- ここから検索 -->
	<div class="search_title" id="search_contents">
		<div class="job_count">栃木県の求人件数
			<span><?php echo number_format_i18n($count_items->publish + $count_crawlers->publish); ?></span>件
		</div>
	</div>

	<div class="search_box">

		<h3>
			<img src="<?php echo get_stylesheet_directory_uri() ?>/img/top/area_map.gif" border="0" alt="エリアからお仕事情報を探せます。宇都宮市、栃木市、足利市、小山市、佐野市、那須塩原市、鹿沼市、日光市、真岡市、大田原市、下野市、さくら市、結城市、筑西市、古河市、下妻市、桜川市、八千代町" usemap="#Map4"/>

		</h3>

		<div class="select_inner">
			<div><img src="<?php echo get_stylesheet_directory_uri() ?>/img/top/search_ctg_ttl.gif" alt="条件を選んで探す"/>
			</div>

			<?php get_template_part("part", "jobsearch"); ?>

		</div><!-- select_inner -->

	</div><!-- search_box -->
	<!-- ここまで検索 -->

	<!-- ここから新着情報 -->
	<div class="news">
		<div class="left"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/top/news_ttl.gif" alt="新着情報"/>
		</div>
		<div class="left">
			<a href="<?php echo site_url("news"); ?>/"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/top/news_more.gif" alt="新着情報をもっと見る" class="alpha"/></a>
		</div>
		<div class="clear">
			<hr/>
		</div>

		<div class="news_inner">
			<?php if ( is_home() || is_front_page() ) : ?>
				<ul class="news_mn">
					<?php
					global $post;
					$args    = array('numberposts' => 5);
					$myposts = get_posts($args);
					foreach ( $myposts as $post ) : setup_postdata($post); ?>
						<li>
							<em><?php the_time("Y.m.d") ?></em>

							<p><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></p>

							<div class="clear">
								<hr/>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

	</div>
	<!-- ここまで新着情報 -->

	<!-- ここからおすすめ求人 -->
	<div class="pickup">
		<strong><img src="<?php echo get_stylesheet_directory_uri() ?>/img/top/recomend_ttl.gif" alt="現在掲載中の求人情報から、おすすめ求人を厳選ピックアップ！"/></strong>
	</div>

	<div class="pickup_box">

		<!-- ↓求人スライド部分 -->

		<div id="sliderwrap">
			<ul class="bxslider">

				<?php
				query_posts(array(
					"post_type"      => "item",
					"r"              => "recommend",
					"posts_per_page" => 5,
				));
				?>

				<?php if ( have_posts() ) : ?>
					<?php get_template_part("loop", "item"); ?>
				<?php endif; ?>

				<?php wp_reset_query(); ?>

			</ul>
		</div>
		<!-- ↑求人スライド部分 -->

	</div>
	<!-- ここまでおすすめ求人 -->

	<div class="alignc">
		<a href="<?php echo esc_url(add_query_arg(array("r" => "normal"), get_post_type_archive_link("item"))); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/top/job_more.gif" alt="求人情報をもっと見る" class="alpha"/></a>
	</div>

	<div class="top_bnr">
		<div class="left">
			<a href="<?php echo site_url("guide"); ?>/"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/top/top_bnr1.jpg" alt="ポイントをおさえて転職を成功させよう！転職ガイドはこちらから" class="alpha"/></a>
		</div>
		<div class="right">
			<a href="<?php echo site_url("info"); ?>/"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/top/top_bnr2.jpg" alt="栃木と介護職転職の情報がいっぱい！お役立ち情報はこちらから" class="alpha"/></a>
		</div>
		<div class="clear">
			<hr/>
		</div>
	</div>

	<map name="Map4" id="Map4">
		<?php $base_url = get_post_type_archive_link("item"); ?>
		<area shape="rect" coords="20,116,121,143" href="<?php echo add_query_arg("locs", urlencode("宇都宮市"), $base_url); ?>" alt="宇都宮市"/>
		<area shape="rect" coords="131,116,234,143" href="<?php echo add_query_arg("locs", urlencode("栃木市"), $base_url); ?>" alt="栃木市"/>
		<area shape="rect" coords="246,116,346,142" href="<?php echo add_query_arg("locs", urlencode("足利市"), $base_url); ?>" alt="足利市"/>
		<area shape="rect" coords="20,155,121,182" href="<?php echo add_query_arg("locs", urlencode("小山市"), $base_url); ?>" alt="小山市"/>
		<area shape="rect" coords="132,155,234,182" href="<?php echo add_query_arg("locs", urlencode("佐野市"), $base_url); ?>" alt="佐野市"/>
		<area shape="rect" coords="245,155,347,183" href="<?php echo add_query_arg("locs", urlencode("那須塩原市"), $base_url); ?>" alt="那須塩原市"/>
		<area shape="rect" coords="20,195,122,222" href="<?php echo add_query_arg("locs", urlencode("鹿沼市"), $base_url); ?>" alt="鹿沼市"/>
		<area shape="rect" coords="133,195,234,222" href="<?php echo add_query_arg("locs", urlencode("日光市"), $base_url); ?>" alt="日光市"/>
		<area shape="rect" coords="246,196,347,223" href="<?php echo add_query_arg("locs", urlencode("真岡市"), $base_url); ?>" alt="真岡市"/>
		<area shape="rect" coords="20,235,121,263" href="<?php echo add_query_arg("locs", urlencode("大田原市"), $base_url); ?>" alt="大田原市"/>
		<area shape="rect" coords="132,235,235,263" href="<?php echo add_query_arg("locs", urlencode("下野市"), $base_url); ?>" alt="下野市"/>
		<area shape="rect" coords="246,235,347,263" href="<?php echo add_query_arg("locs", urlencode("さくら市"), $base_url); ?>" alt="さくら市"/>
		<area shape="rect" coords="20,306,121,334" href="<?php echo add_query_arg("locs", urlencode("結城市"), $base_url); ?>" alt="結城市"/>
		<area shape="rect" coords="132,307,234,334" href="<?php echo add_query_arg("locs", urlencode("筑西市"), $base_url); ?>" alt="筑西市"/>
		<area shape="rect" coords="246,307,346,333" href="<?php echo add_query_arg("locs", urlencode("古河市"), $base_url); ?>" alt="古河市"/>
		<area shape="rect" coords="20,346,122,374" href="<?php echo add_query_arg("locs", urlencode("下妻市"), $base_url); ?>" alt="下妻市"/>
		<area shape="rect" coords="132,346,234,374" href="<?php echo add_query_arg("locs", urlencode("桜川市"), $base_url); ?>" alt="桜川市"/>
		<area shape="rect" coords="245,345,347,374" href="<?php echo add_query_arg("locs", urlencode("八千代町"), $base_url); ?>" alt="八千代町"/>

		<area shape="poly" coords="521,44,509,43,483,54,459,66,437,83,422,83,403,105,390,122,401,135,392,153,393,163,387,186,383,201,412,214,428,201,425,190,436,176,445,174,453,192,466,199,471,196,468,189,479,193,485,189,492,207,500,204,510,197,510,180,515,173,525,176,528,167,496,154,495,132,507,120,506,107,497,91,501,74,504,58,516,55,520,43" href="<?php echo add_query_arg("locs", urlencode("日光市"), $base_url); ?>" alt="日光市"/>
		<area shape="poly" coords="519,43,523,30,543,20,556,19,552,32,558,38,555,44,557,53,573,62,581,74,594,82,597,76,602,79,610,76,611,80,606,84,606,89,599,96,589,95,582,96,578,103,575,107,576,113,565,128,559,118,556,113,549,116,538,107,530,103,524,97,506,105,499,90,504,58,515,56,519,42" href="<?php echo add_query_arg("locs", urlencode("那須塩原市"), $base_url); ?>" alt="那須塩原市"/>
		<area shape="poly" coords="642,92,620,88,612,93,610,98,604,95,595,96,584,95,576,107,577,114,566,128,557,115,549,118,565,135,571,139,581,153,587,150,587,146,595,147,599,144,606,148,620,141,623,134,631,136,636,129,638,144,644,146,644,127,641,113,641,91" href="<?php echo add_query_arg("locs", urlencode("大田原市"), $base_url); ?>" alt="大田原市"/>
		<area shape="poly" coords="568,142,568,152,568,156,565,160,566,168,559,170,549,164,549,172,557,180,561,196,563,189,569,186,576,190,593,169,595,163,596,154,587,151,579,154,570,143" href="<?php echo add_query_arg("locs", urlencode("さくら市"), $base_url); ?>" alt="さくら市"/>
		<area shape="poly" coords="549,171,560,196,569,216,575,226,573,230,576,240,573,249,565,251,564,257,554,254,548,251,544,259,536,260,529,254,522,242,523,237,521,226,518,227,512,212,503,212,498,206,513,198,512,179,519,173,525,178,530,171,549,172" href="<?php echo add_query_arg("locs", urlencode("宇都宮市"), $base_url); ?>" alt="宇都宮市"/>
		<area shape="poly" coords="420,211,426,216,426,227,431,227,440,245,446,250,448,250,464,263,465,252,477,251,485,257,492,255,502,258,507,253,512,251,513,246,520,246,521,241,521,228,516,227,512,214,500,212,497,207,490,208,484,191,478,194,470,190,471,198,466,200,457,195,448,186,445,177,436,177,436,183,429,190,429,202,421,210" href="<?php echo add_query_arg("locs", urlencode("鹿沼市"), $base_url); ?>" alt="鹿沼市"/>
		<area shape="poly" coords="574,250,580,255,585,249,588,253,593,250,593,283,583,289,572,290,564,290,562,296,547,303,545,300,553,294,554,283,560,272,563,260,566,251,572,251" href="<?php echo add_query_arg("locs", urlencode("真岡市"), $base_url); ?>" alt="真岡市"/>
		<area shape="poly" coords="424,229,414,233,414,246,412,247,414,259,407,266,408,271,415,268,423,277,428,291,433,308,439,306,439,317,433,319,437,324,462,328,466,311,461,308,457,297,466,288,470,279,460,263,450,258,444,250,431,228,425,229" href="<?php echo add_query_arg("locs", urlencode("佐野市"), $base_url); ?>" alt="佐野市"/>
		<area shape="poly" coords="405,271,400,285,394,287,407,314,416,323,424,327,436,324,433,319,438,316,439,306,430,310,426,303,429,299,425,288,419,274,413,268,406,271" href="<?php echo add_query_arg("locs", urlencode("足利市"), $base_url); ?>" alt="足利市"/>
		<area shape="poly" coords="499,258,493,256,484,257,476,253,465,253,465,265,450,253,454,261,473,280,463,298,463,308,467,311,463,327,469,329,473,341,480,350,482,339,487,335,491,333,490,319,493,311,498,310,498,304,504,297,504,291,513,292,514,286,501,259" href="<?php echo add_query_arg("locs", urlencode("栃木市"), $base_url); ?>" alt="栃木市"/>
		<area shape="poly" coords="532,257,526,268,524,279,522,286,514,286,516,293,523,297,526,298,527,303,534,300,538,303,542,297,547,302,551,295,550,285,543,284,540,280,535,280,535,264,532,260" href="<?php echo add_query_arg("locs", urlencode("下野市"), $base_url); ?>" alt="下野市"/>
		<area shape="poly" coords="484,350,494,338,503,341,507,337,511,343,523,336,525,325,534,311,550,319,549,304,543,300,538,303,532,300,528,302,520,298,514,293,502,294,501,303,496,308,492,317,494,328,489,336,483,339,483,350" href="<?php echo add_query_arg("locs", urlencode("小山市"), $base_url); ?>" alt="小山市"/>
		<area shape="poly" coords="490,368,494,356,504,356,527,348,529,354,537,352,541,361,537,369,531,370,528,375,522,374,519,372,511,378,495,378,491,367" href="<?php echo add_query_arg("locs", urlencode("古河市"), $base_url); ?>" alt="古河市"/>
		<area shape="poly" coords="552,323,554,332,550,335,554,347,541,353,536,351,530,354,528,349,530,337,530,323,541,318,550,323" href="<?php echo add_query_arg("locs", urlencode("結城市"), $base_url); ?>" alt="結城市"/>
		<area shape="poly" coords="557,349,558,359,561,362,563,371,558,373,557,377,548,379,539,370,542,363,540,354,548,352,556,349" href="<?php echo add_query_arg("locs", urlencode("八千代町"), $base_url); ?>" alt="八千代町"/>
		<area shape="poly" coords="595,298,570,298,568,305,557,305,553,321,555,329,552,334,554,347,561,345,568,349,580,348,584,356,588,358,597,340,595,326,594,312,594,298" href="<?php echo add_query_arg("locs", urlencode("筑西市"), $base_url); ?>" alt="筑西市"/>
		<area shape="poly" coords="599,286,607,293,610,287,616,284,623,288,633,286,634,292,632,302,629,313,622,316,622,325,618,342,612,346,599,345,600,329,594,323,596,305,596,298,598,286" href="<?php echo add_query_arg("locs", urlencode("桜川市"), $base_url); ?>" alt="桜川市"/>
		<area shape="poly" coords="558,347,564,349,569,350,578,349,585,358,581,367,581,376,577,380,570,376,561,377,557,374,564,370,561,362,558,357,558,348" href="<?php echo add_query_arg("locs", urlencode("下妻市"), $base_url); ?>" alt="下妻市"/>
	</map>

</div><!-- #contents -->
<!-- /メインカラム -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<script type='text/javascript'>
	jQuery(document).ready(function () {
		var obj = jQuery('.bxslider').fadeIn(700, ('easeOutQuart')).bxSlider({
			auto        : true,
			autoControls: false,
			controls    : true,
			pager       : true,
			speed       : 500,
			autoHover   : true,
			pause       : 3000,
			easing      : 'swing',
			slideWidth  : 585,
			onSlideAfter: function () { // 自動再生
				obj.startAuto();
			}
		});
	});
</script>

