<?php 
use Clicalmani\Routes\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', function() {
    return redirect()->route('login');
});

// Login
Route::get('login', function() {
    return view('login', ['csrf' => csrf()]);
});

// 404
Route::get('404', function() {
    return view('home');
});

Route::post('auth', function() {
    echo '<pre>'; print_r(request()); echo '</pre>';
});
