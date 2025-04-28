<?php
// 現在のURL取得
function get_current_link()
{
    return (is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
}

// メタタグの設定
function add_custom_meta_tags ()
{
    echo '<title>' . TITLE_FRONT_PAGE . '</title>';
    echo '<meta name="description" content="' . esc_attr(DESCRIPTION_FRONT_PAGE) . '">';
    echo '<meta property="og:title" content="' . TITLE_FRONT_PAGE . '">';
    echo '<meta property="og:description" content="' . esc_attr(DESCRIPTION_FRONT_PAGE) . '">';
}
add_action('wp_head', 'add_custom_meta_tags');

// リセットCSS読み込み
function add_reset_style() {
    wp_enqueue_style('destyle', '//cdn.jsdelivr.net/npm/destyle.css@3.0.2/destyle.css', array(), false, 'all');
}
add_action('wp_enqueue_scripts', 'add_reset_style');

// CSS
function my_theme_enqueue_styles() {
    wp_enqueue_style('jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css', array(), false);
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// JS
function my_theme_enqueue_scripts() {
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