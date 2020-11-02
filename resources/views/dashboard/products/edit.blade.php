@extends('layouts.dashboard')

@section('section-title','Edit product')

@section('content')

    <div class="top-section-panel mb-3">
        <a href="{{ route('dashboard.product.index') }}" class="btn btn-sm btn-primary">back</a>
        <hr>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="list-unstyled mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="dashboard-form">
        <form action="{{ route('dashboard.product.update',$product->id ) }}" enctype="multipart/form-data" method="post">
            {{ method_field('PATCH') }}
            @csrf

            <div class="form-group">
                <label for="title">Title*</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $product->title }}">
            </div>

            <div class="form-group">
                <label for="description">Description*</label>
                <textarea name="description" id="description" class="form-control" rows="8">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="title">Author*</label>
                <input type="text" name="author" class="form-control" id="author" value="{{ $product->author }}">
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control" id="image">
                <div class="">
                    @if(isset($product->image))
                        <img class="mt-2" style="object-fit: cover;" src="{{ asset('storage/'.$product->image) }}" width="200" height="200">
                    @endif
                </div>
            </div>


            <button type="submit" class="btn btn-success">Сохранить</button>

        </form>
    </div>

@endsection
