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
  <?php sitemap_section(); ?>
</main>
<?php get_footer(); ?>