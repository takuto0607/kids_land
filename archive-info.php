<?php get_header(); ?>
<main>
  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  // GET パラメータの取得
  $target_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : 'all';

  // WP_Queryの引数を定義
  $args = [
    'post_type' => 'info',
    'posts_per_page' => 10,
    'paged' => $paged,
  ];

  // 「すべて」以外が選択されたときのみ、タクソノミークエリを追加
  if ($target_category !== 'all') {
    $args['tax_query'] = [
      [
        'taxonomy' => 'info-category',
        'field' => 'slug',
        'terms' => $target_category,
      ]
    ];
  }

  $query = new WP_Query($args);
  ?>
  <div class="page-top archive-info__page-top">
    <div class="page-top-inner open-fade-up">
      <div class="page-heading">
        <div class="page-title">
          <h1>お知らせ</h1>
          <p class="capitalize">info</p>
        </div>
      </div>
      <?php breadcrumb(); ?>
    </div>
  </div>

  <!-- Archive Info -->
   <section class="archive-info">
    <div class="archive-info__content">
      <ul class="archive-info__tag-group fade-up">
        <li class="archive-info__tag" data-category="all">すべて</li>
        <?php
        $display_categories = get_terms([
          'taxonomy' => 'info-category',
          'hide_empty' => true,
          'orderby' => 'term_id',
          'order' => 'ASC',
          'parent' => 0,
        ]);
        if ($display_categories && !is_wp_error($display_categories)):
          foreach ($display_categories as $display_category):
        ?>
          <li class="archive-info__tag" data-category="<?php echo esc_attr($display_category->slug); ?>">
            <?php echo esc_html($display_category->name); ?>
          </li>
        <?php
          endforeach;
        endif;
        ?>
      </ul>
      <div class="archive-info__main">
        <div class="archive-info__link-group">
          <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <a class="archive-info__link fade-up" href="<?php echo esc_url(get_permalink()); ?>">
              <?php
              $info_cateory = get_the_terms(get_the_ID(), 'info-category');
              $term = $info_cateory[0];
              $category_slug = $term->slug;
              $category_name = $term->name;

              switch ($category_slug) {
                case "activities":
                  $icon_url = "icon/slug-activities-icon.svg";
                  break;
                case "media-coverage":
                  $icon_url = "icon/slug-media-coverage-icon.svg";
                  break;
                default:
                  $icon_url = "icon/slug-news-icon.svg";
                  break;
              }
              ?>
              <div class="archive-info__link-icon archive-info__link-icon--pc archive-info__link-icon--<?php echo esc_attr($category_slug); ?>">
                <div class="archive-info__link-img">
                  <div class="img-wrapper">
                    <img src="<?php echo echo_img($icon_url); ?>" width="48" height="48" alt="<?php echo $category_name; ?>アイコン" loading="lazy">
                  </div>
                </div>
                <p><?php echo $category_name; ?></p>
              </div>
              <div class="archive-info__link-content">
                <div class="archive-info__link-icon--sp">
                  <div class="archive-info__link-icon archive-info__link-icon--<?php echo esc_attr($category_slug); ?>">
                    <div class="archive-info__link-img">
                      <div class="img-wrapper">
                        <img src="<?php echo echo_img($icon_url); ?>" width="48" height="48" alt="<?php echo $category_name; ?>アイコン" loading="lazy">
                      </div>
                    </div>
                    <p><?php echo $category_name; ?></p>
                  </div>
                  <p class="archive-info__link-date"><time datetime="<?php echo esc_attr(get_the_modified_time('c')); ?>"><?php echo esc_html( get_the_modified_date('Y.m.d') ); ?></time></p>
                </div>
                <p class="archive-info__link-date archive-info__link-date--pc"><time datetime="<?php echo esc_attr(get_the_modified_time('c')); ?>"><?php echo esc_html( get_the_modified_date('Y.m.d') ); ?></time></p>
                <h2><?php the_title(); ?></h2>
                <?php
                $excerpt = get_the_excerpt();
                if (!empty($excerpt)):
                ?>
                  <p class="archive-info__link-excerpt"><?php echo get_the_excerpt(); ?></p>
                <?php else: ?>
                  <p>この記事に本文はありません。</p>
                <?php endif; ?>
              </div>
            </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else: ?>
            <p>該当するお知らせ記事はありません。</p>
          <?php endif; ?>
        </div>
        <div class="pagination fade-up">
            <?php
            echo paginate_links([
                'total' => $query->max_num_pages,
                'current' => $paged,
                'format' => '?paged=%#%',
                'add_args' => [
                    'category' => $target_category,
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