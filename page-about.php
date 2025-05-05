<?php
/*
  template Name: About
*/
?>
<?php get_header(); ?>
<main>
  <div class="page-top">
    <div class="page-top-inner open-fade-up">
      <div class="page-heading">
        <div class="page-title">
          <h1>わたしたちのこと</h1>
          <p class="capitalize">about</p>
        </div>
      </div>
      <?php breadcrumb(); ?>
    </div>
  </div>

  <!-- Philosophy -->
  <section class="philosophy">
    <div class="section-title fade-up">
      <div class="section-title__inner">
        <div class="section-title__img">
          <div class="img-wrapper">
            <img src="<?php echo echo_img("icon/welcome-icon.svg"); ?>" width="72" height="72" alt="フィロソフィーアイコン" loading="lazy">
          </div>
        </div>
        <h2>わたしたちの想い</h2>
        <p class="capitalize">philosophy</p>
      </div>
    </div>
    <div class="philosophy__content fade-up">
      <p>桜のこもれびキッズランドは、<br>子どもたち一人ひとりが独自の輝きを放つように、大切な個性を<br class="break-sm">伸ばす場所です。<br>風に揺れる木々の葉が織りなす光と影の美しい揺らめきのように、<br>子どもたちのそれぞれの魅力を見つけ出し、大切に育てます。<br>自然とのふれあいを通じて、<br>子どもたちの好奇心や想像力を育み、<br>明るく豊かな未来への一歩を<br class="break-sm">共に歩んでいきます。<br>温かく包み込むような雰囲気の中で、<br>安心して成長できる環境を提供し、<br>笑顔あふれる毎日をお約束します。</p>
    </div>
  </section>

  <!-- Yearly Program -->
  <section class="yearly-program">
    <div class="yearly-program__title">
      <div class="section-title fade-up">
        <div class="section-title__inner section-title__inner--large">
          <div class="section-title__img">
            <div class="img-wrapper">
              <img src="<?php echo echo_img("icon/introduction-icon.svg"); ?>" width="72" height="72" alt="年間行事アイコン" loading="lazy">
            </div>
          </div>
          <h2>年間行事予定</h2>
          <p class="capitalize">yearly program</p>
        </div>
      </div>
    </div>
    <div class="yearly-program__content-wrapper">
      <div class="yearly-program__content">
        <div class="yearly-program__card-group">
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-april.webp"); ?>" width="296" height="180" alt="進級・入園おめでとうの会" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>4がつ</h3>
              <p>進級・入園おめでとうの会</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-may.webp"); ?>" width="296" height="180" alt="親子遠足" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>5がつ</h3>
              <p>親子遠足</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-june.webp"); ?>" width="296" height="180" alt="運動会" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>6がつ</h3>
              <p>運動会</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-july.webp"); ?>" width="296" height="180" alt="たなばた会" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>7がつ</h3>
              <p>たなばた会</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-august.webp"); ?>" width="296" height="180" alt="夏のお楽しみ会" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>8がつ</h3>
              <p>夏のお楽しみ会</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-september.webp"); ?>" width="296" height="180" alt="親子レクリエーション" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>9がつ</h3>
              <p>親子レクリエーション</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-october.webp"); ?>" width="296" height="180" alt="ハロウィン" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>10がつ</h3>
              <p>ハロウィン</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-november.webp"); ?>" width="296" height="180" alt="秋の収穫体験遠足" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>11がつ</h3>
              <p>秋の収穫体験遠足</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-december.webp"); ?>" width="296" height="180" alt="クリスマス会" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>12がつ</h3>
              <p>クリスマス会</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-january.webp"); ?>" width="296" height="180" alt="新年お楽しみ会" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>1がつ</h3>
              <p>新年お楽しみ会</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-february.webp"); ?>" width="296" height="180" alt="おゆうぎ会" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>2がつ</h3>
              <p>おゆうぎ会</p>
            </div>
          </div>
          <div class="yearly-program__card fade-up">
            <div class="yearly-program__card-img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("card-march.webp"); ?>" width="296" height="180" alt="ひな祭り会・巣立ちの会" loading="lazy">
              </div>
            </div>
            <div class="yearly-program__card-content">
              <h3>3がつ</h3>
              <p>ひな祭り会・巣立ちの会</p>
            </div>
          </div>
        </div>
        <p>※上記予定は一例です。園や状況により内容は異なりますので、詳しくは園にお問い合わせください。</p>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <?php contact_section(); ?>
</main>
<?php get_footer(); ?>