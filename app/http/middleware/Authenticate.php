<?php
namespace App\Http\Middleware;

use Clicalmani\Flesco\Http\Middleware\Middleware;

class Authenticate extends Middleware 
{
    function handler()
    {
        // Register a handler
    }

    function authorize() 
    {
        /**
         * Always authorize
         */
        return true;
    }
}