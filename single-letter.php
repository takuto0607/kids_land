<?php
/*
  template Name: こもれびだより詳細
*/
?>
<?php get_header(); ?>
<main>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php
  // 保育園名の取得
  $terms = get_the_terms(get_the_ID(), 'prefecture');
  $nursery = '';
  if ($terms && !is_wp_error($terms)) {
    foreach ( $terms as $term ) {
      if ($term->parent !== 0) {
          $nursery = $term->name;
          break;
      }
    }
  }
  ?>
  <div class="page-top">
    <div class="page-top-inner open-fade-up">
      <div class="page-heading">
        <div class="page-title">
          <h1>こもれびだより</h1>
          <p class="capitalize">letter</p>
        </div>
      </div>
      <?php breadcrumb($nursery); ?>
    </div>
  </div>

  <!-- Single Letter -->
  <section class="single-letter">
    <div class="single-letter__inner">
      <div class="single-letter__content">
        <div class="single-letter__content-title fade-up">
          <div class="single-letter__title-note">
            <?php if ($nursery) : ?>
              <p class="single-letter__title-nursery"><span></span><?php echo esc_html($nursery); ?>からのおたより</p>
            <?php endif; ?>
            <p><time datetime="<?php echo esc_attr(get_the_time('c')); ?>"><?php echo esc_html(get_the_date('Yねんnがつjにち')); ?></time></p>
          </div>
          <h2><?php echo esc_html( get_the_title() ); ?></h2>
        </div>
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
        <div class="single-letter__thumbnail fade-up">
          <div class="img-wrapper">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="640" height="320" loading="lazy">
          </div>
        </div>
        <div class="single-letter__text">
          <?php
          $content = trim( get_the_content() );
          if (!empty( $content )) :
          ?>
          <div class="single-letter__main-text fade-up">
            <?php the_content(); ?>
          </div>
          <?php endif; ?>
          <?php
          $letter_sections = get_post_meta(get_the_ID(), 'letter_sections', true);
          if (!empty($letter_sections)) :
            foreach ($letter_sections as $section) :
          ?>
          <div class="single-letter__sub-section">
            <h3 class="fade-up"><?php echo esc_html($section['letter_heading']); ?></h3>
            <p class="fade-up"><?php echo nl2br(esc_html($section['letter_text'])); ?></p>
          </div>
          <?php
            endforeach;
          endif;
          ?>
        </div>
        <div class="single-letter__btn">
          <div class="btn btn-large fade-up">
            <a href="<?php echo esc_url(home_url('/letter')); ?>">こもれびだより一覧へ</a>
          </div>
        </div>
      </div>
      <div class="single-letter__sidebar">
        <?php display_sidebar(); ?>
      </div>
    </div>
  </section>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>