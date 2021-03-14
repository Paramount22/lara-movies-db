@extends('layouts.master')
@section('title', 'New director')



@section('content')

    <form action="{{ url('director') }}" method="post">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">

        <h1>New director</h1>

        <p>
            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First name" required="">
        </p>
        <p>
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" required="">
        </p>
        <p>
            <input type="text" name="country" value="{{ old('country') }}" placeholder="Country" required="">
        </p>
        <p>
            <input type="date" name="birthdate" value="{{ old('birtdate') }}" placeholder="Birthdate" required="">
        </p>

        <p class="submit">
            <input type="submit" value="add new director">
            <a href="{{ url('/') }}">back</a>
        </p>
    </form>


@endsection
