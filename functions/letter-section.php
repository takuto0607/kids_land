<?php
  function letter_section ($display_num = 6, $page_type = "front-page") {
?>

<section id="letter" class="letter">
  <div class="letter__inner letter__inner--<?php echo esc_attr($page_type); ?>">
    <div class="section-title">
      <div class="section-title__inner fade-up">
        <div class="section-title__img">
          <div class="img-wrapper">
            <img src="<?php echo echo_img("icon/letter-icon.svg"); ?>" width="72" height="72" alt="レターアイコン" loading="lazy">
          </div>
        </div>
        <h2>こもれびだより</h2>
        <p class="capitalize">letter</p>
      </div>
    </div>
    <div class="letter__container">
      <div class="letter__card-group-wrapper">
        <div class="letter__card-group">
          <?php
          // 最新の投稿6件を取得
          $letter_args = array (
            'post_type' => 'letter',
            'posts_per_page' => $display_num,
            'orderby' => 'date',
            'order' => 'DESC',
          );
  
          $letter_query = new WP_Query($letter_args);
  
          if ($letter_query->have_posts()) :
            while ($letter_query->have_posts()) : $letter_query->the_post() ;
          ?>
          <div class="letter__card fade-up">
            <a class="letter__card-link" href="<?php echo esc_url(get_permalink()); ?>">
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
              <div class="letter__card-img">
                <div class="img-wrapper">
                  <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="320" height="135" loading="lazy">
                </div>
              </div>
              <div class="letter__card-content">
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
                <h3><?php echo esc_html($nursery_name); ?>からのおたより</h3>
                <p><?php the_title(); ?></p>
                <div class="letter__card-date">
                  <time datetime="<?php echo echo esc_attr(get_the_time('c')); ?>"><?php echo esc_html(get_the_date('Yねんnがつjにち')); ?></time>
                </div>
              </div>
            </a>
          </div>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
      <div class="letter__btn-wrapper">
        <div class="btn fade-up">
          <a href="<?php echo esc_url(home_url('/letter')); ?>">もっと見る</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
}