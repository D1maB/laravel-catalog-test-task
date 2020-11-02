@extends('layouts.app')
@section('content')

    <div class="content">
        <div class="container">
            <h2>Order checkout</h2>

            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('order.send') }}" method="post">
                @csrf

                <input type="hidden" name="product_id" value="{{$product->id}}">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" {{ old('email') }}>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone" value="{{ old('phone') }}">
                </div>
                <button type="submit" class="btn btn-success">Order</button>
            </form>
        </div>
    </div>

@endsection
