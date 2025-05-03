<?php
  function recruit_section () {
?>

<section id="recruit" class="recruit">
  <div class="recruit__content">
    <div class="section-title fade-up">
      <div class="section-title__inner">
        <div class="section-title__img">
          <div class="img-wrapper">
            <img src="<?php echo echo_img("icon/recruit-icon.svg"); ?>" width="72" height="72" alt="リクルートアイコン" loading="lazy">
          </div>
        </div>
        <h2>採用情報</h2>
        <p class="capitalize">introduction</p>
      </div>
    </div>
    <p class="fade-up">桜のこもれびキッズランドで働いてみませんか？</p>
    <div class="recruit__btn-group">
      <div class="recruit__btn-wrapper fade-up">
        <div class="btn btn-pink">
          <a href="<?php echo esc_url(home_url('/recruit')); ?>">採用情報</a>
        </div>
      </div>
      <div class="recruit__btn-wrapper fade-up">
        <div class="btn btn-yellow">
          <a href="<?php echo esc_url(home_url('/recruit#entry-form')); ?>">エントリー</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
}