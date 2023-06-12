<?php
namespace App\Http\Controllers;

use Clicalmani\Flesco\Http\Controllers\RequestController as Controller;
use Clicalmani\Flesco\Http\Requests\Request;
use Clicalmani\Flesco\Ressources\Views\View;

class AppController extends Controller
{
    /**
     * |----------------------------------------------------------------
     * |                ***** Render Home Page *****
     * |----------------------------------------------------------------
     * |
     * 
     * Render a template view
     * 
     * Will redirect to login page.
     */
    function index(Request $request)
    {
        return $request->redirect()->route('/login');
    }

    function login(Request $request)
    {
        return View::render('login');
    }

    function auth(Request $request)
    {
        /**
         * Just print out request parameters
         */
        return print_r(json_encode($request));
    }
}
