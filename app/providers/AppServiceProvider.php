<?php
namespace App\Providers;

use Carbon\Carbon;
use Clicalmani\Fundation\Providers\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register
     * 
     * @return void
     */
    public function register() : void
    {
        // ...
    }

    /**
     * Bootstrap
     * 
     * @return void
     */
    public function boot(): void
    {
        ini_set('memory_limit', '512M');
        set_time_limit(180);
        Carbon::setLocale('fr');
    }
}
