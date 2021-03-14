<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use \Validator;

class GenreController extends Controller
{


    /**
     * Zanre podla nazvu
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
   {
        $genre = Genre::findOrFail($id);

       return view('genres.index')
           ->with('genre', $genre)
           ->with('movies', $genre->movies);
   }

    /**
     * Create genre form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
   {
       return view('genres.create');
   }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'genre' => 'required|unique:genres',
       ]);

       if( $validator->fails() ) {
           return back()
               ->withErrors($validator)
               ->withInput();
       }

       $genre = Genre::create($request->all() );

       flash()->success('You successfully added new genre.' . '<span class="close                                         pull-right">X</span>');

       return redirect('genre/' . $genre->id );
   }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
   {
       $genre = Genre::findOrFail($id);

       return view('genres.edit')
           ->with('genre', $genre);

   }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
   {
       $validator = Validator::make($request->all(), [
           'genre' => 'required|unique:genres',
       ]);

       if( $validator->fails() ) {
           return back()
               ->withErrors($validator)
               ->withInput();
       }
        // find genre by id
       $genre = Genre::findOrFail($id);

       // update genre
       $genre->update( $request->all() );

       flash()->success('You successfully updated genre.' . '<span class="close pull-right">X</span>');

       return redirect('genre/' . $genre->id);

   }

    /**
     * delete form
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)   {

       $genre = Genre::findOrFail($id);

       return view('genres.delete')
           ->with('genre', $genre);
   }


    /**
     * delete from DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
   {
       $genre = Genre::findOrFail($id);

       $genre->delete();

       flash()->success('Genre deleted.' . '<span class="close pull-right">X</span>');

       return redirect('/');
   }

}
