<?php

namespace App\Providers;

use App\Events\OrderVerifiedEvent;
use App\Listeners\MarkProductAsUnavailableListener;
use App\Listeners\OrderConfirmedListener;
use App\Listeners\SendOrderEmailVerificationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\OrderCreatedEvent;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        OrderCreatedEvent::class => [
            SendOrderEmailVerificationListener::class
        ],
        OrderVerifiedEvent::class => [
            MarkProductAsUnavailableListener::class,
            OrderConfirmedListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
