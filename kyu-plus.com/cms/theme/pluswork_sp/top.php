<?php
 /*
Template Name: トップページ
*/
?>
<?php get_header(); ?>
	<div id="main_image">
		<div class="image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/main_image.jpg" alt="関東求人プラス" class="responsive" /></div>

	</div>
	<div class="main">
		<div class="nav01">
			<div class="btns btns2">
				<ul class="cl">
					<li><a href="<?php echo get_page_link(26); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nav01_01.png" alt="WEB応募" class="responsive" /></a></li>
					<li><a href="tel:0285-24-8115"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nav01_02.png" alt="TEL応募" class="responsive" /></a></li>
				</ul>
			</div>
			<!--<div class="text"></div>-->
		</div>
		<?php get_template_part( '_joblist' ); ?>
		<div class="mb10p">
			<a href="tel:0285-24-8115"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tel.jpg" alt="" class="responsive" /></a>
		</div>
		<div class="office_info" id="office_info">
			<h2>会社概要</h2>
			
			<div class="gmap"><?php
				echo do_shortcode('[map addr="栃木県小山市天神町1丁目9番9号" width="100%" height="295px" is_static="true"]');
			?></div>
			<div class="table">
				<table><tbody>
								<tr>
									<th>会社名</th>
									<td>株式会社プラスワーク</td>
								</tr>
								<tr>
									<th>代表者</th>
									<td>宮田直樹</td>
								</tr>
								<tr>
									<th>設立</th>
									<td>平成14年12月</td>
								</tr>
								<tr>
									<th>資本金</th>
									<td>5,000万円</td>
								</tr>
								<tr>
									<th>事業内容</th>
									<td>労働者派遣事業（般）09-300171<br />
職業紹介事業　09-ユ-300089<br />
アウトソーシング（業務委託請負）事業<br />
スクール（求職者支援訓練）事業<br />
老人ホーム・介護施設紹介事業</td>
								</tr>
								<tr>
									<th>本社・小山校</th>
									<td>〒323-0032 栃木県小山市天神町1丁目9番9号<br />
TEL：0285-24-8115　　FAX：0285-24-8114<br />
お問い合わせ：oyama@pluswork.jp<br />
Facebookページ：http://www.facebook.com/pluswork.jp</td>
								</tr>
				</tbody></table>
			</div>
		</div>
	</div>
<?php get_footer(); ?>

