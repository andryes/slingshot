<?php
/**
* The base configuration for WordPress
*
* The wp-config.php creation script uses this file during the
* installation. You don't have to use the web site, you can
* copy this file to "wp-config.php" and fill in the values.
*
* This file contains the following configurations:
*
* * MySQL settings
* * Secret keys
* * Database table prefix
* * ABSPATH
*
* @link https://codex.wordpress.org/Editing_wp-config.php
*
* @package WordPress
*/

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'yslingshot' );

/** MySQL database username */
define( 'DB_USER', 'yslingshot' );

/** MySQL database password */
define( 'DB_PASSWORD', 'goWnJ40eALjKe6D' );

/** MySQL hostname */
define( 'DB_HOST', 'db' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY',         ';#z%Wl)|evP3ye69.4QSRY<g1Z-/=_C[o8tNU#bB<><EM|I+pfNN>kN(.|G%8MLx');
define('SECURE_AUTH_KEY',  'zuQtf[aaK.l>~5:H`krA=f<Y;.;|s!zC^YYjUuZ81<gnh8B6L5 9W;%c}]3V`x+j');
define('LOGGED_IN_KEY',    '2?_;qycOKZn[_jFM?gNAm=L;}mXQpa-*:}7H;T)n#D;U_Hyn20!?q=44Ihg#cEqO');
define('NONCE_KEY',        'Yt@[|I}R^?62Gn+p@-EZ7ld>2MS|Ob*alZM;RX>?32z`tc:pDK$)R15b+!<OwpOn');
define('AUTH_SALT',        'I)@%5YN#&q6V-``pR)z@[8nP-+w&}08tk#`mqZd)}31;eLs.GtN7SON:BIOX!y6f');
define('SECURE_AUTH_SALT', 'B:[5B.aRI_jq^-8DwM^e_gp@|HPFU.`>nb?g4-@8_$((]4X+pa,VjA)jx[Hi/AAb');
define('LOGGED_IN_SALT',   'vp-|$ei~?2E.1;RL6dUPcW.ZEB3M|Qs8b*r0g8;|0}:+{uzcO`lD$?`|Tv|$f3zW');
define('NONCE_SALT',       '|XWI9w3vz1!%wsjOIyY:+[Q_APBSa0-}QsKb @K!`CYj7DhXY^xd5Mot+h-rs 75');


/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'wp_';

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*
* For information on other constants that can be used for debugging,
* visit the Codex.
*
* @link https://codex.wordpress.org/Debugging_in_WordPress
*/
define( 'WP_DEBUG', false );

/**
* Revisions cause a huge increase in DB size that can become a performance issue.
*
* We only recommend enabling them on non-multisite installs and set it to a sane number like 5 max.
*/
define( 'WP_POST_REVISIONS', 5 );

/** Disable the Plugin and Theme Editor, this can improve security and is a Defender hardening rule. **/
define( 'DISALLOW_FILE_EDIT', true ); // Added by Defender




define( 'WP_HOME', 'http://localhost:8080' );
define( 'WP_SITEURL', 'http://localhost:8080' );
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
