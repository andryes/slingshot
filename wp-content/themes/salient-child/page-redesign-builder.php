<?php
/**
 * Template Name: Redesign — WPBakery
 *
 * Page body: Edit Page → Backend Editor or WPBakery Page Builder.
 * Section styles: meta box "Redesign · Assets & header" (skin + header).
 */

$skin    = slingshot_redesign_builder_skin();
$post_id = slingshot_redesign_builder_context_post_id();

slingshot_redesign_enqueue_for_skin( $skin );
get_header();
slingshot_redesign_print_builder_chrome_and_content( $post_id );
get_footer();
