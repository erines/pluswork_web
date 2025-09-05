<?php get_header(); ?>
  <section class="corp_wrap" id="homepublish">
    <div class="sengakunavi_list">
      <?php if (have_posts()): ?>
        <p class="seach_result">検索結果：<?php echo $wp_query->found_posts; ?>件</p>
        <div class="corp_menu" id="corpmenu">
          <ul id="corp_display">
            <?php while(have_posts()):the_post(); ?>
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
            <?php
              if (function_exists("pagination")) {
                pagination($wp_query->max_num_pages);
              }
            ?>
          </ul>
          <?php else: ?>
            <p class="seach_result">検索された勤務地・キーワードに一致する掲載企業はありませんでした</p>
          <?php endif; ?>
          <div class="marginbottom"></div>
        </div>
      <?php wp_nonce_field('my-archive-nonce', 'nonce'); ?>
    </div>
    <div>
      <?php get_sidebar('support');?>
      <?php get_sidebar('popular');?>
    </div>
  </section>
  <?php get_sidebar('sidebtn');?>
<?php get_footer(); ?>