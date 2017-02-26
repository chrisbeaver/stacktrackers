<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HoldingRequest;
use Carbon\Carbon;

use App\Holding;
use App\User;

class HoldingController extends Controller
{
    public function showMyHoldings()
    {
        $holdings = auth()->user()->holdings;
        $total_pieces = $holdings->sum('quantity');
        $total_weight = $holdings->sum('weight');
        $tags = ['ASE', 'Maple Leaf', 'Panda'];
        // return dd($holdings);
        return view('holdings.index', compact('holdings', 'total_pieces', 'total_weight', 'tags'));
    }

    public function showUserHoldings(User $user)
    {
       $holdings = $user->publicHoldings ?: [];
       return view('holdings.user', compact('holdings'));
    }

    public function showHolding($id)
    {
        $holding = Holding::with('images')->find($id);
        return view('holdings.profile', compact('holding'));
    }

    public function showNewForm()
    {
        return view('holdings.new');
    }

    public function showEditForm($id)
    {
        // Need a gate here.
        $holding = Holding::find($id);
        return dd($holding);
        return view('holdings.edit');
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
        session()->flash('active_holding', $holding->id);

        return redirect()->action('ImageController@addImagesForm');

    }
}
