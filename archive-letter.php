<?php get_header(); ?>
<main>
  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  // GET パラメータの取得
  $target_prefecture = isset($_GET['prefecture']) ? sanitize_text_field($_GET['prefecture']) : 'all';
  $target_nursery = isset($_GET['nursery']) ? sanitize_text_field($_GET['nursery']) : 'all';

  // クエリ構築
  $args = [
    'post_type' => 'letter',
    'posts_per_page' => 9,
    'paged' => $paged,
  ];

  // タクソノミークエリを構築
  $tax_query = [];

  if ($target_prefecture !== 'all') {
    $tax_query[] = [
        'taxonomy' => 'prefecture',
        'field'    => 'slug',
        'terms'    => $target_prefecture,
    ];
  }

  if ($target_nursery !== 'all') {
    $tax_query[] = [
        'taxonomy' => 'prefecture',
        'field'    => 'slug',
        'terms'    => $target_nursery,
        'include_children' => false,
    ];
  }

  if (count($tax_query) > 1) {
    $tax_query['relation'] = 'AND';
  }

  // タクソノミーがある場合のみ tax_query を追加
  if (!empty($tax_query)) {
    $args['tax_query'] = $tax_query;
  }

  $query = new WP_Query($args);
  ?>
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
            <?php
            $all_terms = get_terms([
              'taxonomy' => 'prefecture',
              'hide_empty' => true,
              'orderby' => 'term_id',
              'order' => 'ASC',
            ]);

            $prefecture_terms = get_terms([
              'taxonomy' => 'prefecture',
              'hide_empty' => true,
              'orderby' => 'term_id',
              'order' => 'ASC',
              'parent' => '0',
            ]);
            ?>
            <div class="archive-letter__field">
              <div id="select-prefecture-field" class="archive-letter__select archive-letter__select--prefecture">
                <input type="text" readonly="readonly" placeholder="都道府県をえらぶ">
              </div>
              <div id="select-prefecture-box" class="archive-letter__box archive-letter__box--prefecture">
                <?php
                if (!is_wp_error($prefecture_terms) && !empty($prefecture_terms)):
                  foreach ($prefecture_terms as $prefecture_term):
                    $slug = $prefecture_term->slug;
                    $name = $prefecture_term->name;
                ?>
                <p class="option-prefecture" data-prefecture="<?php echo esc_attr($slug); ?>"><?php echo esc_html($name); ?></p>
                <?php
                  endforeach;
                endif;
                ?>
              </div>
            </div>
            <div class="archive-letter__field">
              <div id="select-nursery-field" class="archive-letter__select archive-letter__select--nursery">
                <input type="text" readonly="readonly" placeholder="園をえらぶ">
              </div>
              <div id="select-nursery-box" class="archive-letter__box archive-letter__box--nursery">
                <?php
                if (!is_wp_error($all_terms) && !empty($all_terms)) :
                  // 親ターム一覧を parent_id => slug の形式で保存
                  $parent_slug_map = [];
                  foreach ($all_terms as $term) {
                      if ($term->parent === 0) {
                          $parent_slug_map[$term->term_id] = $term->slug;
                      }
                  }

                  // 子タームを抽出して表示
                  foreach ($all_terms as $nursery_term) :
                    if ($nursery_term->parent !== 0 && isset($parent_slug_map[$nursery_term->parent])) :
                        $parent_slug = $parent_slug_map[$nursery_term->parent];
                        $slug = $nursery_term->slug;
                        $name = $nursery_term->name;
                ?>
                <p class="option-nursery" data-prefecture="<?php echo esc_attr($parent_slug); ?>" data-nursery="<?php echo esc_attr($slug); ?>"><?php echo esc_html($name); ?></p>
                <?php
                    endif;
                  endforeach;
                endif;
                ?>
              </div>
            </div>
            <p class="archive-letter__search-btn"><i class="fa-solid fa-magnifying-glass"></i></p>
          </div>
        </div>
        <div class="archive-letter__card-group">
          <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="archive-letter__card">
              <a class="archive-letter__card-link" href="">
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
                <div class="archive-letter__card-img">
                  <div class="img-wrapper">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="300" height="135" loading="lazy">
                  </div>
                </div>
                <div class="archive-letter__card-content">
                  <?php
                  $letter_info = get_the_terms(get_the_ID(), 'prefecture');
                  $nursery_name = '';

                  // 子ターム（親IDが0でない）を探す
                  if (!is_wp_error($letter_info) && !empty($letter_info)) {
                    foreach ($letter_info as $term) {
                        if ($term->parent !== 0) {
                            $nursery_name = $term->name;
                            break;
                        }
                    }
                  }
                  ?>
                  <h4><?php echo esc_html($nursery_name); ?>からのおたより</h4>
                  <h3><?php the_title(); ?></h3>
                  <div class="archive-letter__card-date">
                    <time datetime="<?php echo esc_attr(get_the_modified_time('c')); ?>"><?php echo esc_html( get_the_modified_date('Yねんnがつjにち') ); ?></time>
                  </div>
                </div>
              </a>
            </div>
            <?php endwhile; ?>
          <?php else: ?>
            <p>該当するこもれびだよりはありません。</p>
          <?php endif; ?>
        </div>
        <div class="pagination">
          <?php
          // echo paginate_links([
          //     'total' => $query->max_num_pages,
          //     'current' => $paged,
          //     'format' => '?paged=%#%',
          //     'add_args' => [
          //         'prefecture' => $target_prefecture,
          //         'nursery' => $target_nursery,
          //     ],
          //     'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
          //     'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
          // ]);
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