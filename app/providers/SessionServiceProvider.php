<?php
namespace App\Providers;

use Clicalmani\Fundation\Providers\SessionStorageServiceProvider as SessionProvider;

class SessionServiceProvider extends SessionProvider
{
    protected static $driver = \Clicalmani\Fundation\Http\Session\DBSessionHandler::class;
    
    /**
     * Bootstrap
     * 
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
    }
}
