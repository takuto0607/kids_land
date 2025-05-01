<?php
/*
 *  メタボックスの表示処理
 */
function add_letter_meta_box() {
  add_meta_box(
      'letter_add_section',        // メタボックスのID
      'セクションの追加',                 // メタボックスのタイトル
      'display_letter_meta_box',  // コールバック関数
      'letter',                   // カスタム投稿タイプ
      'normal',                 // 表示位置
  );
}
add_action('add_meta_boxes', 'add_letter_meta_box');

/*
 *  メタボックスの表示処理
 */
function display_letter_meta_box($post) {
  // 現在のデータを取得
  $letter_sections = get_post_meta($post->ID, 'letter_sections', true);
  
  // nonce フィールドを追加（セキュリティ対策）
  wp_nonce_field('letter_meta_box_nonce', 'letter_meta_box_nonce_field');
  ?>
  
  <div id="add-letter-sections">
      <?php
      if (!empty($letter_sections) && is_array($letter_sections)) :
          foreach ($letter_sections as $index => $section) :
      ?>
          <div class="add-letter-section">
              <p class="add-letter-section-heading">
                  <label>小見出し</label><br>
                  <input class="input-section-heading" type="text" name="letter_sections[<?php echo $index; ?>][letter_heading]" value="<?php echo esc_attr($section['letter_heading']); ?>" size="50">
              </p>
              <p class="add-letter-section-text">
                  <label>文章</label><br>
                  <textarea class="input-section-text" name="letter_sections[<?php echo $index; ?>][letter_text]"><?php echo esc_textarea($section['letter_text']); ?></textarea>
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
          let sectionContainer = document.getElementById('add-letter-sections');
          let addButton = document.getElementById('add-section-btn');

          // 追加ボタン押下時
          addButton.addEventListener('click', function() {
              let index = sectionContainer.children.length;
              let newSection = document.createElement('div');
              newSection.classList.add('add-letter-section');
              newSection.innerHTML = `
                  <p><label>小見出し</label>
                  <br>
                  <input class="input-section-heading" type="text" name="letter_sections[${index}][letter_heading]" size="50"></p>
                  <p><label>文章</label>
                  <br>
                  <textarea class="input-section-text" name="letter_sections[${index}][letter_text]"></textarea></p>
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
      .add-letter-section {
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
function save_letter_meta_box($post_id) {
  // セキュリティチェック
  if (!isset($_POST['letter_meta_box_nonce_field']) || 
      !wp_verify_nonce($_POST['letter_meta_box_nonce_field'], 'letter_meta_box_nonce')) {
      return;
  }

  // 自動保存の場合は何もしない
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  // 投稿タイプを確認（カスタム投稿タイプ 'letter' の場合のみ実行）
  if (get_post_type($post_id) !== 'letter') return;

  // 権限チェック
  if (!current_user_can('edit_post', $post_id)) return;

  // データの保存
  if (isset($_POST['letter_sections'])) {
      $letter_sections = array_map(function($section) {
          return [
              'letter_heading' => sanitize_text_field($section['letter_heading']),
              'letter_text'    => sanitize_textarea_field($section['letter_text'])
          ];
      }, $_POST['letter_sections']);

      update_post_meta($post_id, 'letter_sections', $letter_sections);
  } else {
      delete_post_meta($post_id, 'letter_sections');
  }
}
add_action('save_post', 'save_letter_meta_box');