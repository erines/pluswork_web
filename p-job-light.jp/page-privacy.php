<?php get_header(); ?>
  <?php get_template_part( 'breadcrumb' ); ?>
  <section class="privacy marginTop-100-48">
    <div class="privacy__inner inner">
      <h1 class="privacy__title pageTitle pageTitle--withoutIcon">個人情報保護方針</h1>
      <div class="privacy__container">
        <p class="privacy__text text">当サイトをご利用いただく際、氏名、住所、電子メールアドレス等のお客様の個人的な情報をお尋ねすることがあります。当サイトは、お客様とのプライバシーを尊守し、個人情報は、業務遂行上で必要最小限お求めする様心がけております。</p>
        <div class="privacy__item">
          <h2 class="privacy__itemHead">基本方針</h2>
          <p class="privacy__itemText">個人情報に関する法令、規範及び個人情報保護方針に基づくコンプライアンスを策定し、遵守し継続的な見直し及び改善を行います。</p>
        </div>
        <div class="privacy__item">
          <h2 class="privacy__itemHead">お客様の個人情報の管理と目的</h2>
          <p class="privacy__itemText">お客様から頂いた個人情報データーベースは、当サイトの管理者により厳重に管理されております。また、お客様の個人情報は、業務上での利用に限定しております。お客様の個人情報を無断で販売、貸与、譲渡することは決してございません。お客様からご承諾をいただいてない上での営利的なダイレクトメール、メールマガジン、勧誘などの営業行為も一切行いません。</p>
        </div>
        <div class="privacy__item">
          <h2 class="privacy__itemHead">お客様から頂いたメールの対応</h2>
          <p class="privacy__itemText">お客様からいただいたお電話、メール、FAXの対応は、当サイトの管理者より対応しております。他の第三者、他の企業への業務の委託はしておりませんので、お客様の個人情報が他の第三者に漏れる事は御座いません。</p>
        </div>
        <div class="privacy__item">
          <h2 class="privacy__itemHead">Cookieについて</h2>
          <p class="privacy__itemText text">当サイトでは、プログラムの一部に、Cookieを使用する場合があります。このCookieとは、ブラウザーより発信される識別信号のようなものです。Cookie情報によってお客様の詳細が把握出来る物ではありません。</p>
        </div>
        <div class="privacy__item">
          <h2 class="privacy__itemHead">免責事項</h2>
          <p class="privacy__itemText text">当サイトを利用された場合、お客様は弊社の定めるプライバシーポリシーに同意して頂いたものと判断させて頂きます。当サイトでは諸事情により、上記のプライバシーポリシーを変更、修正、追加、削除させて頂く場合がございます。</p>
        </div>
        <div class="privacy__item">
          <h2 class="privacy__itemHead">著作権について</h2>
          <p class="privacy__itemText text">当サイトのレイアウト、デザインおよび構造に関する著作権は、株式会社プラスワークに帰属します。</p>
        </div>
        <div class="privacy__item">
          <p class="privacy__itemText text">株式会社プラスワーク<br>代表取締役&emsp;宮田直樹</p>
        </div>
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