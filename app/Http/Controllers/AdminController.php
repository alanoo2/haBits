<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Streak;
use App\Models\User;

class AdminController extends Controller
{

    private function checkAdmin()
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403);
        }
    }    

    public function index()
    {
        $this->checkAdmin();
        $streak = Streak::where('user_id', auth()->id())
                ->max('current_streak') ?? 0;
        
        $users = User::with('habits')->get();
        return view('admin.admin', compact('users', 'streak'));
    }
    public function edit(User $user)
    {
        $streak = Streak::where('user_id', auth()->id())
                ->max('current_streak') ?? 0;
        
        $this->checkAdmin();
        return view('admin.edit', compact('user', 'streak'));
    }

    public function update(Request $request, User $user)
    {
        $this->checkAdmin();
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        ]);
        $user->update($validated);
        return redirect(route('admin'))->with('success', 'User updated!');
    }

    public function destroy(User $user)
    {
        if (auth()->user()->rol !== 'admin') {
            abort(403);
        }

        $user->delete();
        return redirect(route('admin'))->with('success', 'User deleted!');
    }
}
