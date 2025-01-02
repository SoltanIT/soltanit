<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'omantest2' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' ?6R5BR+|hDto~S>oofj2:GLq.}RhYB<C!C88VBSzCuDU/evR^rLFJ4/io79HQ~ ' );
define( 'SECURE_AUTH_KEY',  '4IAvxZ:%-|1jr0&f!u)y(HO8nc/:ubwWw729Om+X]wc-=$-ZLPIgLT/=[3-S0?_;' );
define( 'LOGGED_IN_KEY',    '.,(Q%1x2nF`8xaXlI.g?u`vR1$OKQ)D{0v9x!EI{_c  ~4zUcrDB3L?]44mE~Ub5' );
define( 'NONCE_KEY',        '**yV0qP}Raiwz.56/rN?1*D6CY+)Dpj9wLHK;O/;z{)6`^IP~`{/Jh51M;ubWviK' );
define( 'AUTH_SALT',        'bJnKG)Klt*9@ws 7F 86KyZi F{WV~$8XvoW31b4*J6j3N<j?Tn{lgo3[i 7R@.>' );
define( 'SECURE_AUTH_SALT', '*vmQM3!_!wDPv;rGYY`h}aOnKF(EuHMDo@==--<5<dBCvsZaDaOC@EfwuBdO-`yE' );
define( 'LOGGED_IN_SALT',   '&Bf@0HVeT#1Jfi/e~}C[qUr34%r6]A@77k`Vfe`wVb?I}=ND+Q:RQ^|h9Se?4%/2' );
define( 'NONCE_SALT',       'x {I+jSxB# AI|Erklp2f<R*gTB-qqW&>ch=Kn;`=m*ejGhfIb}gY4{O^^)!V?>6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
