<?php
function breadcrumb () {
?>

<div class="breadcrumb">
  <ul class="breadcrumb__list">
    <li class="breadcrumb__item">
      <a class="uppercase" href="<?php echo esc_url(home_url()); ?>">top</a>
    </li>

    <!-- 固定ページ -->
    <?php if (is_page()) : ?>
      <li class="breadcrumb__item">
        <span><i class="fa-solid fa-chevron-right"></i></span>
        <span class="breadcrumb__padding"><?php echo esc_html(get_the_title()); ?></span>
      </li>

    <!-- 各園のご紹介の一覧ページ -->
    <?php elseif (is_post_type_archive('introduction')) : ?>
      <?php
        $taxonomy = isset($_GET['taxonomy']) ? sanitize_text_field($_GET['taxonomy']) : '';
        switch ($taxonomy) {
          case 'prefecture':
            $display_item = '都道府県から探す';
            break;
          default:
            $display_item = '園の種類から探す';
            break;
        }
      ?>
      <li class="breadcrumb__item">
        <span><i class="fa-solid fa-chevron-right"></i></span>
        <span class="breadcrumb__padding breadcrumb__padding--right"><?php post_type_archive_title(); ?></span>
      </li>
      <li class="breadcrumb__item">
        <span><i class="fa-solid fa-chevron-right"></i></span>
        <span class="breadcrumb__padding"><?php echo esc_html($display_item); ?></span>
      </li>

    <!-- その他のカスタム投稿のアーカイブページ -->
    <?php elseif (is_post_type_archive()) : ?>
      <li class="breadcrumb__item">
        <span><i class="fa-solid fa-chevron-right"></i></span>
        <span class="breadcrumb__padding"><?php post_type_archive_title(); ?></span>
      </li>

    <!-- 記事ページ -->
    <?php elseif (is_single()) : ?>
      <li class="breadcrumb__item">
        <span><i class="fa-solid fa-chevron-right"></i></span>
        <a class="breadcrumb__padding" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
          <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
        </a>
      </li>
      <li class="breadcrumb__item">
        <span><i class="fa-solid fa-chevron-right"></i></span>
        <span class="breadcrumb__padding"><?php echo esc_html(the_title()); ?></span>
      </li>
  
      <!-- 404エラーページ -->
    <?php elseif (is_404()) : ?>
      <li class="breadcrumb__item">
        <span><i class="fa-solid fa-chevron-right"></i></span>
        <span class="breadcrumb__padding">404</span>
      </li>
    <?php endif;?>
  </ul>
</div>


<?php
}