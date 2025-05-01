<?php
function display_sidebar () {
  $archives = get_modified_date_archives();

  if ($archives) {
?>

<div class="sidebar">
  <h2>アーカイブ</h2>
    <?php foreach ($archives as $year => $months): ?>
      <div class="sidebar__archive-year">
        <h3><?php echo esc_html($year); ?>ねん</h3>
        <div class="sidebar__archive-month-group">
          <?php foreach ($months as $month): ?>
            <?php
              $url = home_url("/"); // カスタムURL（後述）
              $label = "{$month}がつ";
            ?>
            <a class="sidebar__archive-month" href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
</div>

<?php
  }
}