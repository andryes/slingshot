<?php
/**
* Post bottom meta partial
*
* Used when "Material" masonry style is selected.
*
* @version 10.5
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

global $post;

if ( function_exists( 'get_avatar' ) ) {
  echo '<div class="grav-wrap"><div class="text">';
  echo '<span>' . get_the_date() . '</span></div></div>'; 
}