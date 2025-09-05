</main>
  <footer class="footer marginTop-0-80">
    <div class="footer__inner">
      <div class="footer__logoArea">
        <div class="footer__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/Logo.svg'); ?>" alt="P-JOB">
          </a>
        </div>
      </div>
      <div class="footer__container">
        <nav class="footer__nav footerNav">
          <ul class="footerNav__items">
            <li class="footerNav__item"><a href="<?php echo esc_url(home_url('/terms/')); ?>" >利用規約</a></li>
            <li class="footerNav__item"><a href="<?php echo esc_url(home_url('/privacy/')); ?>" >個人情報保護方針</a></li>
            <li class="footerNav__item"><a href="<?php echo esc_url(home_url('/sitemap/')); ?>" >サイトマップ</a></li>
            <li class="footerNav__item"><a href="<?php echo esc_url(home_url('/company/')); ?>" >運営会社情報</a></li>
          </ul>
        </nav>
        <div class="footer__snsLinks">
          <a class="footer__siteTitleLink" href="#">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/Icon-Instagram.svg'); ?>" alt="Instagram">
          </a>
          <a class="footer__siteTitleLink" href="#">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/Icon-Twitter.svg'); ?>" alt="Twitter">
          </a>
          <a class="footer__siteTitleLink" href="#">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/Icon-Facebook.svg'); ?>" alt="Facebook">
          </a>
        </div>
      </div>
      <p class="footer__copyright">
        <small>&copy;&nbsp;Pluswork&nbsp;Co.,Ltd.&nbsp;All&nbsp;Rights&nbsp;Reserved.</small>
      </p>
    </div>
  </footer>
<?php wp_footer(); ?>
</body>
</html>