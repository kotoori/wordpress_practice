<form method="get" class="search-form" action="<?php echo home_url('/'); ?>">
  <input class="search_field search-field_dummy" type="text" name="s" id="s">
  <!-- 規模 -->
  <?php 
    $field_name = "kibo";
    $field_key = get_acf_fieldKey($field_name);
    $field = get_field_object($field_key);
    if ($field) {
      echo '<select type="search" class="search-field" name="' . esc_attr($field['name']) . '">';
      foreach ($field['choices'] as $value => $label) {
          echo '<option value="' . esc_attr($value) . '">' . esc_html($label) . '</option>';
      }
      echo '</select>';
    }
  ?>

<!-- 業種 -->
<?php
    $field_name = "kind";
    $field_key = get_acf_fieldKey($field_name);
    $field = get_field_object($field_key);
    if ($field) {
      echo '<select type="search" class="search-field" name="' . esc_attr($field['name']) . '">';
      foreach ($field['choices'] as $value => $label) {
          echo '<option value="' . esc_attr($value) . '">' . esc_html($label) . '</option>';
      }
      echo '</select>';
    }
  ?>

<!-- 売上 -->
<?php 
    $field_name = "sales";
    $field_key = get_acf_fieldKey($field_name);
    $field = get_field_object($field_key);
    if ($field) {
      echo '<select type="search" class="search-field" name="' . esc_attr($field['name']) . '">';
      foreach ($field['choices'] as $value => $label) {
          echo '<option value="' . esc_attr($value) . '">' . esc_html($label) . '</option>';
      }
      echo '</select>';
    }
  ?>
  <button type="submit" class="search-submit2">検索</button>

</form><!-- /search-form -->
