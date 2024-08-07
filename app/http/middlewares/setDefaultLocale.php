<?php
namespace App\Http\Middlewares;

use Clicalmani\Fundation\Http\Middlewares\Middleware;
use Clicalmani\Fundation\Http\Requests\Request;
use Clicalmani\Fundation\Http\Response\Response;

class setDefaultLocale extends Middleware 
{
    /**
     * Handler
     * 
     * @param Request $request Current request object
     * @param Response $response Http response
     * @param callable $next 
     * @return int|false
     */
    public function handle(Request $request, Response $response, callable $next) : int|false
    {
        /**
         * Set user locale
         */
        $request->locale = $request->user()?->locale;
        
        return $next();
    }

    /**
     * Bootstrap
     * 
     * @return void
     */
    public function boot() : void
    {
        // ...
    }
}
