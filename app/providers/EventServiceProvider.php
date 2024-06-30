<?php
namespace App\Providers;

use App\Events\GenerateDecreeListener;
use App\Events\NotifyAbsenceListener;
use Clicalmani\Fundation\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register custom events
     * 
     * @return void
     */
    public function register() : void
    {
        $this->createEvent('leave:generate-decree');
        $this->createEvent('user:notify-absence');
    }

    /**
     * Add listeners
     * 
     * @return void
     */
    public function boot(): void
    {
        $this->addListener('leave:generate-decree', GenerateDecreeListener::class);
        $this->addListener('user:notify-absence', NotifyAbsenceListener::class);
    }
}
