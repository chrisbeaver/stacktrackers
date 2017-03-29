<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holding;

class BrowseController extends Controller
{
    public function index()
    {
    	$holdings = Holding::orderBy('created_at')->paginate(1);
    	$tags = ['ASE', 'Maple Leaf', 'Panda'];
        return view('browse.index', compact('holdings', 'tags'));
    }
}
