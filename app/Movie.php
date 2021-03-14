<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Object_;

class Movie extends Model
{

    protected $fillable = ['title', 'year', 'gross', 'director_id', 'summary'];

    public $timestamps = false; // nebudeme brat do uvahy created at a updated

    /**
     * Join medzi movies a directors
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function director()
    {
        return $this->belongsTo('App\Director');
    }

    /**
     * Prepojenie movies a genres
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getMovie($id)
    {
        return app('db')->selectOne("-- noinspection SqlDialectInspectionForFile

		select movies.id, title, director_id, year, gross, group_concat(genres.genre, ' / ') as genre,
summary, directors.first_name || ' ' || last_name as director, directors.id
        from movies	
        left join directors on movies.director_id = directors.id
        left join genre_movie on movies.id = genre_movie.movie_id
        left join genres on genres.id = genre_movie.genre_id
        where movies.id = ?
        	
	", [$id]);
    }


    /**
     * total gross for all movies
     * @return array
     */
    public function totalGross()
    {
        return app('db')->select(" -- noinspection SqlDialectInspectionForFile
        
        select sum(gross) as total  from movies        
        ");
    }




}
