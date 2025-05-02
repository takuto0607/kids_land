<?php
/*
  template Name: お知らせ一覧
*/
?>
<?php get_header(); ?>
<main>
  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  // GET パラメータの取得
  // $target_taxonomy = isset($_GET['taxonomy']) ? sanitize_text_field($_GET['taxonomy']) : '';
  $target_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : 'all';

  // デフォルト値を定義
  // $default_terms = [
  //   'nursery-type' => 'certified-nursery',
  //   'prefecture' => 'hokkaido',
  // ];

  // タクソノミーとタームを決定
  // $target_taxonomy = array_key_exists($taxonomy, $default_terms) ? $taxonomy : 'nursery-type';
  // $target_terms = $slug ?: $default_terms[$target_taxonomy];

  // タクソノミークエリを構築
  $tax_query = [
    [
        'taxonomy' => 'letter-category',
        'field' => 'slug',
        'terms' => $target_category,
    ]
  ];

  // クエリ構築
  $args = [
    'post_type' => 'info',
    'posts_per_page' => 10,
    'paged' => $paged,
    'tax_query' => $tax_query,
  ];

  $query = new WP_Query($args);
  ?>
  <div class="page-top page-top-long">
    <div class="page-top-inner">
      <div class="page-heading">
        <div class="page-title">
          <h1>お知らせ</h1>
          <p class="capitalize">info</p>
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

  <!-- Archive Info -->
   <section class="archive-info">
    <div class="archive-info__content">
      <ul class="archive-info__tag-group">
        <li class="archive-info__tag active">すべて</li>
        <li class="archive-info__tag">お知らせ</li>
        <li class="archive-info__tag">お知らせ</li>
        <li class="archive-info__tag">お知らせ</li>
      </ul>
      <div class="archive-info__main">
        <div class="archive-info__link-group">
          <a class="archive-info__link" href="">
            <div class="archive-info__link-icon">
              <div class="archive-info__link-img">
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("icon/slug-info-icon.svg"); ?>" width="48" height="48" alt="イントロダクションアイコン" loading="lazy">
                </div>
              </div>
              <p>お知らせ</p>
            </div>
            <div class="archive-info__link-content">
              <p class="archive-info__link-date"><time datetime="">2024.04.01</time></p>
              <h2>タイトルが入ります。タイトルが入ります。</h2>
              <p>本文の抜き出しが入ります。本文の抜き出しが入ります。本文の抜き出しが入ります。本文の抜き出しが...</p>
            </div>
          </a>
          <a class="archive-info__link" href="">
            <div class="archive-info__link-icon">
              <div class="archive-info__link-img">
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("icon/slug-info-icon.svg"); ?>" width="48" height="48" alt="イントロダクションアイコン" loading="lazy">
                </div>
              </div>
              <p>お知らせ</p>
            </div>
            <div class="archive-info__link-content">
              <p><time datetime="">2024.04.01</time></p>
              <h2>タイトルが入ります。タイトルが入ります。</h2>
              <p>本文の抜き出しが入ります。本文の抜き出しが入ります。本文の抜き出しが入ります。本文の抜き出しが...</p>
            </div>
          </a>
          <a class="archive-info__link" href="">
            <div class="archive-info__link-icon">
              <div class="archive-info__link-img">
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("icon/slug-info-icon.svg"); ?>" width="48" height="48" alt="イントロダクションアイコン" loading="lazy">
                </div>
              </div>
              <p>お知らせ</p>
            </div>
            <div class="archive-info__link-content">
              <p><time datetime="">2024.04.01</time></p>
              <h2>タイトルが入ります。タイトルが入ります。</h2>
              <p>本文の抜き出しが入ります。本文の抜き出しが入ります。本文の抜き出しが入ります。本文の抜き出しが...</p>
            </div>
          </a>
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
    </div>
   </section>
</main>
<?php get_footer(); ?>