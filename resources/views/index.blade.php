@extends('layouts.app')
@section('content')

    <div class="content">
        <div class="container">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{$message}}
                </div>
            @endif

            @foreach($products->chunk(3) as $items)
                <div class="row">
                    @foreach($items as $product)
                        <div class="col-md-4">
                            <div class="product-item p-2">
                                <a href="{{route('product.single', ['s_product' => $product->id])}}">
                                    <h3>{{$product->title}}</h3>
                                </a>

                                <div class="image mt-2 mb-2">
                                    @if(isset($product->image))
                                        <img src="{{ asset('storage/'.$product->image) }}">
                                        @else
                                        <img src="{{url('/images/no-image-available.jpg')}}">
                                    @endif

                                </div>
                                <a href="{{ route('order.checkout', ['s_product' => $product->id]) }}">
                                    <div class="btn btn-success">Order</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            {{ $products->links() }}
        </div>
    </div>

@endsection
