<?php
// 分割したファイルパスを配列に追加
$function_files = [
    '/functions/consts.php',
    '/functions/init.php',
    '/functions/breadcrumb.php',
    '/functions/contact-section.php',
    '/functions/sitemap-section.php',
    '/functions/display-data.php',
    '/functions/introduction-custom-field.php',
    '/functions/info-custom-field.php',
    '/functions/letter-custom-field.php',
];

foreach ($function_files as $file) {
    if (file_exists(__DIR__ . $file)) {
        locate_template($file, true, true);
    } else {
        trigger_error("`$file`ファイルが見つかりません。", E_USER_ERROR);
    }
}
