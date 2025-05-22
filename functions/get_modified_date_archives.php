<?php
function get_modified_date_archives () {
  global $wpdb;

  // 投稿日ベースで年月を抽出（重複なし）
  $results = $wpdb->get_results("
    SELECT DISTINCT 
      YEAR(post_date) AS year,
      MONTH(post_date) AS month
    FROM {$wpdb->posts}
    WHERE post_type = 'letter' 
      AND post_status = 'publish'
    ORDER BY post_date DESC
  ");

  // グループ化用
  $archives = [];

  foreach ($results as $row) {
    $year = (int) $row->year;
    $month = (int) $row->month;

    $archives[$year][] = $month;
  }

  return $archives;
}
?>