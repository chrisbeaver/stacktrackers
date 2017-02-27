<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    protected $fillable = ['mint_id', 'name', 'weight', 'weight_unit', 'finess'];
    protected $hidden = ['created_at', 'updated_at'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function mint()
    {
        return $this->belongsTo('App\Mint');
    }
}
