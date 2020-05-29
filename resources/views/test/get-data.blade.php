

@if(!$category->isEmpty())
    <ul>
        @php($i = 0)
        @foreach($category as $row)
            <li>{{$row->id .' => '. $row->name}}</li>

            @php($lastId = $row->id)
            @php($i++)
        @endforeach
    </ul>
    @if($i==4)
    <div class="load-more-button">
        <button class="btn btn-info" data-id="{{$lastId}}" id="loadMoreButton">Load More</button>
    </div>
    @endif
@else
    <h1>No More Data !</h1>
@endif
