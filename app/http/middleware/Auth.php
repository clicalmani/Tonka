<?php
namespace App\Http\Middleware;

use Clicalmani\Flesco\Http\Middleware\JWTAuth;

class Auth extends JWTAuth 
{
    function handler()
    {
        return routes_path('/api.php');
    }

    function authorize($request) 
    {
        return false !== $this->verifyToken($request->getToken());
    }
}