<?php
  function sitemap_section () {
?>

<section class="sitemap">
  <div class="section-title">
    <div class="section-title__inner fade-up">
      <div class="section-title__img">
        <div class="img-wrapper">
          <img src="<?php echo echo_img("icon/sitemap-icon.svg"); ?>" width="72" height="72" alt="サイトマップアイコン" loading="lazy">
        </div>
      </div>
    </div>
  </div>
  <div class="sitemap__content">
    <div class="sitemap__inner">
      <div class="sitemap__column">
        <div class="sitemap__item">
          <a class="fade-up" href="<?php echo esc_url(home_url()); ?>">TOP</a>
        </div>
        <div class="sitemap__item">
          <a class="fade-up" href="<?php echo esc_url(home_url('/about')); ?>">わたしたちのこと</a>
        </div>
        <div class="sitemap__item">
          <a class="fade-up" href="<?php echo esc_url(home_url('/introduction')); ?>">各園のご紹介</a>
        </div>
        <div class="sitemap__item">
          <a class="fade-up" href="<?php echo esc_url(home_url('/letter')); ?>">こもれびだより</a>
        </div>
        <div class="sitemap__item">
          <a class="fade-up" href="<?php echo esc_url(home_url('/info')); ?>">お知らせ</a>
        </div>
      </div>
      <div class="sitemap__column">
        <div class="sitemap__item">
          <a class="fade-up" href="<?php echo esc_url(home_url('/recruit')); ?>">採用情報</a>
        </div>
        <div class="sitemap__item">
          <a class="fade-up" href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a>
        </div>
        <div class="sitemap__item">
          <a class="fade-up" href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a>
        </div>
        <div class="sitemap__item">
          <a class="fade-up" href="<?php echo esc_url(home_url('/privacy-policy')); ?>">プライバシーポリシー</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
}