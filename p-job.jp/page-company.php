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
              <dd class="companyInfo__description">2002年 12月</dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">本社</dt>
              <dd class="companyInfo__description">〒323-0032&nbsp;栃木県小山市天神町1丁目9番9号</dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">事業内容</dt>
              <dd class="companyInfo__description">
              求人広告事業<br>
              教育訓練事業<br>
              警備事業
              </dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">HP</dt>
              <dd class="companyInfo__description">
                <a href="https://pluswork.jp/" target="_blank">https://pluswork.jp/</a>
              </dd>
          </dl>
      </div>
      
    </div>
  </section>

<section class="company marginTop-100-48">
    <div class="company__inner inner">
      <h1 class="company__title pageTitle pageTitle--withoutIcon">運営会社情報</h1>
      <div class="company__information companyInfo">
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">会社名</dt>
              <dd class="companyInfo__description">株式会社ピー・アンド・ジェイ</dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">代表者</dt>
              <dd class="companyInfo__description">宮田直樹</dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">設立</dt>
              <dd class="companyInfo__description">2024年 1⽉</dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">本社</dt>
              <dd class="companyInfo__description">〒323-0032&nbsp;栃木県小山市天神町1丁目9番9号</dd>
          </dl>
          <dl class="companyInfo__list">
              <dt class="companyInfo__term">事業内容</dt>
              <dd class="companyInfo__description">
              人材派遣事業（派09-300498）<br>
              有料職業紹介事業（09-ユ-300331）<br>
              業務請負業<br>
              外国人特定技能・技能実習制度導入支援
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