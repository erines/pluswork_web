<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>><?php wp_body_open(); ?>
    <header class="header">
       <div class="header__inner">
          <h1 class="header__siteTitle ">
            <a class="header__siteTitleLink" href="<?php echo esc_url(home_url('/')); ?>">
              <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/Logo.svg'); ?>" alt="P-JOB">
            </a>
          </h1>
          <!-- スマホ表示 -->
          <!-- ハンバーガーアイコン -->
          <div class="header__drawerIcon drawerIcon js-hamburger">
              <span></span>
              <span></span>
              <span></span>
          </div>
          <!-- スマホ表示メニュー -->
          <div class="header__drawerMenu drawerMenu js-drawer-menu">
            <ul class="drawerMenu__items">
              <li class="drawerMenu__item"><a href="<?php echo esc_url(home_url('/guide/')); ?>" ><span>初めての方へ</span></a></li>
              <li class="drawerMenu__item"><a href="<?php echo esc_url(home_url('/about/')); ?>" ><span>掲載を検討中の企業様へ</span></a></li>
              <li class="drawerMenu__item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
              <li class="drawerMenu__item"><a href="<?php echo esc_url(home_url('/company/')); ?>"><span>運営会社情報</span></a></li>
            </ul>
          </div>
          <!-- PC表示メニュー -->
          <div class="header__pcMenu pcMenu">
            <ul class="pcMenu__items">
              <li class="pcMenu__item">
                <a href="<?php echo esc_url(home_url('/guide/')); ?>" >初めての方へ</a>
              </li>
              <li class="pcMenu__item">
                <a href="<?php echo esc_url(home_url('/about/')); ?>" >掲載を検討中の企業様へ</a>
              </li>
              <li class="pcMenu__item pcMenu__item--red">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a>
              </li>
            </ul>
          </div>
      </div>
      <span class="redLine"></span>
    </header>
  <!-- /.header -->
<main>