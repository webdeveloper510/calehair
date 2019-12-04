<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db216712_celebh');

/** MySQL database username */
define('DB_USER', 'u216712_soft');

/** MySQL database password */
//define('DB_PASSWORD', 'RK_8a)35[+mW0ulN');
define('DB_PASSWORD', 'softphoton@123');
/** MySQL hostname */
define('DB_HOST', 'mysql765int.cp.hostnet.nl');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '!x-vh7is4mw|t93DeZwI7@-0O|.Ql668]&o7 1lJzi=uLrM[U_+A)7n%Md%-|5Fg');
define('SECURE_AUTH_KEY',  'x:1:u=#4XMBW*lch?%<LX<f2fZkD7Xk(3?My[-@>y_%seh,M{R#&^!wE3 2m_zMI');
define('LOGGED_IN_KEY',    '1|-}$C3S#|F/4-7?ELo 0QMdy!.AI_7Xq9gRs&bO-2x$!XPvl;CAmNc+./|[-g:}');
define('NONCE_KEY',        '+E|Yh}2ntdneD3!k2pW)iGeQFu%1~14,Scd5i+yC3~ngTL<1uv%@7o El.A]f&]T');
define('AUTH_SALT',        'JGF*(J%T$fVWUKbK}&&Uyp@z(^Q|VSWN+,|j#^feX%MLx}V8QC|^9O+Q!O%+~2Y^');
define('SECURE_AUTH_SALT', '0.)-*+*EkS7*}ArP|s,cz2-O:[YI{N3)xxp{I6=Y:^_,:,8wT$va@;vvS+C[cqbW');
define('LOGGED_IN_SALT',   '=57<xLP{b;p9[*BK!36bXm8q2DWqpOkHNy7m..I/SxY_^Lj56I{W;*dpt%^*9Z]&');
define('NONCE_SALT',       'DR&(k!-%I!X1AeaFDS6wMZ/`/C/J{?O2KQ$y*7N[!v0M@e<57a*=4x.AsQS^Mffc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
