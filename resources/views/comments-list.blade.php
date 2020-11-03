<div class="comments-list mt-5">
    @if( count($comments) !== 0 )
        @foreach($comments as $item)
            <p>{{$item->body}}</p>
            <hr>
        @endforeach
        @else
        <p class="text-danger">No comments.</p>
    @endif

</div>
