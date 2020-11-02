@extends('layouts.app')
@section('content')

    <div class="content">
        <div class="container">
            <h2>{{ $product->title }}</h2>

            @if(isset($product->image))
                <div class="image">
                    <img class="mt-2 mb-2" style="object-fit: cover;" src="{{ asset('storage/'.$product->image) }}" width="100%">
                </div>
            @endif

            <p>{{ $product->description }}</p>

            <a href="{{ route('order.checkout', ['product' => $product->id]) }}">
                <div class="btn btn-success">Order</div>
            </a>
        </div>
    </div>

@endsection
