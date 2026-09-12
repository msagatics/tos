<?php

// Root
define('ROOT_PATH', dirname(__DIR__, 2));

// Main directories
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// APP main directories
define('CONFIG_PATH', APP_PATH . '/config');
define('CORE_PATH', APP_PATH . '/core');
define('MODULES_PATH', APP_PATH . '/modules');
define('STORAGE_PATH', APP_PATH . '/storage');
define('VIEWS_PATH', APP_PATH . '/views');

// MODULES directories
define('CART_PATH', MODULES_PATH . '/cart');
define('CATEGORIES_PATH', MODULES_PATH . '/categories');
define('PRODUCTS_PATH', MODULES_PATH . '/products');
define('SEARCH_PATH', MODULES_PATH . '/search');
define('USERS_PATH', MODULES_PATH . '/users');

// VIEWS directories
define('LAYOUTS_PATH', VIEWS_PATH . '/layouts');
define('ERRORS_PATH', VIEWS_PATH . '/errors');

// PUBLIC directories
define('ASSETS_PATH', PUBLIC_PATH . '/assets');
define('UPLOADS_PATH', PUBLIC_PATH . '/uploads');

// ASSETS directories
define('CSS_PATH', ASSETS_PATH . '/css');
define('JS_PATH', ASSETS_PATH . '/js');
define('IMAGES_PATH', ASSETS_PATH . '/images');

// UPLOADS directories
define('PRODUCTS_UPLOADS', UPLOADS_PATH . '/products_images');
define('USERS_UPLOADS', UPLOADS_PATH . '/users_images');

// URL Base Paths (For href, src tags, CSS/JS links)

// Detect HTTP vs HTTPS (handles standard setups, reverse proxies, and load balancers)
$isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || ($_SERVER['SERVER_PORT'] ?? null) == 443
    || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

$protocol = $isSecure ? 'https://' : 'http://';

// Detect host domain (e.g., localhost or example.com)
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';

// Automatically detect the web root relative path
$docRoot  = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? '');
$rootPath = str_replace('\\', '/', ROOT_PATH);

// Subtract Document Root path from Project Root path to find relative subfolder (e.g., "/duka" or "")
$subFolder = str_replace($docRoot, '', $rootPath);
$subFolder = rtrim($subFolder, '/');

// Define dynamic URL constants
define('SITE_URL', $protocol . $host . $subFolder); // http://localhost/project
define('BASE_URL', SITE_URL . '/public'); // http://localhost/project/public

// MAIN url directories
define('APP_URL', SITE_URL . '/app');
define('PUBLIC_URL', SITE_URL . '/public');

// APP url
define('CONFIG_URL', APP_URL . '/config');
define('CORE_URL', APP_URL . '/core');
define('MODULES_URL', APP_URL . '/modules');
define('STORAGE_URL', APP_URL . '/storage');
define('VIEWS_URL', APP_URL . '/views');

// MODULES url
define('CART_URL', MODULES_URL . '/cart');
define('CATEGORIES_URL', MODULES_URL . '/categories');
define('PRODUCTS_URL', MODULES_URL . '/products');
define('SEARCH_URL', MODULES_URL . '/search');
define('USERS_URL', MODULES_URL . '/users');

// PUBLIC url
define('ASSETS_URL', PUBLIC_URL . '/assets');
define('UPLOADS_URL', PUBLIC_URL . '/uploads');

// ASSETS url
define('CSS_URL', ASSETS_URL . '/css');
define('JS_URL', ASSETS_URL . '/js');
define('IMAGES_URL', ASSETS_URL . '/images');

// UPLOADS url
define('PRODUCTS_UPLOADS_URL', UPLOADS_URL . '/products_images');
define('USERS_UPLOADS_URL', UPLOADS_URL . '/users_images');