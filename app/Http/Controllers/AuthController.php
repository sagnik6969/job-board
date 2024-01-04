<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// create => login form
// store => login using post request

class AuthController extends Controller
{



    public function create()
    {
        return view('auth.create');
    }


    public function store(Request $request)
    {
        // dd(request()->all());

        $request->validate([
            'email' => 'string|email|required',
            'password' => 'string|required'
        ]);

        $credentials = $request->only([
            'email',
            'password'
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }

        // dd($credentials, $remember);


    }


    public function destroy(string $id)
    {
        //
    }
}
