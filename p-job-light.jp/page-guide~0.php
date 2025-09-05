<?php get_header(); ?>
  <?php get_template_part( 'breadcrumb' ); ?>
  <section class="guide inner marginTop-100-48">
    <h1 class="guide__title pageTitle"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/beginner.png'); ?>" alt="初心者のアイコンマーク" />初めてP-JOBをお使いになる方へ</h1>
    <p class="guide__lead">P-JOBは、地元で雇用を募りたい企業様と、地元で 就職されたい求職者をマッチングを実現します。<br>扱う職種やジャンルも幅広く、正社員や契約社員、派遣社員の他、パート・アルバイトとあらゆる雇用 形態をカバーしています。<br class="u-mobile">地元をもっと盛り上げるべく、Iターン・Uターンを応援します！</p>
    <div class="guide__items">
      <div class="guide__item">
        <div class="guide__item-heading guideItemHeading">
          <span class="guideItemHeading__pointCircle pointCircle">
            <span class="pointCircle__point">POINT</span>
            <span class="pointCircle__number">01</span>
          </span>
          <h2 class="guideItemHeading__text">北関東<span class="u-desktop">（栃木、茨城、群馬、埼玉）</span>に特化した求人情報！</h2>
        </div>
        <p class="guide__item-description">P-JOBでは、取り扱う求人を北関東（栃木、茨城、群馬、埼玉）に限定しています。<br>北関東でお仕事を探したい方に向けて、エリアごとのソート機能や、レコメンド機能も充実！<br class="u-desktop">あなたにぴったりのお仕事がきっと見つかります。</p>
      </div>
      <div class="guide__item">
        <div class="guide__item-heading guideItemHeading">
          <span class="guideItemHeading__pointCircle pointCircle">
            <span class="pointCircle__point">POINT</span>
            <span class="pointCircle__number">02</span>
          </span>
          <h2 class="guideItemHeading__text">実績のある人材総合サービス会社が運営</h2>
        </div>
        <p class="guide__item-description">P-JOBを運用している株式会社プラスワークでは、20年にわたって人材総合サービス会社を運営しています。長年蓄積された実績やノウハウを熟知した人材のプロが集結し、求人情報を丁寧に選定しているので、優良な求人情報が揃っています。</p>
      </div>
      <div class="guide__item">
        <div class="guide__item-heading guideItemHeading">
          <span class="guideItemHeading__pointCircle pointCircle">
            <span class="pointCircle__point">POINT</span>
            <span class="pointCircle__number">03</span>
          </span>
          <h2 class="guideItemHeading__text">利用は完全無料！</h2>
        </div>
        <p class="guide__item-description">P-JOBは、ご利用料金は完全無料です。後から料金が発生することもございません。<br>安心して求職活動を行なっていただけるよう、明瞭な運営システムで運用しております。<br class="u-desktop">地元で働きたいあなたを応援します。</p>
      </div>
      <div class="guide__item">
        <div class="guide__item-heading guideItemHeading">
          <span class="guideItemHeading__pointCircle pointCircle">
            <span class="pointCircle__point">POINT</span>
            <span class="pointCircle__number">04</span>
          </span>
          <h2 class="guideItemHeading__text">非公開求人もご用意！</h2>
        </div>
        <p class="guide__item-description">あなたのご希望に添った案件が見つからない場合は、無料会員登録の後、直接ご紹介させ ていただくことも可能です。ご希望の条件を伺った上で、まだサイトにリリースしていない非公開求人をご紹介させていただきますので、お気軽にお問い合わせください。</p>
      </div>
    </div>
    <div class="guide__contactLink">
      <a href="<?php echo esc_url(home_url('/job-information/')); ?>" class="button"><span>求人情報を見てみる</span></a>
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