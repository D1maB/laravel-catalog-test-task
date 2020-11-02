@extends('layouts.app')
@section('content')

    <div class="content">
        <div class="container">
            @foreach($products->chunk(3) as $items)
                <div class="row">
                    @foreach($items as $product)
                        <div class="col-md-4">
                            <div class="product-item p-2">
                                <h3>{{$product->title}}</h3>
                                @if(isset($product->image))
                                    <div class="image">
                                        <img class="mt-2 mb-2" style="object-fit: cover;" src="{{ asset('storage/'.$product->image) }}" width="100%" >
                                    </div>
                                @endif
{{--                                <p>{{ $product->description  }}</p>--}}
                                <a href="{{ route('order.checkout') }}">
                                    <div class="btn btn-success">Order</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

@endsection
