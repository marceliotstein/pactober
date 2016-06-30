<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php
$body = "";
$img = "";
$tout_order = 0;
$tout_title = null;
foreach ($fields as $id => $field) {
  if ($id=="title") {
    $title = $field->content;
  } else if ($id=="body") {
    $body = $field->content;
  } else if ($id=="field_main_image") {
    $img = $field->content;
  } else if ($id=="field_tout_order") {
    $tout_order = $field->content;
  } else if ($id=="field_tout_title") {
    $tout_title = $field->content;
  }
}

if (empty($tout_title)) {
  $tout_title = $title;
} else if ($tout_title=="<none>") {
  $tout_title = null;
}

// get clean img URL for background
$justimg = null;
if (!empty($img)) {
  $imgexp = explode("http",$img);
  if (!empty($imgexp[1])) {
    $imgexp2 = explode(".jpg",$imgexp[1]);
    $justimg = "http" . $imgexp2[0] . ".jpg";
  }
}
if (!empty($justimg)) {
  // well with background image
  ?>
  <div class="well pac-story-image-well" style="background-image: url(<?php print $justimg ?>)">
    <?php if (!empty($tout_title)): ?>
      <div class="pacheading-dark">
        <h4><?php print $title ?></h4>
      </div>
    <?php endif; ?>
  </div>
  <?php
} else {
  // well with no background image
  ?>
    <div class="well">
      <?php print $body; ?>
    </div>
  <?php
}
