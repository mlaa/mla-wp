<?php
$root_dir = dirname(__DIR__);
$webroot_dir = $root_dir . '/web';

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = new Dotenv\Dotenv($root_dir);

if (file_exists($root_dir . '/.env')) {
  $dotenv->load();
  $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL']);
}

/**
 * Include an 'all' environment config, if it exists.
 */
$all_config = __DIR__ . '/environments/all.php';

if (file_exists($all_config)) {
  require_once $all_config;
}

/**
 * Set up our global environment constant and load its config first
 * Default: development
 */
define('WP_ENV', getenv('WP_ENV') ?: 'development');

$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';

if (file_exists($env_config)) {
  require_once $env_config;
}


/**
 * URLs
 */
define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));

/**
 * Custom Content Directory
 */
define('CONTENT_DIR', '/app');
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/**
 * DB settings
 */

define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX') ?: 'wp_';

/**
 * Authentication Unique Keys and Salts
 */
define('AUTH_KEY',         'V_`MQ~mzU#!hi|jNduu[+#mMjbTV3vPTwgxaTcv#5/Onvz..0!2{]Li p VF[Hw*');
define('SECURE_AUTH_KEY',  'qTxqJ4Src?CzSdmS;0%}W;~`lOU~xBqEb5#uf:RmrZ.%O J21@qFN)f#)TlYGhp!');
define('LOGGED_IN_KEY',    '|S[A8|6tuz{WUR*_RT>8scF)?XW^f-yv|?tMBYuQ:G:p(xi Zg4z#eTMfbQ(O2p`');
define('NONCE_KEY',        '/M~((aLC{?(d@;WhRK+>^Zk2AF: yP=|8hc=kd@,RU<&uC!Efx7V:Y+#=COTii(U');
define('AUTH_SALT',        '14CnOImrlN1=Mol!Q#SRgY[0/ZE+29mTw5IAyQJljt;GAbe3$AdQ&I(G25I,xw.(');
define('SECURE_AUTH_SALT', 'Yt>s0L*/-[z3dan*O`;flIzrXw^L( *3# ySvda+f9cSV`cZr|GU?pB!>1e8A7E^');
define('LOGGED_IN_SALT',   '8x -2Jw)^&8x8OJvuzKn5U,IIhwV;Nd=nty.J6N+|&F<J|_@U(U7f83vliEvP46<');
define('NONCE_SALT',       ']fc&Uz5r.*^;u6aXOGniZ0,r@<Y1EDnFz*diD(<B?0M(RzMB=cjuwzSsGBlsyN^a');

/**
 * Custom Settings
 */
//define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISABLE_WP_CRON', getenv('DISABLE_WP_CRON') ?: false);
define('DISALLOW_FILE_EDIT', true);

/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
  define('ABSPATH', $webroot_dir . '/wp/');
}

