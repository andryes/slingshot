<?php defined('WPINC') or die ?><?php

function gb_block_portfolioimg( $blocks ) {
    
    // 'portfolioimg' corresponds to the block slug.
    $blocks['portfolioimg'] = [
        'name' => __( 'Portfolio Image', 'text-domain' ),
        'render_callback' => 'gb_portfolioimg',
    ];

    // 'portfoliologo' corresponds to the new block slug for the logo.
    $blocks['portfoliologo'] = [
        'name' => __( 'Portfolio Logo', 'text-domain' ),
        'render_callback' => 'gb_portfoliologo',
    ];

    return $blocks;
}

add_filter( 'wp_grid_builder/blocks', 'gb_block_portfolioimg', 10, 1 );

// The render callback function outputs only the full-size image for portfolio image.
function gb_portfolioimg() {
    $post = wpgb_get_post();
    $bgcolor = rwmb_meta('portfolio_bgcolor', '', $post->ID); // Ensure it fetches with post ID
    $image = rwmb_meta('portfolio_image', ['size' => 'full'], $post->ID); // Retrieve full size image from the custom field

    if (!empty($image) && is_array($image)) {
        $portfolioPic = $image['url']; // Get URL of the full size image
        // Output the image and the background color as a data attribute or class
        echo '<img class="skip-lazy" src="'.$portfolioPic.'">';
        echo '<span class="workcolor'.$bgcolor.'" style="display:none;"></span>';
    } else {
        error_log('No portfolio image found or image is not an array for post ID: ' . $post->ID);
    }
}

// The render callback function outputs only the full-size image for portfolio logo.
function gb_portfoliologo() {
    $post = wpgb_get_post();
    $logo = rwmb_meta('portfolio_logo', ['size' => 'full'], $post->ID); // Retrieve full size image from the custom field

    if (!empty($logo) && is_array($logo)) {
        $portfolioLogo = $logo['url']; // Get URL of the full size logo
        // Output the logo with specified CSS
        echo '<img class="skip-lazy" src="'.$portfolioLogo.'" style="max-height: 30px;margin-bottom:.75em">';
    } else {
        error_log('No portfolio logo found or logo is not an array for post ID: ' . $post->ID);
    }
}
