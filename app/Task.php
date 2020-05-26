<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCompletedTasks()
    {
        return Task::where('status', 'completed')->count();
    }

    public function getUncompletedTasks()
    {
        return Task::where('status', 'uncompleted')->count();
    }

}
