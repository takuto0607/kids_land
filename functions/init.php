<?php
// 現在のURL取得
function get_current_link()
{
    return (is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
}

// メタタグの設定
function add_custom_meta_tags ()
{
    // わたしたちのことページ
    if (is_page('about')) {
        echo '<title>' . TITLE_ABOUT . '</title>';
        echo '<meta name="description" content="' . esc_attr(DESCRIPTION_ABOUT) . '">';
        echo '<meta property="og:title" content="' . TITLE_ABOUT . '">';
        echo '<meta property="og:description" content="' . esc_attr(DESCRIPTION_ABOUT) . '">';
    }
    
    // 採用情報ページ
    elseif (is_page('recruit') || is_page('recruit-confirm')) {
        echo '<title>' . TITLE_RECRUIT . '</title>';
        echo '<meta name="description" content="' . esc_attr(DESCRIPTION_RECRUIT) . '">';
        echo '<meta property="og:title" content="' . TITLE_RECRUIT . '">';
        echo '<meta property="og:description" content="' . esc_attr(DESCRIPTION_RECRUIT) . '">';
    }
    
    // お問い合わせページ
    elseif (is_page('contact') || is_page('contact-confirm')) {
        echo '<title>' . TITLE_CONTACT . '</title>';
        echo '<meta name="description" content="' . esc_attr(DESCRIPTION_CONTACT) . '">';
        echo '<meta property="og:title" content="' . TITLE_CONTACT . '">';
        echo '<meta property="og:description" content="' . esc_attr(DESCRIPTION_CONTACT) . '">';
    }
    
    // 各園のご紹介ページ
    elseif ((is_archive('introduction') && is_post_type_archive('introduction')) || is_singular('introduction')) {
        echo '<title>' . TITLE_INTRODUCTION . '</title>';
        echo '<meta name="description" content="' . esc_attr(DESCRIPTION_INTRODUCTION) . '">';
        echo '<meta property="og:title" content="' . TITLE_INTRODUCTION . '">';
        echo '<meta property="og:description" content="' . esc_attr(DESCRIPTION_INTRODUCTION) . '">';
    }

    // こもれびだよりページ
    elseif ((is_archive('letter') && is_post_type_archive('letter')) || is_singular('letter')) {
        echo '<title>' . TITLE_LETTER . '</title>';
        echo '<meta name="description" content="' . esc_attr(DESCRIPTION_LETTER) . '">';
        echo '<meta property="og:title" content="' . TITLE_LETTER . '">';
        echo '<meta property="og:description" content="' . esc_attr(DESCRIPTION_LETTER) . '">';
    }
    
    // お知らせページ
    elseif ((is_archive('info') && is_post_type_archive('info')) || is_singular('info')) {
        echo '<title>' . TITLE_INFO . '</title>';
        echo '<meta name="description" content="' . esc_attr(DESCRIPTION_INFO) . '">';
        echo '<meta property="og:title" content="' . TITLE_INFO . '">';
        echo '<meta property="og:description" content="' . esc_attr(DESCRIPTION_INFO) . '">';
    }
    
    // その他
    else {
        echo '<title>' . TITLE_FRONT_PAGE . '</title>';
        echo '<meta name="description" content="' . esc_attr(DESCRIPTION_FRONT_PAGE) . '">';
        echo '<meta property="og:title" content="' . TITLE_FRONT_PAGE . '">';
        echo '<meta property="og:description" content="' . esc_attr(DESCRIPTION_FRONT_PAGE) . '">';
    }
}
add_action('wp_head', 'add_custom_meta_tags');

// リセットCSS読み込み
function add_reset_style() {
    wp_enqueue_style('destyle', '//cdn.jsdelivr.net/npm/destyle.css@3.0.2/destyle.css', array(), false, 'all');
}
add_action('wp_enqueue_scripts', 'add_reset_style');

// CSS
function my_theme_enqueue_styles() {
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css', array(), false);
    wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), false);
    wp_enqueue_style('jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css', array(), false);
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// JS
function my_theme_enqueue_scripts() {
    wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), false, true);
    wp_enqueue_script('jquery-ui-js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), false, true);
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

// 画像URL取得
function echo_img($path) {
    return esc_url(get_template_directory_uri() . '/assets/img/' . $path);
}

// 投稿非表示
function remove_menus() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_menus');

//カスタム投稿のカテゴリー：カテゴリー選択ボックスで一つだけしか選択できないようにする。
function select_to_radio_prefecture() {
    ?>
    <script type="text/javascript">
    jQuery(function($) {
      // 投稿画面
      $('#taxonomy-prefecture input[type=checkbox]').each(function() {
        $(this).replaceWith($(this).clone().attr('type', 'radio'));
      });
      // 一覧画面
      var prefecture_checklist = $('.prefecture-checklist input[type=checkbox]');
      prefecture_checklist.click(function() {
        $(this).parents('.prefecture-checklist').find('input[type=checkbox]').attr('checked', false);
        $(this).attr('checked', true);
      });
    });
    </script>
    <?php
}
add_action('admin_print_footer_scripts', 'select_to_radio_prefecture');