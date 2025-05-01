<?php
  function sitemap_section () {
?>

<section class="sitemap">
  <div class="section-title">
    <div class="section-title__inner">
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
        <a href="">TOP</a>
        <a href="">わたしたちのこと</a>
        <a href="">各園のご紹介</a>
        <a href="">こもれびだより</a>
        <a href="">お知らせ</a>
      </div>
      <div class="sitemap__column">
        <a href="">採用情報</a>
        <a href="">お問い合わせ</a>
        <a href="">サイトマップ</a>
        <a href="">プライバシーポリシー</a>
      </div>
    </div>
  </div>
</section>

<?php
}