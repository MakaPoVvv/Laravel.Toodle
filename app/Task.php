<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public static function status($id)
//    {
//        $task = Task::findOrFail($id);
//        if($task->status == 'completed'){
//            return __('message.statusCompleted');
//        } else{
//            return __('message.statusUncompleted');
//        }
//    }
}
