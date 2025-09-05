<footer>
    <section class="bottomImage">
        <div class="bottomImage_text">
            <h2>Towards <span>a future filled with smiles</span></h2>
            <p>笑顔あふれる未来へ</p>
        </div>
    </section>

    <section class="info_items">
        <a class="contact_button" href="<?php echo home_url(); ?>/contact">
            <div class="contact_text">
                <div class="contact_inner">
                    <div class="contact">
                        <h1>CONTACT</h1>
                        <p>お問い合わせ</p>
                    </div>
                </div>
                <p>></p>
            </div>
        </a>
        <a class="recruit_button" href="<?php echo home_url(); ?>/recruit-message">
            <div class="recruit_text">
                <div class="recruit_inner">
                    <div class="recruit">
                        <h1>RECRUIT SITE</h1>
                        <p>採用情報</p>
                    </div>
                </div>
                <p>></p>
            </div>
        </a>
    </section>

    <!-- SP表示メニュー -->
    <section class="sp_info">
        <a class="contact_button" href="<?php echo home_url(); ?>/contact">
            <div class="sp_info_c">
                <div class="c_inner">
                    <div class="contact">
                        <h1>CONTACT</h1>
                        <p>お問い合わせ</p>
                    </div>
                </div>
                <p>></p>
            </div>
        </a>
        <a class="recruit_button" href="<?php echo home_url(); ?>/recruit-message">
            <div class="sp_info_t">
                <div class="r_inner">
                    <div class="recruit">
                        <h1>RECRUIT SITE</h1>
                        <p>採用情報</p>
                    </div>
                </div>
                <p>></p>
            </div>
        </a>

    </section>

    <section class="footerNav">
        <div class="footerSection">
            <div class="footerLogo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="ロゴ">
            </div>
            <div class="footerList">
                <div class="footerItem">
                    <p>TOP</p>
                    <a href="<?php echo home_url(); ?>">トップ</a>
                </div>
                <div class="footerItem">
                    <div>
                        <p>COMPANY</p>
                        <a href="<?php echo home_url(); ?>/company">会社案内</a>
                    </div>
                    <div>
                        <p class="f_service">SERVICE</p>
                        <a href="<?php echo home_url(); ?>/service">事業内容</a>
                    </div>
                </div>
                <div class="footerItem">
                    <p>NEWS</p>
                    <a href="<?php echo home_url(); ?>/category/news">お知らせ</a>
                </div>
                <div class="footerItem">
                    <p>CONTACT</p>
                    <a href="<?php echo home_url(); ?>/contact">お問い合わせ</a>
                </div>
                <div class="footerItem">
                    <p>RECRUIT</p>
                    <a href="<?php echo home_url(); ?>/recruit-message">採用情報</a>
                    <div class="f_service"></div>
                    <a class="recruit-item" href="<?php echo home_url(); ?>/recruit-message">メッセージ</a>
                    <a class="recruit-item" href="<?php echo home_url(); ?>/recruit-cross">クロストーク</a>
                    <a class="recruit-item" href="<?php echo home_url(); ?>/recruit-job">仕事内容</a>
                    <a class="recruit-item" href="<?php echo home_url(); ?>/recruit-welfare">福利厚生</a>
                </div>
            </div>
        </div>
    </section>
</footer>
<p class="scroll">SCROLL&ensp;→</p>
<a href="#" class="gotop">←&ensp;PAGE TOP</a>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/index.js"></script>
<?php wp_footer(); ?>
</body>