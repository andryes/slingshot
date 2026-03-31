<?php defined('WPINC') or die ?><?php

/* Change Text Site Wide */

function change_next( $translated_next ) {
	if ( $translated_next == 'Next Project' ) {
		$translated_next = 'Next';
	}
	return $translated_next;
}

function change_previous( $translated_previous ) {
	if ( $translated_previous == 'Previous Project' ) {
		$translated_previous = 'Previous';
	}
	return $translated_previous;
}
add_filter( 'gettext', 'change_next', 20 );
add_filter( 'gettext', 'change_previous', 20 );