<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{

    protected $fillable = ['first_name', 'last_name', 'country', 'birthdate'  ];

    public $timestamps = false; // nebudeme brat do uvahy created at a updated


    /**
     * Join medzi movies a directors
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movies()
    {
        return $this->hasMany('App\Movie');
    }

    /**
     * Get all directors from DB
     * @return mixed
     */
    public function getDirectors()
    {
        return app('db')->select("-- noinspection SqlNoDataSourceInspectionForFile
		select *, first_name || ' ' || last_name as name
		from directors	
	");

    }


    /**
     * get one director from db
     * @param $id
     * @return mixed
     */
    public function getDirector($id)
    {
        return app('db')->selectOne("-- noinspection SqlDialectInspectionForFile
		select *, first_name || ' ' || last_name as name 
		from directors
		where id = ?
	
	", [$id]);
    }
}
