<!DOCTYPE html lang=”ja>

<head>
    <meta charset=”UTF-8″>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>人材サービスのプラスワーク｜ピー・アンド・ジェイ｜ピー・アンド・アイ</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <?php wp_head(); ?>
</head>

<body>
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
                <a class="menu" href="<?php echo home_url(); ?>/index"
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