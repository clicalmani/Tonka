<?php
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

/**
 * Assets requests
 */
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {

    // Common web files mime types
    $mime_types = [
        'css' => 'text/css',
        'js'  => 'application/javascript'
    ];

    $file = __DIR__.'/public' . $uri;
    $ext  = substr($file, strpos($file, '.') + 1);
    $mime_type = array_key_exists($ext, $mime_types) ? $mime_types[$ext]: mime_content_type($file);

    /**
     * Set headers
     * 
     * Only content type is needed the remaining headers will be guest by the browser
     */
    header('Content-Type: ' . $mime_type);

    // Render the requested file
    include_once $file;

    // We should exit to end the file transfer process
    exit;
}

require_once __DIR__.'/public/index.php';
