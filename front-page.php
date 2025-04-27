<?php get_header(); ?>
  <main>
    <!-- First View -->
    <section id="fv" class="fv">
      <div class="fv__bg">
        <div class="fv__title">
          <h1>一人ひとりの輝きが、<br>未来を彩る</h1>
        </div>
      </div>
    </section>

    <!-- Welcome -->
    <section id="welcome" class="welcome">
      <div class="section-title">
        <div class="section-title__inner">
          <div class="section-title__img">
            <div class="img-wrapper">
              <img src="<?php echo echo_img("icon/welcome-icon.svg"); ?>" width="72" height="72" alt="ウェルカムアイコン" loading="lazy">
            </div>
          </div>
          <h2>桜のこもれびキッズランドへ<br>ようこそ</h2>
          <p class="capitalize">welcome</p>
        </div>
      </div>
      <div class="welcome__content">
        <p>「こもれび」とは<br>風に揺れる木の葉によって生み出される光と影の揺らめきを表すことばです。<br>それはその瞬間に一度だけ存在します。</p>
        <p>桜のこもれびキッズランドは、<br>子どもたち一人ひとりが独自の輝きを放つように、<br>大切な個性を伸ばす場所です。<br>温かく包み込むような雰囲気の中で、安心して成長できる環境を提供し、<br>笑顔あふれる毎日をお約束します。</p>
      </div>
    </section>

    <!-- Introduction -->
    <section id="introduction" class="introduction">
      <div class="introduction__container">
        <div class="section-title">
          <div class="section-title__inner">
            <div class="section-title__img">
              <div class="img-wrapper">
                <img src="<?php echo echo_img("icon/introduction-icon.svg"); ?>" width="72" height="72" alt="イントロダクションアイコン" loading="lazy">
              </div>
            </div>
            <h2>各園のご紹介</h2>
            <p class="capitalize">introduction</p>
          </div>
        </div>
        <div class="introduction__prefecture-group-wrapper">
          <div class="introduction__prefecture-group">
            <div class="introduction__prefecture">
              <a href="">東京都</a>
            </div>
            <div class="introduction__prefecture">
              <a href="">神奈川県</a>
            </div>
            <div class="introduction__prefecture">
              <a href="">埼玉県</a>
            </div>
            <div class="introduction__prefecture">
              <a href="">千葉県</a>
            </div>
            <div class="introduction__prefecture">
              <a href="">大阪府</a>
            </div>
            <div class="introduction__prefecture">
              <a href="">京都府</a>
            </div>
          </div>
        </div>
        <div class="btn">
          <a href="<?php echo esc_url(home_url()); ?>">一覧ページへ</a>
        </div>
      </div>
    </section>
    
    <!-- Letter -->
    <section id="letter" class="letter">
      <div class="section-title">
        <div class="section-title__inner">
          <div class="section-title__img">
            <div class="img-wrapper">
              <img src="<?php echo echo_img("icon/letter-icon.svg"); ?>" width="72" height="72" alt="レターアイコン" loading="lazy">
            </div>
          </div>
          <h2>こもれびだより</h2>
          <p class="capitalize">letter</p>
        </div>
      </div>
      <div class="letter__container">
        <div class="letter__card-group-wrapper">
          <div class="letter__card-group">
            <div class="letter__card">
              <a class="letter__card-link" href="">
                <div class="letter__card-img">
                  <div class="img-wrapper">
                    <img src="<?php echo echo_img("letter-card.png"); ?>" alt="">
                  </div>
                </div>
                <div class="letter__card-content">
                  <h3>なは園からのおたより</h3>
                  <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                  <div class="letter__card-date">
                    <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                  </div>
                </div>
              </a>
            </div>
            <div class="letter__card">
              <a class="letter__card-link" href="">
                <div class="letter__card-img">
                  <div class="img-wrapper">
                    <img src="<?php echo echo_img("letter-card.png"); ?>" alt="">
                  </div>
                </div>
                <div class="letter__card-content">
                  <h3>なは園からのおたより</h3>
                  <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                  <div class="letter__card-date">
                    <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                  </div>
                </div>
              </a>
            </div>
            <div class="letter__card">
              <a class="letter__card-link" href="">
                <div class="letter__card-img">
                  <div class="img-wrapper">
                    <img src="<?php echo echo_img("letter-card.png"); ?>" alt="">
                  </div>
                </div>
                <div class="letter__card-content">
                  <h3>なは園からのおたより</h3>
                  <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                  <div class="letter__card-date">
                    <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                  </div>
                </div>
              </a>
            </div>
            <div class="letter__card">
              <a class="letter__card-link" href="">
                <div class="letter__card-img">
                  <div class="img-wrapper">
                    <img src="<?php echo echo_img("letter-card.png"); ?>" alt="">
                  </div>
                </div>
                <div class="letter__card-content">
                  <h3>なは園からのおたより</h3>
                  <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                  <div class="letter__card-date">
                    <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                  </div>
                </div>
              </a>
            </div>
            <div class="letter__card">
              <a class="letter__card-link" href="">
                <div class="letter__card-img">
                  <div class="img-wrapper">
                    <img src="<?php echo echo_img("letter-card.png"); ?>" alt="">
                  </div>
                </div>
                <div class="letter__card-content">
                  <h3>なは園からのおたより</h3>
                  <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                  <div class="letter__card-date">
                    <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                  </div>
                </div>
              </a>
            </div>
            <div class="letter__card">
              <a class="letter__card-link" href="">
                <div class="letter__card-img">
                  <div class="img-wrapper">
                    <img src="<?php echo echo_img("letter-card.png"); ?>" alt="">
                  </div>
                </div>
                <div class="letter__card-content">
                  <h3>なは園からのおたより</h3>
                  <p>年長さんクラス、美ら海水族館に遠足に行きました！</p>
                  <div class="letter__card-date">
                    <time datetime="2024ねん4がつ15にち">2024ねん4がつ15にち</time>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="letter__btn-wrapper">
          <div class="btn">
            <a href="<?php echo esc_url(home_url()); ?>">もっと見る</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Recruit -->
    <section id="recruit" class="recruit">
      <div class="recruit__content">
        <div class="section-title">
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
        <p>桜のこもれびキッズランドで働いてみませんか？</p>
        <div class="recruit__btn-group">
          <div class="recruit__btn-wrapper">
            <div class="btn btn-pink">
              <a href="<?php echo esc_url(home_url('/recruit')); ?>">採用情報</a>
            </div>
          </div>
          <div class="recruit__btn-wrapper">
            <div class="btn btn-yellow">
              <a href="<?php echo esc_url(home_url()); ?>">エントリー</a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
<?php get_footer(); ?>
