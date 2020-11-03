@extends('layouts.dashboard')

@section('section-title','Orders')

@section('content')

    @if( count($orders) !== 0 )

        <table class="table -table-striped ">
            <thead>
            <tr>
                <th scope="col">User name</th>
                <th scope="col">User email</th>
                <th scope="col">User phone</th>
                <th scope="col">Confirmed</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody id="items" data-route="">

                @foreach($orders as $item)
                    <tr class="drag-handler" data-id="{{ $item->id }}">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{!! $item->confirmed_at ? '<i class="fas fa-check text-success">' : '<i class="fas fa-times text-danger"></i>' !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    @else
        <div class="alert alert-danger" role="alert">
            No orders found
        </div>
    @endif
@endsection
