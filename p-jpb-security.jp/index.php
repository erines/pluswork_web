<?php get_header(); ?>
  <section class="notFound marginTB-120-80-240-160">
    <div class="notFound__inner inner">
      <h2 class="notFound__title">404&nbsp;not&nbsp;found</h2>
      <p class="notFound__text">お探しのページは<br class="u-mobile">見つかりませんでした。
      <div class="notFound__topLink">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="button"><span>TOPページに戻る</span></a>
      </div>
    </div>
  </section>
<?php get_footer(); ?>