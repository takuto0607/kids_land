<?php
/*
 *  メタボックスの表示処理
 */
function add_info_meta_box() {
  add_meta_box(
      'info_add_section',        // メタボックスのID
      'セクションの追加',                 // メタボックスのタイトル
      'display_info_meta_box',  // コールバック関数
      'info',                   // カスタム投稿タイプ
      'normal',                 // 表示位置
  );
}
add_action('add_meta_boxes', 'add_info_meta_box');

/*
 *  メタボックスの表示処理
 */
function display_info_meta_box($post) {
  // 現在のデータを取得
  $info_sections = get_post_meta($post->ID, 'info_sections', true);
  
  // nonce フィールドを追加（セキュリティ対策）
  wp_nonce_field('info_meta_box_nonce', 'info_meta_box_nonce_field');
  ?>
  
  <div id="add-info-sections">
      <?php
      if (!empty($info_sections) && is_array($info_sections)) :
          foreach ($info_sections as $index => $section) :
      ?>
          <div class="add-info-section">
              <p class="add-info-section-heading">
                  <label>小見出し</label><br>
                  <input class="input-section-heading" type="text" name="info_sections[<?php echo $index; ?>][info_heading]" value="<?php echo esc_attr($section['info_heading']); ?>" size="50">
              </p>
              <p class="add-info-section-text">
                  <label>文章</label><br>
                  <textarea class="input-section-text" name="info_sections[<?php echo $index; ?>][info_text]"><?php echo esc_textarea($section['info_text']); ?></textarea>
              </p>
              <button type="button" class="remove-section-btn button">削除</button>
              <hr>
          </div>
      <?php
          endforeach;
      endif;
      ?>
  </div>
  
  <button type="button" id="add-section-btn" class="button">追加</button>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
          let sectionContainer = document.getElementById('add-info-sections');
          let addButton = document.getElementById('add-section-btn');

          // 追加ボタン押下時
          addButton.addEventListener('click', function() {
              let index = sectionContainer.children.length;
              let newSection = document.createElement('div');
              newSection.classList.add('add-info-section');
              newSection.innerHTML = `
                  <p><label>小見出し</label>
                  <br>
                  <input class="input-section-heading" type="text" name="info_sections[${index}][info_heading]" size="50"></p>
                  <p><label>文章</label>
                  <br>
                  <textarea class="input-section-text" name="info_sections[${index}][info_text]"></textarea></p>
                  <button type="button" class="remove-section-btn button">削除</button>
              `;
              sectionContainer.appendChild(newSection);
          });

          // 削除ボタン押下時
          sectionContainer.addEventListener('click', function(event) {
              if (event.target.classList.contains('remove-section-btn')) {
                  event.target.parentElement.remove();
              }
          });
      });
  </script>

  <style>
      .add-info-section {
          margin-bottom: 15px;
          padding: 10px;
          background: #f9f9f9;
          border: 1px solid #ddd;
      }

      .input-section-heading {
        width: 75%;
      }

      .input-section-text {
        resize: none;
        height: 120px;
        width: 75%;
      }
  </style>

  <?php
}

/*
 *  メタボックスの保存処理
 */
function save_info_meta_box($post_id) {
  // セキュリティチェック
  if (!isset($_POST['info_meta_box_nonce_field']) || 
      !wp_verify_nonce($_POST['info_meta_box_nonce_field'], 'info_meta_box_nonce')) {
      return;
  }

  // 自動保存の場合は何もしない
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  // 投稿タイプを確認（カスタム投稿タイプ 'info' の場合のみ実行）
  if (get_post_type($post_id) !== 'info') return;

  // 権限チェック
  if (!current_user_can('edit_post', $post_id)) return;

  // データの保存
  if (isset($_POST['info_sections'])) {
      $info_sections = array_map(function($section) {
          return [
              'info_heading' => sanitize_text_field($section['info_heading']),
              'info_text'    => sanitize_textarea_field($section['info_text'])
          ];
      }, $_POST['info_sections']);

      update_post_meta($post_id, 'info_sections', $info_sections);
  } else {
      delete_post_meta($post_id, 'info_sections');
  }
}
add_action('save_post', 'save_info_meta_box');