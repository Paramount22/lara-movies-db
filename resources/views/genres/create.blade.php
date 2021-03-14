@extends('layouts.master')
@section('title', 'New genre')


@section('content')


    {!! Form::open( ['url' => 'genre', 'method' => 'post'] ) !!}

    <h1>New genre</h1>

    <p>
        {!! Form::text('genre', null,  [
        'required' => true,
        'placeholder' => 'insert new genre',

     ]) !!}
    </p>


    <p class="submit">
        {!! Form::submit('Add new genre',
        ['class'=>'btn btn-default']) !!}
        <a href="{{ url('/') }}">back</a>
    </p>
    {!! Form::close() !!}

@endsection
