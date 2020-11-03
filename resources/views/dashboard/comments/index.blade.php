@extends('layouts.dashboard')

@section('section-title','Comments for - ' .$product->title)

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$message}}
        </div>
    @endif

    @if( count($comments) !== 0 )

        <table class="table -table-striped ">
            <thead>
            <tr>
                <th scope="col">Body</th>
                <th scope="col">Verified</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody id="items" data-route="">

                @foreach($comments as $item)
                    <tr class="drag-handler" data-id="{{ $item->id }}">
                        <td>{{ $item->body }}</td>
                        <td>
                            {!! $item->is_verified ? '<i class="fas fa-check text-success">' : '<i class="fas fa-times text-danger"></i>' !!}
                        </td>
                        <td>
                            <form action="{{ route('dashboard.product.comments.verify' , ['comment' => $item->id])}}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary" title="verify"><i class="fas fa-check-circle"></i></button>
                            </form>

                            <form action="{{ route('dashboard.product.comments.destroy' , ['product' => $product->id, 'comment' => $item->id])}}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this comment ?')">
                                {!! method_field('DELETE') !!}
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" title="delete"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $comments->links() }}
    @else
        <div class="alert alert-danger" role="alert">
            No comments found.
        </div>
    @endif
@endsection
