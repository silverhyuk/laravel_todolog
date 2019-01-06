<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'due_date', 'priority', 'status'];  // 1

    protected $dates = ['due_date'];    //2
    public function project() // 3
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeDueInDays($query, $days)  // 4
    {
        $now = \Carbon\Carbon::now();   // 5
        return $query->where('due_date', '>', $now)  // 6
        ->where('due_date', '<', $now->copy()->addDays($days));  // 7
    }

}
