    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="footer__link-group">
          <div class="footer__logo logo">
            <a href="<?php echo esc_url(home_url()); ?>">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("logo.svg"); ?>" width="280" height="89" alt="ロゴ" loading="lazy">
              </div>
            </a>
          </div>
          <nav class="footer__navi">
            <ul class="footer__list footer__list--pc">
              <li class="nav-item footer__item"><a href="<?php echo esc_url(home_url('/about')); ?>">私たちのこと</a></li>
              <li class="nav-item footer__item"><a href="<?php echo esc_url(home_url()); ?>">各園のご紹介</a></li>
              <li class="nav-item footer__item"><a href="<?php echo esc_url(home_url()); ?>">こもれびだより</a></li>
              <li class="nav-item footer__item"><a href="<?php echo esc_url(home_url('/recruit')); ?>">採用情報</a></li>
              <li class="nav-item footer__item"><a href="<?php echo esc_url(home_url()); ?>">お知らせ</a></li>
              <li class="nav-item footer__item"><a href="<?php echo esc_url(home_url()); ?>">お問い合わせ</a></li>
            </ul>
          </nav>
          <nav class="footer__navi">
            <ul class="footer__list">
              <li class="nav-item footer__item"><a href="<?php echo esc_url(home_url()); ?>">サイトマップ</a></li>
              <li class="nav-item footer__item"><a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">プライバシーポリシー</a></li>
            </ul>
          </nav>
        </div>
        <p class="footer__copyright">©桜のこもれびキッズランド All Rights Reserved.</p>
      </div>
      <div id="back-to-top" class="page-top-btn">
        <p><i class="fa-solid fa-chevron-up"></i></p>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>