<?php
namespace App\Providers;

use App\Events\AssignTeacherEventListener;
use App\Events\LogConductListener;
use App\Events\LogMarkListener;
use App\Events\OfficeNominationEventListener;
use App\Events\PrintEventListener;
use App\Events\RestartConductEventListener;
use App\Events\RestartTermScoreEventListener;
use App\Events\ScheduleUpdateListener;
use App\Events\SubjectsTeachedEventListener;
use Clicalmani\Foundation\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register custom events
     * 
     * @return void
     */
    public function register() : void
    {
        // ...
    }

    /**
     * Add listeners
     * 
     * @return void
     */
    public function boot(): void
    {
        // ...
    }
}
