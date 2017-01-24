<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holding extends Model
{
    protected $fillable = ['piece_id', 'user_id', 'name',   'weight', 'weight_unit', 'finess',
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
}
