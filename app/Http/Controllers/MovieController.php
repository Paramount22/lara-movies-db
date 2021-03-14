<?php

namespace App\Http\Controllers;


use App\Genre;
use App\Movie;
use Illuminate\Http\Request;

use \Validator;

class MovieController extends Controller
{

    protected $movie;

    public function __construct()
    {

        $this->movie = new Movie;
    }

    /**
     * All movies rom DB
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $movies = Movie::orderBy('title', 'asc')->paginate(6);
        $total = $this->movie->totalGross();

        return view('movies.index')
            ->with('movies', $movies)
            ->with('total', $total);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all(); // all genres

        return view('movies.create')
            ->with('genres', $genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'year'  => 'required|integer',
            'gross' => 'required|integer',
            'director_id' => 'required',
            'summary' => 'required',

        ]);

        if( $validator->fails() ) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $movie = Movie::create( $request->all() ); // vytvorenie filmu

        $movie->genres()->sync( $request->get('genres') ?: [] ); // pripojime zanre

        flash()->success('You successfully added new movie.' . '<span class="close                          pull-right">X</span>');

        return redirect('movie/' . $movie->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.show')
            ->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();

        return view('movies.edit')
            ->with('movie', $movie)
            ->with('genres', $genres);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'year'  => 'required|integer',
            'gross' => 'required|integer',
            'director_id' => 'required',
            'summary' => 'required',

        ]);

        if( $validator->fails() ) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $movie = Movie::findOrFail($id); // vytiahneme konkretny film pod id

        $movie->update( $request->all() ); // spravime update z edit formu

        $movie->genres()->sync( $request->get('genres') ?: [] ); // pripojime zanre

        flash()->success('You successfully edited movie.' . '<span class="close                          pull-right">X</span>');

        return redirect( url('movie/' . $movie->id) );

    }

    /**
     * delete form
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)    {

        $movie = Movie::findOrFail($id);

        return view('movies.delete')
            ->with('movie', $movie);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);;

        $movie->delete();

        flash()->success('Movie deleted.' . '<span class="close pull-right">X</span>');

        return redirect('/');
    }


}
