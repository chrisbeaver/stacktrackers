<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function showAccountDetails()
    {
    	return view('account.index');
    }

    public function update(Request $request)
    {
    	$user = auth()->user();
    	$user->update(['currency' => $request->currency, 'weight_unit' => $request->weight_unit]);
    	return redirect()->back();
    }
}
