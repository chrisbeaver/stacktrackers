<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\User;

class SignupController extends Controller
{
    public function signupForm()
    {
        return view('signup');
    }

    public function registerUser(SignupRequest $request)
    {
        $user = User::create(['email' => $request->email, 'username' => $request->username,
                              'password' => $request->password]);
        auth()->login($user);
        // return redirect()->action('HoldingController@index');
    }
}
