@extends('layouts.master')
@section('title', 'Edit genre')

@section('content')
    {!! Form::model($genre, ['url' => ['genre', $genre->id], 'method' => 'put'] ) !!}

    <h1>Edit genre</h1>

    <p>
        {!! Form::text('genre', null,  [
        'required' => true,
        'placeholder' => 'insert new genre',

     ]) !!}
    </p>


    <p class="submit">
        {!! Form::submit('Edit genre',
        ['class'=>'btn btn-default']) !!}
        <a href="{{ url('genre/' . $genre->id) }}">back</a>
    </p>
    {!! Form::close() !!}

@endsection
