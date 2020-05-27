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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '~ ny0!g7cAWW-mTgP._2%dqGtZ>ly7~sl;qp|lWePd)WwC>Epc,074e0]R&EGn1!');
define('SECURE_AUTH_KEY',  '(3sePF4%:NkW?%g%Yg2rvxIMMyTJfa7HCk8r:`#kGRn(CFzPAjT%15Oi9cAXK-yG');
define('LOGGED_IN_KEY',    '5RhEve3*/E+V^~}tTH/>$8ee}Q#5a34q/b&:9V$X<0I>oUr4(j9N|zQV<o3KRe6^');
define('NONCE_KEY',        'VM6:YVZ6$tVb3?VDqFf_@_`fge-Bu;4!Ru4?<%8)+xpLvjGLfu0e;`sKi+7[N9Fo');
define('AUTH_SALT',        'ui92,0pr+P_(bgwL29=)9eGGnqy%w13Z/5CHD($x =l}b^d4?e#)n4vabSWYW?Yd');
define('SECURE_AUTH_SALT', '@+_p!u?_R?:CsWBO|V;Rh.9ku(v1ptq+a3DJV4@~Q8h_.6o9!:ms^lm3&{H$J2Ec');
define('LOGGED_IN_SALT',   'K!b2DwWMJFC!:d#r*I8U$Jv~AbsEB@ndJRp.r(2,I<n_Tu5@}l?$TI#6+:=`D#9+');
define('NONCE_SALT',       'u;c$K-K~J}!>_<s&ldoz]l.pL1OJ!&%:/<*Sl-c:,k*+@hsnqT .9,U ,6SVBN#Y');

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
