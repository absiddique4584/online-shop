@if(!$data->isEmpty())
    <ul>
        @php($i=0)
        @foreach($data as $row)
            <li>{{ $row->id .' => '. $row->name }}</li>

            @php($lastId = $row->id)
            @php($i++)
        @endforeach
    </ul>

    @if($i>3)
        <div class="load-more-button">
            <button class="btn btn-info" data-id="{{ $lastId }}" id="loadMoreButton">Load More</button>
        </div>
    @endif

@else
    <h1>No more data...</h1>
@endif
