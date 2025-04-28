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
  <?php endwhile; endif; ?>

  <!-- Contact -->
  <?php contact_section(); ?>
</main>
<?php get_footer(); ?>