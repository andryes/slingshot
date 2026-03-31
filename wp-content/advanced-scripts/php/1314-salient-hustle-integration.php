<?php defined('WPINC') or die ?><?php

add_filter( 'hustle_render_module_markup', function( $html, $module, $render_id, $sub_type, $post_id ) {
    if (class_exists('WPBMap')) {
        WPBMap::addAllMappedShortcodes();
        $html = apply_filters('the_content', $html);
    }
    return $html;
}, 10, 5 );
