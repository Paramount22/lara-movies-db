@extends('layouts.master')
@section('title', 'All movies')

@section('content')

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
                    @foreach($total as $gross)
                     Total:  $ {{ number_format($gross->total)  }}
                    @endforeach
                </td>
            </tr>
            </tfoot>

        </table>

    @else <p class="empty">No movies yet</p>

    @endif


   @if($movies)
    {{ $movies->links() }}
   @endif

@endsection


