<?php
/*
  template Name: 各園のご紹介
*/
?>
<?php get_header(); ?>
<main>
  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  // GET パラメータの取得
  $taxonomy = isset($_GET['taxonomy']) ? sanitize_text_field($_GET['taxonomy']) : '';
  $slug = isset($_GET['slug']) ? sanitize_text_field($_GET['slug']) : '';

  // デフォルト値を定義
  $default_terms = [
    'nursery-type' => 'certified-nursery',
    'prefecture' => 'hokkaido',
  ];

  // タクソノミーとタームを決定
  $target_taxonomy = array_key_exists($taxonomy, $default_terms) ? $taxonomy : 'nursery-type';
  $target_terms = $slug ?: $default_terms[$target_taxonomy];

  // タクソノミークエリを構築
  $tax_query = [
    [
        'taxonomy' => $target_taxonomy,
        'field' => 'slug',
        'terms' => $target_terms,
    ]
  ];

  // クエリ構築
  $args = [
    'post_type' => 'introduction',
    'posts_per_page' => 9,
    'paged' => $paged,
    'tax_query' => $tax_query,
  ];

  $query = new WP_Query($args);
  ?>
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
        <p class="archive-introduction__tab" data-tab="nursery-type">園の種類<br>から探す</p>
        <p class="archive-introduction__tab" data-tab="prefecture">都道府県<br>から探す</p>
      </div>
      <div class="archive-introduction__main">
        <div class="archive-introduction__main-inner">
          <div class="archive-introduction__tag-group">
            <?php
            $display_terms = get_terms([
              'taxonomy' => $target_taxonomy,
              'hide_empty' => true,
              'orderby' => 'term_id',
              'order' => 'ASC',
              'parent' => 0,
            ]);

            if ($display_terms && !is_wp_error($display_terms)):
              foreach ($display_terms as $display_term):
            ?>
              <p class="archive-introduction__tag archive-introduction__tag--<?php echo esc_attr($target_taxonomy); ?>"
                data-tag="<?php echo esc_attr($display_term->slug); ?>">
                <?php echo esc_html($display_term->name); ?>
              </p>
            <?php
              endforeach;
            endif;
            ?>
          </div>
          <div class="archive-introduction__card-group">
          <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <a class="archive-introduction__card" href="<?php echo esc_url(home_url()); ?>">
              <?php
                if (has_post_thumbnail()) {
                  $thumbnail_id = get_post_thumbnail_id();
                  $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: echo_img("no-image.webp");
                  $image_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                  if (empty($image_alt)) {
                    $image_alt = get_the_title();
                  }
                } else {
                  $image_url = echo_img("no-image.jpg");
                  $image_alt = "アイキャッチ画像未登録";
                }
              ?>
              <div class="archive-introduction__card-img">
                <div class="img-wrapper">
                  <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="296" height="180" loading="lazy">
                </div>
              </div>
              <div class="archive-introduction__card-content">
                <div class="archive-introduction__card-info">
                  <?php
                  $term_nursery_type = get_the_terms(get_the_ID(), 'nursery-type');
                  if (!is_wp_error($term_nursery_type) && !empty($term_nursery_type)):
                  ?>
                    <p><?php echo $term_nursery_type[0]->name; ?></p>
                  <?php
                  endif;

                  $term_prefecture = get_the_terms(get_the_ID(), 'prefecture');
                  if (!is_wp_error($term_prefecture) && !empty($term_prefecture)):
                  ?>
                    <p><?php echo $term_prefecture[0]->name; ?></p>
                  <?php endif; ?>
                </div>
                <h3><?php the_title(); ?></h3>
              </div>
            </a>
            <?php endwhile; ?>
          <?php else: ?>
            <p>該当する園はありません。</p>
          <?php endif; ?>
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
    </div>
  </section>

  <!-- Recruit -->
  <?php recruit_section(); ?>
</main>
<?php get_footer(); ?>