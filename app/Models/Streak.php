<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Streak extends Model
{
    protected $table = 'streaks';
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'habit_id', 
        'current_streak',
        'longer_streak',
    ];
        
}
