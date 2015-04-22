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
define('DB_NAME', 'project24');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'zzuullaa');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'Eek} LlR; }>@?npzrB7 lPv*6Evi@5Ox;D`@`Ah7{Yzd-KaykY+K|6[:a-!J%x{');
define('SECURE_AUTH_KEY',  'cyeEk UJi;9kNT]}+tI=W`HjM12IJ5IU7O,.B:C6+T&?gt*Ih#c0+USn[Zy5%B!^');
define('LOGGED_IN_KEY',    'x8QBT)^y;gRL|7kjEhmXIQiEYMjJJ<4+8|;gVJPdkgC<&b;lHwwo(o+S}7#Vp+(x');
define('NONCE_KEY',        'YjfRD$TolJ^@{Vt, W3v2Hw#VAg+0ObKa*1zyPSI~fUk9-:`g{e-!l%5};-14|A5');
define('AUTH_SALT',        'mZ!|Y$[kD9|<JC-$Jd;xA8(@ZjXZ~0uZ+//#dU5Uw0&d!P_a(n:HH#iw|U9-4*_1');
define('SECURE_AUTH_SALT', 'VCxnbk>r1.6A^fA~7>~Bf0^Npo$fdvyw/r<e;-tqAm th0ZhBlKIMT$d1.5[gW6%');
define('LOGGED_IN_SALT',   '$%!$]d5(i fX8~3+ug,R:F0.v>MFay>k3As/-qf/LUWRn}8vu*1j=%5E#C[>;^qN');
define('NONCE_SALT',       'v?1!d9I+(Wwb(%LKP, Mkz8%2}+>=W_ m~46fgeu!XbOo-DBJr.0C{klbKsqK:/x');

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
