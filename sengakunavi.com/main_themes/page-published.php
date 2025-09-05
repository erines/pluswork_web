<?php get_header() ;?>
  <section class="published_midashi">
    <div>
      <p>掲載をご検討中の企業様</p>
    </div>
    <div></div>
  </section>
  <section class="published_wrap">
    <div class="published_info">
      <div>
        <p>センガクナビに掲載をご検討されている企業様は下記、お問い合わせフォームからご連絡ください。</p>
        <a href="<?php bloginfo('url');?>/contact"><i class="far fa-envelope"></i>&nbsp;お問い合わせ</a>
      </div>
      <div>
        <p>栃木県の採用勉強会に参加をご希望されている企業様は下記、お申込みフォームからご連絡ください。</p>
        <a href="<?php bloginfo('url');?>/studytochigi#tochigiform" class="useful_tochigi">栃木採用勉強会 お申込フォーム</a>
      </div>
      <div>
        <p>茨城県の採用勉強会に参加をご希望されている企業様は下記、お申込みフォームからご連絡ください。</p>
        <a href="<?php bloginfo('url');?>/studyibaraki#ibarakiform" class="useful_ibaraki">茨城採用勉強会 お申込フォーム</a>
      </div>
    </div>
    <div>
      <?php get_sidebar('useful');?>
      <?php get_sidebar('support');?>
      <?php get_sidebar('popular');?>
    </div>
  </section>
  <?php get_sidebar('sidebtn');?>
  <?php get_footer();?>