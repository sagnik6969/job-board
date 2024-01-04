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
            // intended => redirects to the previously intended page after login if no intended page then redirects to default.
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
            // back() => returns to the previous page from where the post method call is made
        }

        // dd($credentials, $remember);


    }


    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();
        // delete the session data and regenerates the id.

        request()->session()->regenerateToken();
        // regenerates the csrf token 
        // All the forms that were loaded before the logout becomes invalid.

        return redirect()->back();
    }
}
