<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag', 'name', 'description'];

    public function pieces()
    {
        return $this->belongsToMany('App\Piece');
    }

    public function holdings()
    {
        return $this->belongsToMany('App\Holding');
    }
}
