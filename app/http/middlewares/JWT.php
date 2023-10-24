<?php
namespace App\Http\Middlewares;

use Clicalmani\Flesco\Http\Middlewares\JWTAuth;
use Clicalmani\Flesco\Http\Requests\Request;

class JWT extends JWTAuth 
{
    /**
     * Handler
     * 
     * @return string
     */
    public function handler() : string
    {
        return routes_path('/jwt.php');
    }

    /**
     * Authorize
     * 
     * @param \Clicalmani\Flesco\Http\Requests\Request
     * @return bool
     */
    public function authorize(Request $request) : bool
    {
        return false !== $this->verifyToken($request->getToken());
    }
}
