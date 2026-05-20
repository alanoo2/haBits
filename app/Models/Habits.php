<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HistoryDone;

class Habits extends Model
{
    protected $table = 'habits'; // ¿lo tienes?

    protected $fillable = ['title', 'description', 'level', 'user_id', 'id_category'];

    public function historyDone()
    {
        return $this->hasMany(HistoryDone::class, 'habit_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
