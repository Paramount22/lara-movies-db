@extends('layouts.master')

@section('title', $movie->title)

@section('content')


    <h1>{{ $movie->title }}</h1>

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
        @include('_partials.table')
        </tbody>

        <tfoot>
        <tr class="summary">
            <td colspan="5">{{ $movie->summary }}</td>
        </tr>
        </tfoot>
    </table>



@endsection
