<article class="popular_articles">
  <h3 class="sidebar_title popular_title">
    <span>&nbsp;</span>
    <p>人気の記事</p>
  </h3>
  <?php 
    $count = 0;
    global $post;
    $args = array(
      'order_by' => 'views',//表示順｛views（閲覧数),comments（コメント数）,avg（1日の平均）}
      'range' => 'all',//集計する期間 {daily(1日), weekly(1週間), monthly(1ヶ月), all(全期間)}
      'post_type' => 'corp',//複数の場合は'post, name1, nem2'
      'limit' => '5', //表示数
    );
    
    $wpp_query = new \WordPressPopularPosts\Query($args);
    $wpp_posts = $wpp_query->get_posts();
    if ($wpp_posts) { ?>
      <ul id="corp_display" class="ranking">  
        <?php 
        foreach ($wpp_posts as $wpp_post) {
          $count++;
          $post = get_post($wpp_post->id);
          setup_postdata($post);
        ?>
        <!--記事の表示内容-->
        <li class="corp_list ranking_list">
          <div class="ranking_no_style">
            <p class="ranking_no"><?php echo "$count";?></p>
          </div>
			<a href="<?php the_permalink();?>" class="res_corp_list">
            <div class="corp_list_single ranking_list_single">
              <?php $value = get_post_meta($post->ID, 'intro_city', true); if(empty($value)):else:?>
                <p><?php echo CFS()->get('intro_city');?></p>
              <?php endif; ?> 
              <?php $value = get_post_meta($post->ID, 'thumbnail', true); if(empty($value)):else:?>
                <img class="corp_list_img ranking_list_img" src="<?php echo CFS()->get('thumbnail');?>"alt="">
              <?php endif; ?>
            </div>
            <div class="corp_list_overview ranking_list_overview">
              <h3 class="corp_list_name ranking_list_name"><?php echo CFS()->get('intro_company');?></h3>
              <p class="corp_list_content ranking_list_content"><?php echo CFS()->get('intro_business');?></p>
              <p class="corp_list_post ranking_list_post"><?php echo CFS()->get('intro_post');?></p>
              <p class="corp_list_address ranking_list_address"><?php echo CFS()->get('intro_address');?></p>
              <div class="corp_list_read ranking_list_read">
                  READ_MORE&nbsp;&nbsp;>
              </div>
            </div>
          </a>
        </li>
        <?php } ?>
      </ul>
      <?php 
    }
      wp_reset_postdata(); wp_reset_query();  
    ?>