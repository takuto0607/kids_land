jQuery(document).ready(function ($) {
  // 360px未満のレイアウト崩れ防止
  $(function () {
    const viewport = document.querySelector('meta[name="viewport"]');
    function switchViewport() {
      const value =
        window.outerWidth > 360
          ? "width=device-width,initial-scale=1"
          : "width=360";
      if (viewport.getAttribute("content") !== value) {
        viewport.setAttribute("content", value);
      }
    }
    addEventListener("resize", switchViewport, false);
    switchViewport();
  });

  // ページトップボタンの表示・非表示処理
  function togglePageTopBtm() {
    var fvHeight = $("#fv").outerHeight();
    var scrollPos = $(window).scrollTop();

    if (scrollPos > fvHeight) {
      $("#back-to-top").addClass("show");
    } else {
      $("#back-to-top").removeClass("show");
    }
  }

  // ページ読み込み時・スクロール時に実行
  $(window).on("load scroll", function () {
    togglePageTopBtm();
  });

  // ページトップボタンをクリック時の動作
  $("#back-to-top").on("click", function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      1500
    );
    return false;
  });

  // タイトルやテキストのアニメーション表示
  $(function () {
    function showElementsInView() {
      $(".fade-up").each(function () {
        var elementHeight = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();

        if (scroll + windowHeight > elementHeight) {
          $(this).addClass("show");
        }
      });
    }

    $(".open-fade-up").addClass("show");

    showElementsInView();

    $(window).on("scroll", showElementsInView);
  });

  // FAQ アコーディオン
  $(function () {
    const faqQuestion = $(".faq__question");

    // 初期表示
    $(".faq__box:first").find(".faq__question").addClass("active");
    $(".faq__box").not(":first").find(".faq__answer").css("display", "none");

    // FAQの開閉
    faqQuestion.on("click", function () {
      // 他の開いている質問を閉じる
      faqQuestion.not(this).removeClass("active").next().slideUp();

      // クリックした要素の開閉
      $(this).toggleClass("active").next().slideToggle();
    });
  });

  // 生年月日選択処理
  $(function () {
    // 選択日付の入力
    $(".entry-form__date-select").each(function () {
      $(this).datepicker({
        dateFormat: "yy/mm/dd",
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
      });
    });

    // 入力欄クリックで datepicker を表示
    $(".entry-form__date-select").on("click", function () {
      $(this).datepicker("show");
    });
  });

  // 園の様子 Slick処理
  $(function () {
    let slider = $("#slider-images");

    // Slick 初期表示
    slider.slick({
      arrows: false,
      autoplay: true, //自動でスクロール
      autoplaySpeed: 0, //自動再生のスライド切り替えまでの時間を設定
      centerMode: false,
      cssEase: "linear",
      dots: false,
      infinite: true,
      pauseOnFocus: false,
      pauseOnHover: false,
      slidesToScroll: 1,
      speed: 3500, //スライドが流れる速度を設定
      swipe: false,
      variableWidth: true,
    });
  });

  // 各園のご紹介一覧ページ
  $(function () {
    $(document).ready(function () {
      const params = new URLSearchParams(window.location.search);
      const setTaxonomy = params.get("taxonomy");
      const setSlug = params.get("slug");

      if (setTaxonomy) {
        $(`.archive-introduction__tab[data-tab="${setTaxonomy}"]`).addClass(
          "active"
        );
      } else {
        $(".archive-introduction__tab").first().addClass("active");
      }

      if (setSlug) {
        $(`.archive-introduction__tag[data-tag="${setSlug}"]`).addClass(
          "active"
        );
      } else {
        $(".archive-introduction__tag").first().addClass("active");
      }
    });

    // タブクリック時の処理
    $(".archive-introduction__tab").on("click", function () {
      $(".archive-introduction__tab").removeClass("active");
      $(this).addClass("active");

      const taxonomy = $(this).data("tab");

      const params = new URLSearchParams();
      params.set("taxonomy", taxonomy);

      window.location.href = `${window.location.pathname}?${params.toString()}`;
    });

    // タグクリック時の処理
    $(".archive-introduction__tag").on("click", function () {
      $(".archive-introduction__tag").removeClass("active");
      $(this).addClass("active");

      const slug = $(this).data("tag");
      const activeTab = $(".archive-introduction__tab.active").data("tab");

      const params = new URLSearchParams();
      params.set("taxonomy", activeTab);
      params.set("slug", slug);

      window.location.href = `${window.location.pathname}?${params.toString()}`;
    });
  });

  // お知らせ一覧ページ
  $(function () {
    $(document).ready(function () {
      const params = new URLSearchParams(window.location.search);
      const setCategory = params.get("category");

      if (setCategory) {
        $(`.archive-info__tag[data-category="${setCategory}"]`).addClass(
          "active"
        );
      } else {
        $(".archive-info__tag").first().addClass("active");
      }
    });

    // タブクリック時の処理
    $(".archive-info__tag").on("click", function () {
      $(".archive-info__tag").removeClass("active");
      $(this).addClass("active");

      const category = $(this).data("category");

      const params = new URLSearchParams();
      params.set("category", category);

      window.location.href = `${window.location.pathname}?${params.toString()}`;
    });
  });

  // こもれびだより一覧ページ
  $(function () {
    const selectPrefectureField = $("#select-prefecture-field");
    const selectPrefectureBox = $("#select-prefecture-box");
    const selectNurseryField = $("#select-nursery-field");
    const selectNurseryBox = $("#select-nursery-box");
    const searchBtn = $(".archive-letter__search-btn");

    const urlParams = new URLSearchParams(window.location.search);
    const presetPrefecture = urlParams.get("prefecture");
    const presetNursery = urlParams.get("nursery");

    let selectedPrefecture = "";
    let selectedNursery = "";

    // セレクトボックスの開閉
    selectPrefectureField.on("click", function () {
      selectPrefectureField.toggleClass("open");
      selectPrefectureBox.slideToggle();
    });

    selectNurseryField.on("click", function () {
      selectNurseryField.toggleClass("open");
      selectNurseryBox.slideToggle();
    });

    // 都道府県の選択
    $(".option-prefecture").on("click", function () {
      selectedPrefecture = $(this).data("prefecture") || $(this).text();
      selectPrefectureField.find("input").val($(this).text());
      selectPrefectureField.toggleClass("open");
      selectPrefectureBox.slideUp();

      // 保育園のセレクトボックスを更新
      $(".option-nursery").each(function () {
        const prefecture = $(this).data("prefecture");
        if (!selectedPrefecture || prefecture === selectedPrefecture) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });

      // 保育園の選択状態をリセット
      selectedNursery = "";
      selectNurseryField.find("input").val("");
    });

    // 保育園の選択
    $(".option-nursery").on("click", function () {
      selectedNursery = $(this).data("nursery");
      selectNurseryField.find("input").val($(this).text());
      selectNurseryField.toggleClass("open");
      selectNurseryBox.slideUp();
    });

    // ページ読み込み時にURLパラメータから値を取得して反映
    if (presetPrefecture) {
      const $prefOption = $(
        `.option-prefecture[data-prefecture="${presetPrefecture}"]`
      );
      if ($prefOption.length) {
        $prefOption.trigger("click");
        selectPrefectureField.removeClass("open");
      }
    }

    if (presetNursery) {
      const $nurseryOption = $(
        `.option-nursery[data-nursery="${presetNursery}"]`
      );
      if ($nurseryOption.length) {
        $nurseryOption.trigger("click");
        selectNurseryField.removeClass("open");
      }
    }

    // 検索処理
    searchBtn.on("click", function () {
      const url = new URLSearchParams();

      if (selectedPrefecture) {
        url.set("prefecture", selectedPrefecture);
      }

      if (selectedNursery) {
        url.set("nursery", selectedNursery);
      }

      window.location.href = `${window.location.pathname}?${url.toString()}`;
    });
  });

  // ハンバーガーメニュークリック時
  const hamburger = $("#js-hamburger");
  const menu = $("#js-menu");
  const menuText = $("#js-hamburger p");

  hamburger.on("click", function () {
    hamburger.toggleClass("active");
    menu.toggleClass("active");

    // スクロール無効化
    if (hamburger.hasClass("active")) {
      $("body").css({ height: "100%", overflow: "hidden" });
      menuText.text("closed");
    } else {
      $("body").css({ height: "", overflow: "" });
      menuText.text("menu");
    }
  });
});
