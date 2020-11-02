<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::active()->limit(10)->get();

        return view('index', ['products' => $products]);
    }

    public function product(Product $product_single)
    {
        // @todo check if is active
        return view('product/product', ['product' => $product_single]);
    }
}
