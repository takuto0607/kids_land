<?php
/*
  template Name: こもれびだより一覧
*/
?>
<?php get_header(); ?>
<main>
  <div class="page-top">
    <div class="page-top-inner">
      <div class="page-heading">
        <div class="page-title">
          <h1>こもれびだより</h1>
          <p class="capitalize">letter</p>
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
        </ul>
      </div>
      <?php // breadcrumb(); ?>
    </div>
  </div>

  <!-- Archive Letter -->
  <section class="archive-letter">
    <div class="archive-letter__inner">
      <div class="archive-letter__content">
        <div class="archive-letter__search">
          <h2>園をさがす</h2>
          <div class="archive-letter__search-group">
            <div class="archive-letter__select archive-letter__select--prefecture">
              <input type="text" readonly="readonly" placeholder="都道府県をえらぶ">
            </div>
            <div class="archive-letter__select archive-letter__select--nursery">
              <input type="text" readonly="readonly" placeholder="園をえらぶ">
            </div>
            <p class="archive-letter__search-btn"><i class="fa-solid fa-magnifying-glass"></i></p>
          </div>
        </div>
        <div class="archive-letter__card-group">
          <div class="archive-letter__card">
            <a class="archive-letter__card-link" href="">
              <div class="archive-letter__card-img">
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("letter-card.png"); ?>" alt="" width="300" height="135" loading="lazy">
                </div>
              </div>
              <div class="archive-letter__card-content">
                <h3>なは園からのおたより</h3>
                <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                <div class="archive-letter__card-date">
                  <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                </div>
              </div>
            </a>
          </div>
          <div class="archive-letter__card">
            <a class="archive-letter__card-link" href="">
              <div class="archive-letter__card-img">
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("letter-card.png"); ?>" alt="" width="300" height="135" loading="lazy">
                </div>
              </div>
              <div class="archive-letter__card-content">
                <h3>なは園からのおたより</h3>
                <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                <div class="archive-letter__card-date">
                  <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                </div>
              </div>
            </a>
          </div>
          <div class="archive-letter__card">
            <a class="archive-letter__card-link" href="">
              <div class="archive-letter__card-img">
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("letter-card.png"); ?>" alt="" width="300" height="135" loading="lazy">
                </div>
              </div>
              <div class="archive-letter__card-content">
                <h3>なは園からのおたより</h3>
                <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                <div class="archive-letter__card-date">
                  <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                </div>
              </div>
            </a>
          </div>
          <div class="archive-letter__card">
            <a class="archive-letter__card-link" href="">
              <div class="archive-letter__card-img">
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("letter-card.png"); ?>" alt="" width="300" height="135" loading="lazy">
                </div>
              </div>
              <div class="archive-letter__card-content">
                <h3>なは園からのおたより</h3>
                <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                <div class="archive-letter__card-date">
                  <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                </div>
              </div>
            </a>
          </div>
          <div class="archive-letter__card">
            <a class="archive-letter__card-link" href="">
              <div class="archive-letter__card-img">
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("letter-card.png"); ?>" alt="" width="300" height="135" loading="lazy">
                </div>
              </div>
              <div class="archive-letter__card-content">
                <h3>なは園からのおたより</h3>
                <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                <div class="archive-letter__card-date">
                  <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="pagination">
          <?php
          echo paginate_links([
              'total' => $query->max_num_pages,
              'current' => $paged,
              'format' => '?paged=%#%',
              'add_args' => [
                  'taxonomy' => $target_taxonomy,
                  'slug' => $target_terms,
              ],
              'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
              'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
          ]);
          ?>
        </div>
      </div>
      <div class="archive-letter__sidebar">
        <?php display_sidebar(); ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>