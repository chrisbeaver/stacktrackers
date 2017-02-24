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

    public function thumbnail()
    {
    	$image = storage_path('app/holding-images/'.$this->holding->user_id.'/thumbnails/'.$this->file_hash);
    	return response()->file($image);
    }

    public function link()
    {
    	$image = storage_path('app/holding-images/'.$this->holding->user_id.'/'.$this->file_hash);
    	return response()->file($image);
    }
}
