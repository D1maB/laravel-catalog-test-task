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
        return view('product/product', [
            'product' => $product,
            'comments' => $product->comments()->active()->get()
        ]);
    }
}
