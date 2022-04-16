<?php
define( 'WP_CACHE', true );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u458660546_Scehz' );

/** Database username */
define( 'DB_USER', 'u458660546_B6fVP' );

/** Database password */
define( 'DB_PASSWORD', 'g80TOT5WVg' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ')vgU>#gD)O*)_fDQE0WcYY^XbKjY+bRSx/V} qg}0PH~WJ*[i7&m#=_{d::[EII_' );
define( 'SECURE_AUTH_KEY',   'Ew@lJcM-0<lb`xj+gk#7}A.~CdOhjZ8+l`kP.R^t[5!Yv?_HVg^]XjZ`c {ii)IB' );
define( 'LOGGED_IN_KEY',     'Q8Y@Z)D!+ToL~,PF08 `BS@|%2SVQQOSv.2^4[.<^?fx+k$Jw_ioLW!^7La9<~0J' );
define( 'NONCE_KEY',         's|o0!+rT${L`e`r!0f I|4Prl$-l} LED3W( sFZpTwg YF2G0,w{QkBZ($C|{U!' );
define( 'AUTH_SALT',         'UF#wiLr/D<K1jk[Wy*<# ?NQJ^(*um53:uQd5]{!@LKS`VnCDtaKmGKy[k=,Ieg>' );
define( 'SECURE_AUTH_SALT',  ';^6k.<nps>{ejSiYg2BD.zGCC3nK8]VcOIMTAT!ohmaGK#EQmn&kHiZ1YRNIg5/K' );
define( 'LOGGED_IN_SALT',    '49>[`U,} Pt8z?`eOiqZl_M)z7YU9u) 4[)N`P;oQBU~6h#(q9~=yLaR4KQqKZIa' );
define( 'NONCE_SALT',        './kgEaESRD]5b{6SZuPqBrz&q8whX+d60MJVBd>xWe%=Je*ehI8V+>lo:}8I=ane' );
define( 'WP_CACHE_KEY_SALT', 'M4ozbVWd44Ir&@{EWTaOeRpDL5B0@t0c|m8vPam<@Z*98Trd-*(z5G;G}) XzXa_' );


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
