<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Models\Streak;

class AchievementsController extends Controller
{
    public function create(){
        $achievements = Achievement::all();
        $streak = Streak::where('user_id', auth()->id())
                ->max('current_streak') ?? 0;
        return view('/achievements', compact('achievements', 'streak') );
    }
}
