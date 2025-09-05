<?php get_header() ;?>
  <section class="contact_midashi">
    <div>
      <p>✉お問い合わせ</p>
    </div>
    <div></div>
  </section>
  <section class="contact_wrap">
    <div class="contact_info">
      <h2>お問い合わせ</h2>
      <?php the_content(); ?>

      <div class="div_space"></div>
    </div>
    <div>
      <?php get_sidebar('useful');?>
      <?php get_sidebar('support');?>
      <?php get_sidebar('popular');?>
    </div>
  </section>
  <?php get_footer();?>