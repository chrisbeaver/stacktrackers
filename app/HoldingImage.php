<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoldingImage extends Model
{
    protected $fillable = ['holding_id', 'file_hash'];
    protected $appends = ['link', 'thumbnail'];

    public function holding()
    {
        return $this->belongsTo('App\Holding');
    }

    public function getThumbnailAttribute()
    {
    	return storage_path('app/holding-images/'.$this->holding->user_id.'/thumbnails/'.$this->file_hash);
    }

    public function getLinkAttribute()
    {
    	return storage_path('app/holding-images/'.$this->holding->user_id.'/'.$this->file_hash);
    }
}
