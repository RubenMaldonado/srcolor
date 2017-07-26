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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'RtBPzFBNMsDbcu4aOMH4U1ftKLPSx+cZV8a6UqYiN7wBnlGOIwjWingxdnCrMcgjFQTqeNlHbjkL3phwwYWueg==');
define('SECURE_AUTH_KEY',  '2stQjZtsmsUjVOY2uLHEaiBva+4E1hyAkls59riPuW78EeRc+2ZpksgzjpFE/c51tT8BE0oWAkDwufXhWwroCg==');
define('LOGGED_IN_KEY',    'cjbDpd19yfQUYCB0jAy0rHmrIcVNGBB4ocv3kYt2fXSfwsmqf1JjWkrAcdAqyW4Gj4OJFqqK8AbjL6us2oMFCg==');
define('NONCE_KEY',        'tcZlJluz0UTx5gKIAhwKkEpu6Yo3ThhZrTuFiw5Vd9vcn4j+GSF1pmeX9Byx9xosRfct4nybp4DLDsiS9N87Qw==');
define('AUTH_SALT',        'pSdHPpv4vFkQVR74VHA+F7KjXlLst/7CxB1IbO6sjCCs9D0VEVC5HS7U9lTQ5q9Q8w/gf58D6oNMhAA9GD92Vg==');
define('SECURE_AUTH_SALT', 'gNvOoNBx1c8bxaxAQ8nE3wF0QXUN96jX/HA1XqQWDDz1kKjoQZKDMJDWnf8Z1uuzRrZsUEeNZHunYGI5nzbsZA==');
define('LOGGED_IN_SALT',   'VPJ88XrEgnhRn9hWTJ8u/6xHmShIVU5NK9j3fuVCHcKsc794V43niKKLHPRT1efevY6jrZbdcqV/6GjM9Va7xQ==');
define('NONCE_SALT',       'nyphxm+Hgqj2T0ywna1Zg+x3Lrrw8y7rRUcm6CVFyIjYsJfB+RD6zjGUIKB/XM7z+AwQx5M3Da24HT43EsQUXw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
