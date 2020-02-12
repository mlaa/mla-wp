<?php

/**

 Application customizations
 --------------------------
 Do not modify application.php; instead, put customizations here (or, if they
 are specific to an environment, in the appropriate environment file).

 **/

/**
 * Apache Proxy Setting
 */
$_SERVER['HTTPS']='on';
define('FORCE_SSL_ADMIN', true);

/**
 * Multisite
 */
define('WP_ALLOW_MULTISITE', 'true');
$base = '/';
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', getenv('WP_DOMAIN'));
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

define('SUNRISE', 'on');
define('PLUGINDIR', 'app/plugins');

// all paths should be on the root to avoid cookies which are duplicates aside from path
define( 'COOKIEPATH', '/' );
define( 'ADMIN_COOKIE_PATH', '/' );
define( 'SITECOOKIEPATH',    '/' );

define('PRIMARY_NETWORK_ID', 1);

/**
 * Redirect nonexistent blogs
 */
define('NOBLOGREDIRECT', getenv('WP_HOME'));

define('WP_LOGS_DIR', getenv('WP_LOGS_DIR'));

define('REDIS_HOST', getenv('REDIS_HOST'));       // wp-redis
define('WP_REDIS_HOST', getenv('WP_REDIS_HOST')); // redis-cache

/**
 * ElasticPress Elasticsearch
 */
define('EP_HOST', getenv('EP_HOST'));
