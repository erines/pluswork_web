<?php get_header(); ?>
  <?php get_template_part( 'breadcrumb' ); ?>
  <section class="company marginTop-100-48">
    <div class="company__inner inner">
      <h1 class="company__title pageTitle pageTitle--withoutIcon">運営会社情報</h1>
      <div class="company__information companyInfo">
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">会社名</dt>
              <dd class="companyInfo__description">株式会社プラスワーク</dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">代表者</dt>
              <dd class="companyInfo__description">宮田直樹</dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">設立</dt>
              <dd class="companyInfo__description">平成14年12月</dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">本社</dt>
              <dd class="companyInfo__description">〒323-0032&nbsp;栃木県小山市天神町1丁目9番9号</dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">事業内容</dt>
              <dd class="companyInfo__description">
                広告事業<br>
                スクール（委託訓練）事業<br>
                コンサルティング事業<br>
                <br>
                （関連会社）<br>
                株式会社ピー・アンド・ジェイ
                労働者派遣事業　派09-300498<br>
                職業紹介事業　09-ユ-300331<br>
                アウトソーシング（業務委託請負）事業<br>
                <br>
                ピー・アンド・アイ株式会社<br>
                老人ホーム紹介事業<br>
                リハビリ事業<br>
              </dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">HP</dt>
              <dd class="companyInfo__description">
                <a href="https://pluswork.work/" target="_blank">https://pluswork.work/</a>
              </dd>
          </dl>
      </div>
      <div class="company__logo">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/pluswork_logo.svg'); ?>" alt="プラスワークのロゴマーク">
      </div>
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