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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home1/jasimuddin/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'jasimudd_image');

/** MySQL database username */
define('DB_USER', 'jasimudd_image');

/** MySQL database password */
define('DB_PASSWORD', 'shamimimage');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DwS#d;B7Tw,ag4FTD/g;WNUhD7UPZtFSl;?<AK^fl3vM>&~5%R~9k&+hQiJacz!O');
define('SECURE_AUTH_KEY',  'e#R>.7KP*M~r_w%dL~_7t/S@yDs=h`m`Fsv:}Z$-H(LTWW/>/R5P5{)$/I>?6]FV');
define('LOGGED_IN_KEY',    ' 7)aD-V,UNX%0&-ixbVy7Dh+w7N?D$5!e$%-yeAr1w^},!*_+9.uL =EcG>W?AZH');
define('NONCE_KEY',        '>Ww1n5qvWH#&rHi)gX(=OKCAiQ<N_.!Qu]|]46L+.D3]mawho<p`#@bdjBC8xl5,');
define('AUTH_SALT',        'v@?(eqNdi+qhuEItKb!ks18dBz0s&hIdA@b=boWs`D@V{_Up_6d4`F3IGHjQ_!kN');
define('SECURE_AUTH_SALT', '^_SNH280UYkJ^c*04c2n.tK5gnI&(`}IF]{?_dceE1-rNI)l)jB,&<B&tA1<{]O[');
define('LOGGED_IN_SALT',   '_=[CW#66 uWy#]w=oe^ReD2vr%k;/CCq;J(=}>|Q9gE,=,}s)9xtNhLi7qR@p<P*');
define('NONCE_SALT',       ',#c?4c+-5b.Y,*[VMcuu,UM<~0bqxuf5#hm_>B*vF#-RU)|Z%YiYliNP%loi6Gy_');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
