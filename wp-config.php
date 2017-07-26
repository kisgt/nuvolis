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
define('DB_NAME', 'nuvolis');

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
define('AUTH_KEY',         '.YF{_uoY+JZycne+{&}07H6OJO$c!c}93iM39_a]tVr[&u@f(&<`o}O;cEp5KTz{');
define('SECURE_AUTH_KEY',  'fo*iC)vsn%Vx`9CI4(n0|:QZx LVX%5nz,F[CE?t02?7PJiNqK~[@aR[&|kv6KA}');
define('LOGGED_IN_KEY',    'RmeFd7&F_iO*E-BTu&Zjv3ZGr1T`r#}&m:X#%S6;+.UYze%jULg*bf2HLPc.LO/r');
define('NONCE_KEY',        '_U(mJG X3S[yM;.ZHNh5T;Q~;8YXgnDnwd!sOW*{*lpOKSBX#`m>dZ#_1c]{T<s^');
define('AUTH_SALT',        'Ix7iJ~}@FA?WQ*%o7Y42cEyH9BMKYmK:K`YlU@/(vu>0LVreWLuBjm)~Ox.zZftt');
define('SECURE_AUTH_SALT', 'z&unAxvsGrtt^a|a#plYuVE069wX?).bI:1||`pMqY.`0tcw,uJp-p(.yXD2=|Da');
define('LOGGED_IN_SALT',   'fe>7AN;jm@$N6F$GT1`QpsX,E0;5IU/PpU#GEz?y)wxxDTx2{.Feo*4G#KY4~2Qk');
define('NONCE_SALT',       '02+3@^SvEoa_W]Q*OGO8)i*/~fQM]Iz(Kjllrn!6PuJ>O3E^)*o/I**~S3L{tf)b');
define('FS_METHOD', 'direct');

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