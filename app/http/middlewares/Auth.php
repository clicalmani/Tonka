<?php
namespace App\Http\Middlewares;

use Clicalmani\Flesco\Http\Middlewares\Middleware;

class Auth extends Middleware 
{
    /**
     * Handler
     * 
     * @return string
     */
    public function handler() : string
    {
        return routes_path( '/api.php' );
    }

    /**
     * Authorize
     * 
     * @param mixed $data
     * @return bool
     */
    public function authorize(mixed $data) : bool
    {
        return true;
    }
}
