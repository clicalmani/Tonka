<?php
namespace App\Providers;

use Clicalmani\Flesco\Providers\RouteServiceProvider as ServiceProvider;
use Clicalmani\Routes\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * API Routes prefix
     * 
     * @var string 
     */
    protected $api_prefix = 'api';

    /**
     * Defines route model bindings and pattern filters 
     * 
     * @return void
     */
    public function boot() : void
    {
        $this->routes(function() {
            if ( Route::isApi() ) {
                Route::group(function() { require_once root_path( $this->api_handler ); })
                    ->prefix( $this->api_prefix )
                    ->middleware('api');
            } else require_once root_path( $this->web_handler );
        });
    }

    public function handler(): void
    {
        ServiceProvider::responseHandler(fn(mixed $user) => [
            // Data
        ]);
    }
}
