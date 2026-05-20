<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'email' => ['required', 'email', 'exists:users', 'max:255'],
            'password' => ['required', 'string', 'min:8']
        ]);

        if (Auth::attempt($user) ){
            $request->session()->regenerate();

            return redirect('/')->with('welcome', false);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }

    public function destroy(){
        Auth::logout();

        return redirect('/login');
    }

}
