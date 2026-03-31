<?php defined('WPINC') or die ?><?php

add_action( 'rwmb_eustaff_after_save_post', 'template' );

function template( $post_id ) {
    $set_template = rwmb_meta( 'template', '', $post_id );

    $my_post = array(
        'ID' => $post_id,
        'post_content' => $set_template,
    );

    wp_update_post( $my_post );
}

add_shortcode( 'overview', 'overview' );
function overview() {
return rwmb_meta( 'euoverview' );
}

add_shortcode( 'techskills', 'techskills' );
function techskills() {
return rwmb_meta( 'eutechskills' );
}

add_shortcode( 'softskills', 'softskills' );
function softskills() {
return rwmb_meta( 'eusoftskills' );
}

add_shortcode( 'availability', 'availability' );
function availability() {
    $availabedetails = rwmb_meta( 'euavailabilitydetails' );
    $availability = rwmb_meta( 'euavailability' );
    $availabilityOptions = array(
        'ASAP' => 'Can start ASAP',
        'Next Week' => 'Can start next week',
        'Few Weeks' => 'Can start in a few weeks',
        'Month +' => 'Can start next month',);
    if (array_key_exists($availability, $availabilityOptions)) {
        return $availabedetails.'<ul><li>' . $availabilityOptions[$availability] . '</li></ul><script>jQuery(function(){if(window.self===window.top){window.location="/eustaff/";}});</script>';
    }
}


add_shortcode( 'profilepic', 'profilepic' );
function profilepic() {
$profilepic = wp_get_attachment_url( get_post_thumbnail_id() );
$rates = rwmb_the_value( 'eurate' );
return do_shortcode('[image_with_animation image_url="'.$profilepic.'" image_size="full" animation_type="entrance" animation="None" animation_movement_type="transform_y" hover_animation="none" alignment="left"  image_loading="default" max_width="100%" max_width_mobile="default" el_class="profilepic"]<span style="color: #ffffff;text-transform:lowercase;margin:0;font-size:1em;display:block;margin-top:5px;">$'.$rates.'/hour</span>');
}

add_shortcode( 'available', 'available' );
function available() {
$available = rwmb_meta( 'euavailability' );
return do_shortcode('
<span style="font-size:.75em;color: #ffffff;margin:0;display:block;">Available: '.$available.'</span>');
}

add_shortcode( 'about', 'about' );
function about() {
    $name = get_the_title();
    $countryv = rwmb_meta( 'eucountry' );
    $countryl = rwmb_the_value( 'eucountry' );
    // get roles and skills and remove empty items
    $roles = array_filter(rwmb_meta( 'euroles' ), 'trim');
    $skills = array_filter(rwmb_meta( 'euskills' ), 'trim');
    // generate html for roles and skills
    $roles_html = '<ul><li>' . implode('</li><li>', $roles) . '</li></ul>';
    $skills_html = '<ul><li>' . implode('</li><li>', $skills) . '</li></ul>';
    $years = rwmb_meta( 'euexperience' );
    return '<h3 style="color: #ffffff;">'.$name.'<span class="flag-icon flag-icon-'.$countryv.'"></span><span class="flag-text">'.$countryl.'</span></h3>
            <div style="color: #ffffff;" class="roles">'.$roles_html.' • '.$years.' yrs</div>
            <div style="color: #753bbd;" class="skills">'.$skills_html.'</div>';
}
