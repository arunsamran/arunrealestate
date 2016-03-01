<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'arunreal2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'r{j|y!$dm=|O8C|QfoI(D;|W94FkZ2F_W)UNIU-9TDq1CUXDLHhnfZ}3+ajw|Njl');
define('SECURE_AUTH_KEY',  '__|qUaWo<7Z5b4o/~(p|/+~h- E juc:%&%$>i$^l.19DZ+Y^B@|1N~yHnIxZkg(');
define('LOGGED_IN_KEY',    'zBP 6>H$wk}3~O9TIXx3#~dt{V}z!sU<-^_, !qO-D4V&zc2#B-L5deuYqH)o|OO');
define('NONCE_KEY',        'op+:*+}s?>RTE74*x6X/LS? f2j|AR=L?lD-cSP<X@B%5?-x|0/Pgl,yX,sRP`,q');
define('AUTH_SALT',        '.MX9KS&FTeoO8._sCUKmok~QpJZdwwY{:JB9T`|@=s2OT!^=e}I+f,e<BX9-c0c=');
define('SECURE_AUTH_SALT', 'M,]ll~oUO]}o.li+M4ZO=w9m,,}uoF5X%8=kQGtLb+H0F=ZTmRA1~fo 6}4*|](/');
define('LOGGED_IN_SALT',   '97NPXDW,?:!rQzy`&E$qb!:E-iFC}^ai+;?BzZeZx&4$UU5N:N,8}Dt|_9@s])UN');
define('NONCE_SALT',       'sP(^:e4?%qml1f>c+pGc|k`A(auzjn9OjaQ)m+|/3L8f7);$<:CQ4H8Q~mXu|UPR');

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
