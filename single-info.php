<?php
/*
  template Name: お知らせ詳細
*/
?>
<?php get_header(); ?>
<main>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="page-top">
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

  <!-- Single Info -->
  <section class="single-info">
    <div class="single-info__content">
      <div class="single-info__content-title fade-up">
        <p><time datetime="<?php echo esc_attr(get_the_modified_time('c')); ?>"><?php echo esc_html( get_the_modified_date('Y.m.d') ); ?></time></p>
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
      <div class="single-info__thumbnail fade-up">
        <div class="img-wrapper">
          <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="640" height="320" loading="lazy">
        </div>
      </div>
      <div class="single-info__text">
        <?php
        $content = trim( get_the_content() );
        if (!empty( $content )) :
        ?>
        <div class="single-info__main-text fade-up">
          <?php the_content(); ?>
        </div>
        <?php endif; ?>
        <?php
        $info_sections = get_post_meta(get_the_ID(), 'info_sections', true);
        if (!empty($info_sections)) :
          foreach ($info_sections as $section) :
        ?>
        <div class="single-info__sub-section">
          <h3 class="fade-up"><?php echo esc_html($section['info_heading']); ?></h3>
          <p class="fade-up"><?php echo nl2br(esc_html($section['info_text'])); ?></p>
        </div>
        <?php
          endforeach;
        endif;
        ?>
      </div>
      <div class="single-info__btn">
        <div class="btn btn-large fade-up">
          <a href="<?php echo esc_url(home_url('/info')); ?>">お知らせ一覧へ</a>
        </div>
      </div>
    </div>
  </section>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>