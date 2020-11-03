<?php

namespace App\Listeners;

use App\Events\OrderVerifiedEvent;
use App\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderConfirmedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderVerifiedEvent $event)
    {
        $order = $event->order;

        $order->confirmed_at = now();
        $order->save();
    }
}
