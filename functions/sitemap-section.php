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
        <a class="fade-up" href="<?php echo esc_url(home_url()); ?>">TOP</a>
        <a class="fade-up" href="<?php echo esc_url(home_url('/about')); ?>">わたしたちのこと</a>
        <a class="fade-up" href="<?php echo esc_url(home_url('/introduction')); ?>">各園のご紹介</a>
        <a class="fade-up" href="<?php echo esc_url(home_url('/letter')); ?>">こもれびだより</a>
        <a class="fade-up" href="<?php echo esc_url(home_url('/info')); ?>">お知らせ</a>
      </div>
      <div class="sitemap__column">
        <a class="fade-up" href="<?php echo esc_url(home_url('/recruit')); ?>">採用情報</a>
        <a class="fade-up" href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a>
        <a class="fade-up" href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a>
        <a class="fade-up" href="<?php echo esc_url(home_url('/privacy-policy')); ?>">プライバシーポリシー</a>
      </div>
    </div>
  </div>
</section>

<?php
}