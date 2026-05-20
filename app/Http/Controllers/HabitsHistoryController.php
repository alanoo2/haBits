<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryDone;
use App\Models\Habits;
use App\Models\Streak;

class HabitsHistoryController extends Controller
{
   public function store($habitId)
    {
        $habit = Habits::findOrFail($habitId);
        
        \Log::info('store called', ['habit_id' => $habit->id]);
        
        HistoryDone::updateOrCreate(
            [
                'habit_id' => $habit->id,
                'user_id' => auth()->id(),
                'date' => today(),
            ],
            ['done' => true]
        );

        $this->updateStreak($habit);

        return response()->json(['done' => true]);
    }


    private function updateStreak(Habits $habit)
    {
        $user = auth()->user();

        // Verificar si ayer completó algún hábito
        $completedYesterday = HistoryDone::where('user_id', $user->id)
            ->where('date', today()->subDay()->toDateString())
            ->where('done', true)
            ->exists();

        // Obtener o crear streak global
        $streak = Streak::firstOrCreate(
            ['user_id' => $user->id, 'habit_id' => $habit->id],
            ['current_streak' => 0, 'longer_streak' => 0]
        );

        if ($completedYesterday) {
            $streak->current_streak += 1;
        } else {
            $streak->current_streak = 1;
        }

        if ($streak->current_streak > $streak->longer_streak) {
            $streak->longer_streak = $streak->current_streak;
        }

        $streak->last_completed_date = today();
        $streak->save();
    }
    
}
