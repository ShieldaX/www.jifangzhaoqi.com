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
define('DB_NAME', 'jifang');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('WP_SITEURL', 'http://www.jifangzhaoqi.com');
define('WP_HOME', 'http://www.jifangzhaoqi.com');
define('RELOCATE',true);
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
define('AUTH_KEY',         't=W-Uy(W%a+6;.T@v}^<HXtqkrw1n`&`:`;uitZ;-K|C4sUw<n8-)PZx.O2IpRI1');
define('SECURE_AUTH_KEY',  '9<{TphY+C7@h_%sMJn@6EMa|dMg^ece!A#AW8<lT``b:J7E]++z?4]|w6W9R0-;<');
define('LOGGED_IN_KEY',    '!nE^c_5:THVm/IVbe5|l]S@F9J.1:z|&iWUz>sZq1u<oJReS)@-&M5y*Nwp*F*~T');
define('NONCE_KEY',        '_e$8]vZ;KpUqaA`/+LK*/{xw!_IYXy|Bmn-7.FWdTc~#k/fG 9)N#L%> QgcgW<w');
define('AUTH_SALT',        '<>9B;T6F@9noa*+90IUzRN^t;t#{^34I>CIc6Sjg2)*:w:$W>wxP6g,)mr^ukFs:');
define('SECURE_AUTH_SALT', 'hjXpv-;wx$l{_-#rznXWc0lTDc]ux^no[-l#(X*N([+QG$-S[z0k2088ylw&I<z2');
define('LOGGED_IN_SALT',   'X|dBp*Z3(yBX/q~f05=-++~)q&V,=q^pae9HXq[(;5-m/{+n2TQ$8^u[(r:RFo[=');
define('NONCE_SALT',       'K,IH/=+x*>4q-3koKPmQDi>DKz|@KJ|*J:C#;m|pbT7`G,/xk_P#po=nM]WH;XL&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'klm_';

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
