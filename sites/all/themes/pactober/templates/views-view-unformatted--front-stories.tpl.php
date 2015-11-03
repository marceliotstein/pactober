<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<?php
$num_stories = 0;

// divide into three columns
$col1 = '<div class="col-md-4 col-sm-6">';
$col2 = '<div class="col-md-4 col-sm-6">';
$col3 = '<div class="col-md-4 col-sm-6">';

foreach ($rows as $id => $row) {
  $colmod = $num_stories % 3;
  if ($colmod==0) {
    $col1 .= $row;
  } else if ($colmod==1) {
    $col2 .= $row;
  } else {
    $col3 .= $row;
  }
  ?>
    <?php
    //print "NS " . $num_stories . "<br />";
    //print $row;
    ?>
  <?php
  $num_stories++;
}
$col1 .= "</div>";
$col2 .= "</div>";
$col3 .= "</div>";
print $col1 . $col2 . $col3;
?>
