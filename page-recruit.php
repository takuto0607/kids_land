<?php
/*
  template Name: Recruit
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
      <div class="breadcrumb">
        <ul class="breadcrumb__list">
          <li class="breadcrumb__item">
            <a class="uppercase" href="<?php echo esc_url(home_url()); ?>">top</a>
          </li>
          <li class="breadcrumb__item">
            <span class="breadcrumb__separator"><i class="fa-solid fa-chevron-right"></i></span>
            <span><?php echo esc_html(get_the_title()); ?></span>
          </li>
        </ul>
      </div>
      <?php // breadcrumb(); ?>
    </div>
  </div>

  <!-- Motto -->
  <section class="motto">
    <div class="motto__title">
      <div class="section-title">
        <div class="section-title__inner">
          <div class="section-title__img">
            <div class="img-wrapper">
              <img src="<?php echo echo_img("icon/welcome-icon.svg"); ?>" width="72" height="72" alt="モットーアイコン" loading="lazy">
            </div>
          </div>
          <h2>たいせつにしていること</h2>
          <p class="capitalize">motto</p>
        </div>
      </div>
    </div>
    <div class="motto__container">
      <div class="motto__block">
        <div class="motto__img">
          <div class="img-wrapper">
            <img src="<?php echo echo_img("card-march.webp"); ?>" width="480" height="320" alt="花束を渡す女の子" loading="lazy">
          </div>
        </div>
        <div class="motto__text">
          <div class="motto__text-title">
            <h3>
              <span>
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("icon/title-icon.webp"); ?>" width="24" height="24" alt="桜の花びら" loading="lazy">
                </div>
              </span>
              子ども主体の保育
            </h3>
          </div>
          <p>変化に富んだ現代において、子どもたち一人ひとりの“個性”と“未来を切り拓く力”を育むため、子ども主体の豊かな保育を実践しています。<br>子どもは一人ひとりが可能性にあふれた有能な学び手。<br>保育者はさまざまなアイデアを出し合い、子どもたちのやりたいこと、興味があることを最大限に引き出します。<br>単に知識を教えるのではなく、自ら取り組む楽しさから学びへの意欲を呼び起こす、非認知能力に主眼を置いた取り組みを進めています。</p>
        </div>
      </div>
      <div class="motto__block">
        <div class="motto__text">
          <div class="motto__text-title">
            <h3>
              <span>
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("icon/title-icon.webp"); ?>" width="24" height="24" alt="桜の花びら" loading="lazy">
                </div>
              </span>
              自由な風土
            </h3>
          </div>
          <p>保育者が思い思いの先進的な保育を実践できる、自由度の高さが桜のこもれびの特長。古い慣習にとらわれることなく誰もが意見を発信できる、風通しの良い園づくりを行っています。<br>園を創るのは保育者一人ひとりの個性。<br>楽しく仲間と助け合いながらアイデアを実現できる風土を大事にしています。<br>一方で、本部部門には専門家との共創や優れた保育の実践例を体系化する仕組みがあり、本部と連携することでさらに豊かな保育を実践することができます。</p>
        </div>
        <div class="motto__img">
          <div class="img-wrapper">
            <img src="<?php echo echo_img("motto-img-2.webp"); ?>" width="480" height="320" alt="園内の様子" loading="lazy">
          </div>
        </div>
      </div>
      <div class="motto__block">
        <div class="motto__img">
          <div class="img-wrapper">
            <img src="<?php echo echo_img("motto-img-3.webp"); ?>" width="480" height="320" alt="子ともと話す先生" loading="lazy">
          </div>
        </div>
        <div class="motto__text">
          <div class="motto__text-title">
            <h3>
              <span>
                <div class="img-wrapper">
                  <img src="<?php echo echo_img("icon/title-icon.webp"); ?>" width="24" height="24" alt="桜の花びら" loading="lazy">
                </div>
              </span>
              ワークライフバランス
            </h3>
          </div>
          <p>大事にしているのは「安心して働き続けていける会社」であること。<br>桜のこもれびでは、働き方の多様化や学びの支援など、<br>ワークライフバランスを大切にした環境づくりに努めています。<br>働く人を大事にすることが、質の高い保育につながると考えています。</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Requirements -->
  <section class="requirements">
    <div class="requirements__title">
      <div class="section-title">
        <div class="section-title__inner">
          <div class="section-title__img">
            <div class="img-wrapper">
              <img src="<?php echo echo_img("icon/requirements-icon.svg"); ?>" width="72" height="72" alt="募集要項アイコン" loading="lazy">
            </div>
          </div>
          <h2>募集要項</h2>
          <p class="capitalize">requirements</p>
        </div>
      </div>
    </div>
    <div class="requirements__content">
      <div class="requirements__row">
        <h3>勤務地</h3>
        <p>桜のこもれびキッズランドの各園のいずれか<br><span>※ご希望の勤務地やお住まいの住所から近い園を優先的にご案内します。</span></p>
      </div>
      <div class="requirements__row">
        <h3>勤務時間</h3>
        <p>7:00～18:30のシフト制（延長時間あり）<br>9h拘束、実働8時間<br>出勤する時間と曜日で基本給が変わります</p>
      </div>
      <div class="requirements__row">
        <h3>応募資格</h3>
        <p>資格をお持ちの方。<br>※資格取得見込みの方はご相談ください。</p>
      </div>
      <div class="requirements__row">
        <h3>処遇</h3>
        <p>月給　20万～25万（各種手当含む）<br>時給制　1120円～1450円　（勤務時間・勤務曜日は相談可）<br>勤務シフトは常勤・非常勤併せて100パターン以上あります。あなたの希望に合う勤務時間を選んで働けます。</p>
      </div>
      <div class="requirements__row">
        <h3>賞与</h3>
        <p><span>年2回※月給制の方に限ります。<br>期末賞与：対象年度の業績に応じて支給</span></p>
      </div>
      <div class="requirements__row">
        <h3>休日</h3>
        <p><span>土日祝日<br>または<br>月間10日を選べます。</span></p>
      </div>
      <div class="requirements__row">
        <h3>保険</h3>
        <p>厚生年金・健康保険・雇用保険・労災保険　完備</p>
      </div>
      <div class="requirements__row">
        <h3>手当</h3>
        <p>延長保育手当・皆勤手当・担当手当など</p>
      </div>
      <div class="requirements__row">
        <h3>昇給</h3>
        <p>年一回（業績評価による）</p>
      </div>
      <div class="requirements__row">
        <h3>休暇</h3>
        <p>年末年始・産前産後休暇・育児休暇・看護休暇制度あり</p>
      </div>
      <div class="requirements__row">
        <h3>その他</h3>
        <p>交通費全額支給。予防接種補助など福利厚生充実。</p>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="faq">
    <div class="faq__title">
      <div class="section-title">
        <div class="section-title__inner">
          <div class="section-title__img">
            <div class="img-wrapper">
              <img src="<?php echo echo_img("icon/faq-icon.svg"); ?>" width="72" height="72" alt="FAQアイコン" loading="lazy">
            </div>
          </div>
          <h2>よくある質問</h2>
          <p class="uppercase">faq</p>
        </div>
      </div>
    </div>
    <div class="faq__container">
      <div class="faq__box">
        <div class="faq__question">
          <span class="faq__char-question uppercase">q</span>
          <h3>スタッフの資格や経験について教えてください。</h3>
        </div>
        <div class="faq__answer">
          <span class="faq__char-answer uppercase">a</span>
          <p>当園のスタッフは、保育士や幼稚園教諭など、保育に関する専門的な資格を持つ人材です。また、多彩な経験を持ち、子どもたちとの信頼関係を築きながら、安心して成長できる環境を提供しています。定期的な研修やワークショップを通じて、スキルや知識の向上に努めています。</p>
        </div>
      </div>
      <div class="faq__box">
        <div class="faq__question">
          <span class="faq__char-question uppercase">q</span>
          <h3>子どもたちに提供される食事や健康管理について教えてください。</h3>
        </div>
        <div class="faq__answer">
          <span class="faq__char-answer uppercase">a</span>
          <p>当園では、バランスの取れた食事や健康管理に特に配慮しています。栄養士の監修のもと、子どもたちの成長に必要な栄養を考慮した食事を提供しています。また、日々の健康管理や安全管理にも十分な配慮をし、保護者の皆様に安心してお子さまをお預けいただける環境を整えています。</p>
        </div>
      </div>
      <div class="faq__box">
        <div class="faq__question">
          <span class="faq__char-question uppercase">q</span>
          <h3>保護者とのコミュニケーションはどのように行われていますか？</h3>
        </div>
        <div class="faq__answer">
          <span class="faq__char-answer uppercase">a</span>
          <p>当園では、保護者との密なコミュニケーションを大切にしています。定期的な面談や保護者会、またはLINEやメールなどのSNSを通じて、子どもたちの様子や日々の過ごし方についての情報共有を行っています。保護者の皆様との信頼関係を築きながら、お子さまの成長を共にサポートしています。</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Entry Form -->
  <section id="entry-form" class="entry-form">
    <?php echo do_shortcode('[contact-form-7 id="94d72de" title="エントリーフォーム" html_class="entry-form__content"]'); ?>
  </section>
</main>
<?php get_footer(); ?>