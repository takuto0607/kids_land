<?php
/*
  template Name: Contact
*/
?>
<?php get_header(); ?>
<main>
  <div class="contact-form__page-top page-top">
    <div class="page-top-inner">
      <div class="page-heading">
        <div class="page-title">
          <h1>お問い合わせ</h1>
          <p class="capitalize">contact</p>
        </div>
      </div>
      <?php breadcrumb(); ?>
    </div>
  </div>

  <!-- Contact Form -->
  <section id="contact-form" class="contact-form">
    <div class="contact-form__announce">
      <p>下記フォームにご記入の上、送信してください。折り返し、 弊社担当よりご連絡させて頂きます。<br>また、ご入力頂きました個人に関する情報につきましては、弊社で責任をもって管理し、お問い合わせへのご回答及び弊社のサービス向上のために利用させて頂き、第三者への開示や他の目的で利用は致しません。詳しくは個人情報保護方針をご覧ください。</p>
      <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">弊社への登録に際して、お預かりする個人情報の扱いについて</a>
    </div>
    <?php echo do_shortcode('[contact-form-7 id="1a8cc0f" title="お問い合わせフォーム" html_class="contact-form__content"]'); ?>
  </section>
</main>
<?php get_footer(); ?>