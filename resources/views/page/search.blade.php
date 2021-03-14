@extends('layouts.master')

@section('content')

   <section class="search">
        <div class="movies">
        <h4>Movies</h4>
        @if (count($movies) === 0)
            <p>no records in this category</p>
        @elseif (count($movies) >= 1)

            @foreach($movies as $movie)

                    <h3 class="search-title">
                        <strong>
                            <a href="{{ url('movie/' . $movie->id) }}">{{ $movie->title }}</a>
                        </strong>
                        <small>{{ $movie->year }} </small>
                    </h3>
                     <br>
                    <span class="summary">
                       <a href="{{ url('movie/' . $movie->id) }}">{{ $movie->summary }}</a>
                    </span>
                    <hr>
            @endforeach
        @endif
        </div>

       <div class="makers">
        <h4>Makers</h4> <br>
           @if (count($directors) === 0)
               <p>no records in this category</p>
           @elseif (count($directors) >= 1)

               @foreach($directors as $director)
                      <p>
                          <strong>
                              <a href="{{ url('director/' . $director->id) }}">{{ $director->first_name }} {{                                  $director->last_name }} </a>
                          </strong>

                          <small>{{ date('F j, Y', strtotime($director->birthdate) )  }}</small>
                      </p>


               @endforeach

           @endif
       </div>
   </section>
    {{--{!! $articles->render() !!}--}}

@endsection
