<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mint extends Model
{
    protected $fillable = ['name'];

    public function holdings()
    {
        return $this->hasMany('App\Holding');
    }

    public function pieces()
    {
        return $this->hasMany('App\Piece');
    }
}
