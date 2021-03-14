@extends('layouts.master')
@section('title', 'Delete genre')

@section('content')

    {!! Form::model($genre, ['route' => ['genre.destroy', $genre->id], 'method' => 'delete' ]) !!}

        <h1 class="box-heading">
            Delete genre
        </h1>

        <h2 class="delete-genre">{{ $genre->genre }}</h2>

    <p class="submit">
        <input type="submit" value="delete genre" class="delete-record">
        <a href="{{ url('genre/' . $genre->id ) }}">back</a>
    </p>



    {!! Form::close() !!}

@endsection
