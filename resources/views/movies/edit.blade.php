@extends('layouts.master')
@section('title', 'Edit movie')

@section('content')

    {{-- Form::model($movie - zabezpeci predvvyplnene hodnoty v edit forme  --}}
    {!! Form::model($movie, ['url' => ['movie', $movie->id], 'method' => 'put']) !!}

    <h1>Edit movie</h1>

    @include('_partials.movie-form')

    <p class="submit">
        <input type="submit" value="edit movie">
        <a href="{{ url('/') }}">back</a>
    </p>

    {!! Form::close() !!}



@endsection
