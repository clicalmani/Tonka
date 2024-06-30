<?php
/**
 * Load composer autoloader
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

/**
 * Handle requests
 */
return Clicalmani\Fundation\Http\Requests\RequestController::render(); 
