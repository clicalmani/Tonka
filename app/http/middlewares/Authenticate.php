<?php
namespace App\Http\Middlewares;

use Clicalmani\Flesco\Http\Middlewares\Middleware;

class Authenticate extends Middleware 
{
    /**
     * Handler
     * 
     * @return string
     */
    public function handler() : string
    {
        return routes_path( '/auth.php' );
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
