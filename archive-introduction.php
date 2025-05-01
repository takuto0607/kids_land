<?php
/*
  template Name: 各園のご紹介
*/
?>
<?php get_header(); ?>
<main>
  <div class="page-top page-top-long">
    <div class="page-top-inner">
      <div class="page-heading">
        <div class="page-title">
          <h1>各園のご紹介</h1>
          <p class="capitalize">introduction</p>
        </div>
      </div>
      <div class="breadcrumb">
        <ul class="breadcrumb__list">
          <li class="breadcrumb__item">
            <a class="uppercase" href="<?php echo esc_url(home_url()); ?>">top</a>
          </li>
          <li class="breadcrumb__item">
            <span class="breadcrumb__separator"><i class="fa-solid fa-chevron-right"></i></span>
            <span><?php echo esc_html( get_the_title() ); ?></span>
          </li>
          <li class="breadcrumb__item">
            <span class="breadcrumb__separator"><i class="fa-solid fa-chevron-right"></i></span>
            <span><?php echo esc_html( get_the_title() ); ?></span>
          </li>
        </ul>
      </div>
      <?php // breadcrumb(); ?>
    </div>
  </div>

  <!-- Archive Introduction -->
  <section class="archive-introduction">
    <div class="section-title">
      <div class="section-title__inner">
        <div class="section-title__img">
          <div class="img-wrapper">
            <img src="<?php echo echo_img("icon/introduction-icon.svg"); ?>" width="72" height="72" alt="イントロダクションアイコン" loading="lazy">
          </div>
        </div>
      </div>
    </div>
    <div class="archive-introduction__content">
      <div class="archive-introduction__tab-group">
        <p class="archive-introduction__tab active">園の種類<br>から探す</p>
        <p class="archive-introduction__tab">都道府県<br>から探す</p>
      </div>
      <div class="archive-introduction__main">
        <div class="archive-introduction__main-inner">
          <div class="archive-introduction__tag-group">
            <p class="archive-introduction__tag archive-introduction__tag--nuresery-type active">認可保育所</p>
            <p class="archive-introduction__tag archive-introduction__tag--nuresery-type">認可保育所</p>
            <p class="archive-introduction__tag archive-introduction__tag--nuresery-type">認可保育所</p>
          </div>
          <div class="archive-introduction__card-group">
            <a class="archive-introduction__card" href="<?php echo esc_url(home_url()); ?>">
              <div class="archive-introduction__card-img">
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("card-april.webp"); ?>" width="296" height="180" alt="進級・入園おめでとうの会" loading="lazy">
                </div>
              </div>
              <div class="archive-introduction__card-content">
                <div class="archive-introduction__card-info">
                  <p>認可保育所</p>
                  <p>東京都</p>
                </div>
                <h3>しぶや園</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Recruit -->
  <?php recruit_section(); ?>
</main>
<?php get_footer(); ?>