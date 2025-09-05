<?php
 /*
Template Name: トップページ
*/
?>
<?php get_header(); ?>
	<div id="main_image">
		<div class="image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/main_image.jpg?1" alt="" class="responsive" /></div>
		<!-- <div class="text">テキストテキストテキストテキストテキストテキストテキストテキストテキスト</div> -->
		<!--
		<div class="inner">
			<div class="text02">
				<div class="text02_02 ts">
					<div class="sub"><span class="stress">栃木</span>で<span class="stress">医療関連</span>のお仕事を探すなら！</div>
					<div class="logo">栃木医療<br />求人センター</div>
				</div>
				<div class="list"><ul class="cl">
					<li>看護婦</li>
					<li>薬剤師</li>
					<li>PT/OT/ST</li>
					<li>管理栄養士</li>
					<li>栄養士</li>
					<li>保育士</li>
					<li>社会福祉士</li>
					<li>歯科衛生士</li>
					<li>医療事務</li>
				</ul></div>
			</div>
		</div>
		-->
	</div>
	<div class="main_image_text01">
		<div class="text01_01">嬉しい好条件のお仕事がたくさん♪</div>
		<div class="list"><ul class="cl">
			<li>日勤のみ</li>
			<li>駅チカ</li>
			<li>大学病院近く</li>
			<li>週休２日</li>
			<li>残業なし</li>
			<li>賞与4ヶ月以上</li>
		</ul></div>
	</div>
	<div class="main">
		<?php get_template_part( '_joblist' ); ?>
		<?php get_template_part( 'tel' ); ?>
		<div class="office_info" id="office_info">
			<h4>会社概要</h4>
			
			<div class="gmap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gmap_dummy.jpg" /></div>
			<div class="table">
				<table class="maintable"><tbody>
								<tr>
									<th>社名</th>
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
									<th>本　社・小山校</th>
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

