<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habits;
use App\Models\Category;
use App\Models\Streak;
use Illuminate\Support\Facades\Gate;

class HabitsController extends Controller
{
    public function create(){
        
        $streak = Streak::where('user_id', auth()->id())
            ->max('current_streak') ?? 0;


        return view('habits.create', compact('streak'));
    }

    public function store(Request $request){
        $validated = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'id_category' => ['required', 'exists:categories,id'],
    ]);

    $validated['user_id'] = auth()->id();
    $validated['level'] = 1;

    Habits::create($validated);

    return redirect(route('main'))->with('success', 'Habit created!');

    }

    public function destroy(Habits $habit)
    {
        Gate::authorize('modify-habit', $habit);
        $habit->delete();
        return redirect(route('main'))->with('success', 'Habit deleted!');
    }

    public function edit(Habits $habit)
    {
        Gate::authorize('modify-habit', $habit);
        $categories = Category::all();
        return view('habits.edit', compact('habit', 'categories'));
    }

    public function update(Request $request, Habits $habit)
    {
        Gate::authorize('modify-habit', $habit);
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'id_category' => ['required', 'exists:categories,id'],
        ]);

        $habit->update($validated);

        return redirect(route('main'))->with('success', 'Habit updated!');
    }
}
