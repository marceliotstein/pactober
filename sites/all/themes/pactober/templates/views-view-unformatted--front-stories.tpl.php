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
foreach ($rows as $id => $row) {
  if (($num_stories%3)==0) {
    print "<h2>THREE</h2>";
  }
  ?>
  <div id="xyz">
    <?php
    print "NS " . $num_stories . "<br />";
    print $row;
    ?>
  </div>
  <?php
  $num_stories++;
}
?>
