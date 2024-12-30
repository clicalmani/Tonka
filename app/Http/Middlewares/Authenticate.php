<?php
namespace App\Http\Middlewares;

use Clicalmani\Foundation\Http\Middlewares\Middleware;
use Clicalmani\Foundation\Http\Requests\Request;
use Clicalmani\Foundation\Http\Response\Response;

class Authenticate extends Middleware 
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
         * TODO
         */
        return $next();
    }

    /**
     * Bootstrap
     * 
     * @return void
     */
    public function boot() : void
    {
        $this->include('api');
    }
}
