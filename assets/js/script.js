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

  // FAQ アコーディオン
  $(function () {
    const faqQuestion = $(".faq__question");

    // 初期表示
    $(".faq__box").not(":first").find(".faq__answer").css("display", "none");

    // FAQの開閉
    faqQuestion.on("click", function () {
      // 他の開いている質問を閉じる
      faqQuestion.not(this).removeClass("active").next().slideUp();

      // クリックした要素の開閉
      $(this).toggleClass("active").next().slideToggle();
    });
  });
});
