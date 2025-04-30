<?php
/*
  template Name: Sitemap
*/
?>
<?php get_header(); ?>
<main>
  <div class="page-top page-top-long">
    <div class="page-top-inner">
      <div class="page-heading">
        <div class="page-title">
          <h1>サイトマップ</h1>
          <p class="capitalize">sitemap</p>
        </div>
      </div>
      <div class="breadcrumb">
        <ul class="breadcrumb__list">
          <li class="breadcrumb__item">
            <a class="uppercase" href="<?php echo esc_url(home_url()); ?>">top</a>
          </li>
          <li class="breadcrumb__item">
            <span class="breadcrumb__separator"><i class="fa-solid fa-chevron-right"></i></span>
            <span><?php the_title(); ?></span>
          </li>
        </ul>
      </div>
      <?php // breadcrumb(); ?>
    </div>
  </div>

  <!-- Sitemap -->
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
</main>
<?php get_footer(); ?>