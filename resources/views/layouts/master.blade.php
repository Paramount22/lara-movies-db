<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/footable.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">

    <title>@yield('title', 'Movies')</title>
</head>
<body>

{{-- display errors --}}
@include('_partials.errors')
{{-- flash messages --}}
@include('flash::message')
{{-- search field --}}
@include('_partials.search')




<form action="{{url('director/choose')}}" method="post" class="navigation">
    <a href="{{ url('/') }}" class="home">home</a>

    @include('_partials.select', ['submit' => true])

    <a href="{{ url('director/create') }}">new director</a>
    <a href="{{ url('movie/create') }}">new movie</a>
    <a href="{{ url('genre/create') }}">new genre</a>
</form>

@yield('content')


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/footable.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
