@extends('layouts.master')
@section('title', 'New movie')

@section('content')


    {!! Form::open(['url' => 'movie', 'method' => 'post']) !!}

        <h1>New Movie</h1>

        @include('_partials.movie-form')

    <p class="submit">
        <input type="submit" value="add new movie">
        <a href="{{ url('/') }}">back</a>
    </p>

    {!! Form::close() !!}



@endsection

