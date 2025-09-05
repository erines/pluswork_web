<?php get_header(); ?>
  <?php get_template_part( 'breadcrumb' ); ?>
  <section class="aboutP-JOB marginTop-100-48">
    <div class="aboutP-JOB__inner inner">
      <h1 class="aboutP-JOB__title pageTitle"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/question-circle.png'); ?>" alt="?のアイコンマーク" />なぜ、P-JOB？</h1>
      <div class="aboutP-JOB__contents">
        <div class="aboutP-JOB__content mediaType">
          <h2 class="mediaType__head">北関東地域に特化した求人だから、<br class="u-mobile">地元の求職者が集まる！</h2>
          <div class="mediaType__body">
            <div class="mediaType__textArea">
              <p class="mediaType__lead">対象地域を北関東（栃木、茨城、群馬、埼玉）に 絞っているので、地元で仕事を探したい求職者へ ピンポイントで訴求できます。</p>
              <p class="mediaType__description">P-JOBでは、北関東（栃木、茨城、群馬、埼玉）に特化した求人サイトとして、地域に密着した、優良企業様の求人情報を提供しています。<br>対象地域を限定しているからこそ、Uターン・Iターン等地元での就職を希望する求職者へピンポイントで訴求することが可能です。<br>より多くの企業様に掲載いただくことで、求職者との確度の高いマッチングを目指しています。<br>一緒に地元を盛り上げたい、たくさんの企業様からのご 登録をお待ちしております。</p>
            </div>
            <div class="mediaType__imgArea">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/info_1.png'); ?>" alt="ピンポイントに訴求しているイメージ">
            </div>
          </div>
        </div>
        <div class="aboutP-JOB__content mediaType">
          <h2 class="mediaType__head">取材でリアルな企業様の情報をお届け！</h2>
          <div class="mediaType__body">
            <div class="mediaType__textArea">
              <p class="mediaType__lead"> 弊社の専門スタッフが取材へお伺いし、<br>御社の魅力を最大限お伝えしていきます！</p>
              <p class="mediaType__description">「安心して定着できる職場を探したい」そんな求職者 の気持ちに寄り添って、弊社では求人情報内容の充実を図っています。<br>求人専門のスタッフが企業様へ取材に伺わせていただき テンプレートでは伝わらない企業様の魅力を最大限に引き出していきます。<br>求職者が実際に就職したあとの姿を想像しやすくするため、リアルな職場の情報を届けています。<br>取材は初めて・・という企業様でも、専門のスタッフが 丁寧に対応させていただきますので、安心してご登録く ださい。</p>
            </div>
            <div class="mediaType__imgArea">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/info_2.png'); ?>" alt="情報をお届けしているイメージ">
            </div>
          </div>
        </div>
        <div class="aboutP-JOB__content mediaType">
          <h2 class="mediaType__head">掲載にご不明な際は専門スタッフがフォロー！</h2>
          <div class="mediaType__body">
            <div class="mediaType__textArea">
              <p class="mediaType__lead">20年のノウハウを熟知した専門スタッフが<br>随時フォローいたします！</p>
              <p class="mediaType__description">人材総合サービス会社として20年の実績を積み重ねてきた弊社では、人材のプロが集結しています。<br>都度変化する地域の産業や雇用動向等をリアルタイムに把握している経験豊かな専門スタッフが、独自に構築してきた地域のネットワークやノウハウを駆使し、企業様をしっかりフォローさせていただきます。<br>地元地域にこだわった求人情報サイト「P-JOB」で、より充実した地元の発展、地域経済の活性化をお手伝いできるよう、全力を尽くします。<br>掲載をご希望の企業様は、以下のボタンよりお気軽にお問い合わせください。</p>
            </div>
            <div class="mediaType__imgArea">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/info_3.png'); ?>" alt="ヒアリングから掲載後のフォローまで随時フォローするイメージ">
            </div>
          </div>
        </div>
      </div>
      <div class="aboutP-JOB__contactLink">
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="button"><span>お問い合わせはこちら</span></a>
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