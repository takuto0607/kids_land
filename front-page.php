<?php get_header(); ?>
  <main>
    <!-- First View -->
    <section id="fv" class="fv">
      <div class="fv__bg">
        <div class="fv__title">
          <h1 class="open-fade-up">一人ひとりの輝きが、<br>未来を彩る</h1>
        </div>
      </div>
      <?php
      // 最新の投稿1件を取得
      $info_args = array (
        'post_type' => 'info',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
      );

      $info_query = new WP_Query($info_args);

      if ($info_query->have_posts()) :
        while ($info_query->have_posts()) : $info_query->the_post() ;
      ?>
      <article class="open-fade-up">
        <a href="<?php echo esc_url(get_permalink()); ?>">
          <h3>お知らせ</h3>
          <h4><?php the_title(); ?></h4>
          <p>
            <time datetime="<?php echo esc_attr(get_the_time('c'));  ?>"><?php echo esc_html(get_the_date('Yねんnがつjにち')); ?></time>
          </p>
        </a>
      </article>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </section>

    <!-- Welcome -->
    <section id="welcome" class="welcome">
      <div class="section-title fade-up">
        <div class="section-title__inner">
          <div class="section-title__img">
            <div class="img-wrapper">
              <img src="<?php echo echo_img("icon/welcome-icon.svg"); ?>" width="72" height="72" alt="ウェルカムアイコン" loading="lazy">
            </div>
          </div>
          <h2 class="section-title__title-small">桜のこもれびキッズランドへ<br>ようこそ</h2>
          <p class="capitalize">welcome</p>
        </div>
      </div>
      <div class="welcome__content fade-up">
        <p>「こもれび」とは<br>風に揺れる木の葉によって生み出される<br class="break-lg">光と影の揺らめきを表すことばです。<br>それはその瞬間に一度だけ存在します。</p>
        <p>桜のこもれびキッズランドは、<br>子どもたち一人ひとりが<br class="break-sm">独自の輝きを放つように、<br>大切な個性を伸ばす場所です。<br>温かく包み込むような雰囲気の中で、<br class="break-lg">安心して成長できる環境を提供し、<br>笑顔あふれる毎日をお約束します。</p>
      </div>
    </section>

    <!-- Introduction -->
    <section id="introduction" class="introduction">
      <div class="introduction__container">
        <div class="section-title fade-up">
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
            <div class="introduction__prefecture fade-up">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=tokyo')); ?>">東京都</a>
            </div>
            <div class="introduction__prefecture fade-up">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=kanagawa')); ?>">神奈川県</a>
            </div>
            <div class="introduction__prefecture fade-up">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=saitama')); ?>">埼玉県</a>
            </div>
            <div class="introduction__prefecture fade-up">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=chiba')); ?>">千葉県</a>
            </div>
            <div class="introduction__prefecture fade-up">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=osaka')); ?>">大阪府</a>
            </div>
            <div class="introduction__prefecture fade-up">
              <a href="<?php echo esc_url(home_url('/introduction?taxonomy=prefecture&slug=kyoto')); ?>">京都府</a>
            </div>
          </div>
        </div>
        <div class="btn fade-up">
          <a href="<?php echo esc_url(home_url('/introduction')); ?>">一覧ページへ</a>
        </div>
      </div>
    </section>
    
    <!-- Letter -->
    <?php letter_section(6, "front-page"); ?>

    <!-- Recruit -->
    <?php recruit_section(); ?>
  </main>
<?php get_footer(); ?>
