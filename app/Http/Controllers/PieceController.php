<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piece;

class PieceController extends Controller
{
    public function all(Request $request)
    {
       return Piece::all();
    }
}
