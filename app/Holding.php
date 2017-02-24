<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holding extends Model
{
    protected $fillable = ['piece_id', 'user_id', 'primary_img_id', 'name', 'weight', 'weight_unit', 'finess',
                           'purchase_price', 'quantity', 'year', 'purchase_date',
                           'purchase_currency', 'visibility'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function piece()
    {
        return $this->belongsTo('App\Piece');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function images()
    {
        return $this->hasMany('App\HoldingImage');
    }

    public function scopePublicPieces($query)
    {
        return $query->where('visibility','public');
    }

}
