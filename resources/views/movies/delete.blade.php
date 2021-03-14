@extends('layouts.master')
@section('title', 'Delete movie')

@section('content')

    {!! Form::model($movie, ['route' => ['movie.destroy', $movie->id], 'method' => 'delete' ]) !!}

    <h1>Delete movie</h1>

    <article class="delete-article">
        <h2> {{ $movie->title }}</h2>
            <p> <span class="description">Year:</span> {{ $movie->year }}</p>
            <p> <span class="description">Summary: <br></span> {{ $movie->summary }}</p>
    </article>

    <p class="submit">
        <input type="submit" value="delete movie" class="delete-record">
        <a href="{{ url('genre/' . $movie->id ) }}">back</a>
    </p>



    {!! Form::close() !!}

@endsection
