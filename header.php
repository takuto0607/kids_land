<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no,address=no,email=no">
  <meta name='robots' content='noindex, nofollow'>
  
  <meta property="og:site_name" content="桜のこもれびキッズランド">
  <meta name="og:image" content="<?php echo echo_img("ogp-image.webp"); ?>">
  <meta property="og:type" content="website or blog">
  <meta property="og:locale" content="ja_JP">

  <!-- Webフォント -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Kosugi+Maru&family=Yusei+Magic&display=swap" rel="stylesheet">

  <!-- ファビコン -->
  <link rel="shortcut icon" href="<?php echo echo_img("icon/favicon.ico"); ?>">
  <link rel="apple-touch-icon" href="<?php echo echo_img("icon/apple-touch-icon.webp"); ?>">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/8cd7df4c70.js" crossorigin="anonymous"></script>

  <?php wp_head(); ?>
</head>
<body>
  <!-- Header -->
  <header class="header">
    <nav class="header__navi">
      <ul class="header__list">
        <li class="header__item">
          <div class="header__link-wrapper">
            <a class="header__link" href="<?php echo esc_url(home_url('/about')); ?>">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("icon/about-icon.svg"); ?>" width="48" height="48" alt="アバウトアイコン" loading="lazy">
              </div>
              <p class="header__nav-title">わたしたちのこと</p>
              <p class="header__nav-note capitalize">about</p>
            </a>
          </div>
        </li>
        <li class="header__item">
          <div class="header__link-wrapper">
            <a class="header__link" href="<?php echo esc_url(home_url('/')); ?>">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("icon/introduction-icon.svg"); ?>" width="48" height="48" alt="イントロダクションアイコン" loading="lazy">
              </div>
              <p class="header__nav-title">各園のご紹介</p>
              <p class="header__nav-note capitalize">introduction</p>
            </a>
          </div>
        </li>
        <li class="header__item">
          <div class="header__link-wrapper">
            <a class="header__link" href="<?php echo esc_url(home_url()); ?>">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("icon/letter-icon.svg"); ?>" width="48" height="48" alt="レターアイコン" loading="lazy">
              </div>
              <p class="header__nav-title">こもれびだより</p>
              <p class="header__nav-note capitalize">letter</p>
            </a>
          </div>
        </li>
        <li class="header__item">
          <div class="header__logo logo">
            <a href="<?php echo esc_url(home_url()); ?>">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("logo.svg"); ?>" width="280" height="89" alt="ロゴ" loading="lazy">
              </div>
            </a>
          </div>
        </li>
        <li class="header__item">
          <div class="header__link-wrapper">
            <a class="header__link" href="<?php echo esc_url(home_url()); ?>">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("icon/info-icon.svg"); ?>" width="48" height="48" alt="お知らせアイコン" loading="lazy">
              </div>
              <p class="header__nav-title">お知らせ</p>
              <p class="header__nav-note capitalize">info</p>
            </a>
          </div>
        </li>
        <li class="header__item">
          <div class="header__link-wrapper">
            <a class="header__link" href="<?php echo esc_url(home_url('/recruit')); ?>">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("icon/recruit-icon.svg"); ?>" width="48" height="48" alt="採用情報アイコン" loading="lazy">
              </div>
              <p class="header__nav-title">採用情報</p>
              <p class="header__nav-note capitalize">recruit</p>
            </a>
          </div>
        </li>
        <li class="header__item">
          <div class="header__link-wrapper">
            <a class="header__link" href="<?php echo esc_url(home_url()); ?>">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("icon/contact-icon.svg"); ?>" width="48" height="48" alt="お問い合わせアイコン" loading="lazy">
              </div>
              <p class="header__nav-title">お問い合わせ</p>
              <p class="header__nav-note capitalize">contact</p>
            </a>
          </div>
        </li>
      </ul>
      <div class="header__item-border"></div>
    </nav>
  </header>