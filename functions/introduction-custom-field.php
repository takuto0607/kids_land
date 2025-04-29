<?php
/*
 *  メタボックスの表示処理
 */
function add_introduction_meta_box() {
  add_meta_box(
      'introduction_add_section',        // メタボックスのID
      'セクションの追加',                 // メタボックスのタイトル
      'display_introduction_meta_box',  // コールバック関数
      'introduction',                   // カスタム投稿タイプ
      'normal',                 // 表示位置
  );
}
add_action('add_meta_boxes', 'add_introduction_meta_box');

/*
 *  メタボックスの表示処理
 */
function display_introduction_meta_box($post) {
  // 現在のデータを取得
  $introduction_sections = get_post_meta($post->ID, 'introduction_sections', true);
  
  // nonce フィールドを追加（セキュリティ対策）
  wp_nonce_field('introduction_meta_box_nonce', 'introduction_meta_box_nonce_field');
  ?>
  
  <div id="add-introduction-sections">
      <?php
      if (!empty($introduction_sections) && is_array($introduction_sections)) :
          foreach ($introduction_sections as $index => $section) :
      ?>
          <div class="add-introduction-section">
              <p class="add-introduction-section-heading">
                  <label>小見出し</label><br>
                  <input class="input-section-heading" type="text" name="introduction_sections[<?php echo $index; ?>][introduction_heading]" value="<?php echo esc_attr($section['introduction_heading']); ?>" size="50">
              </p>
              <p class="add-introduction-section-text">
                  <label>文章</label><br>
                  <textarea class="input-section-text" name="introduction_sections[<?php echo $index; ?>][introduction_text]"><?php echo esc_textarea($section['introduction_text']); ?></textarea>
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
          let sectionContainer = document.getElementById('add-introduction-sections');
          let addButton = document.getElementById('add-section-btn');

          // 追加ボタン押下時
          addButton.addEventListener('click', function() {
              let index = sectionContainer.children.length;
              let newSection = document.createElement('div');
              newSection.classList.add('add-introduction-section');
              newSection.innerHTML = `
                  <p><label>小見出し</label>
                  <br>
                  <input class="input-section-heading" type="text" name="introduction_sections[${index}][introduction_heading]" size="50"></p>
                  <p><label>文章</label>
                  <br>
                  <textarea class="input-section-text" name="introduction_sections[${index}][introduction_text]"></textarea></p>
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
      .add-introduction-section {
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
function save_introduction_meta_box($post_id) {
  // セキュリティチェック
  if (!isset($_POST['introduction_meta_box_nonce_field']) || 
      !wp_verify_nonce($_POST['introduction_meta_box_nonce_field'], 'introduction_meta_box_nonce')) {
      return;
  }

  // 自動保存の場合は何もしない
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  // 投稿タイプを確認（カスタム投稿タイプ 'introduction' の場合のみ実行）
  if (get_post_type($post_id) !== 'introduction') return;

  // 権限チェック
  if (!current_user_can('edit_post', $post_id)) return;

  // データの保存
  if (isset($_POST['introduction_sections'])) {
      $introduction_sections = array_map(function($section) {
          return [
              'introduction_heading' => sanitize_text_field($section['introduction_heading']),
              'introduction_text'    => sanitize_textarea_field($section['introduction_text'])
          ];
      }, $_POST['introduction_sections']);

      update_post_meta($post_id, 'introduction_sections', $introduction_sections);
  } else {
      delete_post_meta($post_id, 'introduction_sections');
  }
}
add_action('save_post', 'save_introduction_meta_box');