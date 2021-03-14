<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Validator;


class QueryController extends Controller
{

    /**
     * search movies
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required',
        ]);

        if( $validator->fails() ) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }


//        dd($request->search);
        // Gets the query string from our form submission
        $query = $request->search;
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $movies = DB::table('movies')->where('title', 'LIKE', '%' . $query . '%')->               orWhere('summary', 'LIKE', '%' . $query . '%')->get();

        $directors = DB::table('directors')->where('last_name', 'LIKE', '%' . $query . '%')->orWhere('first_name', 'LIKE', '%' . $query . '%')->get();

//                dd($directors);
        // returns a view and passes the view the list of articles and the original query.
        return view('page.search', compact('movies', 'directors', 'query'));
    }



}
