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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sport-island' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'pVk=vEG`@c,=dT$H.HT+Q-thhr)-#HIt#YE6bm1NMq4IOG+ u88q67)/ 5`N1&Xz' );
define( 'SECURE_AUTH_KEY',  'ZDtX;xs YEZJdCZnZ/{>D:Htj N3aE6.^HFdNLBaaX1#~_AsUlzLH|&K41|#Xi$|' );
define( 'LOGGED_IN_KEY',    '<9RUq;:TUjP*l`D!0mS_g^4wbmcEQ&qt:ic84CxauB?}IDN(4i%zWI#FiNG Kz*U' );
define( 'NONCE_KEY',        '!]>jOqD$-7O:_O CxEa4)h9|,j+9_<`8`,3O+d d6MW8hu9#yZ$v5@gB?TE<Xz{,' );
define( 'AUTH_SALT',        '8N_sbE-Y{X&2WBiu3I< ]RzRq6~cVYGlv}jFYT<nw52gV$}yt-A>OS+2@CtT@+.0' );
define( 'SECURE_AUTH_SALT', 'Zt5>-R=lVT;RXSVWgG{@m FVY7SI#L!zal0EV73N4RU3)D%U`Uk)7Tb1(W/9(T[!' );
define( 'LOGGED_IN_SALT',   '%}Q,Nx(Rzt6AjqHEkDsv9j2Zh!;<-+blZ4=*WQ`]P=tlbyc&P7us=(,yi!Ew6YXF' );
define( 'NONCE_SALT',       '`p`0;#mSft(8P4CAB;ic|.j[>E8:mwstY8^)Pw4r-2@]L sGd~FyKhC0P<i?dTE/' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
