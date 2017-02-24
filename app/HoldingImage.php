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

    public function link()
    {
    	return storage_path('app/holding-images'.$this->user_id.'/'.$this->file_hash);
    }
}
