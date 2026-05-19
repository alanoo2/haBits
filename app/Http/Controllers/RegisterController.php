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

        $response = Http::timeout(10)->post(config('services.fastapi.url') . '/predict', [
            'EXT10' => $request->EXT10,
            'EXT9'  => $request->EXT9,
            'EXT3'  => $request->EXT3,
            'EST3'  => $request->EST3,
            'EST5'  => $request->EST5,
            'EST10' => $request->EST10,
            'AGR1'  => $request->AGR1,
            'AGR3'  => $request->AGR3,
            'AGR6'  => $request->AGR6,
            'CSN2'  => $request->CSN2,
            'CSN7'  => $request->CSN7,
            'CSN8'  => $request->CSN8,
            'OPN6'  => $request->OPN6,
            'OPN2'  => $request->OPN2,
            'OPN7'  => $request->OPN7,
        ]);

        $personalityMap = [
            'OPN' => 'Openness',
            'CSN' => 'Conscientiousness',
            'EXT' => 'Extraversion',
            'AGR' => 'Agreeableness',
            'EST' => 'Neuroticism',
        ];

        $data = $response->json(); // esto devuelve "EXT" directamente
        $personalityId = Personality::where('name', $personalityMap[$data])->value('id');

        // 3. Guardar personalidad en el usuario
        $user->update(['personality_id' => $personalityId]);

        Auth::login($user);

        return redirect('/');
    }
}
