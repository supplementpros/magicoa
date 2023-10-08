<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'magicova_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'wjReNAS]~6D~t13^Zqf2@(415hErw;}61:sM(UeS:{;^gV6[v?Y<<qL&;qH{Sx{7' );
define( 'SECURE_AUTH_KEY',  '!QpjO;{?#-YQu!f)[:iZruZaNdqH{>vB=iv%Fsv(KE>Wz_%q[~h5mUR;v-gk3QUb' );
define( 'LOGGED_IN_KEY',    ':*T{w&BMx]a<|^W0)2[dR*7acuETN>QuSk7ZC>?,fiWKWmcgEqL Kq_qB4AIw:z?' );
define( 'NONCE_KEY',        '2b7n^@@flp;/9C 8>hw4u*|O%PNZC{$hEATt!~wU7|@SN,*KZVQ6L ?rkejJ%ciV' );
define( 'AUTH_SALT',        'iVvIGAS*drJX_ 0agb88J`+{mW%<<dxLTKoIMC|3SYu^P!Ft$lUfC-Y;*-MRu@_$' );
define( 'SECURE_AUTH_SALT', 'Jisb~YyI#Cs>WmjA4+6?i&v8wnMA!CC=MI0o0<5sPZmy^)Hx8W-vpgK=veA$3da~' );
define( 'LOGGED_IN_SALT',   ']. C)U<Yh41;Q{&o5vUJuWrnrMXW(`N s)=9@nSReWLD#~}:A([/h3UuADcfj,1Q' );
define( 'NONCE_SALT',       'T|Kj4+{:H*,e(c=mc,&be-tv}q-Xbxn!8)J+*ZwK7@_+qo = 3~_CDhz_zZ3b/)B' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
