<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Personality;
class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request){

      #  dd($request->all() );
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'], 
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $EXT_punt = ($request->EXT10 + $request->EXT9 + $request->EXT3) / 3;
        $EST_punt = ($request->EST3 + $request->EST5 + $request->EST10) / 3;
        $AGR_punt = ($request->AGR1 + $request->AGR3 + $request->AGR6) / 3;
        $CSN_punt = ($request->CSN2 + $request->CSN7 + $request->CSN8) / 3;
        $OPN_punt = ($request->OPN6 + $request->OPN2 + $request->OPN7) / 3;

        $personality = array_search(max([$OPN_punt, $CSN_punt, $EXT_punt, $AGR_punt, $EST_punt]), [$OPN_punt, $CSN_punt, $EXT_punt, $AGR_punt, $EST_punt] );

        switch ($personality) {
            case 0:
                $user->update(['personality_id' => 1]);
                break;
            case 1:
                $user->update(['personality_id' => 2]);
                break;
            case 2:
                $user->update(['personality_id' => 3]);
                break;
            case 3:
                $user->update(['personality_id' => 4]);
                break;
            case 4:
                $user->update(['personality_id' => 5]);
                break;
        }

        Auth::login($user);

        return redirect('/')->with('welcome', true);
    }
}
