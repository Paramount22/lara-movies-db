@if($movie->genres)
    @foreach($movie->genres as $genre )
        <a href="{{ url('genre', $genre->id) }}">{{ $genre->genre }}</a>
    @endforeach
@endif
