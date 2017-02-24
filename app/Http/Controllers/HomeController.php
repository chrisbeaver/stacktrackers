<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holding;

class HomeController extends Controller
{
    public function showHomePage()
    {
    	$holdings = Holding::publicPieces()->orderBy('created_at')->get();
        return dd($holdings->first()->images);
        return view('homepage');
    }
}
