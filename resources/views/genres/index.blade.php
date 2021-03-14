@extends('layouts.master')

@section('title', isset($genre->genre) ? ucfirst($genre->genre) : 'All movies')

@section('content')

        <h1>{{ isset($genre->genre) ? ucfirst($genre->genre)  : 'All Movies' }} </h1>

    <span class="dir_links">
            <a href="{{ url('genre/' . $genre->id . '/edit' ) }}">edit</a>
            <a href="{{ url('genre/' . $genre->id . '/delete' ) }}">delete</a>
       </span>


@if( count($movies) )
    <table>
        <thead>
        <tr>
            <th>director</th>
            <th>title</th>
            <th>year</th>
            <th>gross</th>
            <th>genre</th>
            <th>edit</th>
        </tr>
        </thead>

        <tbody>
        @foreach( $movies as $movie)
            @include('_partials.table')
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            <td colspan="4">
                $ {{ number_format( collect($movies)->sum('gross'), 2)  }} {{-- Laravel kolekcie - collect --}}
            </td>
        </tr>
        </tfoot>

    </table>
@else <p class="empty">No movies yet</p>

@endif


@endsection
