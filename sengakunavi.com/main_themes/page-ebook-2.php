<?php get_header() ;?>
  <section class="contact_midashi" id="ebooktitle2">
    <div>
      <p>センガクナビをebookで読む【無料】</p>
    </div>
    <div></div>
  </section>
  <section class="contact_wrap">
    <div class="contact_info">
		<h2>
			<p>01_栃木プレ号_ebook（2022/7月発行）</p>
			<p>02_茨城プレ号_ebook（2023/2月発行）</p>
			<p>03_栃木1号_ebook（2023/4月発行）</p>		
		</h2>
      <?php echo do_shortcode('[mwform_formkey key="11380"]'); ?>
      <div class="div_space"></div>
    </div>
    <div>
      <?php get_sidebar('useful');?>
      <?php get_sidebar('support');?>
      <?php get_sidebar('popular');?>
    </div>
  </section>
  <?php get_footer();?>