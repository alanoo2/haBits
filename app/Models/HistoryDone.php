<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryDone extends Model
{
    protected $table = 'history_done';
    public $timestamps = false;  
    
    protected $fillable = ['habit_id', 'user_id', 'date', 'done'];
}
