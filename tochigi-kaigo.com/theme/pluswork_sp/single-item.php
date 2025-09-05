<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

//電話で応募ボタンの発信番号
$href_tel = "tel:0285-24-8115";
if ( get_field("お問い合わせ番号") ) {
  $_tel = get_field("お問い合わせ番号");

  if ( ! empty( $_tel ) ) {
    $href_tel = "tel:{$_tel}";
  }
}
$notel_deposit = function_exists("is_deposit_post") && !is_deposit_post();

$job_talk      = get_field("先輩社員コメント");

get_header();?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/gmaps.js"></script>

<?php the_post(); ?>
<div <?php post_class(array("one_column")); ?>>

  <div class="width90">
    <h2 class="item_ttl"><?php the_title(); ?></h2>


    <div class="item_info">           


      <div class="item_ctg_wrapper">
        <div class="item_ctg">
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






      <div class="prpart clearfix">
        <div class="pr clearfix">
          <p><?php the_field("キャッチコピー"); ?></p>
        </div>
        <div class="description"><?php the_content(); ?></div>
      </div><!--prpart-->





      <div class="photo clearfix">
        <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail("full", array("alt" => get_the_title() . " イメージ", "class" => "thickbox  wide")); ?>
        <?php elseif (is_crawler()): ?>
        <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_img_l.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ" class="thickbox wide">
        <?php else:?>
        <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_img_l.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ" class="thickbox wide">
        <?php endif; ?>
      </div><!--photo-->




      <div class="entry">
        <?php if (is_crawler()) : ?>
        
        <a href="<?php echo get_post_meta(get_the_ID(), "_crawler_url", true); ?>">
          <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l.gif" alt="今すぐエントリーする" class="wide" />
        </a>
        
        <?php else: ?>
        <?php
        $post_name = get_page(get_the_ID())->post_name;
        ?>
        
        <a href="<?php echo add_query_arg(array("c" => get_the_ID()), site_url("contact/jobsp")); ?>">
          <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l.gif" alt="今すぐエントリーする" class="wide" />
        </a><br>
        
        <?php if ( get_field("お問い合わせ番号")) : ?>
        <a href="<?php echo esc_attr($href_tel); ?>" onclick="<?php setGATelData('電話リンク', 'タップ', $post_name); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l_tel.gif" alt="" class="wide"/></a>
        <?php elseif ( $notel_deposit ) : ?>
        <a href="<?php echo esc_attr($href_tel); ?>" onclick="<?php setGATelData('電話リンク', 'タップ', $post_name); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l_tel.gif" alt="" class="wide"/></a>
        <?php endif; ?>
        
        <?php endif; ?>
      </div>





      <div class="jobdetail clearfix">
        <table class="detail">
          <?php if (get_field("施設形態")) : ?>
          <tr><th>施設形態</th></tr>
          <?php endif; ?>
          <tr><td><?php the_field("施設形態"); ?></td></tr>
          <tr><th>職種</th></tr>
          <tr><td><?php the_field("職種"); ?></td></tr>
          <tr><th>応募資格</th></tr>
          <tr><td>

            <?php if (get_field("学歴")) : ?>
            <div>・学歴: <?php the_field("学歴"); ?></div>
            <?php endif; ?>

            <?php if (get_field("必要な経験等")) : ?>
            <div>・経験等: <?php the_field("必要な経験等"); ?></div>
            <?php endif; ?>

            <?php if (get_field("必要な免許・資格")) : ?>
            <div>・免許・資格: <?php the_field("必要な免許・資格"); ?></div>
            <?php endif; ?>
            </td></tr>
          <tr><th>仕事内容</th></tr>
          <tr><td><?php the_field("仕事の内容"); ?></td></tr>
          <tr><th>雇用形態</th></tr>
          <tr><td>
            <?php the_field("雇用形態"); ?>

            <?php if (get_field("雇用期間")) : ?>
            (<?php the_field("雇用期間"); ?>)
            <?php endif; ?>

            <?php if (get_field("採用人数")) : ?>
            <div>採用人数: <?php the_field("採用人数"); ?></div>
            <?php endif; ?>
            </td></tr>
          <tr><th>給与</th></tr>
          <tr><td>
            <?php if (get_field("賃金")) : ?>
            <div><?php the_field("賃金"); ?></div>
            <?php endif; ?>
            <?php if (get_field("賞与")) : ?>
            <div>◇賞与: <?php the_field("賞与"); ?></div>
            <?php endif; ?>
            </td></tr>
          <tr><th>勤務時間</th></tr>
          <tr><td>
            <?php the_field("就業時間"); ?>

            <?php if (get_field("時間外")) : ?>
            <div>時間外<?php the_field("時間外"); ?></div>
            <?php endif; ?>

            <?php if (get_field("週所定労働日数")) : ?>
            <div>週所定労働日数 <?php the_field("週所定労働日数"); ?></div>
            <?php endif; ?>
            </td></tr>
          <tr><th>休日・休暇</th></tr>
          <tr><td>
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
            </td></tr>
          <tr><th>待遇</th></tr>
          <tr><td>
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
            </td></tr>
          <?php if (get_field("応募方法")) : ?>
          <tr><th>応募方法</th></tr>
          <tr><td>
            <div><?php the_field("応募方法"); ?></div>
            </td></tr>
          <?php endif; ?>
        </table>
      </div>




      <div class="entry">
        <?php if (is_crawler()) : ?>

        <a href="<?php echo get_post_meta(get_the_ID(), "_crawler_url", true); ?>">
          <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l.gif" alt="今すぐエントリーする" class="wide" />
        </a>

        <?php else: ?>
        <?php
        $post_name = get_page(get_the_ID())->post_name;
        ?>

        <a href="<?php echo add_query_arg(array("c" => get_the_ID()), site_url("contact/jobsp")); ?>">
          <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l.gif" alt="今すぐエントリーする" class="wide" />
        </a><br>

        <?php if ( get_field("お問い合わせ番号")) : ?>
        <a href="<?php echo esc_attr($href_tel); ?>" onclick="<?php setGATelData('電話リンク', 'タップ', $post_name); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l_tel.gif" alt="" class="wide"/></a>
        <?php elseif ( $notel_deposit ) : ?>
        <a href="<?php echo esc_attr($href_tel); ?>" onclick="<?php setGATelData('電話リンク', 'タップ', $post_name); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l_tel.gif" alt="" class="wide"/></a>
        <?php endif; ?>

        <?php endif; ?>
      </div>



	<?php if ( $job_talk ) : ?>
		<section class="chapter job-voice">
			<div class="title01_wrapper">
				<div class="title01">
					先輩社員インタビュー
				</div>
			</div>
			<div class="inner">
				<?php if ( $image = get_field("先輩社員画像") ) : ?>
				<figure>
					<?php echo wp_get_attachment_image($image['id'], "full", null, array(
						"alt"   => "先輩社員写真",
						"class" => "wide",
					)); ?>
				</figure>
				<?php endif; ?>

				<div class="job-content">
					<?php the_field("先輩社員コメント"); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>




      <?php if (!is_crawler()) : ?>
      <?php
      $map_enable = get_field("地図利用");
      $access_class = $map_enable ? " map-enable" : " map-disable";
      ?>
      <div class="access clearfix">
      <!--
        <div class="title01_wrapper">
          <div class="title01">
            <?php the_title(); ?> 所在地・交通アクセス</div></div> -->

        <?php if ($map_enable) : ?>
        <div class="map">
          <div id="map_canvas" style="width: 100%; height: 350px;"></div>

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
                  .gmaps({lat: 36.382690, lng: 139.732185, zoom: 12})
                  .addMarker(<?php echo json_encode($mapOption); ?>, <?php echo json_encode($mapAddress); ?>);
              });
            });
          </script>
        </div>
        <!--map-->
        <?php endif; ?>

        <div class="address">
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

          <div style="font-size:2.4rem;">交通アクセス</div>
          <table class="detail">
            <tbody>
              <tr><th>最寄駅1</th></tr>
              <tr><td><?php the_field("最寄駅1"); ?></td></tr>
              <tr><th>最寄駅2</th></tr>
              <tr><td><?php the_field("最寄駅2"); ?></td></tr>
              <tr><th>最寄駅3</th></tr>
              <tr><td><?php the_field("最寄駅3"); ?></td></tr>
            </tbody>
          </table>
        </div>
        <!--address-->
      </div>
      <!--access-->
      <?php endif; ?>
      <div class="clear"><hr/></div>





      <?php if (!is_crawler() && (get_field("スタッフの声") || get_field("コンサルタントからの一言") || get_field("応募方法") || get_field("選考プロセス"))) : ?>
      <div class="entry_info">
      <!--
        <div class="title01_wrapper">
          <div class="title01">
            <?php the_title(); ?>の応募情報</div></div> -->

        <table class="detail">
          <?php if (get_field("スタッフの声")) : ?>
          <tr><th>スタッフの声</th></tr>
          <tr><td><?php the_field("スタッフの声"); ?></td></tr>
          <?php endif;?>
          <?php if (get_field("コンサルタントからの一言")) : ?>
          <tr><th>コンサルタントから一言</th></tr>
          <tr><td><?php the_field("コンサルタントからの一言"); ?></td></tr>
          <?php endif;?>
          <?php if (get_field("応募方法")) : ?>
          <!-- <tr><th>応募方法</th></tr></tr> -->
          <?php endif;?>
          <?php if (get_field("選考プロセス")) : ?>
          <tr><th>選考プロセス</th></tr>
          <tr><td><?php the_field("選考プロセス"); ?></td></tr>
          <?php endif;?>
        </table>
    </div>
    <?php endif; ?>




    <?php if (!is_crawler() && get_field("事業所名")) : ?>
    <div class="company_info">
      <!--
      <div class="title01_wrapper">
        <div class="title01">
          <?php the_title(); ?>の法人概要</div></div> -->
      <table class="detail">
        <tr><th>法人名</th></tr>
        <tr><td><?php the_field("事業所名"); ?></td></tr>
        <tr><th>所在地</th></tr>
        <tr><td>
          <?php if (get_field("所在地（郵便番号）")) : ?>
          〒<?php the_field("所在地（郵便番号）"); ?>
          <?php endif; ?>

          <?php the_field("所在地（住所）"); ?>
          </td></tr>
        <?php if (get_field("電話番号") || get_field("fax番号")) : ?>
        <tr><th>連絡先</th></tr>
        <tr><td>
          <?php if (get_field("電話番号")) : ?>
          電話番号: <?php the_field("電話番号"); ?>
          <?php endif; ?>
          <?php if (get_field("fax番号")) : ?>
          FAX番号: <?php the_field("fax番号"); ?>
          <?php endif; ?>
          </td></tr>
        <?php endif; ?>
        <?php if (get_field("事業内容")) : ?>
        <tr><th>事業内容</th></tr>
        <tr><td>
          <?php the_field("事業内容"); ?>
          </td></tr>
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
        <div class="title01">
          <?php the_title(); ?>のフォトギャラリー</div></div> -->
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




    <div class="entry">
      <?php if (is_crawler()) : ?>

      <a href="<?php echo get_post_meta(get_the_ID(), "_crawler_url", true); ?>">
        <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l.gif" alt="今すぐエントリーする" class="wide" />
      </a>

      <?php else: ?>
      <?php
      $post_name = get_page(get_the_ID())->post_name;
      ?>

      <a href="<?php echo add_query_arg(array("c" => get_the_ID()), site_url("contact/jobsp")); ?>">
        <img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l.gif" alt="今すぐエントリーする" class="wide" />
      </a><br>

      <?php if ( get_field("お問い合わせ番号")) : ?>
      <a href="<?php echo esc_attr($href_tel); ?>" onclick="<?php setGATelData('電話リンク', 'タップ', $post_name); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l_tel.gif" alt="" class="wide"/></a>
      <?php elseif ( $notel_deposit ) : ?>
      <a href="<?php echo esc_attr($href_tel); ?>" onclick="<?php setGATelData('電話リンク', 'タップ', $post_name); ?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/entry_btn_l_tel.gif" alt="" class="wide"/></a>
      <?php endif; ?>

      <?php endif; ?>
    </div>




    <?php if (is_crawler()) : ?>
    <p class="hellowork"><span>※</span>この求人はハローワークの求人案件です。</p>

    <?php else: ?>
    <?php endif; ?>

  </div>
</div><!-- /width90 -->


<div class="job_banner">
  <a href="<?php echo site_url("contact/jobsp"); ?>/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/job_bnr.jpg" alt="転職・就職サポートのお申し込みはこちら" class="wide" /></a>
</div>


<?php dynamic_sidebar("sp_connect"); ?>


<div class="re-search">
  <div class="re-search_ttl">再検索する</div>
  <div class="form_contents_wrapper">
    <?php
  /*
	 * 検索フォーム表示
	 */
  get_template_part("part", "jobsearch");
    ?>
  </div>
</div>



</div><!--detail_wrap-->


</div>

</div>


<div class="title01_wrapper">
	<div class="title01">
	  <?php get_template_part("part", "pankuzu-job"); ?>
	</div>
</div>
  
<?php get_footer(); ?>