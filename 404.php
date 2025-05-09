<?php
/*
  template Name: Page Not Found
*/
?>
<?php get_header(); ?>
<main>
  <div class="page-top page-404__page-top">
    <div class="page-top-inner open-fade-up">
      <div class="page-heading">
        <div class="page-title">
          <h1>お探しのページが<br class="break-sm">見あたりません。</h1>
          <p class="capitalize">page not found</p>
        </div>
      </div>
      <?php breadcrumb(); ?>
    </div>
  </div>

  <!-- 404 Not Found -->
  <section class="page-404">
    <div class="page-404__container">
      <p class="fade-up">申し訳ございません。<br>お探しのページは見つかりませんでした。<br>以下の可能性がございます。</p>
      <p class="fade-up">・URLが変更された<br>・ページが存在しない</p>
      <p class="fade-up">恐れ入りますが、以下のリンクからお探しのページにお入りください。</p>
    </div>
  </section>

  <!-- Sitemap -->
  <?php sitemap_section(); ?>
</main>
<?php get_footer(); ?>