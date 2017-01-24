<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoldingImage extends Model
{
    protected $fillable = ['holding_id', 'path'];
    public function holding()
    {
        return $this->belongsTo('App\Holding');
    }
}
