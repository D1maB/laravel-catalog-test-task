<?php

namespace App\Http\Controllers;

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

        Order::create(
            request()->only(
                'name',
                'email',
                'phone',
                'product_id'
            )
        );

        // send order verification email

        return redirect()->route('index')->with('success','Order sent');
    }
}
