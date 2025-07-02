<?php
// router.php - Use this when running `php -S localhost:8000 router.php`

// If using the PHP built-in server, this script directs all requests to index.php
if (php_sapi_name() === 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $file = __DIR__ . $url;

    // If the requested resource exists as a file or directory, serve it directly
    if (is_file($file) || is_dir($file)) {
        return false;
    }
}

// Otherwise, route the request through the front controller
require __DIR__ . '/index.php'; 