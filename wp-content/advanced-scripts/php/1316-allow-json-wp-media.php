<?php defined('WPINC') or die ?><?php

function custom_mime_types($mimes) {
    // Add the JSON MIME type
    $mimes['json'] = 'application/json';
    
    return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');
