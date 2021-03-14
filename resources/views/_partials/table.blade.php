
<tr>
     {{--Director name--}}
    <td>


        <a href="{{ url('director/' . $movie->director->id) }}">
            {{ $movie->director->first_name }}
            {{ $movie->director->last_name }}
        </a>

    </td>

    {{-- Movie name --}}
    <td>
        <a href="{{ url('movie/' . $movie->id) }}">
            <strong>{{ $movie->title }}</strong>
        </a>
    </td>

    {{-- Movie year --}}
    <td>{{ $movie->year }}</td>

    {{-- Movie gross --}}
    <td>$ {{ number_format($movie->gross)   }}</td>

    {{-- Movie genre --}}

        <td>
            @include('_partials.genres')

        </td>

    {{-- Edit / delete link --}}
    <td>
        <a href="{{ url('movie/' . $movie->id . '/edit' ) }}">
            edit
        </a>
        <a class="delete" href="{{ url('movie/' . $movie->id . '/delete' ) }}">
            x
        </a>
    </td>
</tr>


