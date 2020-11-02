<?php

namespace App\Listeners;

use App\Events\OrderCreatedEvent;
use App\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderEmailVerificationListener
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
     * @param OrderCreatedEvent $event
     */
    public function handle(OrderCreatedEvent $event)
    {
        $order = $event->order->toArray();

        Mail::send('email.order_verification', ['order' => $order], function($message) use ($order) {
            $message->to($order['email']);
            $message->subject('Order verification');
        });
    }
}
