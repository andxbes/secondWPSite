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
define('DB_NAME', 'second_wp_site');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '/q%{3*2,knB_0|R>(<r%1uHa}[u=Ej9-7-7+.l{e-9+ |3DkN/ULEnx@?KRv W0B');
define('SECURE_AUTH_KEY',  '|]*&Q~Cf-BQ|2g6omK+OnM:u4pJIC9{.>sD FwMxR}x.@;}gVnlXwHM/[eE6g:AS');
define('LOGGED_IN_KEY',    'zvZruEz|s,RQVNLyG YvWc=cXN8;F+Zg1`m=k]Wi$7m/P9Zlijf:U8Q^>(1pf081');
define('NONCE_KEY',        '}6j+ie)xx{0g%HN*-s%vMxhS,E8X43#lZ%h<s%4zl:fJ&QCBR $DxuhzeyM|ruT=');
define('AUTH_SALT',        '6Ld~Qbv_zXft[!EKS=IOV4XaF|*0|S|ayX&Y0hx5tD696mhKnw-V+LNl^O-}+1j<');
define('SECURE_AUTH_SALT', 'N$,&5`_s>u3$2IrN?_iCx&|[C#)?Ea,BH!7h+cz7pv}jWnVC+g8?g7nZif}7p|cm');
define('LOGGED_IN_SALT',   'N#pl|4:#ivLs3Wcf^_U%Hen(Nt|;75.m?2vw~FieIov]%p{(> Ggj^Qlkkc|S4|w');
define('NONCE_SALT',       ':+ejb$_z$>C-g`2L&[%lnT<@B_,,oI1uTo|dQ~ot%+_3atu-xR)j-a08+abK2Cr}');

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
