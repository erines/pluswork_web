<!DOCTYPE html lang=”ja>

<head>
    <meta charset=”UTF-8″>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <?php wp_head(); ?>
</head>



<body>

    <!-- ローディング -->
    <div class="loading">
        <div class="img-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/MV-logo.png" alt="">
        </div>
    </div>

    <header>
        <div class="header_inner">
            <a class="header_siteLogo" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="Plus Work">
            </a>
            <!-- PC表示メニュー -->
            <nav class="headerNav">
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="<?php echo home_url(); ?>">TOP</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo home_url(); ?>/company">COMPANY</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo home_url(); ?>/service">SERVICE</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo home_url(); ?>/category/news">NEWS</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo home_url(); ?>/contact">CONTACT</a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo home_url(); ?>/recruit-message">RECRUIT</a>
                        <ul class="drop-menu-list">
                            <li class="drop-menu-item"><a href="<?php echo home_url(); ?>/recruit-message">メッセージ</a>
                            </li>
                            <li class="drop-menu-item"><a href="<?php echo home_url(); ?>/recruit-cross">クロストーク</a>
                            </li>
                            <li class="drop-menu-item"><a href="<?php echo home_url(); ?>/recruit-job">仕事内容</a>
                            </li>
                            <li class="drop-menu-item"><a href="<?php echo home_url(); ?>/recruit-welfare">福利厚生</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- SP表示メニュー -->
            <img id="menu-sp" style="width: 4vw;"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/images.png" alt="ナビゲーションを開く"
                onclick="document.getElementById('nav-sp').style.display = 'block'">

            <!-- スマホ用ナビゲーション -->
            <nav id="nav-sp">
                <img id="close" style="width: 4vw;"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/close.png" alt="ナビゲーションを閉じる"
                    onclick="document.getElementById('nav-sp').style.display = 'none'">
                <a class="menu" href="<?php echo home_url(); ?>"
                    onclick="document.getElementById('nav-sp').style.display = 'none'">TOP</a>
                <a class="menu" href="<?php echo home_url(); ?>/company"
                    onclick="document.getElementById('nav-sp').style.display = 'none'">COMPANY</a>
                <a class="menu" href="<?php echo home_url(); ?>/service"
                    onclick="document.getElementById('nav-sp').style.display = 'none'">SERVICE</a>
                <a class="menu" href="<?php echo home_url(); ?>/category/news"
                    onclick="document.getElementById('nav-sp').style.display = 'none'">NEWS</a>
                <a class="menu" href="<?php echo home_url(); ?>/contact"
                    onclick="document.getElementById('nav-sp').style.display = 'none'">CONTACT</a>
                <a class="menu" href="<?php echo home_url(); ?>/recruit-message"
                    onclick="document.getElementById('nav-sp').style.display = 'none'">RECRUIT</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="mainImage">
            <div class="pc_mv">
                <?php echo do_shortcode('[smartslider3 slider="2"]'); ?>
            </div>
            <div class="sp_mv">
                <?php echo do_shortcode('[smartslider3 slider="3"]'); ?>
            </div>
            <div class="mainMessage">
                <div class="catch">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/人と企業をプラスに_rogo.svg"
                        alt="プラスワーク">
                </div>
                <h2>Towards a future filled with smiles</h2>
                <p>株式会社プラスワーク／株式会社ピー・アンド・ジェイ／ピー・アンド・アイ株式会社</p>
                <p class="sp_campany_name">株式会社プラスワーク<br>株式会社ピー・アンド・ジェイ<br>ピー・アンド・アイ株式会社</p>
            </div>
        </section>

        <section class="top_company_area">
            <div class="c_title_back">Company</div>
            <div class="top_company_inner">
                <div class="c_title">
                    <p class="c_title_main">「つながりが生む、無限のプラス」</p>
                    <p class="sp_c_title_main">「つながりが生む、<br>&emsp;&emsp;&emsp;無限のプラス」</p>
                    <p class="c_massege">私たちは、志を同じくしたプロフェッショナル集団です。</p>
                    <a class="view_more_btn" href="<?php echo home_url(); ?>/company">
                        <div class="view_button">VIEW MORE</div>
                    </a>
                </div>
            </div>
        </section>

        <section class="top_service_area">
            <div class="top_s_back">
                <div class="top_service_inner">
                    <div class="c_title">
                        <p class="c_title_main">６つのプラス</p>
                        <p class="sp_c_title_main">６つのプラス</p>
                        <div class="top_s_title_back">Connect</div>
                        <div class="sp_top_title_back">Connect</div>
                    </div>
                    <p class="c_massege">栃木県・茨城県のエリア特化 × インターネットによるマッチングサービス</p>
                    <div class="connectList1">
                        <div class="connect">
                            <h4>01</h4>
                            <p><span>企業</span>と<span>人材</span>をプラスに</p>
                            <p class="b_text">求人メディア事業</p>
                        </div>
                        <div class="connect">
                            <h4>02</h4>
                            <p><span>仕事</span>と<span>可能性</span>をプラスに</p>
                            <p class="b_text">人材サービス事業</p>
                        </div>
                        <div class="connect">
                            <h4>03</h4>
                            <p><span>安全</span>と<span>安心</span>をプラスに</p>
                            <p class="b_text">警備事業</p>
                        </div>
                    </div>
                    <div class="connectList2">
                        <div class="connect">
                            <h4>04</h4>
                            <p><span>学び</span>と<span>チャンス</span>をプラスに</p>
                            <p class="b_text">教育事業</p>
                        </div>
                        <div class="connect">
                            <h4>05</h4>
                            <p><span>暮らし</span>と<span>笑顔</span>をプラスに</p>
                            <p class="b_text">施設紹介事業</p>
                        </div>
                        <div class="connect">
                            <h4>06</h4>
                            <p><span>健康</span>と<span>自立</span>をプラスに</p>
                            <p class="b_text">リハビリ事業</p>
                        </div>
                    </div>
                    <!-- スマホ -->
                    <div class="connect1">
                        <div class="connect">
                            <h4>01</h4>
                            <p><span>企業</span>と<span>人材</span>を<br>プラスに</p>
                            <p class="b_text">求人メディア事業</p>
                        </div>
                        <div class="connect">
                            <h4>02</h4>
                            <p><span>仕事</span>と<span>可能性</span>を<br>プラスに</p>
                            <p class="b_text">人材サービス事業</p>
                        </div>
                    </div>
                    <div class="connect2">
                        <div class="connect">
                            <h4>03</h4>
                            <p><span>安全</span>と<span>安心</span>を<br>プラスに</p>
                            <p class="b_text">警備事業</p>
                        </div>
                        <div class="connect">
                            <h4>04</h4>
                            <p><span>学び</span>と<span>チャンス</span>を<br>プラスに</p>
                            <p class="b_text">教育事業</p>
                        </div>
                    </div>
                    <div class="connect3">
                        <div class="connect">
                            <h4>05</h4>
                            <p><span>暮らし</span>と<span>笑顔</span>を<br>プラスに</p>
                            <p class="b_text">施設紹介事業</p>
                        </div>
                        <div class="connect">
                            <h4>06</h4>
                            <p><span>健康</span>と<span>自立</span>を<br>プラスに</p>
                            <p class="b_text">リハビリ事業</p>
                        </div>
                    </div>
                    <a class="view_more_btn" href="<?php echo home_url(); ?>/service">
                        <div class="view_button">VIEW MORE</div>
                    </a>
                </div>
            </div>
        </section>

        <section class="top_recruit_area">
            <h1>RECRUIT</h1>
            <div class="r_title_main">「つながりを楽しみ、未来を共に創る」</div>
            <div class="sp_r_title_main">「つながりを楽しみ、未来を共に創る」</div>
            <p>お客様の視点を大切にできる仲間を積極的に募集しています。</p>
        </section>

        <section class="rec_top_category">
            <div class="recruit_List">
                <a class="rec_button" href="<?php echo home_url(); ?>/recruit-message">
                    <div class="rec">メッセージ</div>
                </a>
                <a class="rec_button" href="<?php echo home_url(); ?>/recruit-cross">
                    <div class="rec">本音でトーク</div>
                </a>
                <a class="rec_button" href="<?php echo home_url(); ?>/recruit-job">
                    <div class="rec">どんな仕事？</div>
                </a>
                <a class="rec_button" href="<?php echo home_url(); ?>/recruit-welfare">
                    <div class="rec">働きやすさ</div>
                </a>
            </div>
            <!-- スマホ -->
            <div class="sp_recruit_List">
                <div class="sp_rec_List">
                    <a class="rec_button" href="<?php echo home_url(); ?>/recruit-message">
                        <div class="rec">メッセージ</div>
                    </a>
                    <a class="rec_button" href="<?php echo home_url(); ?>/recruit-cross">
                        <div class="rec">本音でトーク</div>
                    </a>
                </div>
                <div class="sp_rec_List">
                    <a class="rec_button" href="<?php echo home_url(); ?>/recruit-job">
                        <div class="rec">どんな仕事？</div>
                    </a>
                    <a class="rec_button" href="<?php echo home_url(); ?>/recruit-welfare">
                        <div class="rec">働きやすさ</div>
                    </a>
                </div>
            </div>
        </section>

        <section class="top_news_area">
            <div class="top_news_inner">
                <div class="c_title">
                    <p class="c_title_main">お知らせ</p>
                    <div class="sp_c_title_back">News</div>
                    <p class="sp_c_title_main">お知らせ</p>
                    <div class="top_n_title_back">News</div>
                </div>
                <div class="newsList">
                    <?php
                    //取得したい投稿記事などの条件を引数として渡す
                    $args = array(
                        // 投稿タイプ
                        'post_type' => 'post',
                        // カテゴリー名
                        'category_name' => 'news',
                        // 1ページに表示する投稿数
                        'posts_per_page' => 5,
                    );
                    // データの取得
                    $posts = get_posts($args);
                    ?>

                    <!-- ループ処理 -->
                    <?php foreach ($posts as $post): ?>
                        <?php setup_postdata($post); ?>
                        <div class="underline">
                            <div class="n_list">
                                <?php echo get_the_date(); ?>
                                <div>
                                    <div class="category"><?php echo get_the_category()[0]->name; ?></div>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <!-- 使用した投稿データをリセット -->
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </section>

    </main>
    <?php get_footer(); ?>