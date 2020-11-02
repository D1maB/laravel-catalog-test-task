<?php

namespace App\Listeners;

use App\Events\OrderVerifiedEvent;
use App\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MarkProductAsUnavailableListener
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
        $order = $event->order->toArray();
        $product_id = $order['product_id'];
        $product = Product::where('id', $product_id)->first();

        $product->is_active = false;
        $product->save();
    }
}
