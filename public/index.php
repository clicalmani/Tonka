<?php
/**
 * Load composer autoloader
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

/**
 * Handle requests
 */
return Clicalmani\Foundation\Http\Requests\RequestController::render(); 
