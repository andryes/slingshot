<?php defined('WPINC') or die ?><?php

function enqueue_flag_icon_css() {
    wp_enqueue_style( 'flag-icon-css', 'https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_flag_icon_css' );