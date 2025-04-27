<?php
function breadcrumb () {
?>

<div class="breadcrumb">
  <ul class="breadcrumb__list">
    <li class="breadcrumb__item">
      <a href="<?php echo esc_url(home_url()); ?>">ホーム</a>
    </li>
  
      <!-- 404エラーページ -->
    <?php if (is_404()) : ?>
      <li class="breadcrumb__item">
        <span><i class="fa-solid fa-chevron-right"></i></span>
        <span>404</span>
      </li>
    <?php endif;?>
  </ul>
</div>


<?php
}