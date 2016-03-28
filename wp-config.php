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

if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
    // code for localhost here

    define('DB_NAME', 'bjj');

    /** MySQL database username */
    define('DB_USER', 'bjj');

    /** MySQL database password */
    define('DB_PASSWORD', '123456');

    /** MySQL hostname */
    define('DB_HOST', 'localhost');
} else {


    define('DB_NAME', 'b10_17760370_wp185');

    /** MySQL database username */
    define('DB_USER', '17760370_2');

    /** MySQL database password */
    define('DB_PASSWORD', 'P1J(7]16Sr');

    /** MySQL hostname */
    define('DB_HOST', 'sql301.byetcluster.com');
}
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
define('AUTH_KEY', '33bixnbmqumfzqx3c24d1yi8wiculspm9c50qjgypzinhpiqtlonip4flez4vxk4');
define('SECURE_AUTH_KEY', 'hxr8vezzok2hirhcemwk3aduesyi9aodxzt9vfowjt7ivhdzaqytuofekr0hjlig');
define('LOGGED_IN_KEY', 'efsrnmdqx4wzeaki3lysituje1nlv2xvsmexeayjxp9lycnuajcoa3xaaulsllrm');
define('NONCE_KEY', '4hbqrnowelpi7dzv1ngdmnhk2qpicwc2xqwpbde96yphidswjmt31zoou52ww3gm');
define('AUTH_SALT', 'v2hrvf34hxmfszgqvfgooohw0coacqcbgwrxj53skzzy1uzjnj3ugyfkvc962thm');
define('SECURE_AUTH_SALT', 'rukpokijkq5cfxnw9hy7rphjtcdwom3ezifb5ws3kdizqd99l9fqa7fbw8u8yu0h');
define('LOGGED_IN_SALT', 'lac5csvqus6sv6zzp7mllgqdmrdosxgzjjoua8wdncfmv3aooumqgtfmb6jv5ur4');
define('NONCE_SALT', 'suau3hhzlnzhb5tfn6orkuhnfnlllz7lkor0jb0fuwtqunp8rxpuc58t5gjzanlu');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpcr_';

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
@ini_set('display_errors', 1);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
