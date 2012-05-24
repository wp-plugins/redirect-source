<?php
/*
Plugin Name: Redirect Source
Description: Redirect Source for debug purposes
Version: 0.1
Author: Edgaras Janušauskas
*/

function redirect_source($location) {
  $bt = debug_backtrace();
  foreach($bt as $i => $v) {
    header("X-Redirect-Source-$i: " . $v['function'] . '(), @' . $v['file'] . ':' . $v['line']);
  }
  return $location;
}

add_filter('wp_redirect', 'redirect_source');