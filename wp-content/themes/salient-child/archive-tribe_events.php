<?php
/**
 * Custom Events Calendar archive shell.
 *
 * The public /events/ route is owned by The Events Calendar. Render the same
 * admin-managed Figma page that backs /events-old/ so both URLs stay aligned.
 */

if ( function_exists( 'slingshot_render_events_figma_listing' ) && slingshot_render_events_figma_listing() ) {
	return;
}

get_template_part( 'index' );
