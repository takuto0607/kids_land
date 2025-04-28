<?php
/*
  template Name: 園の詳細
*/
?>
<?php get_header(); ?>
<main>
  <?php
  if (have_posts()) : while (have_posts()) : the_post();

  // 園の種類を取得
  $nursery_types = get_the_terms(get_the_ID(), 'nursery-type');
  if (!empty($nursery_types) && !is_wp_error($nursery_types)) {
    $nursery_type = $nursery_types[0];
  }
  ?>
  <div class="page-top">
    <div class="page-top-inner">
      <div class="page-heading">
        <div class="page-title">
          <h1>桜のこもれびキッズランド</h1>
          <div class="page-title__flex-box">
            <?php if (isset($nursery_type)) : ?>
              <p><?php echo esc_html($nursery_type->name); ?></p>
            <?php endif; ?>
            <p><?php the_title(); ?></p>
          </div>
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

  <!-- Message -->
  <section class="message">
    <div class="message__title">
      <div class="section-title">
        <div class="section-title__inner">
          <div class="section-title__img">
            <div class="img-wrapper">
              <img src="<?php echo echo_img("icon/message-icon.svg"); ?>" width="72" height="72" alt="メッセージアイコン" loading="lazy">
            </div>
          </div>
          <h2>園長からのメッセージ</h2>
          <p class="capitalize">message</p>
        </div>
      </div>
    </div>
    <div class="message__container">
      <div class="message__inner">
        <div class="message__img">
          <?php $director_image = get_field('director_image'); ?>
          <?php if ($director_image) : ?>
            <div class="img-wrapper">
              <img src="<?php echo esc_url($director_image['url']); ?>" alt="<?php echo esc_attr($director_image['alt']); ?>" width="300" height="400" loading="lazy">
            </div>
          <?php endif; ?>
        </div>
        <div class="message__text">
          <?php
          $director_message = get_field('director_message');
          if ($director_message) :
            echo wpautop(esc_html($director_message));
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>

  <!-- About Nursery -->
  <section class="about-nursery">
    <div class="about-nursery__title">
      <div class="section-title">
        <div class="section-title__inner">
          <div class="section-title__img">
            <div class="img-wrapper">
              <img src="<?php echo echo_img("icon/about-nursery-icon.svg"); ?>" width="72" height="72" alt="メッセージアイコン" loading="lazy">
            </div>
          </div>
          <h2>園の概要</h2>
          <p class="capitalize">about nursery</p>
        </div>
      </div>
    </div>
    <div class="about-nursery__content">
      <div class="about-nursery__row">
        <h3>所在地</h3>
        <address class="about-nursery__data"><?php the_field('nursery_address'); ?></address>
      </div>
      <div class="about-nursery__row">
        <h3 class="uppercase">tel / fax</h3>
        <address class="about-nursery__data about-nursery__data--tel"><a href=""><?php the_field('nursery_tel'); ?></a> / <?php the_field('nursery_fax'); ?></address>
      </div>
      <div class="about-nursery__row">
        <h3>対象</h3>
        <p class="about-nursery__data">1歳児から小学校就学前までの乳幼児（1歳児～5歳児）</p>
      </div>
      <div class="about-nursery__row">
        <h3>入園日</h3>
        <p class="about-nursery__data about-nursery__data--admission-date">原則として毎月1日<br>初回は見学になります。<br>他の保護者や園児及び職員との三密対応及び保育園の日程により、見学日時に制限がある場合がございます。ご理解のうえ、ご連絡願います。</p>
      </div>
      <div class="about-nursery__row">
        <h3>開園日</h3>
        <div class="about-nursery__data"></div>
      </div>
      <div class="about-nursery__row">
        <h3>保育時間</h3>
        <div class="about-nursery__data">
          <div class="about-nursery__data--care-hours">
            <h4>保育標準時間認定の方</h4>
            <div class="about-nursery__data--table">
              <div class="about-nursery__data--table-row">
                <h5>保育標準時間</h5>
                <p>7:30～18:30</p>
              </div>
              <div class="about-nursery__data--table-row">
                <h5>延長保育</h5>
                <p>18:31～19:30</p>
              </div>
            </div>
          </div>
          <div class="about-nursery__data--care-hours">
            <h4>保育短時間認定の方</h4>
            <div class="about-nursery__data--table">
              <div class="about-nursery__data--table-row">
                <h5>保育標準時間</h5>
                <p>9:00～17:00</p>
              </div>
              <div class="about-nursery__data--table-row">
                <h5>延長保育</h5>
                <p>7:30～8:59<br>17:01～19:30</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="about-nursery__row">
        <h3>定員</h3>
        <div class="about-nursery__data"></div>
      </div>
      <div class="about-nursery__row">
        <h3>職員</h3>
        <div class="about-nursery__data"></div>
      </div>
    </div>
  </section>
  <?php endwhile; endif; ?>

  <!-- Contact -->
  <?php contact_section(); ?>
</main>
<?php get_footer(); ?>