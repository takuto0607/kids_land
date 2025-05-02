<?php
/*
  template Name: Contact Confirm
*/
?>
<?php get_header(); ?>
<main>
  <div class="page-top">
    <div class="page-top-inner">
      <div class="page-heading">
        <div class="page-title">
          <h1>お問い合わせ</h1>
          <p class="capitalize">contact</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Contact Form -->
  <section class="contact-confirm">
      <?php echo do_shortcode('[contact-form-7 id="e57cc0d" title="お問い合わせ確認フォーム" html_class="contact-confirm__content"]'); ?>
    </section>
  </main>
<?php get_footer(); ?>