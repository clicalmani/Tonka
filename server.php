<?php
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {

    /**
     * |-----------------------------------------------------------------
     * |                ***** File MimeType *****
     * |-----------------------------------------------------------------
     * |
     * 
     * Without a proper mime type the file transfer will fail
     */

    // Common web files mime types
    $mime_types = [
        'css' => 'text/css'
    ];

    $file = __DIR__.'/public' . $uri;
    $ext  = substr($file, strpos($file, '.') + 1);
    $mime_type = array_key_exists($ext, $mime_types) ? $mime_types[$ext]: mime_content_type($file);

    header('Content-Type: ' . $mime_type); // Only content type is needed the remaining headers will be guest by the browser
    include $file;

    // We should exit to end the file transfer process
    exit;
}

require_once __DIR__.'/public/index.php';
