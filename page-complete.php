<?php
/*
  template Name: Complete
*/
?>
<?php get_header(); ?>
<main>
  <div class="page-top page-top-short">
    <div class="page-top-inner">
      <div class="page-heading">
        <div class="page-title">
          <h1>お問い合わせありがとうございます。</h1>
          <p class="capitalize">thank you for contacting us</p>
        </div>
      </div>
    </div>
  </div>

  <!-- complete -->
  <section class="complete">
    <p>数日以内に担当の者からご入力いただいたメールアドレスに返信いたします。</p>
    <div class="btn btn-large">
      <a href="<?php echo esc_url(home_url()); ?>">TOPにもどる</a>
    </div>
  </section>
</main>
<?php get_footer(); ?>