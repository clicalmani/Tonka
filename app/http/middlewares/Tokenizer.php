<?php
namespace App\Http\Middlewares;

use Clicalmani\Fundation\Http\Middlewares\JWTAuth;
use Clicalmani\Fundation\Http\Requests\Request;
use Clicalmani\Fundation\Http\Response\Response;

class Tokenizer extends JWTAuth 
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
        $this->container->inject(fn() => routes_path('/tokenizer.php'));
    }
}
