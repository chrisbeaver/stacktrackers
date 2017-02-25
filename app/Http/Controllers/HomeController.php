<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holding;

class HomeController extends Controller
{
    public function showHomePage()
    {
    	$holdings = Holding::publicPieces()->orderBy('created_at')->get();
        $tags = ['ASE', 'Maple Leaf', 'Panda', 'Queen\'s Beast'];
        return view('homepage', compact('holdings', 'tags'));
    }
}
