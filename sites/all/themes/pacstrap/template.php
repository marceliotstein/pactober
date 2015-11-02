<?php

/**
 * pacstrap overrides to bootstrap
 */

function pacstrap_preprocess_page(&$variables) {
  $variables['content_column_class'] = ' class="col-sm-9"';
}

// make all images bootstrap responsive

function pacstrap_preprocess_image(&$variables) { 
  if (strpos($variables['path'],'public://')!==FALSE) {
    unset($variables['width']); 
    unset($variables['height']); 
    $variables['attributes']['class'][] = 'img-responsive'; 
  }
}
?>
