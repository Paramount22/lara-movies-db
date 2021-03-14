@extends('layouts.master')
@section('title', 'Edit director')


@section('content')

    <form action="{{ url('director/' . $director->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT"> {{-- PUT request sa pouziva pri editacii--}}
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">

        <h1>Edit director</h1>

        <p>
            <input type="text" value="{{ $director->first_name }}" name="first_name" placeholder="First name">
        </p>
        <p>
            <input type="text" value="{{ $director->last_name }}" name="last_name" placeholder="Last name">
        </p>
        <p>
            <input type="text" value="{{ $director->country }}" name="country" placeholder="Country">
        </p>
        <p>
            <input type="date" value="{{ $director->birthdate }}" name="birthdate" placeholder="Birthdate">
        </p>

        <p class="submit">
            <input type="submit" value="edit director">
            <a href="{{ url('director/' . $director->id) }}">back</a>
        </p>
    </form>


@endsection
