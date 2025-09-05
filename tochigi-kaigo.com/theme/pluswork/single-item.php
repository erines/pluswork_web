<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

$job_talk = get_field("先輩社員コメント");

get_header();?>
<!--<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri()?>/css/bxslider.css" />-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/gmaps.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/jquery.bxslider.js"></script>

<?php the_post(); ?>
<div <?php post_class(array("one_column")); ?>>


  <div class="contents_top">
    <?php get_template_part("part", "pankuzu-job"); ?>

    <div class="item_info clearfix">

      <div class="item_infoheader clearfix">
        <div class="title clearfix">
          <h2><?php the_title(); ?></h2>
          <p>勤務地：<?php the_field("就業場所"); ?></p>
        </div>

        <div class="detail_top_entry clearfix">
          <?php if (is_crawler()) : ?>
          <a href="<?php echo get_post_meta(get_the_ID(), "_crawler_url", true); ?>">
            <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn.gif" alt="今すぐエントリーする" class="alpha" />
          </a>
          <?php else: ?>
          <a href="<?php echo add_query_arg(array("c" => get_the_ID()), site_url("contact/job")); ?>">
            <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn.gif" alt="今すぐエントリーする" class="alpha" />
          </a>
          <?php endif; ?>
        </div>

      </div><!--item_infoheader-->





      <div class="item_ctg_wrapper">
        <div class="item_ctg_line">
          <?php $labels = get_the_terms(0, "label"); ?>
          <?php if ($labels) : ?>
          <ul class="list_status clearfix detail_label">
            <?php foreach ($labels as $term) : ?>
            <li><?php echo esc_html($term->name); ?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </div>

        <div class="update">
          <p>[更新日] <?php the_modified_date(); ?></p>
        </div>
        <div class="clear"><hr/></div>
      </div>





      <div class="detail_wrap">            
        <div class="prpart clearfix">
          <div class="pr clearfix">
            <p><?php the_field("キャッチコピー"); ?></p>
          </div>
          <div class="description"><?php the_content(); ?></div>
        </div><!--prpart-->





        <div class="photo clearfix">
          <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail("full", array("alt" => get_the_title() . " イメージ", "class" => "thickbox")); ?>
          <?php elseif (is_crawler()): ?>
          <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_img_l.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ" class="thickbox">
          <?php else:?>
          <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_img_l.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ" class="thickbox">
          <?php endif; ?>
        </div><!--photo-->



        <div class="jobdetail clearfix">
          <table class="detail">
            <?php if (get_field("施設形態")) : ?>
            <tr>
              <th>施設形態</th>
              <td><?php the_field("施設形態"); ?></td>
            </tr>
            <?php endif; ?>
            <tr>
              <th>職種</th>
              <td><?php the_field("職種"); ?></td>
            </tr>
            <tr>
              <th>応募資格</th>
              <td>

                <?php if (get_field("学歴")) : ?>
                <div>・学歴: <?php the_field("学歴"); ?></div>
                <?php endif; ?>

                <?php if (get_field("必要な経験等")) : ?>
                <div>・経験等: <?php the_field("必要な経験等"); ?></div>
                <?php endif; ?>

                <?php if (get_field("必要な免許・資格")) : ?>
                <div>・免許・資格: <?php the_field("必要な免許・資格"); ?></div>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th>仕事内容</th>
              <td><?php the_field("仕事の内容"); ?></td>
            </tr>
            <tr>
              <th>雇用形態</th>
              <td>
                <?php the_field("雇用形態"); ?>

                <?php if (get_field("雇用期間")) : ?>
                (<?php the_field("雇用期間"); ?>)
                <?php endif; ?>

                <?php if (get_field("採用人数")) : ?>
                <div>採用人数: <?php the_field("採用人数"); ?></div>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th>給与</th>
              <td>
                <?php if (get_field("賃金")) : ?>
                <div><?php the_field("賃金"); ?></div>
                <?php endif; ?>
                <?php if (get_field("賞与")) : ?>
                <div>◇賞与: <?php the_field("賞与"); ?></div>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th>勤務時間</th>
              <td>
                <?php the_field("就業時間"); ?>

                <?php if (get_field("時間外")) : ?>
                <div>時間外<?php the_field("時間外"); ?></div>
                <?php endif; ?>

                <?php if (get_field("週所定労働日数")) : ?>
                <div>週所定労働日数 <?php the_field("週所定労働日数"); ?></div>
                <?php endif; ?>
              </td>
            </tr>
            <?php if (get_field("休憩時間")) : ?>
            <tr>
              <th>休憩時間</th>
              <td>
                <?php the_field("休憩時間"); ?>
              </td>
            </tr>
            <?php endif; ?>
            <tr>
              <th>休日・休暇</th>
              <td>
                <?php if (get_field("休日")) : ?>
                <div>◇<?php the_field("休日"); ?></div>
                <?php endif; ?>

                <?php if (get_field("週休二日")) : ?>
                <div>◇週休二日: <?php the_field("週休二日"); ?></div>
                <?php endif; ?>

                <?php if (get_field("年間休日数")) : ?>
                <div>◇年間休日数: <?php the_field("年間休日数"); ?></div>
                <?php endif; ?>

                <?php if (get_field("育児休業取得実績")) : ?>
                <div>◇育児休業: <?php the_field("育児休業取得実績"); ?></div>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th>待遇</th>
              <td>
                <?php if (get_field("通勤手当")) : ?>
                <div>■通勤手当: <?php the_field("通勤手当"); ?></div>
                <?php endif; ?>

                <?php if (get_field("加入保険")) : ?>
                <div>■加入保険: <?php the_field("加入保険"); ?></div>
                <?php endif; ?>

                <?php if (get_field("転勤")) : ?>
                <div>■転勤: <?php the_field("転勤"); ?></div>
                <?php endif; ?>

                <?php if (get_field("定年制")) : ?>
                <div>■定年制: <?php the_field("定年制"); ?></div>
                <?php endif; ?>

                <?php if (get_field("再雇用")) : ?>
                <div>■再雇用: <?php the_field("再雇用"); ?></div>
                <?php endif; ?>

                <?php if (get_field("入居可能住宅")) : ?>
                <div>◎入居可能住宅: <?php the_field("入居可能住宅"); ?></div>
                <?php endif; ?>

                <?php if (get_field("利用可能な託児所")) : ?>
                <div>◎利用可能な託児所: <?php the_field("利用可能な託児所"); ?></div>
                <?php endif; ?>

                <?php if (get_field("マイカー通勤")) : ?>
                <div>◎マイカー通勤: <?php the_field("マイカー通勤"); ?></div>
                <?php endif; ?>

                <?php if (get_field("求人条件にかかる特記事項")) : ?>
                <div><?php the_field("求人条件にかかる特記事項"); ?></div>
                <?php endif; ?>
              </td>
            </tr>
            <?php if (get_field("応募方法")) : ?>
            <tr>
              <th>応募方法</th>
              <td>
                <div><?php the_field("応募方法"); ?></div>
              </td>
            </tr>
            <?php endif; ?>
            <?php if (get_field("お問い合わせ番号")) : ?>
            <tr>
              <th>お問い合わせ番号</th>
              <td>
                <p class="tel_number"><i class="fa fa-phone" aria-hidden="true"></i><?php the_field("お問い合わせ番号"); ?></p>
              </td>
            </tr>
            <?php endif; ?>
          </table>
        </div>

        <div class="clear"></div>




        <?php if (is_crawler()) : ?>
        <p class="entry">
          <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="backpage">
            <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/backpage_btn.gif" alt="前ページへ戻る" class="alpha" /></a>
          <a href="<?php echo get_post_meta(get_the_ID(), "_crawler_url", true); ?>">
            <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l.gif" alt="今すぐエントリーする" class="alpha" />
          </a></p>

        <?php else: ?>
        <p class="entry">
          <a href="<?php echo add_query_arg(array("c" => get_the_ID()), site_url("contact/job")); ?>">
            <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l.gif" alt="今すぐエントリーする" class="alpha" />
          </a></p>
        <?php endif; ?>




		<?php if ( $job_talk ) : ?>
			<section class="job-section job-voice">
				<div class="title01_wrapper">
					<div class="title01">
						<div class="single-page_title">
							先輩社員インタビュー
						</div>
					</div>
				</div> 
				<div class="section-content">
					<div class="inner">
						<?php if ( $image = get_field("先輩社員画像") ) : ?>
							<figure class="right reset">
								<?php echo wp_get_attachment_image($image['id'], "full", null, array(
									"alt"   => "先輩社員写真",
									"class" => "wide",
								)); ?>
							</figure>
						<?php endif; ?>

						<div class="job-content">
							<p><?php the_field("先輩社員コメント"); ?></p>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</section>
		<?php endif; ?>



        <?php if (!is_crawler()) : ?>
        <?php
        $map_enable = get_field("地図利用");
        $access_class = $map_enable ? " map-enable" : " map-disable";
        ?>
        <div class="access clearfix<?php echo esc_attr($access_class); ?>">
       <!--
          <div class="title01_wrapper">
            <div class="title01"><div class="single-page_title">
              <?php the_title(); ?> 所在地・交通アクセス</div></div></div> -->

          <?php if ($map_enable) : ?>
          <div class="map">
            <div id="map_canvas" style="width: 430px; height: 350px;"></div>

            <?php
            wp_enqueue_script("gmaps");

            $mapAddress = null;
            $mapOption  = array();

            if (get_field("地図利用"))
              $mapOption = get_field("地図");

            if (empty($mapOption) || !is_numeric($mapOption['lat'] || !is_numeric($mapOption['lng']))) {
              $mapAddress = (string) get_field("就業場所");
              $mapAddress = explode("\n", $mapAddress);
              $mapAddress = array_shift($mapAddress);
            } else {
              $mapOption['title'] = $mapOption['address'];
              unset($mapOption['address']);
            }

            $mapOption['centerTo'] = true;
            $mapOption['zoom'] = 14;?>

            <script type="text/javascript">
              jQuery(function($) {
                $.gmaps.ready(function() {

                  $("#map_canvas")
                    .gmaps({lat: 36.382690, lng: 139.732185, zoom: 10})
                    .addMarker(<?php echo json_encode($mapOption); ?>, <?php echo json_encode($mapAddress); ?>);
                });
              });
            </script>
          </div>
          <!--map-->
          <?php endif; ?>

          <?php $address_class =  $map_enable ? "address":"address2"; ?>
          <div class="<?php echo esc_attr($address_class); ?>">
            <table class="detail">
              <tbody>
                <tr>
                  <th>勤務地</th>
                </tr>
                <tr>
                  <td><?php the_field("就業場所"); ?></td>
                </tr>
              </tbody>
            </table>

            <div style="padding: 0 0 5px 0;">交通アクセス</div>
            <table class="detail">
              <tbody>
                <tr>
                  <th>最寄駅1</th>
                  <td><?php the_field("最寄駅1"); ?></td>
                </tr>
                <tr>
                  <th>最寄駅2</th>
                  <td><?php the_field("最寄駅2"); ?></td>

                </tr>
                <tr>
                  <th>最寄駅3</th>
                  <td><?php the_field("最寄駅3"); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--address-->
        </div>
        <!--access-->
        <?php endif; ?>
        <div class="clear"><hr/></div>





        <?php if (!is_crawler() && (get_field("スタッフの声") || get_field("コンサルタントからの一言") || get_field("応募方法") || get_field("選考プロセス") || get_field("お問い合わせ番号") )) : ?>
        <div class="entry_info">
       <!--
          <div class="title01_wrapper">
            <div class="title01"><div class="single-page_title">
              <?php the_title(); ?>の応募情報</div></div></div> -->

          <table class="detail">
            <?php if (get_field("スタッフの声")) : ?>
            <tr>
              <th>スタッフの声</th>
              <td><?php the_field("スタッフの声"); ?></td>
            </tr>
            <?php endif;?>
            <?php if (get_field("コンサルタントからの一言")) : ?>
            <tr>
              <th>コンサルタントから一言</th>
              <td><?php the_field("コンサルタントからの一言"); ?></td>
            </tr>
            <?php endif;?>
            <?php if (get_field("応募方法")) : ?>
	    <!--  
            <tr>
              <th>応募方法</th>
              <td><?php the_field("応募方法"); ?></td>
            </tr>
            -->
            <?php endif;?>
            <?php if (get_field("選考プロセス")) : ?>
            <tr>
              <th>選考プロセス</th>
              <td><?php the_field("選考プロセス"); ?></td>
            </tr>
            <?php endif;?>
            <?php if (get_field("お問い合わせ番号")) : ?>
            <tr>
              <th>お問い合わせ番号</th>
              <td>
                <p class="tel_number"><i class="fa fa-phone" aria-hidden="true"></i><?php the_field("お問い合わせ番号"); ?></p>
              </td>
            </tr>
            <?php endif; ?>
          </table>
        </div>
        <?php endif; ?>




        <?php if (!is_crawler() && get_field("事業所名")) : ?>
        <div class="company_info">
       <!--
          <div class="title01_wrapper">
            <div class="title01"><div class="single-page_title">
              <?php the_title(); ?>の法人概要</div></div></div> -->
          <table class="detail">
            <tr>
              <th>法人名</th>
              <td><?php the_field("事業所名"); ?></td>
            </tr>
            <tr>
              <th>所在地</th>
              <td>
                <?php if (get_field("所在地（郵便番号）")) : ?>
                〒<?php the_field("所在地（郵便番号）"); ?>
                <?php endif; ?>

                <?php the_field("所在地（住所）"); ?>
              </td>
            </tr>
            <?php if (get_field("電話番号") || get_field("fax番号")) : ?>
            <tr>
              <th>連絡先</th>
              <td>
                <?php if (get_field("電話番号")) : ?>
                電話番号: <?php the_field("電話番号"); ?>
                <?php endif; ?>
                <?php if (get_field("fax番号")) : ?>
                FAX番号: <?php the_field("fax番号"); ?>
                <?php endif; ?>
              </td>
            </tr>
            <?php endif; ?>
            <?php if (get_field("事業内容")) : ?>
            <tr>
              <th>事業内容</th>
              <td>
                <?php the_field("事業内容"); ?>
              </td>
            </tr>
            <?php endif; ?>
          </table>
        </div>
        <?php endif; ?>

        <?php
        $images = array();
        if (
          !is_crawler() &&
          (get_field("image1") ||
           get_field("image2") ||
           get_field("image3") ||
           get_field("image4") ||
           get_field("image5"))
        ) :?>
        <div class="galley clearfix">
       <!--
          <div class="title01_wrapper">
            <div class="title01"><div class="single-page_title">
              <?php the_title(); ?>のフォトギャラリー</div></div></div> -->
          <div class="photo_list clearfix">
            <ul class="clearfix">
              <?php if ($image = get_field("image1")) : ?>
              <li><?php the_attachment_link($image['id'], true); ?></li>
              <?php endif;?>
              <?php if ($image = get_field("image2")) : ?>
              <li><?php the_attachment_link($image['id'], true); ?></li>
              <?php endif;?>
              <?php if ($image = get_field("image3")) : ?>
              <li><?php the_attachment_link($image['id'], true); ?></li>
              <?php endif;?>
              <?php if ($image = get_field("image4")) : ?>
              <li><?php the_attachment_link($image['id'], true); ?></li>
              <?php endif;?>
              <?php if ($image = get_field("image5")) : ?>
              <li><?php the_attachment_link($image['id'], true); ?></li>
              <?php endif;?>
            </ul>
          </div>
        </div>
        <!--galley-->
        <?php endif; ?>




        <?php if (is_crawler()) : ?>
        <p class="entry-none">&nbsp;</p>

        <?php else: ?>
        <p class="entry">
          <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="backpage">
            <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/backpage_btn.gif" alt="前ページへ戻る" class="alpha" /></a>
          <a href="<?php echo add_query_arg(array("c" => get_the_ID()), site_url("contact/job")); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l.gif" alt="今すぐエントリーする" class="alpha" /></a></p>
        <?php endif; ?>



        <?php if (is_crawler()) : ?>
        <p class="hellowork"><span>※</span>この求人はハローワークの求人案件です。</p>

        <?php else: ?>
        <?php endif; ?>



		  <?php get_template_part("part", "pankuzu-job"); ?>


        <div class="job_banner">
          <a href="<?php echo site_url("contact/job"); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_bnr.jpg" alt="転職・就職サポートのお申し込みはこちら" class="alpha" /></a>
        </div>
		
		
		<?php dynamic_sidebar("main_connect"); ?>


        <div class="re-search">
          <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/re-search.gif" alt="再検索する" />
          <?php
  /*
	 * 検索フォーム表示
	 */
  get_template_part("part", "jobsearch");
          ?>
        </div>



      </div><!--detail_wrap-->


    </div>
  </div><!--contents_top-->
</div>

<?php get_footer(); ?>