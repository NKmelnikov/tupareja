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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Z9i1h5e8l7' );

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
define( 'AUTH_KEY',         '}!6:GlC-tok)kf6#~m.mxs&Kc&oW7js`d&fq5.O=0P(&mt1~~:>=QMS4hm8sGes%' );
define( 'SECURE_AUTH_KEY',  '2u)&FGv{mCTX/8do_Q1$8D +~IY,d=UoH})U4xF=0HI&#kmms#cI`K_r%<8,DrP!' );
define( 'LOGGED_IN_KEY',    'Z_)b9u=Wspv ^4Gjm)ghz/5l(bv3 !Vt7.RB.AT`-W6ZA9|<P@>&ZV3O-$IP$E>+' );
define( 'NONCE_KEY',        'r%zE(F)u7.qY#Q/4,hR@6fXl}+U 4r =*Rl87DV[No#dUEk[ IW.kapt/^JaaW#j' );
define( 'AUTH_SALT',        'd5pn;+NY/0H8xkO]BLu/iR?+P=H~9pYp7bt:B>l|VFu~2}Fk}3RD<iBAsp{&zMm(' );
define( 'SECURE_AUTH_SALT', '/qpBb6nR8Ri3M5%$V& ?H%<3:{Yg9<iAtf|Wel@T_SjyT/E^O>r)VM*NA9>OfVF_' );
define( 'LOGGED_IN_SALT',   '7T]E%?0(J(WB3>LRsH1uaEaV*M>=s0o+n&(u#_;@SgQA$j1B(/v}Z$S/i->2e.O6' );
define( 'NONCE_SALT',       '.p9FYH_{1j+OZv/2IahKy74QY[hdzoOv+.^&P)!]$q*Rjm}He4@?*qA<ByAB4/5+' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );
define('FS_METHOD','direct');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
