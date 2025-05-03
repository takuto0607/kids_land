<?php get_header(); ?>
  <main>
    <!-- First View -->
    <section id="fv" class="fv">
      <div class="fv__bg">
        <div class="fv__title">
          <h1>一人ひとりの輝きが、<br>未来を彩る</h1>
        </div>
      </div>
      <?php
      // 最新の投稿1件を取得
      $info_args = array (
        'post_type' => 'info',
        'posts_per_page' => 1,
        'orderBy' => 'date',
        'order' => 'DESC',
      );

      $info_query = new WP_Query($info_args);

      if ($info_query->have_posts()) :
        while ($info_query->have_posts()) : $info_query->the_post() ;
      ?>
      <article>
        <a href="<?php echo esc_url(get_permalink()); ?>">
          <h3>お知らせ</h3>
          <h4><?php the_title(); ?></h4>
          <p>
            <time datetime="<?php echo esc_attr(get_the_modified_time('c')); ?>"><?php echo esc_html( get_the_modified_date('Yねんnがつjにち') ); ?></time>
          </p>
        </a>
      </article>
      <?
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </section>

    <!-- Welcome -->
    <section id="welcome" class="welcome">
      <div class="section-title">
        <div class="section-title__inner">
          <div class="section-title__img">
            <div class="img-wrapper">
              <img src="<?php echo echo_img("icon/welcome-icon.svg"); ?>" width="72" height="72" alt="ウェルカムアイコン" loading="lazy">
            </div>
          </div>
          <h2>桜のこもれびキッズランドへ<br>ようこそ</h2>
          <p class="capitalize">welcome</p>
        </div>
      </div>
      <div class="welcome__content">
        <p>「こもれび」とは<br>風に揺れる木の葉によって生み出される光と影の揺らめきを表すことばです。<br>それはその瞬間に一度だけ存在します。</p>
        <p>桜のこもれびキッズランドは、<br>子どもたち一人ひとりが独自の輝きを放つように、<br>大切な個性を伸ばす場所です。<br>温かく包み込むような雰囲気の中で、安心して成長できる環境を提供し、<br>笑顔あふれる毎日をお約束します。</p>
      </div>
    </section>

    <!-- Introduction -->
    <section id="introduction" class="introduction">
      <div class="introduction__container">
        <div class="section-title">
          <div class="section-title__inner">
            <div class="section-title__img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("icon/introduction-icon.svg"); ?>" width="72" height="72" alt="イントロダクションアイコン" loading="lazy">
              </div>
            </div>
            <h2>各園のご紹介</h2>
            <p class="capitalize">introduction</p>
          </div>
        </div>
        <div class="introduction__prefecture-group-wrapper">
          <div class="introduction__prefecture-group">
            <div class="introduction__prefecture">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=tokyo')); ?>">東京都</a>
            </div>
            <div class="introduction__prefecture">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=kanagawa')); ?>">神奈川県</a>
            </div>
            <div class="introduction__prefecture">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=saitama')); ?>">埼玉県</a>
            </div>
            <div class="introduction__prefecture">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=chiba')); ?>">千葉県</a>
            </div>
            <div class="introduction__prefecture">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=osaka')); ?>">大阪府</a>
            </div>
            <div class="introduction__prefecture">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=kyoto')); ?>">京都府</a>
            </div>
          </div>
        </div>
        <div class="btn">
          <a href="<?php echo esc_url(home_url('/introduction')); ?>">一覧ページへ</a>
        </div>
      </div>
    </section>
    
    <!-- Letter -->
    <section id="letter" class="letter">
      <div class="section-title">
        <div class="section-title__inner">
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
              'posts_per_page' => 6,
              'orderBy' => 'date',
              'order' => 'DESC',
            );

            $letter_query = new WP_Query($letter_args);

            if ($letter_query->have_posts()) :
              while ($letter_query->have_posts()) : $letter_query->the_post() ;
            ?>
            <div class="letter__card">
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
                    <time datetime="<?php echo esc_attr(get_the_modified_time('c')); ?>"><?php echo esc_html( get_the_modified_date('Yねんnがつjにち') ); ?></time>
                  </div>
                </div>
              </a>
            </div>
            <?
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </div>
        </div>
        <div class="letter__btn-wrapper">
          <div class="btn">
            <a href="<?php echo esc_url(home_url('/letter')); ?>">もっと見る</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Recruit -->
    <?php recruit_section(); ?>
  </main>
<?php get_footer(); ?>
