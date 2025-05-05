<?php
  function contact_section () {
?>

<section class="contact">
  <div class="contact__content">
    <div class="section-title fade-up">
      <div class="section-title__inner">
        <div class="section-title__img">
          <div class="img-wrapper">
            <img src="<?php echo echo_img("icon/contact-icon.svg"); ?>" width="72" height="72" alt="お問い合わせアイコン" loading="lazy">
          </div>
        </div>
        <h2>お問い合わせ</h2>
        <p class="capitalize">contact</p>
      </div>
    </div>
    <p class="fade-up">入園のお申込み、<br class="break-md">見学のご相談はこちらから！</p>
    <div class="btn fade-up">
      <a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a>
    </div>
  </div>
</section>

<?php
}