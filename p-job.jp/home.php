<?php get_header(); ?>
<div class="breadcrumb-bg">
  <?php get_template_part( 'breadcrumb' ); ?>
</div>
  <section class="archiveSearchArea">
    <div class="archiveSearchArea__inner inner">
      <div class="archiveSearchArea__head">
      <?php
        $count_posts = wp_count_posts();
        $job_num = $count_posts->publish;
      ?>
        <h1 class="archiveSearchArea__jobs">全求人数</h1>
        <p class="archiveSearchArea__numbers"><span><?php echo esc_html($job_num); ?></span>件中、10件を表示</p>
      </div>
      <div class="archiveSearchArea__form">
        <?php get_template_part( 'searchformBox' ); ?>
      </div>
    </div>
  </section>
  <section class="archiveJobs inner marginTop-60-120">
    <?php if (have_posts()):?>
      <ul class="archiveJobs__cards">
        <?php while (have_posts()) : the_post(); ?>
        <li class="archiveJobs__card archiveCard">
          <div class="archiveCard__head">
            <picture class="archiveCard__thumbnail" >
              <?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); ?>
            </picture>
            <div class="archiveCard__headText">
              <h3 class="archiveCard__Type">
                <?php echo esc_html(get_field('job_type')); ?>
              </h3>
              <p class="archiveCard__lead" >
                <?php echo nl2br(esc_html(get_field('lead'))); ?>
              </p>
              <p class="archiveCard__description">
                <?php echo nl2br(esc_html(get_field('job_text'))); ?>
              </p>
            </div>
          </div>
          <div class="archiveCard__body">
            <p class="archiveCard__offerCompany" ><?php the_title(); ?></p>
            <p class="archiveCard__place"><?php echo esc_html(get_field('place')); ?></p>
            <p class="archiveCard__salary"><?php echo esc_html(get_field('salary')); ?></p>
          </div>
          <div class="archiveCard__link">
            <a href="<?php the_permalink(); ?>" ><span>詳細を見る</span></a>
          </div>
        </li>
        <?php endwhile;?>
      </ul>
      <div class="archiveJobs__pagination pagination">
        <?php
          $args = array(
              'mid_size' => 0,
              'prev_text' => '＜',
              'next_text' => '＞',
              'screen_reader_text' => ' ',
          );
          the_posts_pagination($args);
        ?>
      </div>
    <?php endif;?>
  </section>
  <div class="breadcrumb breadcrumb--sp marginTop-40-0">
      <?php
       if ( function_exists( 'bcn_display' ) ) {
        bcn_display();}
      ?>
  </div>
  <div class="pageTop js-pageTop"><a href="#" class="pageTop__link"></a></div>
<?php get_footer(); ?>