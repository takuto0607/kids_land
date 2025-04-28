<?php
/*
  template Name: Recruit Confirm
*/
?>
<?php get_header(); ?>
<main>
  <div class="page-top">
    <div class="page-top-inner">
      <div class="page-heading">
        <div class="page-title">
          <h1>採用情報</h1>
          <p class="capitalize">recruit</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Entry Form -->
  <section class="entry-confirm">
    <?php echo do_shortcode('[contact-form-7 id="b19fcf6" title="エントリー確認フォーム" html_class="entry-confirm__content"]'); ?>
  </section>
</main>
<?php get_footer(); ?>