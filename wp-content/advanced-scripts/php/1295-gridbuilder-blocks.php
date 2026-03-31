<?php defined('WPINC') or die ?><?php

function gb_block_about( $blocks ) {
	
	// 'my_block' corresponds to the block slug.
	$blocks['about'] = [
		'name' => __( 'About', 'text-domain' ),
		'render_callback' => 'gb_about',
	];
	return $blocks;
}

add_filter( 'wp_grid_builder/blocks', 'gb_block_about', 10, 1 );

// The render callback function allows to output content in cards.
function gb_about() {
	$post = wpgb_get_post();
	$name = $post->post_title; // get the title
	$field = rwmb_get_field_settings( 'eucountry', '', $post->ID );
	$countryl = $field['options'];
	$countryv = rwmb_meta( 'eucountry', '', $post->ID );
	// get roles and skills and remove empty items
	$roles = array_filter(rwmb_meta( 'euroles', '', $post->ID ), 'trim'); // get the 'euroles' meta field
	$skills = array_filter(rwmb_meta( 'euskills', '', $post->ID ), 'trim'); // get the 'euskills' meta field
	// generate html for roles and skills
	$roles_html = '<ul><li>' . implode('</li><li>', $roles) . '</li></ul>';
	$skills_html = '<ul><li>' . implode('</li><li>', $skills) . '</li></ul>';
	$years = rwmb_meta( 'euexperience', '', $post->ID ); // get the 'euexperience' meta field
	echo '<h3 style="color: #333333;">'.$name.'<span class="flag-icon flag-icon-'.$countryv.'"></span><span class="flag-text">'.$countryl[$countryv].'</span></h3><div class="roles">'.$roles_html.' • '.$years.' yrs</div><div style="color: #753bbd;" class="skills">'.$skills_html.'</div>';
}

function gb_block_profileimg( $blocks ) {
	
	// 'my_block' corresponds to the block slug.
	$blocks['profileimg'] = [
		'name' => __( 'Profile Image', 'text-domain' ),
		'render_callback' => 'gb_profileimg',
	];
	return $blocks;
}

add_filter( 'wp_grid_builder/blocks', 'gb_block_profileimg', 10, 1 );

// The render callback function allows to output content in cards.
function gb_profileimg() {
    $post = wpgb_get_post();
    $profilepic = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    $rates = rwmb_the_value( 'eurate', '', $post->ID, false );
    echo '<img class="skip-lazy profilepic" height="100" width="100" src="'.$profilepic.'?lossy=1&amp;strip=1&amp;webp=1"><span style="text-transform:lowercase;margin:0;font-size:1em;display:block;line-height:1;margin-top:0;">$'.$rates.'/hour</span>';
}