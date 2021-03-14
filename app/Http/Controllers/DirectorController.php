<?php

namespace App\Http\Controllers;

use App\Director;
use Illuminate\Http\Request;
use \Validator;

class DirectorController extends Controller
{

    protected $director;

    public function __construct()
    {

        $this->director = new Director;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directors.create');
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
            'first_name' => 'required',
            'last_name'  => 'required',
            'country' => 'required',
            'birthdate' => 'required|nullable|date',

        ]);

        if( $validator->fails() ) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $director = Director::create($request->all() );

        flash()->success('You successfully added new director.' . '<span class="close                          pull-right">X</span>');
        return redirect('director/' . $director->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $director = Director::findOrFail($id);
        $directors = $this->director->getDirector($id);

        return view('directors.index')
            ->with('director_name', $directors->name)
            ->with('director', $director)
            ->with('movies', $director->movies);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $director = Director::findOrFail($id);

        return view('directors.edit')
            ->with('director', $director);

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
            'first_name' => 'required',
            'last_name'  => 'required',
            'country' => 'required',
            'birthdate' => 'required|nullable|date',

        ]);

        if( $validator->fails() ) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }
        //find director by id
        $director = Director::findOrFail($id);

        // update post
        $director->update( $request->all() );

        flash()->success('You successfully updated director.' . '<span class="close pull-right">X</span>');

        return redirect('director/' . $director->id);
    }

    /**
     * delete form
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)
    {
        $director = Director::findOrFail($id);

        return view('directors.delete')
            ->with('director', $director);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $director = Director::findOrFail($id);

        $director->delete();

        flash()->success('Director deleted.' . '<span class="close pull-right">X</span>');

        return redirect('/');

    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function choose()
    {
        $id = app('request')->input('director_id'); // do $id si odchytime reziservo id  z formulara v navigacii
        return redirect("director/$id");

    }


}
