<?php
// 分割したファイルパスを配列に追加
$function_files = [
    '/functions/consts.php',
    '/functions/init.php',
    '/functions/breadcrumb.php',
];

foreach ($function_files as $file) {
    if (file_exists(__DIR__ . $file)) {
        locate_template($file, true, true);
    } else {
        trigger_error("`$file`ファイルが見つかりません。", E_USER_ERROR);
    }
}
