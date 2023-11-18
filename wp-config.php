<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecommerce-website' );

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
define( 'AUTH_KEY',         '(nZ90PB5[qnp1_k%F1j)D,8=vThOpr9dG9g1IuT-.WV4`lD$j9OpZHB!!,eo9XwH' );
define( 'SECURE_AUTH_KEY',  'jYinc&(GyAy[{ELH6+K|s0Kjt=VjsS|V1pgi~1`f9ky7T`g1KN;ulxC9d!FJ[Z8z' );
define( 'LOGGED_IN_KEY',    'NT}0n(4zlA5YsE?9R!5n*o7#_b!e<c4cb e,3jX7Mo`6:_+3 Vwsd#~2rgAkJ]vy' );
define( 'NONCE_KEY',        '$[vL~jtudO(GKSp`HWf%Ap{VZVD0`Tr(8y!jj%aNRTY&W=Z6ob%=2raZsV*Z{h!}' );
define( 'AUTH_SALT',        '0+h4R%q+~lgSrdzHhg:lXNCz@}To!}+ZcE_*2$v/%)*9;Hl5)N_aC}cBn3EDD L@' );
define( 'SECURE_AUTH_SALT', 'Xw~9k#1qTd5jL90?OtYu30XI.U!ktVS)spPP-7bo>4r3q7JeQb;/>2:m)gw%EI(@' );
define( 'LOGGED_IN_SALT',   '(KiM|~fcKZ`^z9wSyAOmB2,T$jdi$!|pzB(w}^Lz7=x(vmRmjn){Em1f:5)qU5+Z' );
define( 'NONCE_SALT',       's0?q^b}/<kOinX.%4Y941P:!$o~}in:&IAQoqfyiT|s<y)E{B}1S5wBvT^*FvNIg' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
