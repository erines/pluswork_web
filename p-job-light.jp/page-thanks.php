<?php get_header(); ?>
  <section class="contact marginTB-120-80-240-160">
    <div class="contact__inner inner">
      <div class="contact__head">
        <h1 class="contact__heading">お問い合わせありがとうございます。</h1>
        <p class="contact__lead">送信完了しました。<br>内容確認後、弊社担当よりご連絡差し上げます。</p>
      </div>
      <div class="marginTop-70-48 textCenter">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="button"><span>TOPページに戻る</span></a>
      </div>
    </div>
  </section>
  <div class="breadcrumb breadcrumb--sp marginTop-40-0">
      <?php
       if ( function_exists( 'bcn_display' ) ) {
        bcn_display();}
      ?>
  </div>
<?php get_footer(); ?>