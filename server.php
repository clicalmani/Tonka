<?php
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

/**
 * Assets requests
 */
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {

    /**
     * Requested file absolute URI
     */
    $file = __DIR__.'/public' . $uri;

    /**
     * Set headers
     * 
     * Only content type is needed the remaining headers will be guest by the browser
     */
    header('Content-Type: ' . mime_content_type($file));

    // Render the requested file
    include_once $file;

    // We should exit to end the file transfer process
    exit;
}

require_once __DIR__.'/public/index.php';
