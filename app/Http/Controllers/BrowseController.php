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
    	$ids = \App\Holding::groupBy('mint_id')->select('mint_id', \DB::raw('count(*) as total'))
                                               ->orderBy('total')
                                               ->get()->pluck('mint_id')->all();
    	$pieces = Piece::all();
        $mints = Mint::whereIn('id', array_values($ids))->get();
        // return dd($ids);
        $tags = Tag::all();
    	return view('browse.index', compact('pieces', 'mints', 'tags'));
    }

    public function showResults()
    {
    	$holdings = Holding::orderBy('created_at')->paginate(1);
    	$tags = ['ASE', 'Maple Leaf', 'Panda'];
        return view('browse.results', compact('holdings', 'tags'));
    }

    public function filter(Request $request)
    {
    	$type = $request->type;
    	$id = $request->id;
    	$filterType = '__filterBy'.ucfirst($type);
    	$holdings = $this->$filterType($id)->paginate(1);
    	$term = 'Terms';
    	return view('browse.results', compact('holdings', 'term', 'type', 'id'));
    }

    public function results()
    {

    }

    private function __filterByMint($id)
    {
    	// return Holding::groupBy('mint')->select('mint', DB::raw('count(*) as total'));
    	return Holding::where(['mint' => Mint::find($id)->name]);
    }
    
    private function __filterByName()
    {
    	
    }

    private function __filterByTag()
    {

    }
}
