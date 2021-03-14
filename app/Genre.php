<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    protected $fillable = ['genre' ];

    public $timestamps = false; // nebudeme brat do uvahy created at a updated

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }

}
