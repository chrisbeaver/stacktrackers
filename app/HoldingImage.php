<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoldingImage extends Model
{
    protected $fillable = ['holding_id', 'file_hash'];
    
    public function holding()
    {
        return $this->belongsTo('App\Holding');
    }
}
