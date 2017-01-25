<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HoldingRequest;
use Carbon\Carbon;

use App\Holding;

class HoldingController extends Controller
{
    public function showMyHoldings()
    {
        $holdings = auth()->user()->holdings;
        // return dd($holdings);
        return view('holdings.index', compact('holdings'));
    }

    public function showNewForm()
    {
        return view('holdings.new');
    }

    public function store(HoldingRequest $request)
    {
        $date = Carbon::createFromFormat('m-d-Y', $request->purchase_date)->format('Y-m-d');
        $holding = Holding::create(['name' => $request->name, 'weight' => $request->weight, 
            'weight_unit' => $request->weight_unit, 'quantity' => $request->quantity, 
            'finess' => $request->finess, 'purchase_price' => $request->purchase_price * 100, 
            'purchase_date' => $date, 'user_id' => $request->user_id,
            'purchase_currency' => $request->purchase_currency]);
        // Store holding in session to attach images to it.
        session()->put('active_holding', $holding->id);

        return redirect()->action('ImageController@addImagesForm'); 

    }
}
