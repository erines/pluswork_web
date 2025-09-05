<?php get_header(); ?>
  <?php get_template_part( 'breadcrumb' ); ?>
  <!-- /パンくず -->
  <section class="sitemap marginTop-100-48">
    <div class="sitemap__inner inner">
      <h1 class="sitemap__title pageTitle pageTitle--withoutIcon">サイトマップ</h1>
      <ul class="sitemap__Links">
        <li class="sitemap__Link">
          <a href="<?php echo esc_url(home_url('/job-information/')); ?>">求人情報一覧</a>
        </li>
        <li class="sitemap__Link">
          <a href="<?php echo esc_url(home_url('/guide/')); ?>">初めての方へ</a>
        </li>
        <li class="sitemap__Link">
          <a href="<?php echo esc_url(home_url('/about/')); ?>">掲載をご検討中の企業様へ</a>
        </li>
        <li class="sitemap__Link">
          <a href="<?php echo esc_url(home_url('/terms/')); ?>">利用規約 </a>
        </li>
        <li class="sitemap__Link">
          <a href="<?php echo esc_url(home_url('/privacy/')); ?>">個人情報保護方針 </a>
        </li>
        <li class="sitemap__Link">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a>
        </li>
        <li class="sitemap__Link">
          <a href="<?php echo esc_url(home_url('company/')); ?>">運営会社情報</a>
        </li>
      </ul>
    </div>
  </section>
  <div class="breadcrumb breadcrumb--sp marginTop-40-0">
      <?php
       if ( function_exists( 'bcn_display' ) ) {
        bcn_display();}
      ?>
  </div>
  <div class="pageTop js-pageTop"><a href="#" class="pageTop__link"></a></div>
<?php get_footer(); ?>