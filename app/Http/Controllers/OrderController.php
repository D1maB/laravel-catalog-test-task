<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('order.checkout');
    }

    public function order(OrderRequest $order)
    {

    }
}
