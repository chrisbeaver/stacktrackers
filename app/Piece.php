<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    protected $fillable = ['name', 'weight', 'weight_unit', 'finess']; 

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }         
}
