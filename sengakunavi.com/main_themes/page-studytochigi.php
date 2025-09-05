<?php get_header() ;?>
  <section class="study">
    <div>
      <div>
        <span>&nbsp;</span>
        <p>センガクお役立ち情報</p>
      </div>
      <div>
        <p>栃木採用勉強会お申込フォーム</p>
        <p>茨城採用勉強会お申込フォーム</p>
      </div>
    </div>
    <div></div>
  </section>
  <section class="contact_wrap">
    <div class="contact_info">
      <div class="tochigi_application" id="tochigiform">
        <h2>栃木採用勉強会お申込フォーム</h2>
        <?php echo do_shortcode('[mwform_formkey key="461"]'); ?>
        <div class="div_space"></div>
      </div>
    </div>
    <div>
      <?php get_sidebar('useful');?>
      <?php get_sidebar('support');?>
      <?php get_sidebar('popular');?>
    </div>
  </section>
  <?php get_footer();?>