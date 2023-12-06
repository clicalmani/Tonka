<?php
namespace App\Http\Middlewares;

use Clicalmani\Flesco\Http\Middlewares\JWTAuth;
use Clicalmani\Flesco\Http\Requests\Request;
use Clicalmani\Flesco\Http\Response\Response;

class Auth extends JWTAuth 
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
        if (false !== $this->verifyToken($request->bearerToken())) return $next();
        
        return $response->unauthorized();
    }

    /**
     * Bootstrap
     * 
     * @return void
     */
    public function boot() : void
    {
        with( new \Clicalmani\Container\Manager )
            ->inject(fn() => routes_path('/jwt.php'));
    }
}
