<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holding;
use App\Piece;
use App\Mint;
use App\Tag;

class BrowseController extends Controller
{
    public function index()
    {
    	$pieces = Piece::all();
    	$mints = Mint::all();
    	$tags = Tag::all();
    	return view('browse.index', compact('pieces', 'mints', 'tags'));
    }

    public function showResults()
    {
    	$holdings = Holding::orderBy('created_at')->paginate(1);
    	$tags = ['ASE', 'Maple Leaf', 'Panda'];
        return view('browse.results', compact('holdings', 'tags'));
    }
}
