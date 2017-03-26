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
    	
    }
}
