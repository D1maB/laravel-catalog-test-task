<?php

namespace App\Http\Controllers;

use App\Events\OrderCreatedEvent;
use App\Events\OrderVerifiedEvent;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Product $product)
    {
        return view('order.checkout', [
            'product' => $product
        ]);
    }

    public function order(OrderRequest $order)
    {
        // check if product is available form order

        $order = Order::create(
            request()->only(
                'name',
                'email',
                'phone',
                'product_id'
            )
        );

        event(new OrderCreatedEvent($order));

        return redirect()->route('index')->with('success','Order sent. Please check your email for more details.');
    }

    public function verify($hash){
        $order = Order::where('verification_hash', $hash)->first();

        if($order){
            event(new OrderVerifiedEvent($order));
            return redirect()->route('index')->with('success','Your order has been successfully verified.');
        }
    }
}
