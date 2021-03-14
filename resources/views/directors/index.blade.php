@extends('layouts.master')
@section('title', isset($director_name) ? ucfirst($director_name) : 'All movies')

@section('content')
   <h1>{{ isset($director_name) ? ucfirst($director_name)  : 'All Movies' }} </h1>


        <p>{{ $director->country }}</p>

        <p class="birth"><span class="birt">{{ date('F j, Y', strtotime($director->birthdate) )  }} </span></p>
        <span class="dir_links">
            <a href="{{ url('director/' . $director->id . '/edit') }}">edit</a>
            <a href="{{ url('director/' . $director->id . '/delete') }}">delete</a>
       </span>

    @if( count($movies) )
        <table class="sorting" data-sorting="true">
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
