<?php get_header(); ?>
  <div class="loopSlider marginTop-120 u-desktop">
    <div class="loopSlider__wrap">
      <ul class="loopSlider__items">
         <?php
          $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 10,
            'orderby'        => 'date',
            'order'          => 'DESC',
          );
           $my_query = new WP_Query($args);
         ?>
         <?php if( $my_query->have_posts() ): while( $my_query->have_posts() ) : $my_query->the_post();?>
         <li class="loopSlider__item"><a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); ?>
        </a></li>
         <?php endwhile; wp_reset_postdata(); endif;?>
      </ul>
      <ul class="loopSlider__items">
          <?php
            $args = array(
              'post_type'      => 'post',
              'posts_per_page' => 10,
              'orderby'        => 'date',
              'order'          => 'DESC',
            );
            $my_query = new WP_Query($args);
          ?>
          <?php if( $my_query->have_posts() ): while( $my_query->have_posts() ) : $my_query->the_post();?>
          <li class="loopSlider__item"><a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); ?>
          </a></li>
          <?php endwhile; wp_reset_postdata(); endif;?>
        </ul>
   </div>
  </div>
  <section class="mainView">
    <div class="mainView__textArea">
      <div class="mainView__label">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/mv-emblem.png'); ?>"  alt="人材サービス実績２０年">
      </div>
      <h2 class="mainView__catch">プロが厳選、<br class="u-mobile">丁寧サポート<br>次の一歩を応援します</h2>
      <p class="mainView__lead"><span>北関東地域特化型</span><br>総合求人情報サイト</p>
    </div>
    <div class="mainView__searchBox-sp searchBox-sp u-mobile">
      <div class="searchBox-sp__head">
        <p>お仕事検索</p>
        <?php
          $count_posts = wp_count_posts();
          $job_num = $count_posts->publish;
        ?>
        <p>求人数<strong><?php echo esc_html($job_num); ?></strong>件!</p>
      </div>
      <div class="searchBox-sp__body">
        <form role="search" action="<?php echo esc_url(home_url('/searchresults/')); ?>" method="get" class="searchBox-sp__form">
          <div class="searchBox-sp__selectbox">
            <select name="type">
              <option disabled selected>職種</option>
              <?php
              $taxonomy_terms = get_terms('job_category');
              if(!empty($taxonomy_terms)&&!is_wp_error($taxonomy_terms)):?>
                  <?php foreach($taxonomy_terms as $taxonomy_term):?>
                    <option value="<?php echo $taxonomy_term->slug; ?>"><?php echo $taxonomy_term->name; ?></option>
                  <?php endforeach;?>
              <?php endif;?>
            </select>
          </div>
          <div class="searchBox-sp__and">×</div>
          <div class="searchBox-sp__selectbox">
            <select name="area">
              <option disabled selected>エリア</option>

              <?php
              $pref_tags = get_terms('post_tag', 'parent=0');
              foreach($pref_tags as $pref_tag) {
                echo '<optgroup label="'.$pref_tag->name.'">';

                $city_tags = get_terms('post_tag', 'child_of='.$pref_tag->term_id);
                if($city_tags) {
                  foreach ($city_tags as $city_tag) {
                    echo '<option value="'.$city_tag->slug.'">'.$city_tag->name.'</option>';
                  }
                }
                echo '</optgroup>';
              }
              ?>

            </select>
          </div>
          <div class="searchBox-sp__formButton">
            <button type="submit">
              検索する<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/Icon_search-white.svg'); ?>" alt="サーチアイコン">
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="mainView__searchBox-pc searchBox-pc u-desktop">
      <div class="searchBox-pc__head">
        <p>求人数<strong><?php echo esc_html($job_num); ?></strong>件</p>
      </div>
      <div class="searchBox-pc__body">
        <form role="search" action="<?php echo esc_url(home_url('/searchresults/')); ?>" method="get" class="searchBox-pc__form" id="FV-pc-form">
          <div class="searchBox-pc__selectbox">
            <select name="type">
              <option disabled selected>職種</option>
              <?php
              $taxonomy_terms = get_terms('job_category');
              if(!empty($taxonomy_terms)&&!is_wp_error($taxonomy_terms)):?>
                  <?php foreach($taxonomy_terms as $taxonomy_term):?>
                    <option value="<?php echo $taxonomy_term->slug; ?>"><?php echo $taxonomy_term->name; ?></option>
                  <?php endforeach;?>
              <?php endif;?>
            </select>
          </div>
          <div class="searchBox-pc__and">×</div>
          <div class="searchBox-pc__selectbox">
            <select name="area">
              <option disabled selected>エリア</option>
              <?php
              $taxonomy_terms = get_terms('post_tag');
              $pref_check = '';
              $pref_open = 0;
              if(!empty($taxonomy_terms)&&!is_wp_error($taxonomy_terms)):?>

              <?php
              $pref_tags = get_terms('post_tag', 'parent=0');
              foreach($pref_tags as $pref_tag) {
                echo '<optgroup label="'.$pref_tag->name.'">';

                $city_tags = get_terms('post_tag', 'child_of='.$pref_tag->term_id);
                if($city_tags) {
                  foreach ($city_tags as $city_tag) {
                    echo '<option value="'.$city_tag->slug.'">'.$city_tag->name.'</option>';
                  }
                }
                echo '</optgroup>';
              }
              ?>

              <?php endif;?>
            </select>
          </div>
        </form>
        <div class="searchBox-pc__formButton">
          <button type="submit" form="FV-pc-form">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/common/Icon_search-white.svg'; ?>" alt="サーチアイコン">
          </button>
        </div>
      </div>
    </div>
    <!-- <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/mv_img_1.png'); ?>" alt="働く人のイメージ"></span>
    <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/mv_img_2.png'); ?>" alt="働く人のイメージ"></span>
    <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/mv_img_3.png'); ?>" alt="働く人のイメージ"></span>
    <span><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/mv_img_4.png'); ?>" alt="働く人のイメージ"></span> -->
  </section>
  <!-- /.FV -->
  <section class="newJobs u-mobile">
    <div class="newJobs__headingInner">
      <h2 class="newJobs__heading"><span>続々！新着求人</span></h2>
    </div>
    <div class="newJobs__loopSlider loopSlider--sp">
      <div class="loopSlider__wrap">
        <ul class="loopSlider__items">
          <?php
            $args = array(
              'post_type'      => 'post',
              'posts_per_page' => 10,
              'orderby'        => 'date',
              'order'          => 'DESC',
            );
            $my_query = new WP_Query($args);
          ?>
          <?php if( $my_query->have_posts() ): while( $my_query->have_posts() ) : $my_query->the_post();?>
          <li class="loopSlider__item"><a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); ?>
          </a></li>
          <?php endwhile; wp_reset_postdata(); endif;?>
        </ul>
        <ul class="loopSlider__items">
          <?php
            $args = array(
              'post_type'      => 'post',
              'posts_per_page' => 10,
              'orderby'        => 'date',
              'order'          => 'DESC',
            );
            $my_query = new WP_Query($args);
          ?>
          <?php if( $my_query->have_posts() ): while( $my_query->have_posts() ) : $my_query->the_post();?>
          <li class="loopSlider__item"><a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); ?>
          </a></li>
          <?php endwhile; wp_reset_postdata(); endif;?>
        </ul>
    </div>
    </div>

  </section>
  <!-- /.newJobs -->


  <section class="searchJobs">
    <div class="searchJobs__bg">
      <div class="searchJobs__inner">
        <div class="searchJobs__container">
          <h2 class="searchJobs__heading"><span>絞り込み検索</span></h2>
          <?php get_template_part( 'searchformBox' ); ?>
        </div>
      </div>
    </div>
  </section>
  <!-- /.searchJobs -->
  <section class="aboutUs">
    <div class="aboutUs__bg">
      <div class="aboutUs__inner">
        <div class="aboutUs__container">
          <h2 class="aboutUs__heading"><span>P-JOBとは？</span></h2>
          <p class="aboutUs__text" style="font-weight:bold">P-JOBであなたにぴったりの仕事を見つけよう！</p>
          <p class="aboutUs__text"style="margin-top:1rem">P-JOBは、北関東エリアに特化した求人サイトで、地元企業のお仕事を掲載しています。P-JOBで理想の仕事を見つけて、社会人生活をスタートさせましょう！</p>
          <div class="aboutUs__points">
            <div class="aboutUs__point pointCard">
              <div class="pointCard__circle">
                <div class="pointCard__point">POINT</div>
                <div class="pointCard__number">01</div>
              </div>
              <h3 class="pointCard__tittle"><span>20年</span>の実績</h3>
              <p class="pointCard__text">人材サービス会社として20年の実績を積み重ね、独自のネットワークを構築しています。<br>お客様のニーズに合わせたマッチングをよりスムーズに行います。</p>
            </div>
            <div class="aboutUs__point pointCard">
              <div class="pointCard__circle">
                <div class="pointCard__point">POINT</div>
                <div class="pointCard__number">02</div>
              </div>
              <h3 class="pointCard__tittle"><span>地域</span>に密着</h3>
              <p class="pointCard__text">地元企業のリアルな情報を掲載し、職場の雰囲気や具体的な仕事内容が事前にわかるから、安心して応募できます。<br>P-JOBは、地元でのキャリアプランを応援します。</p>
            </div>
            <div class="aboutUs__point pointCard">
              <div class="pointCard__circle">
                <div class="pointCard__point">POINT</div>
                <div class="pointCard__number">03</div>
              </div>
              <h3 class="pointCard__tittle"><span>幅広い</span>業種</h3>
              <p class="pointCard__text">「自分に合った仕事がわからない…」「未経験でも活躍できる職場は？」そんな悩みを持つ方も安心！P-JOBでは、業種や勤務地、働き方の希望に合わせて簡単に求人検索ができます。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.about -->
  <section class="jobOffer">
      <div class="jobOffer__headingInner">
        <h2 class="jobOffer__heading"><span>ピックアップ企業</span></h2>
      </div>
      <div class="jobOffer__inner">
        <div class="jobOffer__slides">
          <div class="swiper js-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide cards">
                <?php
                  $pickup_01 = get_field('pickup_01');
                  if ($pickup_01): {
                    $post_id = $pickup_01->ID;
                    $thumbnail = get_the_post_thumbnail($post_id);
                    $post_title = get_the_title($post_id);
                    $post_excerpt = get_field('job_text', $post_id);
                    $post_link = get_permalink($post_id);
                } ;?>
                  <div class="cards__card card">
                    <div class="card__body">
                      <div class="card__img">
                        <?php echo $thumbnail; ?>
                      </div>
                      <div class="card__textArea">
                        <h3 class="card__title"><?php echo esc_html($post_title); ?></h3>
                        <p class="card__text"><?php echo nl2br(esc_html($post_excerpt)); ?></p>
                      </div>
                    </div>
                    <div class="card__footer">
                      <a  href="<?php echo esc_url($post_link) ; ?>">この求人を詳しく見る</a>
                    </div>
                  </div>
                <?php endif ;?>
                <?php
                  $pickup_02 = get_field('pickup_02');
                  if ($pickup_02): {
                    $post_id = $pickup_02->ID;
                    $thumbnail = get_the_post_thumbnail($post_id);
                    $post_title = get_the_title($post_id);
                    $post_excerpt = get_field('job_text', $post_id);
                    $post_link = get_permalink($post_id);
                } ;?>
                  <div class="cards__card card">
                    <div class="card__body">
                      <div class="card__img">
                        <?php echo $thumbnail; ?>
                      </div>
                      <div class="card__textArea">
                        <h3 class="card__title"><?php echo esc_html( $post_title); ?></h3>
                        <p class="card__text"><?php echo nl2br(esc_html($post_excerpt)); ?></p>
                      </div>
                    </div>
                    <div class="card__footer">
                      <a  href="<?php echo esc_url($post_link) ; ?>">この求人を詳しく見る</a>
                    </div>
                  </div>
                <?php endif ;?>
                <?php
                  $pickup_03 = get_field('pickup_03');
                  if ($pickup_03): {
                    $post_id = $pickup_03->ID;
                    $thumbnail = get_the_post_thumbnail($post_id);
                    $post_title = get_the_title($post_id);
                    $post_excerpt = get_field('job_text', $post_id);
                    $post_link = get_permalink($post_id);
                } ;?>
                  <div class="cards__card card">
                    <div class="card__body">
                      <div class="card__img">
                        <?php echo $thumbnail; ?>
                      </div>
                      <div class="card__textArea">
                        <h3 class="card__title"><?php echo esc_html( $post_title); ?></h3>
                        <p class="card__text"><?php echo nl2br(esc_html($post_excerpt)); ?></p>
                      </div>
                    </div>
                    <div class="card__footer">
                      <a  href="<?php echo esc_url($post_link) ; ?>">この求人を詳しく見る</a>
                    </div>
                  </div>
                <?php endif ;?>
              </div>
              <div class="swiper-slide cards">
                <?php
                  $pickup_04 = get_field('pickup_04');
                  if ($pickup_04): {
                    $post_id = $pickup_04->ID;
                    $thumbnail = get_the_post_thumbnail($post_id);
                    $post_title = get_the_title($post_id);
                    $post_excerpt = get_field('job_text', $post_id);
                    $post_link = get_permalink($post_id);
                } ;?>
                  <div class="cards__card card">
                    <div class="card__body">
                      <div class="card__img">
                        <?php echo $thumbnail; ?>
                      </div>
                      <div class="card__textArea">
                        <h3 class="card__title"><?php echo esc_html( $post_title); ?></h3>
                        <p class="card__text"><?php echo nl2br(esc_html($post_excerpt)); ?></p>
                      </div>
                    </div>
                    <div class="card__footer">
                      <a  href="<?php echo esc_url($post_link) ; ?>">この求人を詳しく見る</a>
                    </div>
                  </div>
                <?php endif ;?>
                <?php
                  $pickup_05 = get_field('pickup_05');
                  if ($pickup_05): {
                    $post_id = $pickup_05->ID;
                    $thumbnail = get_the_post_thumbnail($post_id);
                    $post_title = get_the_title($post_id);
                    $post_excerpt = get_field('job_text', $post_id);
                    $post_link = get_permalink($post_id);
                } ;?>
                  <div class="cards__card card">
                    <div class="card__body">
                      <div class="card__img">
                        <?php echo $thumbnail; ?>
                      </div>
                      <div class="card__textArea">
                        <h3 class="card__title"><?php echo esc_html( $post_title); ?></h3>
                        <p class="card__text"><?php echo nl2br(esc_html($post_excerpt)); ?></p>
                      </div>
                    </div>
                    <div class="card__footer">
                      <a  href="<?php echo esc_url($post_link) ; ?>">この求人を詳しく見る</a>
                    </div>
                  </div>
                <?php endif ;?>
                <?php
                  $pickup_06 = get_field('pickup_06');
                  if ($pickup_06): {
                    $post_id = $pickup_06->ID;
                    $thumbnail = get_the_post_thumbnail($post_id);
                    $post_title = get_the_title($post_id);
                    $post_excerpt = get_field('job_text', $post_id);
                    $post_link = get_permalink($post_id);
                } ;?>
                  <div class="cards__card card">
                    <div class="card__body">
                      <div class="card__img">
                        <?php echo $thumbnail; ?>
                      </div>
                      <div class="card__textArea">
                        <h3 class="card__title"><?php echo esc_html( $post_title); ?></h3>
                        <p class="card__text"><?php echo nl2br(esc_html($post_excerpt)); ?></p>
                      </div>
                    </div>
                    <div class="card__footer">
                      <a  href="<?php echo esc_url($post_link) ;?>">この求人を詳しく見る</a>
                    </div>
                  </div>
                <?php endif ;?>
              </div>
              <div class="swiper-slide cards">
                <?php
                  $pickup_07 = get_field('pickup_07');
                  if ($pickup_07): {
                    $post_id = $pickup_07->ID;
                    $thumbnail = get_the_post_thumbnail($post_id);
                    $post_title = get_the_title($post_id);
                    $post_excerpt = get_field('job_text', $post_id);
                    $post_link = get_permalink($post_id);
                } ;?>
                  <div class="cards__card card">
                    <div class="card__body">
                      <div class="card__img">
                        <?php echo $thumbnail; ?>
                      </div>
                      <div class="card__textArea">
                        <h3 class="card__title"><?php echo esc_html( $post_title); ?></h3>
                        <p class="card__text"><?php echo nl2br(esc_html($post_excerpt)); ?></p>
                      </div>
                    </div>
                    <div class="card__footer">
                      <a  href="<?php echo esc_url($post_link) ; ?>">この求人を詳しく見る</a>
                    </div>
                  </div>
                <?php endif ;?>
                <?php
                  $pickup_08 = get_field('pickup_08');
                  if ($pickup_08): {
                    $post_id = $pickup_08->ID;
                    $thumbnail = get_the_post_thumbnail($post_id);
                    $post_title = get_the_title($post_id);
                    $post_excerpt = get_field('job_text', $post_id);
                    $post_link = get_permalink($post_id);
                } ;?>
                  <div class="cards__card card">
                    <div class="card__body">
                      <div class="card__img">
                        <?php echo $thumbnail; ?>
                      </div>
                      <div class="card__textArea">
                        <h3 class="card__title"><?php echo esc_html( $post_title); ?></h3>
                        <p class="card__text"><?php echo nl2br(esc_html($post_excerpt)); ?></p>
                      </div>
                    </div>
                    <div class="card__footer">
                      <a  href="<?php echo esc_url($post_link) ; ?>">この求人を詳しく見る</a>
                    </div>
                  </div>
                <?php endif ;?>
                <?php
                  $pickup_09 = get_field('pickup_09');
                  if ($pickup_09): {
                    $post_id = $pickup_09->ID;
                    $thumbnail = get_the_post_thumbnail($post_id);
                    $post_title = get_the_title($post_id);
                    $post_excerpt = get_field('job_text', $post_id);
                    $post_link = get_permalink($post_id);
                } ;?>
                  <div class="cards__card card">
                    <div class="card__body">
                      <div class="card__img">
                        <?php echo $thumbnail; ?>
                      </div>
                      <div class="card__textArea">
                        <h3 class="card__title"><?php echo esc_html( $post_title); ?></h3>
                        <p class="card__text"><?php echo nl2br(esc_html($post_excerpt)); ?></p>
                      </div>
                    </div>
                    <div class="card__footer">
                      <a  href="<?php echo esc_url($post_link) ; ?>">この求人を詳しく見る</a>
                    </div>
                  </div>
                <?php endif ;?>
              </div>
            </div>
          </div>
          <!-- ページネーション -->
          <div class="swiper-pagination  u-desktop"></div>
          <!-- 前後の矢印 -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <a class="jobOffer__link" href="<?php echo esc_url(home_url('/job-information/')); ?>">求人情報をすべて見る&nbsp;&gt;</a>
        </div>
      </div>
    </section>
    <!-- /.jobOffer -->
  <section class="forCompany">
    <div class="forCompany__bg" >
      <div class="forCompany__inner">
        <div class="forCompany__container ">
          <h2 class="forCompany__heading"><span>掲載をご検討中の企業様へ</span></h2>
          <div class="forCompany__media media">
            <picture class="media__img"><img src="<?php echo get_template_directory_uri() . '/assets/images/common/guide_img.jpg'; ?>" alt="多くのつながりが一つにまとまっている様子"></picture>
            <div class="media__body">
                <p class="media__text">
                  P-JOBでは、北関東に特化した求人情報を提供することで、 ターゲットを絞りより高い成約率を目指しています。 <br>多様化する採用活動に対応し、一部採用フローを代行させて いただくことも可能です。<br>掲載にご興味のある方は、詳細をご確認ください。<br>一緒に地元を盛り上げましょう！
                </p>
                <div class="media__button ">
                  <a href="<?php echo esc_url(home_url('/about/')); ?>" class="button"><span>詳細を見る</span></a>
                </div>
            </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <div class="adArea">
    <div class="adArea__inner">
      <a class="adArea__banner" href="<?php echo esc_url(get_field('url_banner1')); ?>" target="_blank">
        <img src="<?php the_field('img_banner1');?>"  alt="バナー画像"  />
      </a>
      <a class="adArea__banner" href="<?php echo esc_url(get_field('url_banner2')); ?>" target="_blank">
        <img src="<?php the_field('img_banner2');?>"  alt="バナー画像" />
      </a>
    </div>

  </div>


  <?php
  $item_check = 0;
  foreach (get_field('publish_com')['items'] as $key => $item) {
    if(!empty($item['img'])) {
      if($item_check === 0) {
      ?>
      <div class="publish_com">
        <h2><span>P-JOBご利用企業様</span></h2>
        <div class="swiper-outer">
          <div class="itemBox swiper">
            <div class="swiper-wrapper">

            <?php } ?>

            <div class="item swiper-slide">
              <?php if(!empty($item['url'])) { echo '<a href="'.$item['url'].'" target="_blank">'; } ?>

                <figure>
                  <img src="<?= $item['img']['url']; ?>" alt="<?= $item['img']['alt']; ?>">
                </figure>

                <?php if(!empty($item['url'])) { echo '</a>'; } ?>

              </div>


              <?php
              $item_check++;
            }
          }
          if($item_check > 0) {  ?>
          </div>

        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>

    </div>

    <?php } ?>


  <!-- /.forCompany -->
  <div class="topPageTotop">
    <a href="#">▲ PAGE TOP</a>
  </div>
  <div class="pageTop js-pageTop u-mobile"><a href="#" class="pageTop__link u-mobile"></a></div>
  <!-- <div class="lineButton js-line u-desktop"><img class="u-desktop" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/line.svg'); ?>" alt="LINEお友達追加ボタン"></div>
    <div class="lineModal js-lineModal">
      <div class="lineModal__content">
        <div class="lineModal__close js-lineClose">×</div>
        <div class="lineModal__QR">
          <img class="u-desktop" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/dummy.jpg'); ?>" alt="LINEのQRコード">
        </div>
      </div>
    </div> -->
<?php get_footer(); ?>
