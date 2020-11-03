@extends('layouts.dashboard')

@section('section-title','Products')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$message}}
        </div>
    @endif

    <div class="top-section-panel mb-3">
        <a href="{{ route('dashboard.product.create')  }}" class="btn btn-sm btn-primary">Create</a>
    </div>


    @if( count($products) !== 0 )

        <table class="table -table-striped ">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Available for order</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody id="items" data-route="">

                @foreach($products as $item)
                    <tr class="drag-handler" data-id="{{ $item->id }}">
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->author }}</td>
                        <td>
                            {!! $item->is_active ? '<i class="fas fa-check text-success">' : '<i class="fas fa-times text-danger"></i>' !!}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('dashboard.product.comments.index', $item->id) }}" title="product comments"><i class="fas fa-comments"></i></a>
                            <a class="btn btn-sm btn-primary" href="{{ route('dashboard.product.edit', $item->id) }}" title="edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('dashboard.product.destroy' , $item->id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete {{ $item->title }} ?')">
                                {!! method_field('DELETE') !!}
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" title="delete"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    @else
        <div class="alert alert-danger" role="alert">
            No products found
        </div>
    @endif
@endsection
