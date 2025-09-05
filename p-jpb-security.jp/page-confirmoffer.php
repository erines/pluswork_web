<?php get_header(); ?>
  <?php get_template_part( 'breadcrumb' ); ?>
  <section class="contact marginTop-100-48">
    <div class="contact__inner inner">
      <div class="contact__head">
        <h1 class="contact__heading">お問い合わせ確認画面</h1>
        <p class="contact__lead">下記内容に誤りがないことをご確認いただき、送信してください。</p>
      </div>
      <div class="contact__body">
        <div class="contact__form form">
          <?php if (have_posts()): the_post();?>
            <?php the_content();?>
          <?php endif;?>
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