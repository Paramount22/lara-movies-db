@extends('layouts.master')
@section('title', 'Delete director')

@section('content')

    {!! Form::model($director, ['route' => ['director.destroy', $director->id], 'method' => 'delete' ]) !!}

    <h1>Delete director</h1>

   <article class="delete-article">
        <h2> {{ $director->first_name }} {{ $director->last_name }}</h2>
        <p> <span class="description">Year:</span> {{ $director->birthdate }}</p>
        <p> <span class="description">Country:</span> {{ $director->country }}</p>
    </article>

    <p class="submit">
        <input type="submit" value="delete director" class="delete-record">
        <a href="{{ url('genre/' . $director->id ) }}">back</a>
    </p>

    {!! Form::close() !!}

@endsection
