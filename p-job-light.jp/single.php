<?php get_header(); ?>
<div class="breadcrumb-bg">
  <?php get_template_part( 'breadcrumb' ); ?>
</div>
  <?php if (have_posts()) : while (have_posts()) : the_post();
   $content = get_the_content();
   $mv_image = get_field('mv_image');
   ?>
    <section class="jobSummary">
      <div class="jobSummary__inner inner">
        <div class="jobSummary__container ">
          <h1 class="jobSummary__companyName"><?php the_title(); ?></h1>
          <div class="jobSummary__body">
            <h2 class="jobSummary__heading singleHeading">募集情報</h2>
            <?php if (!empty($mv_image)) : ?>
              <div class="jobSummary__mainViewWrapper">
                <div class="jobSummary__mainViewPC" >
                  <img src="<?php the_post_thumbnail_url();?>"  alt="メインビュー" />
                </div>
                <div class="jobSummary__mainViewPC" >
                  <img src="<?php the_field('mv_image');?>"  alt="メインビュー" />
                </div>
              </div>
            <?php else : ?>
              <div class="jobSummary__mainViewPC jobSummary__mainViewPC--1col" >
                <img src="<?php the_post_thumbnail_url();?>"  alt="メインビュー" />
              </div>
            <?php endif; ?>
            <picture class="jobSummary__mainViewSP" >
              <img src="<?php the_post_thumbnail_url();?>"  alt="メインビュー" />
            </picture>
            <h3 class="jobSummary__jobType"><?php echo esc_html(get_field('job_type')); ?></h3>
            <p class="jobSummary__lead">
              <?php echo nl2br(esc_html(get_field('lead'))); ?>
            <p class="jobSummary__text">
              <?php echo nl2br(esc_html(get_field('job_text'))); ?>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- /.jobSummary -->
    <?php if (!empty($content)) : ?>
      <section class="jobIntroduction">
        <div class="jobIntroduction__inner inner">
          <div class="jobIntroduction__container ">
            <h2 class="jobIntroduction__heading"><span>company</span>会社紹介</h2>
            <div class="jobIntroduction__content">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <!-- /.jobIntroduction -->
    <section class="jobInfo">
      <div class="jobInfo__inner inner">
        <div class="jobInfo__container">
          <h2 class="jobInfo__heading singleHeading">募集要項</h2>
          <div class="jobInfo__contents infoItems">
            <dl class="infoItems__item">
              <dt>仕事内容</dt>
              <dd><?php echo esc_html(get_field('job')); ?></dd>
            </dl>
            <dl class="infoItems__item">
              <dt>就業場所</dt>
              <dd><?php echo esc_html(get_field('place')); ?></dd>
            </dl>
            <dl class="infoItems__item">
              <dt>給与</dt>
              <dd><?php echo esc_html(get_field('salary')); ?></dd>
            </dl>
            <dl class="infoItems__item">
              <dt>賞与</dt>
              <dd><?php echo esc_html(get_field('bonus')); ?></dd>
            </dl>
            <dl class="infoItems__item">
              <dt>年間休日</dt>
              <dd><?php echo esc_html(get_field('holiday')); ?></dd>
            </dl>
            <dl class="infoItems__item">
              <dt>雇用形態</dt>
              <dd><?php echo esc_html(get_field('status')); ?></dd>
            </dl>
            <dl class="infoItems__item">
              <dt>勤務時間</dt>
              <dd><?php echo esc_html(get_field('working_times')); ?></dd>
            </dl>
            <dl class="infoItems__item">
              <dt>待遇</dt>
              <dd>
                <?php echo nl2br(esc_html(get_field('benefits'))); ?>
              </dd>
            </dl>
          </div>
          <div class="jobInfo__contactLinks contactLinks">
            <div class="contactLinks__link">
             <a href="tel:0285-24-8115">電話で問い合わせる</a>
            </div>
            <div class="contactLinks__link">
              <a href="#entry">エントリーフォームへ</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.jobInfo -->
    <section class="jobOfferCompany">
      <div class="jobOfferCompany__inner inner">
        <div class="jobOfferCompany__container">
          <h2 class="jobOfferCompany__heading singleHeading">会社情報</h2>
          <div class="jobOfferCompany__info infoItems">
            <dl class="infoItems__item">
              <dt>会社名</dt>
              <dd><?php the_title(); ?></dd>
            </dl>
            <dl class="infoItems__item">
              <dt>事業内容</dt>
              <dd><?php echo esc_html(get_field('business')); ?></dd>
            </dl>
            <dl class="infoItems__item">
              <dt>住所</dt>
              <dd><?php echo esc_html(get_field('adress')); ?></dd>
            </dl>
            <dl class="infoItems__item">
              <dt>HP</dt>
              <dd><?php echo esc_html(get_field('hp')); ?></dd>
            </dl>
          </div>
        </div>
      </div>
    </section>
    <!-- /.jobOfferCompany -->
    <section id="entry" class="jobEntry">
      <div class="jobEntry_inner inner">
        <div class="jobEntry__container">
          <h2 class="jobEntry__heading singleHeading">エントリー</h2>
          <dl class="jobEntry__offerCompany" >
            <dt>
              <p>応募先企業</p>
              <p>求人番号：<?php echo esc_html(get_field('number')); ?></p>
            </dt>
            <dd>
              <p><?php the_title(); ?></p>
              <p><?php echo esc_html(get_field('job')); ?></p>
            </dd>
          </dl>
          <div class="jobEntry__form entryForm">
            <?php echo do_shortcode( '[contact-form-7 id="166" title="個別ページお問い合わせ"]' ); ?>
          </div>
        </div>
      </div>
    </section>
  <?php endwhile; endif;?>
    <!-- /.jobEntry -->
    <section class="recommendJob inner">
      <?php
          $post_type_slug = 'post';
          $taxonomy_slug = 'post_tag';
          $post_terms = wp_get_object_terms($post->ID, $taxonomy_slug);
          if( $post_terms && !is_wp_error($post_terms)) {
              $terms_slug = array();
              foreach( $post_terms as $value ){
              $terms_slug[] = $value->slug;
              }
          }
          $args = array (
              'post_type' => $post_type_slug,
              'posts_per_page' => 6,
              'post__not_in' => array($post->ID),
              'orderby' =>  'rand', 
              'tax_query' => array (
              array(
                  'taxonomy' => $taxonomy_slug,
                  'field' => 'slug',
                  'terms' => $terms_slug,
              )
              )
          );
          $the_query = new WP_Query($args); if($the_query->have_posts()):
      ?>
      <h2 class="recommendJob__heading">この求人を見た人は、こんな求人も見ています。</h2>
        <ul class="recommendJob__cards cardscol">
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <li class="recommendJob__card recommendCard">
              <div class="recommendCard__head">
                <h3 class="recommendCard__Type"><?php echo esc_html(get_field('job_type')); ?></h3>
                <p class="recommendCard__offerCompany" ><?php the_title(); ?></p>
              </div>
              <div class="recommendCard__body">
                <p class="recommendCard__place"><?php echo esc_html(get_field('place')); ?></p>
                <p class="recommendCard__salary"><?php echo esc_html(get_field('salary')); ?></p>
              </div>
              <div class="recommendCard__button">
                <a href="<?php the_permalink(); ?>" class="button"><span>詳細を見る</span></a>
              </div>
            </li>
          <?php endwhile; wp_reset_postdata();?>
        </ul>
      <?php endif; ?>
    </section>
    <div class="breadcrumb breadcrumb--sp marginTop-40-0">
      <?php
       if ( function_exists( 'bcn_display' ) ) {
        bcn_display();}
      ?>
    </div>
    <div class="pageTop js-pageTop"><a href="#" class="pageTop__link"></a></div>
<?php get_footer(); ?>