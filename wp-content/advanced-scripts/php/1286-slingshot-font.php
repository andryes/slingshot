<?php defined('WPINC') or die ?><?php

function salient_redux_custom_fonts( $custom_fonts ) {
    return array(
        'Custom Fonts' => array(
             'proxima-nova, sans-serif;' => "Proxima-Nova"
        )
    );
}
add_filter( "redux/salient_redux/field/typography/custom_fonts", "salient_redux_custom_fonts" );