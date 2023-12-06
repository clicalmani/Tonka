<?php
namespace App\Http\Middlewares;

use Clicalmani\Flesco\Http\Middlewares\Middleware;
use Clicalmani\Flesco\Http\Requests\Request;
use Clicalmani\Flesco\Http\Response\Response;

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
        if ($user = $request->user()) {
            if (false === $user->isOnline()) return $response->unauthorized();
            else $user->authenticate();
        }

        return $next();
    }

    /**
     * Bootstrap
     * 
     * @return void
     */
    public function boot() : void
    {
        $this->include('auth');
    }
}
