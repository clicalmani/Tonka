<?php 

use Clicalmani\Flesco\Routes\Route;
use App\Http\Controllers\AppController;

/**
 * |-------------------------------------------------------------------
 * |                   ***** Web routing *****
 * |-------------------------------------------------------------------
 * |
 * 
 * Web routes:
 * 
 * Register here all your routes for web navigation
 */

 // Home page
Route::get('/', [AppController::class, 'index']);

Route::get('login', [AppController::class, 'login']);

Route::post('auth', [AppController::class, 'auth']);
