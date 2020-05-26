<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $tasks = ($user->tasks()->count());
        $completedTasks = $user->tasks()->where('status', 'completed')->count();
        $uncompletedTasks = $user->tasks()->where('status', 'uncompleted')->count();

        return view('user.account', compact('tasks', 'completedTasks', 'uncompletedTasks', 'user'));
    }
}
