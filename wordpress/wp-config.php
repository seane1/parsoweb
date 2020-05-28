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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i5741788_wp1' );

/** MySQL database username */
define( 'DB_USER', 'i5741788_wp1' );

/** MySQL database password */
define( 'DB_PASSWORD', 'B.JKr7XMr4IWDjmM9qK88' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'ZfaXx14vEnUl4JYUOktVIRTXbMrxUM3mOwtQBMyfuhVOz0pJuJQqh966oWRkyO7P');
define('SECURE_AUTH_KEY',  'nwLEsTP3WZkry8bLn4KB2fHImYftau0vxcGzJEP6ICjaiewwkhbhKQmHk8ZUi6BI');
define('LOGGED_IN_KEY',    'CcQ3W8ajlzSDCj5P9MZ5RwkqskJWFkj4AqEDZWK6NKKcAiahfCgJbxIcLy7Nll7N');
define('NONCE_KEY',        'liXzkoc7lZRaSwkqfShjx2TAQH08X2TKTBmFiD4U0lf6ZckgpsgRWGxDr5HZLLoX');
define('AUTH_SALT',        '35qHCV9xiaqv101uaSkEK9zwLF1Snt28amM91otQfeTGahFWpD6HRlUb7sTvf5N0');
define('SECURE_AUTH_SALT', 'rQAKa0aS4yO6G8gRMivC0ONjmqoQC3d5IivTWyjksm3g2ng7EoEZYQaYExreWwFw');
define('LOGGED_IN_SALT',   '6a3w1SiF3a5gst1Bz8LeiaSwHPOlIQgDkn9boTxSibuqupqDsWid1EjorWNucuuV');
define('NONCE_SALT',       'O1dBJ9IWRdfgItWdR4SxDpbAvql1hPYKB94bXVuaLp4rosil6iTOZ1kONTacupgC');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
