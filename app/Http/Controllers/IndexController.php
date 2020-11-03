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
        $products = Product::active()->paginate(9);

        return view('index', ['products' => $products]);
    }

    public function product(Product $product)
    {
        // @todo check if is active
        return view('product/product', ['product' => $product]);
    }
}
