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
      <?php breadcrumb(); ?>
    </div>
  </div>

  <!-- Sitemap -->
  <?php sitemap_section(); ?>
</main>
<?php get_footer(); ?>