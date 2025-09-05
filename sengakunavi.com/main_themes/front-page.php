<?php get_header();?>
  <main>
    <section class="message_wrap">
      <div>
        <h2>大好きな地元で働きたいあなたへ<br>地元の魅力もっと広がる。
        </h2>
        <img class="logo_home_main" src="<?php echo get_template_directory_uri(); ?>/img/logo_home_main.jpg" alt="センガクナビロゴ">
      </div>
      <img class="sengaku_navi_map" src="<?php echo get_template_directory_uri(); ?>/img/tochigiibarakiimg.jpg" alt="センガクナビマップ">
    </section>
    <section class="search_wrap">
      <?php get_search_form(); ?>
      <?php get_sidebar('useful');?>
    </section>
    <section class="corp_wrap" id="homepublish">
      <div class="sengakunavi_list">
        <h2>
          <img class="band_list" src="<?php echo get_template_directory_uri(); ?>/img/band5_gray.jpg">
          <p>センガクナビ  掲載企業一覧</p>
        </h2>
        <div class="corp_menu" id="corpmenu">
        <?php
          $args= array(
            'post_type'=>'corp',
            'post_per_page'=> 4
          );
          $the_query = new WP_Query($args);
          if($the_query->have_posts()):
          ?>
          <ul id="corp_display">
            <?php while($the_query->have_posts()): $the_query->the_post();?>
            <li class="corp_list">
        <a href="<?php the_permalink();?>">  
                <div class="corp_list_single">
                  <?php $value = get_post_meta($post->ID, 'intro_city', true); if(empty($value)):else:?>
                    <p><?php echo CFS()->get('intro_city');?></p>
                  <?php endif; ?> 
                  <?php $value = get_post_meta($post->ID, 'thumbnail', true); if(empty($value)):else:?>
                    <img class="corp_list_img" src="<?php echo CFS()->get('thumbnail');?>"alt="">
                  <?php endif; ?> 
                </div>
                <div class="corp_list_overview">
                  <h3 class="corp_list_name"><?php echo CFS()->get('intro_company');?></h3>
                  <p class="corp_list_content"><?php echo CFS()->get('intro_business');?></p>
                  <p class="corp_list_post"><?php echo CFS()->get('intro_post');?></p>
                  <p class="corp_list_address"><?php echo CFS()->get('intro_address');?></p>
                  <div class="corp_list_read">
                      READ_MORE&nbsp;&nbsp;>
                  </div>
                </div>
              </a>
            </li>
            <?php endwhile;?>              
          </ul>
          <?php wp_reset_postdata();?>
          <?php else:?>
          <?php endif?>		
        </div>
        <ul id="btnstn" class="btn_stn">
        </ul>
        <div class="operation_wrap" id="homeoperation">
          <div class="operation_info">
            <h2>
              <img class="band_info" src="<?php echo get_template_directory_uri(); ?>/img/band1_gray.jpg">
              <p>運営会社情報</p>
            </h2>
            <div class="operation_table">
              <div>
                <p class="operation_title">会社名</p>
                <p class="operation_content">株式会社プラスワーク</p>
              </div>
              <div>
                <p class="operation_title">代表者名</p>
                <p class="operation_content">代表取締役 宮田直樹</p>
              </div>
              <div>
                <p class="operation_title">住所</p>
                <p class="operation_content">〒323-0032 <span>栃木県小山市天神町一丁目9番9号</span></p>
              </div>
              <div>
                <p class="operation_title">電話番号</p>
                <p class="operation_content">0285-24-8115</p>
              </div>
              <div>
                <p class="operation_title">FAX番号</p>
                <p class="operation_content">0285-24-8114</p>
              </div>
              <div>
                <p class="operation_title">メール<span>アドレス</span></p>
                <p class="operation_content">oyama@pluswork.jp</p>
              </div>
              <div>
                <p class="operation_title">業務内容</p>
                <p class="operation_content">労働者派遣事業(般)09-300171
                  <br>職業紹介事業 09-ユ-300089
                  <br>センガクナビ(求人メディア事業)
                  <br>アウトソーシング(業務委託請負)事業
                  <br>スクール(求職者支援訓練)事業
                  <br>老人ホーム・介護施設紹介事業
                  <br>脳梗塞リハビリ</p>
              </div>
            </div>
          </div>
        </div>
        <div class="tochigi_book_wrap" id="homeoperation"></div>
      </div>
      <div>
        <?php get_sidebar('support');?>
        <?php get_sidebar('popular');?>
      </div>
    </section>
    <?php get_sidebar('sidebtn');?>
  </main> 
<?php get_footer();?>