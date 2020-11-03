<h3>Comments</h3>
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{$message}}
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('comment.create', ['s_product' => $product->id]) }}" method="post">
    @csrf
    <div class="form-group">
        <input type="hidden" name="product_id" value="">
        <textarea rows="8" class="form-control" name="body" placeholder="Enter comment">{{ old('body') }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Send</button>
</form>
