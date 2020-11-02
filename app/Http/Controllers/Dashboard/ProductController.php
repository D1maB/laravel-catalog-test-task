<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

use Illuminate\Support\Facades\Storage;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::latest()->paginate(15);

        return view('dashboard.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create(
            $request->only(
                'title',
                'description',
                'author'
            )
        );

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $filename);
            $product->image = $filename;
            $product->save();
        }

        return redirect()->route('dashboard.product.index')->with('success','Product created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'product' => $product,
        ]);
    }


    /**
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update(
            $request->only(
                'title',
                'description',
                'author'
            )
        );

        if($request->hasFile('image')){
            if($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $filename);
            $product->image = $filename;
            $product->save();
        }

        return redirect()->route('dashboard.product.index')->with('success','Product updated');
    }


    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        if($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->back()->with('success','Product removed');
    }
}
